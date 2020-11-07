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

  /*form register*/
  

var e_btn_register = document.getElementsByClassName('btn-register');
if (typeof(e_btn_register) != 'undefined' && e_btn_register != null){
  for (var i = 0; i < e_btn_register.length; i++) {
    e_btn_register[i].addEventListener("click",regform);
  }
}

function findform(element){
  //var eparent = element.parentElement;
  var eparent = element;
  var frm = eparent.getElementsByTagName("form")[0];
  while(!frm){
    eparent = eparent.parentElement;
    frm = eparent.getElementsByTagName("form")[0];
  }
  //setTimeout(function(){ return frm; },10000);
  return frm;
}

function regform(){
  if(!e_btn_register) return false;
  var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
  var frm = findform(this);
  if(!frm) return false;
    //console.log(frm);
    var ename = frm.getElementsByTagName("input");
    var _fullname='',_phone='',_email='';
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
          if(_phone.length < 10 || _phone.length > 11){
              ename[i].style.borderColor = "red";
              alert("Số điện thoại chưa đúng");
              //ename[i].innerHTML = "Vui lòng nhập số điện thoại";
              return false;
          }else if(ename[i].name == 'email'){
              _email = ename[i].value;
          }
        }
      }
    }     
    var eselsevice = frm.getElementsByTagName("select");
    var _sel_local='',_sel_service='';
    if(eselsevice){
        for (var i = 0; i < eselsevice.length; i++) {
        if(eselsevice[i].name == 'sel-service'){
           _sel_service = eselsevice[i].options[eselsevice[i].selectedIndex].text;
        }else if(eselsevice[i].name == 'sel-local'){
           _sel_local = eselsevice[i].options[eselsevice[i].selectedIndex].text;
        }
      }
    }   
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'comment'){
            _comment = ecomment[i].value;
        }
      }
    }
    //console.log(_fullname,_phone,_sel_local,_sel_service,_comment);
 
  //pass argument
   var _url = document.URL;
    _host = extractHostname(_url);
    var _reg_url = _url.replace(/[&]/g, ';');
    var info = _reg_url;
      gbdataURL="nofile";
    //body 
    var _content = "";
    var _reg_url = _url.replace(/[&]/g, ';');
    var _namecat = _host;
    var _body = _url+"<br>Dịch vụ:" + _sel_service+"<br>tư vấn:"+_comment;
    var _typepost = "consultant";
    var _firstname = _fullname;
    var _mobile = _phone;
    var _name_status_type = "request";
    var http = new XMLHttpRequest();
    var url = "https://thammyvienthienkhue.com.vn/api/customer/consultant";
    var params = JSON.stringify({firstname: _firstname, mobile: _mobile, email:_email, address:_sel_local, namecat: _namecat, body:_body, typepost:_typepost, name_status_type:_name_status_type,orfilename:'', file:gbdataURL, url:_url });
    http.open("POST", url, true);
    //Send the proper header information along with the request
    http.setRequestHeader("Accept", "application/json");
    http.withCredentials = true;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //var e_result = frm.getElementsByClassName("result")[0];
    e_popup_processing.style.display = "block";
    e_popup_processing.style.zIndex = "99999";
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
             var myArr = JSON.parse(this.responseText);
             console.log(myArr);      
             Object.keys(myArr).forEach(function(key) {      
              if(key=='success'){
                  //e_result.innerHTML = "Cảm ơn bạn "+myArr.firstname+" đã tham gia";
                  //document.getElementById("POPUP607").display = "block !important;";
                  e_popup_processing.style.display = "none";
                  var thankyou = 'https://thammyvienthienkhue.vn/ngay-vang-cung-chuyen-gia-sai-gon-cam-on/';
                  //redirectPost(thankyou, { text: 'text\n\ntext' });  
                  location.replace(thankyou);      
              }else if(key=='error'){
                e_result.innerHTML = myArr.error;
              }
            });    
        }
    }
    http.send(params);
}

function redirectPost(url, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}


