<?php 
  $xml = simplexml_load_file("http://www.newsherald.com/cmlink/1.272786", 'SimpleXMLElement', LIBXML_NOCDATA);
  $i = 0;
  $blogqueue = array();
  foreach($xml->channel->item as $item) {
    //print_r($item);
	
	$blogtitle = $item->title;
	$bloglink = $item->link;
	$blogdesc = $item->description;
	
	$blogtitle = str_replace(array("‘","’","“","”"), array("'","'","\"","\""), $blogtitle);
	$blogdesc = str_replace(array("‘","’","“","”","\n"), array("'","'","\"","\""," "), $blogdesc);
	
	$bloglinkarray = explode("/", $bloglink);
	$blogauthorcode = $bloglinkarray[5];
	
	switch($blogauthorcode) {
		case "mike-cazalas":
		  $blogauthor = "Mike Cazalas";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79452.1358444947!/fileImage/httpImage/mike-cazalas-blog-mug.jpg";
		  break;
		case "brady-calhoun":
		  $blogauthor = "Brady Calhoun";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79453.1358289407!/fileImage/httpImage/brady-calhoun-blog-mug.jpg";
		  break;
		case "brad-milner":
		  $blogauthor = "Brad Milner";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79454.1378246408!/fileImage/httpImage/brad-milner-blog-mug.jpg";
		  break;
		case "tony-simmons":
		  $blogauthor = "Tony Simmons";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79455.1358289454!/fileImage/httpImage/tony-simmons-blog-mug.jpg";
		  break;
		case "will-glover":
		  $blogauthor = "Will Glover";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79456.1358289472!/fileImage/httpImage/will-glover-blog-mug.jpg";
		  break;
		case "jan-waddy":
		  $blogauthor = "Jan Waddy";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79457.1358289492!/fileImage/httpImage/jan-waddy-blog-mug.jpg";
		  break;
		case "jason-shoot":
		  $blogauthor = "Jason Shoot";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.79458.1358289511!/fileImage/httpImage/jason-shoot-blog-mug.jpg";
		  break;
		case "marlene-womack":
		  $blogauthor = "Marlene Womack";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.279325.1392739441!/fileImage/httpImage/marlene-womack-voices-mug.jpg";
		  break;
		case "movietown-movie-club":
		  $blogauthor = "Movietown Movie Club";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.280135.1392846041!/fileImage/httpImage/movietown-movie-club-voices-mug.jpg";
		  break;
		case "sheila-scott":
		  $blogauthor = "Sheila Scott";
		  $blogauthormug = "http://www.newsherald.com/polopoly_fs/1.283057.1393428820!/fileImage/httpImage/sheila-scott-voices-mug.jpg";
		  break;
		  
		
	}
	
	//echo "<p>TITLE: $blogauthor: $blogtitle <br />LINK: $bloglink <br />DESC: $blogdesc </p>";
	$blogqueue[$i] = array(
	  "blogtitle" => $blogtitle,
	  "bloglink" => $bloglink,
	  "blogdesc" => $blogdesc,
	  "blogauthor" => $blogauthor,
	  "blogauthormug" => $blogauthormug
    );
	$i++;
	if ($i >= 9) break;
  }
  //print_r($blogqueue);
?>
document.write("<ul class='newslist left'>");

document.write("<li class='no_bul img_lrg first teaserAndLinks' >");
document.write("<div class='img_crop_lrg'>");
document.write("<a href='<?php echo $blogqueue[0]["bloglink"]; ?>'>");
document.write("<img title='Photo: N/A, License: N/A' height='75' alt='' width='100' src='<?php echo $blogqueue[0]["blogauthormug"]; ?>' /></a>");
document.write("</div>");
document.write("<h4><a href='<?php echo $blogqueue[0]["bloglink"]; ?>'><?php echo addslashes($blogqueue[0]["blogtitle"]); ?></a></h4>");
document.write("<?php echo addslashes($blogqueue[0]["blogdesc"]); ?> <a href='<?php echo $blogqueue[0]["bloglink"]; ?>'>READ MORE</a></p></li>");

document.write("<li class='no_bul img_lrg teaserAndLinks' >");
document.write("<div class='img_crop_lrg'>");
document.write("<a href='<?php echo $blogqueue[1]["bloglink"]; ?>'>");
document.write("<img title='Photo: N/A, License: N/A' height='75' alt='' width='100' src='<?php echo $blogqueue[1]["blogauthormug"]; ?>' /></a>");
document.write("</div>");
document.write("<h4><a href='<?php echo $blogqueue[1]["bloglink"]; ?>'><?php echo addslashes($blogqueue[1]["blogtitle"]); ?></a></h4>");
document.write("<?php echo addslashes($blogqueue[1]["blogdesc"]); ?> <a href='<?php echo $blogqueue[1]["bloglink"]; ?>'>READ MORE</a></p></li>");


document.write("<li class='no_bul img_lrg last teaserAndLinks' >");
document.write("<div class='img_crop_lrg'>");
document.write("<a href='<?php echo $blogqueue[2]["bloglink"]; ?>'>");
document.write("<img title='Photo: N/A, License: N/A' height='75' alt='' width='100' src='<?php echo $blogqueue[2]["blogauthormug"]; ?>' /></a>");
document.write("</div>");
document.write("<h4><a href='<?php echo $blogqueue[2]["bloglink"]; ?>'><?php echo addslashes($blogqueue[2]["blogtitle"]); ?></a></h4>");
document.write("<?php echo addslashes($blogqueue[2]["blogdesc"]); ?> <a href='<?php echo $blogqueue[2]["bloglink"]; ?>'>READ MORE</a></p></li>");

document.write("</ul>");

document.write("<ul class='newslist right'>");
document.write("<li class=' first'><a href='<?php echo $blogqueue[3]["bloglink"]; ?>'><?php echo $blogqueue[3]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[3]["blogtitle"]); ?></a></li>");
document.write("<li><a href='<?php echo $blogqueue[4]["bloglink"]; ?>'><?php echo $blogqueue[4]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[4]["blogtitle"]); ?></a></li>");
document.write("<li><a href='<?php echo $blogqueue[5]["bloglink"]; ?>'><?php echo $blogqueue[5]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[5]["blogtitle"]); ?></a></li>");
document.write("<li><a href='<?php echo $blogqueue[6]["bloglink"]; ?>'><?php echo $blogqueue[6]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[6]["blogtitle"]); ?></a></li>");
document.write("<li><a href='<?php echo $blogqueue[7]["bloglink"]; ?>'><?php echo $blogqueue[7]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[7]["blogtitle"]); ?></a></li>");
document.write("<li class=' last'><a href='<?php echo $blogqueue[8]["bloglink"]; ?>'><?php echo $blogqueue[8]["blogauthor"]; ?>: <?php echo addslashes($blogqueue[8]["blogtitle"]); ?></a></li></ul>");