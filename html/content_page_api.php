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
                url: "http://7c39a202.ngrok.com/aggregate?term="+"<?php echo $_POST["query"]; ?>",
                type: "POST",
                datatype: "application/json",
                crossDomain: true,
                cache: false,
                success: function(response_json){
                		console.log("successful run!")
                		console.log(response_json)
            		
            			
						function create_elements(){
							// Element types
							var item = document.createElement("div")
							var link = document.createElement("a")
							var image_div = document.createElement("div")
							var content_div = document.createElement("div")
							var image = document.createElement("img")
							var title = document.createElement("h3")
							var date = document.createElement("p")
							var name = document.createElement("p")
							
							//Element bootstrap classes
							item.className = "row"
							link.className = ""
							image_div.className = "col-md-4"
							content_div.className = "col-md-8"
							image.className="img-responsive"
							title.className="title"
							date.className="text-muted"
							name.className="text-muted"

							//default values
							image.src="http://placehold.it/1280X720"

							return {
								item: item,
								link: link,
								title: title,
								image_div: image_div,
								content_div: content_div,
								image: image,
								date: date,
								name: name,
							}
						}

						function create_new_item(href, title, author, date, image){
							elems = create_elements()

							//Fill up contents
							elems.link.href = href
							elems.title.innerText = title
							elems.name.innerText = author
							elems.date.innerText = date
							elems.image.src = image

							//Set up structure
							elems.image_div.appendChild(elems.image)
							elems.content_div.appendChild(elems.title)
							elems.content_div.appendChild(elems.name)
							elems.content_div.appendChild(elems.date)
							elems.link.appendChild(elems.image_div)
							elems.link.appendChild(elems.content_div);
							elems.item.appendChild(elems.link);


							return elems.item
						}


                		response_json.article.reverse()
                		response_json.article.forEach(function(article){
                			item = create_new_item(
                				article.url,
                				article.title, 
                				"",
                				article.date,
                				"http://placehold.it/1280X720"
                			)
							
							document.getElementById("articles").appendChild(item)
                		})

            			response_json.tweets.forEach(function(tweet){
            				item = create_new_item(
                				"http://twitter.com/"+tweet.user.screenName,
                				tweet.text, 
                				tweet.user.screenName,
                				"",
                				"http://placehold.it/150X300"
                			)

                			item.childNodes[0].childNodes[1].childNodes[0].style.fontSize = "small"
							
							document.getElementById("tweets").appendChild(item)
                		})

            			response_json.document.reverse()
                		response_json.document.forEach(function(doc){
                			item = create_new_item(
                				"http://www.ncbi.nlm.nih.gov/pubmed/"+doc.xid,
                				doc.title, 
                				doc.lastauthor,
                				"",
                				"http://placehold.it/1280X720"
                			)
     
							document.getElementById("documents").appendChild(item)
                		})

                		var paragraph = document.createElement("div")
						
                		paragraph.innerText = "Dr Foday Saher"
						document.getElementById("experts").appendChild(paragraph)

						var paragraph = document.createElement("div")
						
                		paragraph.innerText = "Dr Stephan Becker"
						document.getElementById("experts").appendChild(paragraph)


						var paragraph = document.createElement("div")
						
                		paragraph.innerText = "Dr Nathalie MacDermott"
						document.getElementById("experts").appendChild(paragraph)

                        // $("#articles").html(response_json["article"][0]["date"]); 
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
