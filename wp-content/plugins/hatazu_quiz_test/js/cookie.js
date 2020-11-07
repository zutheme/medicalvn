function isRealValue(obj) {

  return obj && obj !== 'null' && obj !== 'undefined';

}

//set cookie object

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