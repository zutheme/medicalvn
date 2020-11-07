var e_content_page = document.getElementsByClassName("wp-caption");
for (var i = 0; i <  e_content_page.length; i++) {
	 e_content_page[i].style.width = '80%';
}
$(document).ready(function(){
/*Navigation: Hoverable dropdown*/

    // $('.dropdown').hover(function() {
    //     $(this).addClass('open');
    // },
    // function() {
    //     $(this).removeClass('open');
    // });
});
function hasClass(element, className) {
    return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
}
var e_right_blog = document.getElementsByClassName('right_blog_category_wrapper')[0];
var e_menu_service_general = e_right_blog.getElementsByClassName('menu-service-general')[0];
var e_menu_service_curent = e_right_blog.getElementsByClassName(' menu-service-curent')[0];
e_menu_service_curent.innerHTML ='';
var e_nav_filter = document.getElementById("nav_filter");
var e_active = e_nav_filter.getElementsByClassName('active')[0];
if (e_active){
	  let eparent = e_active;
	  var count_find = 10;
	  var interval_eparent = setInterval(function() {
	    var c = hasClass(eparent, 'dd-main');
	     if (c) {
	     	e_menu_service_general.style.display ='none';
	     	e_menu_service_curent.innerHTML = eparent.innerHTML;
	     	fommat_ul();
	        clearInterval(interval_eparent);
	     }else{
	     	eparent = eparent.parentElement;
	     }
	     if(count_find < 0){
	         clearInterval(interval_eparent);
	     }
	     count_find--;
	  }, 100);
}
function fommat_ul(){
	var eul = e_menu_service_curent.getElementsByTagName("ul");
	var efa = e_menu_service_curent.getElementsByTagName("span");
	var ea = e_menu_service_curent.getElementsByTagName("a")[0];
	ea.remove();
		if(eul){
			for (var j = 0; j < eul.length; j++) {
					eul[j].className ='';
					// if(eli){
					// 	var ulul = eli.getElementsByTagName("li");
					// 	for (var i = 0; i < eli.length; i++) {
					// 			eli[i].className ='';
					// 		}
					// 	if(ulul){
							
					// 	}
						
					// }
				}
			
			}
			if(efa){
			for (var k = 0; k < efa.length; k++) {
					efa[k].className ='';
				}
			
			}
}
