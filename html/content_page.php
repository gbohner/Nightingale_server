<!doctype html>

<html lang="en">
<head>
    <title>Nightingale project</title>
    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <script>
        $(function()
        {
        	$.ajaxSetup({cache:false})
            $.ajax({
                url: "<?php $_SERVER['REMOTE_ADDR'] ?>"+"/cgi-bin/test.py",
                type: "POST",
                datatype: "application/json",
                crossDomain: true,
                cache: false,
                success: function(response_json){
                		console.log("successful run!")
                		console.log(response_json)
				
                }
            });
        });

    </script>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">

<h2 class="site-title" style="margin-bottom:50px;"> <?php echo $_POST["query"]; ?> <p><a href="http://5bc8ee25.ngrok.com">New search</a> </h2>


<div class="col-md-9" style="border:0; padding:0px;">

<!-- <div class="col-md-12 scroll"> <h2> Wiki summary </h2>  </div> -->

<div id="articles" class="col-md-12 scroll"> <h2> Articles </h2> </div>

<!-- <div class="col-md-12 scroll"> <h2>Google Scholar</h2> </div>
 --><div id ="documents" class="col-md-12 scroll"> <h2>Pub Med</h2> </div>
<!-- <div class="col-md-12 scroll"> <h2>Embase</h2> </div>
 -->
</div>

<div class="col-md-3 side-bar" style="border:0;">
<div id="tweets" class="col-md-12 scroll"> <h3> Twitter </h3> </div>
<div id = "experts" class="col-md-12 scroll"> <h3> Experts in the field </h3> </div>
</div>


</div>

<div class="col-md-9">
<!--<img src="landing.jpg"  STYLE="position:absolute; TOP:320px; LEFT:135px; WIDTH:700px; HEIGHT:350px">-->
</div>    


</body>

</html>
