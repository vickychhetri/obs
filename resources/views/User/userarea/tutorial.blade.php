@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- <script>
function init() {
    var url = '/segment/{{$VideoModule->videoLink}}';
    var videoElement = document.querySelector('.videoContainer video');
    var player = dashjs.MediaPlayer().create();

    player.initialize(videoElement, url, true);
    var controlbar = new ControlBar(player);
    controlbar.initialize();
}
</script> -->
<style>
video {
    width: 320;
    height: 240;
}

.buttonPlayVideo {
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);

}
</style>
<link rel="stylesheet" href="/css/controlbar.css">
@endsection
@section("container")
<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
            <!-- 16:9 aspect ratio -->
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

                        <div class="dash-video-player " style="padding: 0;">
                            <div class="videoContainer" id="videoContainer" style="padding: 0;">
                                <div class="embed-responsive embed-responsive-16by9" id="video_container" style="border:2px solid black;border-bottom:2px solid black;box-shadow: 1px 1px 2px 5px rgba(0,0,0,1);
-webkit-box-shadow: 1px 1px 2px 5px rgba(0,0,0,1);
-moz-box-shadow: 1px 1px 2px 13px rgba(0,0,0,1);">
                                    <video id="CurrentVideoMain" data-dashjs-player autoplay controls></video>

                                </div>

                            </div>
                        </div>

                        <br />
                        <center>
                            <div id="prevNextDIv" style="display:none;">

                                <a href="/User/Tutorial/Watch/Previous/{{$VideoModule->VideoID}}" class="btn btn-info">
                                    Previous Module </a>
                                <a href="/User/Tutorial/Watch/Next/{{$VideoModule->VideoID}}" class="btn btn-info"> Next
                                    Module </a>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top: 16px;;">
                        <hr />
                        <h2><b> {{$VideoModule->videoTitle}}  </b></h2>
                        <hr />
                        <style>
                            p {
                                text-align: justify;
                            }
                        </style>
                        <p style="text-align: justify;">
                            {!! $VideoModule->videoDescription !!}
                        </p>

                </div>

            </div> </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach($AllVideoModule as $module)
                    <div class="col-md-12 col-sm-12 col-sm-12" style="margin-top: 16px;;">
                        <a href="/User/Tutorials/Watch/{{$module->VideoID}}">
                            <?php
                                if($VideoModule->VideoID == $module->VideoID){
                                    ?>
                            <div style="border: 2px solid black;box-shadow:10px 10px black;">

                                <?php
                                }else {
                                    ?>
                                <div style="border: 2px solid grey;box-shadow:10px 10px grey;">

                                    <?php
                                }
                                ?>


                                    <img src="/images/thumbnail/{{$UnLock[$module->VideoID]?$module->thumbnail:'Lock'.$module->thumbnail}}"
                                        style="width: 100%;max-width:100%;" />
                                </div>
                        </a>

                    </div>
                    @endforeach
                </div>

            </div>

        </div>

        <script src="/dashjs/dash.all.min.js"></script>


        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection
@section("footerContainer")
<script src="https://reference.dashif.org/dash.js/latest/contrib/akamai/controlbar/ControlBar.js"> </script>
<script src="https://reference.dashif.org/dash.js/latest/dist/dash.all.debug.js"> </script>


<script>
let curentTimeWatch = 0;
$(function() {

})
var timerStoreVideo = setInterval(function() {
    var currentVideo = document.getElementById('CurrentVideoMain');
    curentTimeWatch = currentVideo.currentTime;
    if (curentTimeWatch > 5) {
        saveData("{{ $UserID=session()->get('userid')}}", curentTimeWatch, "{{$VideoModule->VideoID}}");
    }
}, 5000)

// end function
document.getElementById('CurrentVideoMain').addEventListener('ended', myHandlerOnVideoEnd, false);

function myHandlerOnVideoEnd(e) {
    completeVideo("{{ $UserID=session()->get('userid')}}", "1", "{{$VideoModule->VideoID}}");
    clearInterval(timerStoreVideo);
    document.getElementById('prevNextDIv').style.display = "block";
}

function saveData(a, b, c) {
    let aU = a;
    let aT = b;
    let aV = c;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/Video-Status",
        type: "POST",
        data: {
            aUS: aU,
            aTS: aT,
            aVS: aV,
            _token: _token
        },
        success: function(response) {
            // console.log(response);
            if (response) {
                $('.success').text(response.success);
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function completeVideo(a, b, c) {
    let aU = a;
    let aT = b;
    let aV = c;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/VideoCompleted",
        type: "POST",
        data: {
            aUS: aU,
            aTS: aT,
            aVS: aV,
            _token: _token
        },
        success: function(response) {
            console.log(response);
            if (response) {
                $('.success').text(response.success);
                if (response.success != "0" && response.success != "2" && response.success != "3") {
                    window.location.replace("/User/Moudle/Test/" + response.success);
                }
                else  if (response.success != "0" && response.success != "1" && response.success != "5") {
                    window.location.replace("/User/Moudle23/Test/" + response.success);
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

$(document).ready(function() {
    init();
    var currentVideo = document.getElementById('CurrentVideoMain');
    if("{{$VideoModule->VideoID}}"!="5"){
        vid_listen();
    }

});
var player;
var controlbar;

function init() {
    var timer = parseInt('{{$SeekVideo}}');
    var timerS = '';
    if (timer) {
        var timerS = '#t=' + timer;
    }

    // var timerS='#'+timer;
    var url = '{{env("APPMAINURLTO")}}/segment/{{$VideoModule->videoLink}}' + timerS;
    // var videoElement = document.querySelector('.videoContainer video');
    var videoElement = document.getElementById('CurrentVideoMain');
    player = dashjs.MediaPlayer().create();

    player.initialize(videoElement, url, true);
    player.updateSettings({
        'debug': {
            'logLevel': dashjs.Debug.LOG_LEVEL_NONE /* turns off console logging */
        },
        'streaming': {
            'scheduling': {
                'scheduleWhilePaused': true,
                /* stops the player from loading segments while paused */
            },
            'buffer': {
                'fastSwitchEnabled': true /* enables buffer replacement when switching bitrates for faster switching */
            }
        }
    });


}
</script>

<script>
vid_start();

function vid_listen() {
    var video = document.getElementById('CurrentVideoMain');
    video.addEventListener('timeupdate', function() {
        if (!video.seeking) {
            if (video.currentTime > timeTracking.watchedTime) {
                timeTracking.watchedTime = video.currentTime;
                lastUpdated = 'watchedTime';
            } else {
                //tracking time updated  after user rewinds
                timeTracking.currentTime = video.currentTime;
                lastUpdated = 'currentTime';
            }
        }
        if (!document.hasFocus()) {
            video.pause();
        }
    });
    // prevent user from seeking
    // video.addEventListener('seeking', function() {
    //     var delta = video.currentTime - timeTracking.watchedTime;
    //     if (delta > 0) {
    //         video.pause();
    //         //play back from where the user started seeking after rewind or without rewind
    //         video.currentTime = timeTracking[lastUpdated];
    //         video.play();
    //     }
    // });
    video.addEventListener("ended", function() {
        // here the end is detected
        console.log("The video has ended");
    });
}

function vid_start() {
    window.timeTracking = {
        watchedTime: '{{$SeekVideo}}',
        currentTime: '{{$SeekVideo-2}}'
    };
    window.lastUpdated = 'currentTime';
}
</script>


@endsection
