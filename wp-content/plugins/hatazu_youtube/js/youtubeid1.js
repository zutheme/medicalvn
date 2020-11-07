
var initloadyoutube = false;
var index_play = 0;
var _play_ready = false;
var _api_ready = false;
/*var playlist1 = ['LU4JRq7Pl8Q'];*/
var playlist1 = [];
playlist1.push(htz_config.idvideo);

var countfind = 20;
var rect;
var maxHeightvideo;
var _e_video_container;

var exist_e_video_container = setInterval(function() {
      //_e_video_container = document.getElementById("video-container");
      _e_video_container = document.getElementsByClassName("video-container")[0];
      if(_e_video_container) {
        
          rect = _e_video_container.getBoundingClientRect();
          if(_width < 768){
            maxHeightvideo = 360;
          }else{
            maxHeightvideo = rect.height;
          }
          clearInterval(exist_e_video_container);
      }else if(countfind > 0){
         countfind = countfind -1;
      }else{
        clearInterval(exist_e_video_container);
      }  
   }, 10);
var player1;
var player2;
var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;

//console.log(maxHeightvideo);
//2. This code loads the IFrame Player API code asynchronously.
function inityoutube(){
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";

      var firstScriptTag = document.getElementsByTagName('script')[0];

      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
       //var playlist1 = ['zEpoO4x_LZ8','QB5Ytz9RuvE','J0brmOCD8CM','WHCugZXzGtE','CagYKzAQhQs'];
       window.onYouTubeIframeAPIReady = function(events) {
        player1 = new YT.Player('player1', {

          height: maxHeightvideo,

          width: '100%',

          //playerVars: { 'autoplay': 1, 'controls': 0 },
          videoId: htz_config.idvideo,
          
          playerVars: {
            autohide: 1,
            autoplay: 0,
            wmode:'opaque',
            color: 'white', 
            /*origin:'http://localhost/studyabroad/',*/
            rel: 0,

            controls:0,
            fs : 0,
            playsinline : 1,
            
            playlist: playlist1.join(','),

          },

          events: {

            'onReady': onPlayerReady1

            //'onStateChange': onPlayerStateChanges1

          }
        });
           
    }  
}
      var previousIndex1 = 0;


      // 4. The API will call this function when the video player is ready.

      function onPlayerReady1(event) {

        event.target.playVideo();
        _play_ready = true;
        index_play = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=1),

      //    the player should play for six seconds and then stop.

      var done = false;

      

      function  onPlayerStateChanges1(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo1, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player1.getplaylist1Index();

                    var le = player1.getplaylist1().length-1;

                    // update when playlist1s do not match

                    if(player1.getplaylist1().length != playlist1.length) {

                        // update playlist1 and start playing at the proper index

                        player1.loadplaylist1(playlist1, previousIndex1+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist1 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 1"

                    */

                    //console.log(player.getplaylist1().length+","+playlist1.length);

                    previousIndex1 = index;

                }

    }

    function stopVideo1() {

        player1.stopVideo();

    }

    function pauseVideo1(){

      player1.pauseVideo();

    }

 

    function play_index1(index) {
        player1.playVideo();
        //player.playVideoAt(index);        

    }

 var _e_container_player1 = document.getElementsByClassName("video-player")[0];
 
 var _stateplay = 0;
 var rect,height=0;
 function scrollplay(){
        if(!_e_container_player1) return false;
        if(index_play < 0 ){
            return false;
        }    
        rect = _e_container_player1.getBoundingClientRect();
        if(_play_ready){
            _stateplay = player1.getPlayerState();
            //console.log(_stateplay);
        }
        
        height = window.innerHeight;
        if(rect.top < 0 || rect.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              if(_stateplay > 0){
                  pauseVideo1();
                  //console.log('pause');
                }
        }else{
            if(!initloadyoutube){
              //console.log('initloadyoutube');
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay == 1||_stateplay == 2){
                  play_index1(index_play);
                  //console.log('play');
                //}
            }  
        }
}
window.addEventListener("scroll", scrollplay,false);     
//video 2
   

      