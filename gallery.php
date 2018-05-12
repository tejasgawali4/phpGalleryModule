<?php

$sid = $_GET['sid'];
$fun_name = $_GET['fun_name'];
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gallery
        </title>
        <link href="./dist/css/lightgallery.css" rel="stylesheet">
        <style type="text/css">
            body{
                background-color: #152836
            }
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;
              float: left;
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.8;
              width: 48px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .home .demo-gallery {
              padding-bottom: 80px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body class="home">
      <img id="loading" src="./dist/img/loading.gif" class="img-responsive" style="height: 70px; width: 70px; margin-top: auto; "/>
      <div id="main" class="containter">
          <input type="text" style="display: none;" id="sid" value="<?php echo $sid ?>">
          <input type="text" style="display: none;" id="id" value="<?php echo $id ?>">


          <div id="images" class="demo-gallery">

          </div>

      </div>

        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="./dist/js/lightgallery-all.min.js"></script>
        <script src="./lib/jquery.mousewheel.min.js"></script>
        <script src="./dist/js/lightgallery.min.js"></script>

        <!-- lightgallery plugins -->
        <script src="./dist/js/lg-thumbnail.min.js"></script>
        <script src="./dist/js/lg-zoom.js"></script>
        <script src="./dist/js/lg-fullscreen.min.js"></script>
        <script src="./dist/js/jquery.lazy.min.js"></script>
        <script src="./dist/js/lg.hash.js"></script>
        <script src="./dist/js/lg.pager.js"></script>
        <script>
                $(document).ready(function()
                {   
                      var ssid = document.getElementById("sid").value;
                      var iid = document.getElementById("id").value;
                        //remove this function
                        function func() 
                        {
                          /* seding album id and function name and school id*/
                            var dataJson = 
                            {
                                fun_name: "GetGalleryImages",
                                sid: ssid,
                                album_id: iid
                            }

                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                cache: true,
                                url: 'http://<YOUR DOMAIN>.in/rest/index.php',
                                data: dataJson,
                                success: function(data)
                                {
                                    if(data != null)
                                    {  
                                        console.log(data);
                                        var images =
                                        data.result;
                                        if (images.length > 0) 
                                        {
                                            $('#loading').show();
                                            var output = '<ul id="lightgallery" class="list-unstyled row" style="list-style: none;">';
                                            $.each(images, function (key, val) 
                                            {
                                                output += '<li class="col-xs-6 col-sm-4 col-md-3" data-responsive="'+val.snap+' 375,'+val.snap+' 480,'+val.snap+' 800" data-src="'+val.snap+'" data-sub-html="" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1"><a href=""><img class="img-responsive" src="'+val.snap+'" alt="Thumb-1"></a></li>';
                                                //console.log(val.snap);
                                            });
                                            output += '</ul>'
                                            $("#images").html(output);

                                            lightGallery(document.getElementById('lightgallery'),{
                                                thumbnail:true
                                            });

                                            $('#loading').hide();
                                        }
                                        else
                                        {
                                            alert("No Images Found....");
                                            window.location = "index.php?sid=" + sid + "&fun_name=getAlbumDetailsHybrid";
                                        }

                                    }
                                    else
                                    {
                                        alert("Json Not Found....");
                                        window.location = "index.php?sid=" + sid + "&fun_name=getAlbumDetailsHybrid";
                                    }
                                }
                            });
                        }
                        func(); // call the function window.load 
                        window.setInterval(func, 1800000);

                });   

        </script>
    </body>
</html>
