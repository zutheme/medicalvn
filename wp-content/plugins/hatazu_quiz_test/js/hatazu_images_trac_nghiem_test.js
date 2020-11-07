// Runs when the image button is clicked.
var _e_image_button = document.getElementsByClassName('images_option-button');
for (var i = _e_image_button.length - 1; i >= 0; i--) {
    _e_image_button[i].addEventListener("click",upload_image);
}

function upload_image(){
    var meta_image_frame;
    var _e_parent = this.parentElement.parentElement;
    if ( meta_image_frame ) {
        meta_image_frame.open();
        return;
    }

    // Sets up the media library frame
    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_image.title,
        button: { text:  meta_image.button },
        library: { type: 'image' }
    });

    // Runs when an image is selected.
    meta_image_frame.on('select', function(){
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.      
        var _images_slider = _e_parent.getElementsByClassName("images_option")[0];
        var _img_set = _e_parent.getElementsByClassName("img_set")[0];
        _img_set.src = media_attachment.url;
        _images_slider.value = media_attachment.url;
    });

    // Opens the media library frame.
    meta_image_frame.open();
}
/*call list post*/
var e_list_cat = document.querySelector("#list-taxonomy");
var echeck_cat = e_list_cat.getElementsByClassName('check-cat');
for (var i = 0; i < echeck_cat.length; i++) {
    echeck_cat[i].addEventListener("click",event_check);
}
function event_check(e) {
    var _idcate = this.value;
    listpostbyidcate(_idcate)
}
//list category
var e_result_load = document.getElementById("result-load");
var e_load = e_result_load.getElementsByClassName("load")[0];
function listpostbyidcate(_idcate){
    var e_list_post =  document.querySelector(".list-post");
    var http = new XMLHttpRequest();
    var url = meta_image.ajaxurl+"?action=listcheckcat";
    var params = JSON.stringify({"idcate":_idcate});
    http.open("POST", url, true);
    //http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    e_load.style.display = "block";
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var myArr = JSON.parse(this.responseText);
            //console.log(myArr);
            var str_rs = '';
             e_load.style.display = "none";
            var e_ul = e_result_load.getElementsByClassName('list-post')[0];
            while (e_ul.firstChild) {
                e_ul.removeChild(e_ul.firstChild);
            }
            if(myArr.idpost!=''){
                var e_listsubject = e_result_load.getElementsByClassName('listsubject')[0];
                var _listsubject = e_listsubject.value;
                for (var i = 0; i < myArr.length; i++) {
                    eli = document.createElement("li");
                    e_span = document.createElement("span");
                    e_span.setAttribute("class", "subject");
                    e_span.innerHTML = myArr[i].title;
                    e_chkbx = document.createElement("input");
                    e_chkbx.setAttribute("type", "checkbox");
                    e_chkbx.setAttribute("class", "list-check");
                    e_chkbx.setAttribute("name", "lstchk[]");
                    if(check_equal( myArr[i].idpost , _listsubject)){
                        e_chkbx.setAttribute("checked", true);
                    }
                    e_chkbx.value = myArr[i].idpost;
                    e_chkbx.setAttribute("onclick", "choose(this)");
                    eli.appendChild(e_span);
                    eli.appendChild(e_chkbx);
                    e_ul.appendChild(eli);
                }
            }
        }
    }
    http.send(params);
}
//select id post
function choose(element) {
    var e_ul = e_result_load.getElementsByClassName('list-post')[0];
    var _input = e_ul.getElementsByClassName("list-check");
    var str_result = '';
    for (var i = 0; i < _input.length; i++) {
        if(_input[i].checked){
            str_result += _input[i].value + ',';
        }
    }
    const _listsubject = str_result.slice(0, -1);
    var e_listsubject = e_result_load.getElementsByClassName('listsubject')[0];
    e_listsubject.value = _listsubject;
}
function check_equal( _value, _listsubject){
    var listsubject = _listsubject.split(',');
    for (var i = 0; i < listsubject.length; i++) {
        if(listsubject[i] == _value){
           return true;
        }
    }
    return false;
}