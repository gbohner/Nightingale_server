<html>
<head>
<script src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <script>
        $(function()
        {
            $.ajax({
                url: "../cgi-bin/test.py",
                type: "post",
                datatype: "application/json",
                data: {"query":"<?php echo $_POST["query"]; ?>"},
                success: function(response_json){
                        $("#div").html("Example disease: " + response_json[0][""]);
                        console.log("There is a response"); 
                }
            });
        });

    </script>
</head>
<body>
	<div id="phpresp">Your query: <?php echo $_POST["query"]; ?></div>
	<div id="div">Working hard...</div>
</body>


</html>
