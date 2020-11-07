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
// To address those who want the "root domain," use this function:
function extractRootDomain(url) {
    var domain = extractHostname(url),
        splitArr = domain.split('.'),
        arrLen = splitArr.length;
    //extracting the root domain here
    //if there is a subdomain 
    if (arrLen > 2) {
        domain = splitArr[arrLen - 2] + '.' + splitArr[arrLen - 1];
        //check to see if it's using a Country Code Top Level Domain (ccTLD) (i.e. ".me.uk")
        if (splitArr[arrLen - 2].length == 2 && splitArr[arrLen - 1].length == 2) {
            //this is using a ccTLD
            domain = splitArr[arrLen - 3] + '.' + domain;
        }
    }
    return domain;
}
//test object
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
function reach_object(obj_message){
  for (var key in obj_message) {
      // skip loop if the property is from prototype
      if (!obj_message.hasOwnProperty(key)) continue;
      var obj = obj_message[key];
      for (var prop in obj) {
          // skip loop if the property is from prototype
          if(!obj.hasOwnProperty(prop)) continue;
          // your code
          console.log(prop + " = " + obj[prop]);
      }
  }
}
//end object
 function isRealValues(obj)
  {
   return obj && obj !== 'null' && obj !== 'undefined';
  }
function deleteCookie(cookiename){
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/";                    
  }
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function setCookieHours(cname,cvalue,hours) {
    var d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
/*var ebtn = document.getElementsByTagName("button");
for (var i = 0; i < ebtn.length; i++) {
  if(ebtn[i].type == 'submit'){
    ebtn[i].type = 'button';
  }
}*/
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

//consultant
var _modal_consultant_form = document.getElementsByClassName('modal-consultant-form')[0];

var _e_modal_consultant = _modal_consultant_form.getElementsByClassName('modal-consult')[0];
var _e_consultant_form = _modal_consultant_form.getElementsByClassName('frm-register')[0];
var _e_btn_consultant = document.getElementsByClassName('btn-consultant');
for (var i = _e_btn_consultant.length - 1; i >= 0; i--) {
    _e_btn_consultant[i].addEventListener("click", show_consultant_popup);
}
function show_consultant_popup(){
  _e_modal_consultant.style.display = "block";
  //countdown();
}
var _e_close = _e_modal_consultant.getElementsByClassName('close')[0];
_e_close.addEventListener("click", close_consultant_popup);
function close_consultant_popup(){
    /*setCookieHours('popup',1,0.84); //after 5 minutes*/
   _e_modal_consultant.style.display = "none";
}
/*
setInterval(function(){
  var _pop = getCookie('popup');
   if(!isRealValues(_pop) && cat_parent!='blog-lam-dep'){
      _e_modal_consultant.style.display = "block";
      countdown(); 
   }
}, 180000);*/
function countdown(){
  var initdate = new Date().getTime();
  var countDownDate = new Date(initdate + 3*60000);
  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
      _e_modal_consultant.style.display = "none";
      setCookieHours('popup',1,0.84);
      //console.log(_e_modal_consultant);
    }
  }, 1000);
}
// function loop_interval(callback){
//     callback(arguments[1], arguments[2],arguments[3], arguments[4]);
// }
/*
function findpopup(element){
  var eparent = element;
  var epopup = eparent.getAttribute("data-popup-backdrop");
  while(!epopup){
    eparent = eparent.parentElement;
    epopup = eparent.getAttribute("data-popup-backdrop");
  }
  return eparent;
}*/

var e_btn_register = document.getElementsByClassName('btn-register');
if (typeof(e_btn_register) != 'undefined' && e_btn_register != null){
  for (var i = 0; i < e_btn_register.length; i++) {
    e_btn_register[i].addEventListener("click",regform);
  }
}


// function loop_interval(callback){
//     callback(arguments[1], arguments[2],arguments[3], arguments[4]);
// }
/*
function findpopup(element){
  var eparent = element;
  var epopup = eparent.getAttribute("data-popup-backdrop");
  while(!epopup){
    eparent = eparent.parentElement;
    epopup = eparent.getAttribute("data-popup-backdrop");
  }
  return eparent;
}*/

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
function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
var expanded = false;
function showCheckboxes(element) {
  var eparent = element.parentElement;
  var checkboxes = eparent.getElementsByClassName("checkboxes")[0];
  var strlstsv = getCookie('lstservices');
  if(!strlstsv){
    getservicesvtech(checkboxes);
  }else{
    var htmlstring = checkboxes.innerHTML;
    htmlstring = (htmlstring.trim) ? htmlstring.trim() : htmlstring.replace(/^\s+/,'');
    if(htmlstring == ''){
      if(!isJson(strlstsv)) return false;
      var myArr = JSON.parse(strlstsv);
      var _html = '';
      for (var i = 0; i <  myArr.length; i++) {
         _html += '<label>';
         _html += '<input class="check_service" onclick="inputcheck(this)" type="checkbox" name="check_service" value="'+myArr[i].id+'" /><span>'+myArr[i].name+'</span></label>';
      }
      checkboxes.innerHTML = _html;
    }
  }
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function inputcheck(element){
  var e_selected = element.parentElement.parentElement.parentElement.getElementsByClassName("selected")[0];
  var e_listcheck = element.parentElement.parentElement.getElementsByClassName("check_service");
  /*console.log(e_selected);
  console.log(e_listcheck);*/
  var _html_lstsv = '';
  for (var i = 0; i < e_listcheck.length; i++) {
    if(e_listcheck[i].checked){
      let _idsv = e_listcheck[i].value;
      let _namesv = e_listcheck[i].parentElement.getElementsByTagName("span")[0].innerHTML;
      _html_lstsv += '<span id="'+_idsv+'">'+_namesv+'</span>';
    }
  }
  e_selected.innerHTML = _html_lstsv;
}
// Listen for all clicks on the document
document.addEventListener('click', function (event) {
    var checkboxes = document.getElementsByClassName("checkboxes");
    // If the click happened inside the the container, bail
    if (!event.target.closest('.sel-services')) {
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].style.display = "none";
      }
      //checkboxes.style.display = "none";
      expanded = false;
    }
    // Otherwise, run our code...

}, false);

setCookie('lstservices',htz_config.strjson,1);        
//console.log(htz_config.strjson);
function loadbefore(){
  //const proxyurl = "https://cors-anywhere.herokuapp.com/";
  //var url ='https://vttechsolution.vn:8047/api/website/getservicecare';
  var url ='';
  const request = createCORSRequest('GET', url);
  if (!request) {
      throw new Error('CORS is not supported');
  }
  request.onload = () => {
      const responseText = request.responseText;
      setCookie('lstservices',responseText,1);
      //var myArr = JSON.parse(responseText);
    }
    request.onerror = () => {
        console.log('Error');
    }
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('Accept', 'application/json');
    //request.setRequestHeader('API_KEY', 'TK047TA456MKK2444FST24D5KDF15TT');
    request.send();
}

function getservicesvtech(element){
  const proxyurl = "https://cors-anywhere.herokuapp.com/";
  var url ='https://vttechsolution.vn:8047/api/website/getservicecare';
  const request = createCORSRequest('GET', proxyurl + url);
  var eparent = element.parentElement;
  var eloading = eparent.getElementsByClassName("loading")[0];
  eloading.style.display ="block";
  if (!request) {
      throw new Error('CORS is not supported');
  }
  request.onload = () => {
      eloading.style.display ="none";
      const responseText = request.responseText;
      setCookie('lstservices',responseText,1);
      var myArr = JSON.parse(responseText);
      var _html = '';
      for (var i = 0; i <  myArr.length; i++) {
         _html += '<label>';
         _html += '<input type="checkbox" onclick="inputcheck(this)" name="check_service" value="'+myArr[i].id+'" /><span>'+myArr[i].name+'</span></label>';
      }
      element.innerHTML = _html;
    }
    request.onerror = () => {
        console.log('Error');
    }
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('Accept', 'application/json');
    request.setRequestHeader('API_KEY', 'TK047TA456MKK2444FST24D5KDF15TT');
    request.send();
}

function addcustomer(strjson){
  var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
  e_popup_processing.style.display ='block';
  e_popup_processing.style.zIndex = "99999";
  const proxyurl = "https://cors-anywhere.herokuapp.com/";
  var url_input = 'https://vttechsolution.vn:8047/api/website/send';
  const request = createCORSRequest('POST', proxyurl+url_input);
  if (!request) {
      throw new Error('CORS is not supported');
  }
  request.onload = () => {
    e_popup_processing.style.display ='none';
    const responseText = request.responseText;
    var myArr = JSON.parse(responseText);
      console.log(myArr); 
      if(myArr==='success'){

      }else {

      }
    }
    request.onerror = () => {
        console.log('Error');
    }
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('Accept', 'application/json');
    request.setRequestHeader('API_KEY', 'TK047TA456MKK2444FST24D5KDF15TT');
    var params = JSON.stringify(strjson);
    request.send(params);
}


function findform(element,callback){
  var eparent = element;
  var countfind = 20;
  var interval_e_form = setInterval(function() {
  let frm = eparent.getElementsByTagName("form")[0];
      if(frm) {
        clearInterval(interval_e_form);
        return callback(frm);
      }
      if(countfind < 0){
        clearInterval(interval_e_form);
      }
      countfind = countfind -1;
      eparent = eparent.parentElement;  
   }, 100);
   callback(); 
}

function regform(){
  var frm = reachform(this);
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _fullname='',_phone='',_email='',_address='';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'name'){
            _fullname = ename[i].value;
            if(!_fullname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }else if(ename[i].name == 'phone'){
            _phone = ename[i].value;
            if(_phone.length < 10 || _phone.length > 12){
                ename[i].style.borderColor = "red";
                alert("Số điện thoại chưa đúng");
                //ename[i].innerHTML = "Vui lòng nhập số điện thoại";
                return false;
              }
            }
          else if(ename[i].name == 'email'){
              _email = ename[i].value;
          }else if(ename[i].name == 'address'){
              _address = ename[i].value;
          }
      }
    }
    var _sel_service ='';
    var e_nameservice = frm.getElementsByClassName("check_service");
    for (var j = 0; j < e_nameservice.length; j++) {
           if(e_nameservice[j].checked){
              _sel_service += e_nameservice[j].value+',';
           }
         }
    _sel_service = _sel_service.substring(0, _sel_service.length - 1);    
    var eselsevice = frm.getElementsByTagName("select");
    var _sel_local='';
    if(eselsevice){
        for (var i = 0; i < eselsevice.length; i++) {
        if(eselsevice[i].name == 'sel-local'){
           _sel_local = eselsevice[i].options[eselsevice[i].selectedIndex].text;
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
  
  
  //pass argument
    var _url = document.URL;
    var _reg_url = _url.replace(/[&]/g, ';');
    //body 
    var _ip = htz_config.ip;
    //var _ip = '192.165.434.91';
    var _body = _url+"<br>tư vấn:"+_comment+'<br>nơi khám:'+_sel_local;
   
   /*send param*/
   var params = JSON.stringify({"name":_fullname,"phone":_phone,"service_care":_sel_service,"content": _body,"ip":_ip,});
   //console.log(params);
   //return false;
   var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999";
    const proxyurl = "https://cors-anywhere.herokuapp.com/";
    var url_input = 'https://vttechsolution.vn:8047/api/website/send';
    const request = createCORSRequest('POST', proxyurl+url_input);
    if (!request) {
        throw new Error('CORS is not supported');
    }
    request.onload = () => {
      const responseText = request.responseText;
      var myArr = JSON.parse(responseText);
      console.log(myArr); 
      e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
      e_popup_processing.getElementsByClassName('loading')[0].style.display ="none";
      e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
      if(myArr==='SUCCESS'){
          e_popup_processing.getElementsByClassName('result')[0].innerHTML ="Cảm ơn bạn đã đăng ký tư vấn";
          e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
      }else {
          e_popup_processing.getElementsByClassName('result')[0].innerHTML = myArr;
          e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
      }
      setTimeout(function(){
          e_popup_processing.style.display ='none';
        },6000);
      }
      request.onerror = () => {
          console.log('Error');
      }
      request.setRequestHeader('Content-Type', 'application/json');
      request.setRequestHeader('Accept', 'application/json');
      request.setRequestHeader('API_KEY', 'TK047TA456MKK2444FST24D5KDF15TT');
      
      request.send(params);
}
