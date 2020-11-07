function extractHostname(url) {
    var hostname;
    //find & remove protocol (http, ftp, etc.) and get hostname
    if (url.indexOf("//") > -1) {
        hostname = url.split('/')[2];
    }
    else {
        hostname = url.split('/')[0];
    }
    //find & remove port number
    hostname = hostname.split(':')[0];
    //find & remove "?"
    hostname = hostname.split('?')[0];
    return hostname;
}
//
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function reachform(element){
  //var eparent = element.parentElement;
  var countdown = 100;
  var eparent = element;
  var frm = eparent.getElementsByTagName("form")[0];
  while(!frm && countdown > 0){
    eparent = eparent.parentElement;
    frm = eparent.getElementsByTagName("form")[0];
    countdown = countdown -1;
  }
  //setTimeout(function(){ return frm; },10000);
  return frm;
}
var e_btn_register_api = document.getElementsByClassName('btn-popup-api');
if (typeof(e_btn_register_api) != 'undefined' && e_btn_register_api != null){
  for (var i = 0; i < e_btn_register_api.length; i++) {
    e_btn_register_api[i].addEventListener("click",popupform_api);
  }
}
var e_btn_popup = document.getElementsByClassName('btn-popup');
if (typeof(e_btn_popup) != 'undefined' && e_btn_popup != null){
  for (var i = 0; i < e_btn_popup.length; i++) {
    e_btn_popup[i].addEventListener("click",popupform);
  }
}
function popupform(){
  var e_modal_consult = document.getElementsByClassName('modal-consult')[0];
  e_modal_consult.style.display = "block";
}
function popupform_api(){
  var e_modal_consult_api = document.getElementsByClassName('modal-consult-api')[0];
  e_modal_consult_api.style.display = "block";
}
var e_btn_close = document.getElementsByClassName('close');
if (typeof(e_btn_close) != 'undefined' && e_btn_close != null){
  for (var i = 0; i < e_btn_close.length; i++) {
    e_btn_close[i].addEventListener("click",closeform);
  }
}
function closeform(){
  var e_modal_consult = document.getElementsByClassName('modal-consult')[0];
  e_modal_consult.style.display = "none";
   var e_modal_consult_api = document.getElementsByClassName('modal-consult-api')[0];
  e_modal_consult_api.style.display = "none";
}
var countfind = 60;
var exist_e_newsletter_form = setInterval(function() {
  var e_btn_register = document.getElementsByClassName('btn-register');
   	  if(e_btn_register) {
           for (var i = 0; i < e_btn_register.length; i++) {
            /*console.log(e_btn_register);*/
            e_btn_register[i].addEventListener("click",regform);
          }
          clearInterval(exist_e_newsletter_form);
      }else if(countfind > 0){
      	/*console.log(countfind);*/
      	 countfind = countfind -1;
      }else{
      	clearInterval(exist_e_newsletter_form);
      }  
   }, 100);
//button api
var count_api = 60;
var exist_e_reg_api = setInterval(function() {
  var e_btn_reg_api = document.getElementsByClassName('btn-register-api');
      if(e_btn_reg_api) {
           for (var i = 0; i < e_btn_reg_api.length; i++) {
            /*console.log(e_btn_register);*/
            e_btn_reg_api[i].addEventListener("click",regform_api);
          }
          clearInterval(exist_e_reg_api);
      }else if(count_api > 0){
        /*console.log(countfind);*/
         countfind = countfind -1;
      }else{
        clearInterval(exist_e_reg_api);
      }  
   }, 100);
//end button api
var _ajaxurl = htz_config.ajax_url;
var _nonce = htz_config.nonce;
function addcontactspread(e_widget_newsletter__form,_email){
  var e_htz_popup_processing = document.getElementsByClassName("loading")[0];
  var e_htz_message = document.getElementsByClassName("message")[0];
  e_htz_popup_processing.style.display = "block";
  var _security = _nonce;
  var xhr = new XMLHttpRequest();
  var url = _ajaxurl+"?action=upcontacttogooglesheet";
  var params = 'security='+_security+'&email='+_email;
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Accept", "application/json");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () { 
      if (xhr.readyState == 4 && xhr.status == 200) {
          var data = JSON.parse(xhr.responseText);
          console.log(data);
          if(data===200){
          	e_htz_message.innerHTML = 'Thank You For Subscribing!';
          }else{
          	e_htz_message.innerHTML = 'Please try again';
          }
          e_htz_popup_processing.style.display = "none";
          setTimeout(function(){
          	e_widget_newsletter__form.getElementsByClassName("email")[0].value = '';
          	e_htz_message.innerHTML = '';
          },6000);
      }
  }
  xhr.send(params);
}
function resetform(frm){
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _lastname='',_firstname='',_phone='',_email='',_address='';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'lastname'){
           ename[i].value ='';
        }
        else if(ename[i].name == 'firstname'){
              ename[i].value='';
          }else if(ename[i].name == 'phone'){
              ename[i].value='';
            }
          else if(ename[i].name == 'email'){
              ename[i].value='';
          }else if(ename[i].name == 'address'){
              ename[i].value='';
          }
      } 
    }  
    // var eselsevice = frm.getElementsByTagName("select");
    // var _sel_course='',_sel_nation ='';
    // if(eselsevice){
    //     for (var i = 0; i < eselsevice.length; i++) {
    //     if(eselsevice[i].name == 'sel-course'){
    //        eselsevice[i].value = '';
    //     }
    //      if(eselsevice[i].name == 'sel-nation'){
    //        eselsevice[i].value = '';
    //     }
    //   }
    // } 
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'note'){
            ecomment[i].value = '';
        }
      }
    } 
}
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function regform(){
  var frm = reachform(this);
 
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _lastname='',_firstname='',_phone='',_email='',_address='';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'lastname'){
            _lastname = ename[i].value;
            if(!_lastname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }
        else if(ename[i].name == 'firstname'){
          _firstname = ename[i].value;
          if(!_firstname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }else if(ename[i].name == 'phone'){
            _phone = ename[i].value;
	            if(_phone.length < 10 || _phone.length > 12){
	                ename[i].style.borderColor = "red";
	                alert("Số điện thoại chưa đúng");
	                return false;
	             }else{
	              var pattern = /^\d+$/;
	              var _test = pattern.test(_phone);
	              if(!_test) {
	              	alert('Số điện thoại không hợp lệ');
	              	return false;
	              }
	            }
	        }
          else if(ename[i].name == 'email'){
              // _email = ename[i].value;
              //  var _test = validateEmail(_email);
              //  if(!_test){
              //  	  alert('Email không hợp lệ');
              //  	  return false;
              //  }
          }else if(ename[i].name == 'address'){
              _address = ename[i].value;
          }
      } 
    }  
    var eselsevice = frm.getElementsByTagName("select");
    var _sel_course='',_sel_nation ='';
    if(eselsevice){
        for (var i = 0; i < eselsevice.length; i++) {
        if(eselsevice[i].name == 'sel-course'){
           _sel_course = eselsevice[i].options[eselsevice[i].selectedIndex].text;
        }
         if(eselsevice[i].name == 'sel-nation'){
           _sel_nation = eselsevice[i].options[eselsevice[i].selectedIndex].text;
        }
      }
    } 
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'note'){
            _comment = ecomment[i].value;
        }
      }
    }
    _url = document.URL;  
    var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
    var _security = _nonce;
    var xhr = new XMLHttpRequest();
    var url = _ajaxurl+'?action=upcontacttogooglesheet&security='+_security;
    var params = JSON.stringify({"firstname":_firstname,"lastname":_lastname,"phone":_phone,"email":_email,"comment": _comment,"nation":_sel_nation,"course":_sel_course,"url":_url});
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () { 
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName('loading')[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            //if(data.error==''){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML ="Cảm ơn bạn đã đăng ký tư vấn";
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            //}else {
                //e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.error;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            //}
            resetform(frm);
            setTimeout(function(){
                e_popup_processing.style.display ='none';
              },6000);
          }
    }
    xhr.send(params);
}

//register API
const createCORSRequest = (method, url) => {
    let xhr = new XMLHttpRequest();
    if ('withCredentials' in xhr) {
        // Kiểm tra XMLHttpRequest object có thuộc tính
    // withCredentials hay không
        // Thuộc tính này chỉ có ở XMLHttpRequest2
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != 'undefined') {
        // Kiểm tra XDomainRequest
        // Đây là đối tượng chỉ có ở IE và
    // là cách để IE thực hiện truy vấn CORS
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        xhr = null;
    }
    return xhr;
}
function regform_api(){
  var frm = reachform(this);
 
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _lastname='',_firstname='',_phone='',_email='',_address='';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'lastname'){
            _lastname = ename[i].value;
            if(!_lastname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }
        else if(ename[i].name == 'firstname'){
          _firstname = ename[i].value;
          if(!_firstname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }else if(ename[i].name == 'phone'){
            _phone = ename[i].value;
              if(_phone.length < 10 || _phone.length > 12){
                  ename[i].style.borderColor = "red";
                  alert("Số điện thoại chưa đúng");
                  return false;
               }else{
                var pattern = /^\d+$/;
                var _test = pattern.test(_phone);
                if(!_test) {
                  alert('Số điện thoại không hợp lệ');
                  return false;
                }
              }
          }
          else if(ename[i].name == 'email'){
              // _email = ename[i].value;
              //  var _test = validateEmail(_email);
              //  if(!_test){
              //      alert('Email không hợp lệ');
              //      return false;
              //  }
          }else if(ename[i].name == 'address'){
              _address = ename[i].value;
          }
      } 
    }  
    //var eselsevice = frm.getElementsByTagName("select");
    var _sel_course='',_sel_nation ='';
    // if(eselsevice){
    //     for (var i = 0; i < eselsevice.length; i++) {
    //     if(eselsevice[i].name == 'sel-course'){
    //        _sel_course = eselsevice[i].options[eselsevice[i].selectedIndex].text;
    //     }
    //      if(eselsevice[i].name == 'sel-nation'){
    //        _sel_nation = eselsevice[i].options[eselsevice[i].selectedIndex].text;
    //     }
    //   }
    // } 
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'note'){
            _comment = ecomment[i].value;
        }
      }
    }
    _url = document.URL;
    var _host = extractHostname(_url);
    var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
    var xhr = new XMLHttpRequest();
    var url = 'https://api.caresoft.vn/tickfulllife/api/v1/tickets';
    //var params = JSON.stringify({"firstname":_firstname,"lastname":_lastname,"phone":_phone,"email":_email,"comment": _comment,"nation":_sel_nation,"course":_sel_course,"url":_url});
    var params = JSON.stringify({
        "ticket": {
          "ticket_subject":  _host,
          "ticket_comment":  _url,
          "email":  "",
          "phone":  _phone,
          "group_id":  10806,
          "username":  _firstname,
          "ticket_priority": "urgent",
          "custom_fields": [{"id": 3973, "value": "47582"},{"id": 5140, "value": _url}]
        }
      });
    //console.log(params);
    /*xhr.open("POST", url, true);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('Authorization', 'Bearer 6Ai6qoJoE10l3nU');
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () { 
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName('loading')[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            //if(data.error==''){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML ="Cảm ơn bạn đã đăng ký tư vấn";
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            //}else {
                //e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.error;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            //}
            resetform(frm);
            setTimeout(function(){
                e_popup_processing.style.display ='none';
              },6000);
          }
    }
    xhr.send(params);*/
    //const proxyurl = "https://cors-anywhere.herokuapp.com/";
    //var url_input = 'https://vttechsolution.vn:8047/api/website/send';
    const request = createCORSRequest('POST', url);
    if (!request) {
        throw new Error('CORS is not supported');
    }
    request.onload = () => {
      const responseText = request.responseText;
      var myArr = JSON.parse(responseText);
      console.log(myArr); 
      }
      request.onerror = () => {
          console.log('Error');
      }
      request.setRequestHeader('Content-Type', 'application/json');
      request.setRequestHeader('Accept', 'application/json');
      request.setRequestHeader('Authorization', 'Bearer 6Ai6qoJoE10l3nU');
      request.withCredentials = true;
      request.send(params);
}