<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title></title>
  </head>
<body onClick="take_snapshot()" id="take_snapshots" >

<style>
#camera {
  position: absolute;
  width: 36%;
  height: 675px;
  top: 8px; left: 438px;
  z-index:1;

}

div#gallery {
  width: 800px;
  margin: auto;
}

#background figure {
  float: left;
  position: relative;
  background-color: white;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  margin: 10px;
  box-shadow: 1px 2px 3px black;
}

figure.pic1 {
  -webkit-transform : rotate(0deg);
  z-index: 1;
}

#background figure:hover {
  box-shadow: 5px 10px 100px black;
  -webkit-transform: scale(1.1,1.1);
  z-index: 20;

}

body{
  background: url(images/appfoto-bg.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

div.polaroids {
    width: 80%;
    background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

img {width: 100%}

div.container {
    text-align: center;
    padding: 10px 20px;
}

.polaroid-images a
{
    background: white;
    display: inline;
    float: left;
    margin: 0 15px 30px;
    padding: 25px 25px 125px 25px;
    text-align: center;
    text-decoration: none;
    -webkit-box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
    -moz-box-shadow: 0 4px 6px rgba(0,0,0,.3);
    box-shadow: 0 4px 6px rgba(0,0,0,.3);
    -webkit-transition: all .15s linear;
    -moz-transition: all .15s linear;
    transition: all .15s linear;
    z-index:3;
    position:absolute;
    width: 36%;
    height: 650px;
    top: 8px; left: 418px;

  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}

.polaroid-images a:nth-child(2n)
{
    -webkit-transform: rotate(4deg);  
    -moz-transform: rotate(4deg); 
    transform: rotate(4deg); 
}
.polaroid-images a:nth-child(3n) { 
    -webkit-transform: rotate(-24deg);  
    -moz-transform: rotate(-24deg); 
    transform: rotate(-24deg); 
}
.polaroid-images a:nth-child(4n)
{
    -webkit-transform: rotate(14deg);  
    -moz-transform: rotate(14deg); 
    transform: rotate(14deg); 
}
.polaroid-images a:nth-child(5n)
{
    -webkit-transform: rotate(-18deg);  
    -moz-transform: rotate(-18deg); 
    transform: rotate(-18deg); 
}

</style>

    <div class="container" align="center">
       <div class="col-md-6">
          <div class="text-center">
             <div id="camera_info"></div>
             <div id="camera"></div>
             <br>
          </div>
       </div>
       <div class="col-md-6">
          <table class="table table-bordered">
             <tbody id="imagelist">
             </tbody>
          </table>
       </div>
    </div>

  </body>
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      //shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
 
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {

//$('#imagelist').prepend("<tr><td><img src='"+response+"' class='polaroids' style='width:36%;height:675px;z-index:2;position:absolute;top:8px;left:438px;'"+response+"</td></tr>");
$('#imagelist').prepend("<div class='polaroid-images'><a href=''><img src='"+response+"' /></a><figcaption></figcaption></div>");
//$('#imagelist').prepend("<div class='polaroids'><img src='"+response+"' style='width:100%'><div class='container'><p></p></div></div>");

}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
    function take_snapshot() {     
      setTimeout(function(){
        window.location.reload(1);
      }, 3000);
      
    }
</script>

