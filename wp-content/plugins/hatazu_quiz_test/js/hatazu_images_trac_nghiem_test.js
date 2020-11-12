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
//list category
var e_result_load = document.getElementById("result-load");
var e_load = e_result_load.getElementsByClassName("load")[0];

//add question
var e_add_question = document.getElementById("add-question");
if(e_add_question){
    var e_add_more = e_add_question.getElementsByClassName("add-more")[0];
    e_add_more.addEventListener("click",addquestion);
    var e_list_question = document.getElementById("list-question");
    var e_ul_question = e_list_question.getElementsByClassName("list-question")[0];
}

function addquestion(){
    var _e_parent = this.parentElement.parentElement;
    var _idparent =  _e_parent.getElementsByClassName("idparent")[0].value;
    var _e_title_question = _e_parent.getElementsByClassName("question-more")[0];
    var _title_question = _e_title_question.value;
    var http = new XMLHttpRequest();
    var url = meta_image.ajaxurl+"?action=addquestion";
    var params = JSON.stringify({"idparent":_idparent, "title_question_more":_title_question});
    http.open("POST", url, true);
    //http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    e_load.style.display = "block";
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var myArr = JSON.parse(this.responseText);
             e_load.style.display = "none";
            while (e_ul_question.firstChild) {
                e_ul_question.removeChild(e_ul_question.firstChild);
            }
           if(myArr[0].idpost!=''){
            for (var i = 0; i < myArr.length; i++) {
                    eli = document.createElement("li");
                    e_ahref = document.createElement("a");
                    e_ahref.setAttribute("href", myArr[i].link);
                    //e_ahref.setAttribute("target", '_blank');
                    e_ahref.innerHTML = myArr[i].title;
                    //e_ahref.setAttribute("onclick", "choose(this)");
                    eli.appendChild(e_ahref);
                    e_ul_question.appendChild(eli);
                }
            }
            _e_title_question.value = "";
        }
    }
    http.send(params);
}
function loadlistpost(){
    if(!e_add_question) return false;
    var _idparent = e_add_question.getElementsByClassName("idparent")[0].value;
    var http = new XMLHttpRequest();
    var url = meta_image.ajaxurl+"?action=loadquestion";
    //var params = JSON.stringify({"idparent":_idparent, "title_question_more":_title_question_more});
    http.open("POST", url, true);
    //http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    e_load.style.display = "block";
    var params = JSON.stringify({"idparent":_idparent});
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var myArr = JSON.parse(this.responseText);
            console.log(myArr);
             e_load.style.display = "none";
            while (e_ul_question.firstChild) {
                e_ul_question.removeChild(e_ul_question.firstChild);
            }
            if(myArr[0].idpost!=''){
            for (var i = 0; i < myArr.length; i++) {
                eli = document.createElement("li");
                e_ahref = document.createElement("a");
                e_ahref.setAttribute("href", myArr[i].link);
                e_ahref.innerHTML = myArr[i].title;
                //e_ahref.setAttribute("target", '_blank');
                //e_ahref.setAttribute("onclick", "choose(this)");
                eli.appendChild(e_ahref);
                e_ul_question.appendChild(eli);
            }
            }
            
        }
    }
    http.send(params);
}
loadlistpost();
/*add quiz abc*/
var e_result_load = document.getElementById("result-load");
var e_load = e_result_load.getElementsByClassName("load")[0];
//add question
function addmorequizelement(element){
    var _e_parent = element.parentElement.parentElement;
    var _e_text_question = _e_parent.getElementsByClassName('ask-question')[0];
    var _txt_quiz = _e_text_question.value;
    var _e_gallery = document.getElementsByClassName('list-ask-question')[0];
    var e_li = document.createElement("li");
    e_li.setAttribute("class", "image page_item");
    var e_img = document.createElement("textarea");
    e_img.value = _txt_quiz;
    e_img.setAttribute("class", "txt_quiz");
    e_img.setAttribute("rows", "5");
    e_img.setAttribute("cols", "100");
    e_li.appendChild(e_img);
    var e_sub_ul = document.createElement("ul");
    e_sub_ul.setAttribute("class", "actions");
    var e_sub_li = document.createElement("li");
    var e_sub_a = document.createElement("a");
    e_sub_a.setAttribute("href", "javascript:void(0)");
    e_sub_a.setAttribute("class", "delete");
    e_sub_a.innerHTML = "delete";
    e_sub_a.addEventListener('click', function(){
        delete_quiz(e_sub_a);
    });
    e_sub_li.appendChild(e_sub_a);
    e_sub_ul.appendChild(e_sub_li);
    e_li.appendChild(e_sub_ul);
    _e_gallery.appendChild(e_li);
    _e_text_question.value = "";
    //init_sort();  
}
function save_list_quiz(element) {
    //var result = load.getElementsByClassName("result")[0];
    e_load.style.display = "block";
    var _e_parent = element.parentElement.parentElement;
    var _hiddenidpost = _e_parent.getElementsByClassName("hiddenidpost")[0].value;
    //var _e_ul_gallery = document.getElementsByClassName('list-ask-question')[0];
    var _e_list_ask_question = document.getElementById('quiz-ask');
    var _e_quiz = _e_list_ask_question.getElementsByClassName("txt_quiz");
    var list_quiz = [];
    for (var i = 0; i < _e_quiz.length; i++) {
        list_quiz.push(_e_quiz[i].value);
    }
    _list_quiz = JSON.stringify(list_quiz);
    var http = new XMLHttpRequest();
    var url = meta_image.ajaxurl+"?action=addquizabc";
    //var _security = ajax_object.security;
    var params = JSON.stringify({hiddenidpost:_hiddenidpost, list_quiz:_list_quiz});
    http.open("POST", url, true);
    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var myArr = JSON.parse(this.responseText);
            console.log(myArr);
            e_load.style.display = "none";
        }
    }
    http.send(params);
}
function delete_quiz(element) {   
    var _e_parent_ul = element.parentElement.parentElement.parentElement.parentElement;
    var _eli = element.parentElement.parentElement.parentElement;
    _e_parent_ul.removeChild(_eli);
}


