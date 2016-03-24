$(document).ready(function () {
    var videos = $('video');

    if (Response.band(0, 768)) { // mobile
        $('.video-browser').remove();

        videos.attr('controls', 'true');
    } else { //desktop or tablet
        $('.video-mobile').remove();

        videos.on('click', function (e) {
            var url = $(this).data('url');

            if (url) {
                window.location = url;
            }
        });
    }

    videos.load();


    $('.slide').slippry({
        transition: 'horizontal',
        speed: 400

    });

});



// Mute youtube videos
var tag = document.createElement('script');

tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('ytplayer', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
}
