var e_frm_dk = document.getElementsByClassName("form-dk")[0];
var e_btn_reg_dk = e_frm_dk.getElementsByClassName('btn-dk')[0];
e_btn_reg_dk.addEventListener("click", reg_dk);
function reg_dk(){
  var _url = document.URL;
  _host = extractHostname(_url);
  var _e_frm_reg = this.parentElement;
  //console.log(_e_frm_reg);
  var _efullname = _e_frm_reg.getElementsByClassName('fullname')[0];
  var _e_address = _e_frm_reg.getElementsByClassName('address')[0];
  var _fullname = _efullname.value;
  var _ephone = _e_frm_reg.getElementsByClassName('phone')[0];
  var _address = _e_address.value;
  //var checkBox = _e_promo_form.getElementsByClassName('messageCheckbox')[0];
  //var name_sevice = getSelectedText('select-service');
  var _e_result =  _e_frm_reg.getElementsByClassName('result')[0];
  var str_method = "";
  var _phone = _ephone.value;
  if(!_phone){
      _ephone.style.borderColor = "red";
     _e_result.innerHTML = "Vui lòng nhập số điện thoại";
      return false;
  }
  if(!_fullname){
      _efullname.style.borderColor = "red";
      _e_result.innerHTML = "Vui lòng nhập họ tên";
      return false;
  }
  //var _email = _e_frm_reg.getElementsByClassName('email')[0].value;
  //var e_sel_local = document.getElementsByName("sel-local")[0];
  //var depart_selected = e_sel_service.options[e_sel_service.selectedIndex].value;
  //var local_selected = e_sel_local.options[e_sel_local.selectedIndex].text;
 
  if(!isRealValues(gbdataURL)){
    gbdataURL="nofile";
  }
  //body  
  var _email ="";
  var _namecat = _host;
  var _body = _url;
  var _typepost = "consultant";
  var _firstname = _fullname;
  var _name_status_type = "request";
  var http = new XMLHttpRequest();
  var url = "https://thammyvienthienkhue.com.vn/api/customer/consultant";
  var params = JSON.stringify({firstname: _firstname, mobile: _phone, email:_email ,address:_address, namecat: _namecat, body:_body, typepost:_typepost, name_status_type:_name_status_type,orfilename:'', file:gbdataURL });
  http.open("POST", url, true);
  http.setRequestHeader("Accept", "application/json");
  http.withCredentials = true;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var load = _e_frm_reg.getElementsByClassName("loading")[0];
  load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);      
           console.log(myArr);
           Object.keys(myArr).forEach(function(key) {      
            if(key=='success'){
               _e_frm_reg.getElementsByClassName('fullname')[0].value = "";
                _e_frm_reg.getElementsByClassName('phone')[0].value = "";
                //_e_frm_reg.getElementsByClassName('email')[0].value = "";
                _e_frm_reg.getElementsByClassName('address')[0].value = "";
                _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "Cảm ơn bạn "+myArr.firstname+" đã tham gia<br>";    
                setTimeout(function(){
                  _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "";
                  _e_modal_promo.style.display = "none";
                },6000);
                  
            }else if(key=='error'){
              _e_frm_reg.getElementsByClassName("result")[0].innerHTML = myArr.error;
            }
          });
          load.style.display = "none";      
      }
  }
  http.send(params);
}
//booking
var _e_dat_lich = document.getElementsByClassName("dat-lich")[0];
var e_frm_dk = _e_dat_lich.getElementsByClassName("form-dl")[0];
var e_btn_reg_dk = e_frm_dk.getElementsByClassName('btn-booking')[0];
e_btn_reg_dk.addEventListener("click", reg_booking);
function reg_booking(){
  var _url = document.URL;
  _host = extractHostname(_url);
  var _e_frm_reg = this.parentElement;
  //console.log(_e_frm_reg);
  var _e_fullname = _e_frm_reg.getElementsByClassName('fullname')[0];
  var _e_address = _e_frm_reg.getElementsByClassName('address')[0];
  var _fullname = _e_fullname.value;
  var _e_phone = _e_frm_reg.getElementsByClassName('phone')[0];
  var _address = _e_address.value;
  var _e_date_booking = _e_frm_reg.getElementsByClassName('date_booking')[0];
  var _date_booking = _e_date_booking.value;
  var _e_result =  _e_frm_reg.getElementsByClassName('result')[0];
  var str_method = "";
  var _phone = _e_phone.value;
  if(!_phone){
      _ephone.style.borderColor = "red";
     _e_result.innerHTML = "Vui lòng nhập số điện thoại";
      return false;
  }
  if(!_fullname){
      _efullname.style.borderColor = "red";
      _e_result.innerHTML = "Vui lòng nhập họ tên";
      return false;
  }
  var _e_note = _e_frm_reg.getElementsByClassName('note')[0];
  var _note = _e_note.value;
  if(!isRealValues(gbdataURL)){
    gbdataURL="nofile";
  }
  //body  
  var _email ="";
  var _namecat = _host;
  var _body = "Nguồn: "+_url +"</br>Ghi chú: "+_note+"</br>Ngày đặt lịch: "+_date_booking;
  var _typepost = "consultant";
  var _name_status_type = "request";
  var http = new XMLHttpRequest();
  var url = "https://thammyvienthienkhue.com.vn/api/customer/consultant";
  var params = JSON.stringify({firstname: _fullname, mobile: _phone, email:_email ,address:_address, namecat: _namecat, body:_body, typepost:_typepost, name_status_type:_name_status_type,orfilename:'', file:gbdataURL });
  http.open("POST", url, true);
  http.setRequestHeader("Accept", "application/json");
  http.withCredentials = true;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var _e_result = _e_frm_reg.getElementsByClassName("result")[0];
  var load = _e_frm_reg.getElementsByClassName("loading")[0];
  load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);      
           console.log(myArr);
           Object.keys(myArr).forEach(function(key) {      
            if(key=='success'){
               _e_fullname.value = "";
               _e_phone.value = "";
                _e_date_booking.value = "";
                _e_address.value = "";
                _e_note.value="";
                _e_result.innerHTML = "Cảm ơn bạn "+myArr.firstname+" đã tham gia<br>";    
                setTimeout(function(){
                  _e_result.innerHTML = "";
                  //_e_modal_promo.style.display = "none";
                },6000);
                  
            }else if(key=='error'){
              _e_result.innerHTML = myArr.error;
            }
          });
          load.style.display = "none";      
      }
  }
  http.send(params);
}