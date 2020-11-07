//console.log(list_question);
var start = 0;
var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
var _e_quiz_test = document.getElementsByClassName("quiz-test-show")[0];
var _e_btn_next = _e_quiz_test.getElementsByClassName("btn-next")[0];
var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
var _e_desc_begin = _e_quiz_test.getElementsByClassName("desc-begin")[0];
_e_btn_next.addEventListener("click",nextquest);
var _idpost = 0,order=1;
var answ = [];
var str_answ = '';
var summary = [0,0,0,0,0,0];
var board_result = ['A','B','C','D','E','F'];   
function nextquest(){
    //console.log(start);
	if(start==0){
		_e_desc_begin.style.display = 'none';
        _e_btn_next.innerHTML = 'Kế tiếp';
	}else{
		 var elstchk = _e_quiz_test.getElementsByClassName("list-question")[0].getElementsByClassName('list-check');
		 var ans = '', hd_id_post = 0, char_ans='';
		 for (var i = 0; i < elstchk.length; i++) {
		 	if(elstchk[i].checked == true){
                char_ans = elstchk[i].parentElement.getElementsByClassName('question')[0].innerText;
                for (var j = 0; j < board_result.length; j++) {
                    if(board_result[j]==char_ans){
                        summary[j] = summary[j] + 1;
                    }
                }
		 		ans += char_ans +',';
                hd_id_post = elstchk[i].parentElement.getElementsByClassName('hidden_idpost')[0].value;
		 	}
		 }
		 ans = ans.substring(0, ans.length - 1);
		 str_answ += '{"numquest":"'+start+'","idpost":"'+hd_id_post+'","ans":"'+ans+'"},';
	}
    if(list_question.length > 0){
        _idpost = list_question[0];
        makeAJAXCall(_idpost,renderdata);
        list_question.shift();
        start++;
    }else{
        str_answ = str_answ.substring(0, str_answ.length - 1);
        str_answ = '['+str_answ+']';
        //console.log(str_answ);
        //var str_json = '[{"user_id":"11","check_id":"38"},{"user_id":"11","check_id":"38"}]'
        //var data = JSON.stringify(str_answ);
        MakeOutResult(str_answ,RenderResult);
        _e_quiz_test.getElementsByClassName('question-title')[0].innerHTML ="Kết quả";
        //_e_quiz_test.getElementsByClassName('question-content')[0].innerHTML ="Nội dung kết quả";
        var e_ul = _e_quiz_test.getElementsByClassName('list-question')[0];
        while (e_ul.firstChild) {
            e_ul.removeChild(e_ul.firstChild);
        }
        console.log(summary);
        _e_btn_next.style.display = "none";
    	return false;
    }
}
function makeAJAXCall(_order,callback){
    var http = new XMLHttpRequest();
    var url = MyAjax.ajaxurl+"?action=request_question";
    var params = JSON.stringify({"idpost":_idpost});
    http.open("POST", url, true);
    //http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    e_popup_processing.style.display = "block";
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
        	callback(this.responseText);     
        }
    }
    http.send(params);
    //console.log("request sent to the server");
 }

function renderdata(data){
 	if(data){
 		var myArr = JSON.parse(data);
 		//console.log(myArr);
        var hdidpost = 0;
        Object.keys(myArr).forEach(function(key) {
          if(key==='idpost'){
                hdidpost = myArr[key];;
          }
          if(key==='title'){
          		_e_quiz_test.getElementsByClassName('question-title')[0].innerHTML = order;
          }
          if(key==='content'){
                _e_quiz_test.getElementsByClassName('question-content')[0].innerHTML = myArr[key];
          }
          if(key==='list-quest'){
                //console.log(myArr[key].length);
                var e_ul = _e_quiz_test.getElementsByClassName('list-question')[0];
                while (e_ul.firstChild) {
                    e_ul.removeChild(e_ul.firstChild);
                }
                var li_len = myArr[key].length;
                var _with_li = 0;
                if(_width < 768){
                	_with_li = '50%';
                }else{
                	_with_li = (100/li_len)+'%';
                }
                
                var e_li,e_span,e_p,e_chkbx;
                var lst_char = ['A','B','C','D','E','F'];
                for (var i = 0; i < li_len; i++) {
                    //console.log(myArr[key][i]);
                    eli = document.createElement("li");
                    eli.style.cssText = "width:"+_with_li;
                    e_span = document.createElement("span");
                    e_span.setAttribute("class", "question");
                    e_span.setAttribute("onclick", "choose(this)");
                    e_span.innerHTML = lst_char[i];
                    e_chkbx = document.createElement("input");
                    e_chkbx.setAttribute("type", "checkbox");
                    e_chkbx.setAttribute("class", "list-check");
                    e_chkbx.setAttribute("name", "lstchk[]");

                    e_hdidpost = document.createElement("input");
                    e_hdidpost.setAttribute("type", "hidden");
                    e_hdidpost.setAttribute("class", "hidden_idpost");
                    e_hdidpost.setAttribute("name", "name_idpost");
                    e_hdidpost.value = hdidpost;
                    e_p = document.createElement("p");
                    e_p.innerHTML = myArr[key][i];
                    eli.appendChild(e_span);
                    eli.appendChild(e_chkbx);
                    eli.appendChild(e_p);
                    eli.appendChild(e_hdidpost);
                    e_ul.appendChild(eli);
                }
          }
        });
        order++;
        e_popup_processing.style.display = "none";
    }

 }
 function choose(element){
	 var eparent = element.parentElement;
	 //console.log(eparent);
	 var echk = eparent.getElementsByClassName('list-check')[0];
	 //console.log(echk.checked);
	 if(echk.checked == true){
	 	echk.checked = false;
	 	echk.setAttribute('checked', '');
	 }else {
	 	echk.checked = true;
	 	echk.setAttribute('checked', 'checked');
	 }
	 plusclass(eparent,'checked');
}

function plusclass(element,name) {
  var arr;
  arr = element.className.split(" ");
  if (arr.indexOf(name) == -1) {
    element.className += " " + name;
  }else{
  	//var rpclass = "/"+name+"/g";
  	//console.log(rpclass);
  	element.className = element.className.replace(/\bchecked\b/g, "");
  }
}

function MakeOutResult(_strjson,callback){
    var http = new XMLHttpRequest();
    var url = MyAjax.ajaxurl+"?action=outresult";
    var params = JSON.stringify({"data":_strjson});
    http.open("POST", url, true);
    //http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    e_popup_processing.style.display = "block";
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            callback(this.responseText);     
        }
    }
    http.send(params);
    //console.log("request sent to the server");
 }
function RenderResult(data){
    if(data){
        //var myArr = JSON.parse(data);
        console.log(data);
        // Object.keys(myArr).forEach(function(key) {
        //   if(key==='list-quest'){
            
        //   }
        // });
        e_popup_processing.style.display = "none";
    }

 }