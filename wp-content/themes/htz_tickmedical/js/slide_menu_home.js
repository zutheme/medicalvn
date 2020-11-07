function initialHash_sub() {
  'use strict';
  window.location.href = "javascript:void(0);";
}

function handleTouch_sub(e) {
    var x = e.changedTouches[0].clientX;
  var total = this.clientWidth;
  var position = x - total;
  if ( position < 0 ) this.style.left = (x-total) + 'px'
  else if (position >= 0) this.style.left = 0 + 'px'
}
function handleTouchEnd_sub(e) {
    var x = e.changedTouches[0].clientX;
  var total = this.clientWidth;
  var position = x - total;
  this.style.left = "";
  if ( position <= -total*0.5 ) initialHash_sub();
}
document.querySelector('#slide-menu').addEventListener('touchstart', handleTouch_sub, false)
document.querySelector('#slide-menu').addEventListener('touchmove', handleTouch_sub, false)
document.querySelector('#slide-menu').addEventListener('touchend', handleTouchEnd_sub, false)
// document.getElementById('nav_modal').addEventListener('click', initialHash, false);
function urlify(text) {
  var expression = /([^\S]|^)(((https?\:\/\/)|(www\.))(\S+))/gi;
  var regex = new RegExp(expression);
  if (text.match(regex)) {
    return true;
  } else {
    return false;
  }
}
const links = document.querySelectorAll("#slide-menu ul a");
for (const link of links) {
  link.addEventListener("click", clickHandler);
}

function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");
  console.log(href);
  if(urlify(href)){
    window.location = href;
  }else{
    console.log(href);
    const offsetTop = document.querySelector(href).offsetTop;
    scroll({
      top: offsetTop,
      behavior: "smooth"
    });
  }
}