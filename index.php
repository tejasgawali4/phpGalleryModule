<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>TopSchool Gallery</title>

</head>
<body>
    <div class="demo-gallery" style="margin-left: 3px;">
        <ul id="albumList" class="row col-sm-6 col-md-12 col-lg-12" style="padding:0%; margin:0%">

        </ul>
    </div>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
    $(document).ready(function()
    {   

        var dataJson = 
        {
            fun_name: "getAlbumDetailsHybrid",
            sid: "384"
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            cache: true,
            url: 'http://topschooldev.prisms.in/rest/index.php/staff_list.json',
            data: dataJson,
            success: function(data){
                //$('#loading').hide();
                console.log(data);
                var album = data.result;
 				var output =' ' ;
                $.each(album, function (key, val) 
                {
                	output += '<li class="col-xs-6 col-sm-6 col-md-3 img-thumbnail rounded" onclick="myFunction('+ val.id +')" style="list-style: none;"><img src="./dist/img/folder.jpg" style="width: 150px; height: 150;"/><br/><a href="#" class="btn btn-secondary btn-lg disabled" role="button" aria-disabled="true" style="text-align: center; font-size: 30px; font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;'+ val.album_name +'</a></li>';
                        //alert(output);
                    //console.log(val.snap);
                });
                $("#albumList").html(output);
            }
        });
    });    

    function myFunction(id) 
    {
        var sid = 384;
        var fun_name = "getAlbumDetailsHybrid";
        //alert("clicked...");
        window.location = "gallery.php?sid=" + sid + "&fun_name=" + fun_name + "&id=" + id;
    }

    </script>

</body>
</html>