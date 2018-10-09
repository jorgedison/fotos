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
<body>

<img src="images/appfoto-bg-hueco.png" usemap="#image-map" id="take_snapshots" onClick="take_snapshot()">

<map name="take_snapshots" >
    <area target="" alt="" title="" href=""  coords="1,2,1916,1073" shape="rect" >
</map>

    <div class="container" align="center">
        <div class="col-md-6">
            <div class="text-center">
        <div id="camera_info"></div>
    <div id="camera"></div><br>
    <!--<button id="take_snapshots" class="btn btn-success btn-sm"  onClick="take_snapshot()">Take Snapshots</button>-->
      </div>
        </div>
        <!--<div class="col-md-6">
            <table class="table table-bordered">

            <tbody id="imagelist">
            
            </tbody>
        </table>
        </div>-->
    </div>
  </body>
</html>
<style>
#camera {
  position: absolute;
  width: 28.5%;
  height: 750px;
  top: 100px; left: 660px;
  z-index:1;

}

#body1 {
    background-image: url("images/appfoto-bg-hueco.png");
}

div#gallery {
  width: 800px;
  margin: auto;
}

#background img {
  height: 150px;
  margin: 0px;
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


</style>
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

//$('#imagelist').prepend("<tr><td><img src='"+response+"' class='body1' style='width:28.5%;height:750px;z-index:2;position:absolute;top:100px;left:660px;'"+response+"</td></tr>");
//$('#imagelist').prepend("<div id='background'><div id='gallery'><figure class='pic1'><img src='"+response+"' /><figcaption></figcaption></figure></div></div>");
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
      }, 2000);
      
    }
</script>