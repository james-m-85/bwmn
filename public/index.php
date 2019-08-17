<?php
    
    include "../resources/controllers/controller.db-connect.php";
    include "../resources/controllers/controller.session.php";
    
    
    
    /** -------------------------------------------------- **/
    /** --- PAGE SPECIFIC                             ---- **/
    /** -------------------------------------------------- **/
    
    //News Posts.
    $sql_newsPosts = "SELECT newsid, title, text, date, comments, username FROM mapnews NATURAL JOIN mapuser ORDER BY newsid DESC LIMIT 5";
    $result_newsPosts = mysqli_query($db_connection, $sql_newsPosts);
    
?>



<html>
	<head>
		<?php include "../resources/views/view.meta.php"; ?>
		
		<title>News - BroodWarMaps.Net</title>
	</head>
	
	
	
	<body>
		<div class="parallax-wrapper"></div>
		<div class="page-structure-wrapper">
    		<?php include "../resources/views/view.header.php"; ?>
    		
    		
    		
    		<div class="middle">
    			<?php include "../resources/views/view.navbar.php"; ?>
    			
    			
    			
    			<div class="middle-content">
    				
        			<?php
                        
                        while ($row = mysqli_fetch_assoc($result_newsPosts))
            			{
            			    $title =     strip_tags($row["title"]);
            			    $username =  strip_tags($row["username"]);
            			    $date =      strip_tags($row["date"]);
            			    $newsid =    $row["newsid"];
            			    $comments =  $row["comments"];
            			    $text =      stripslashes(nl2br($row["text"]));
            			    
            			    $commentsLabel = " Comment";
            			    
            			    if ($comments != 1)
            			    {
            			        $commentsLabel = " Comments";
            			    }
            			    
            			    echo "<div class='middle-content-section-outer'>";
            			    echo "   <div class='middle-content-section-inner'>";
            			    echo "      <div class='news-article-title'>", $title, "</div>";
            			    echo "      <div class='news-article-author'>Posted by <b>", $username, "</b> on ", $date, " (Article #", $newsid, ")</div>";
            			    echo "      <div class='news-article-text'>", $text, "</div>";
            			    echo "      <div class='news-article-comments'><i class='fas fa-comments fa-fw icon'></i> ", $comments, $commentsLabel, "</div>";
            			    echo "   </div>";
            			    echo "</div>";
            			}
            			
        			?>
    				
    			</div>
    		</div>
    		
    		
    		
    		<?php include "../resources/views/view.footer.php"; ?>
    	</div>
	</body>
</html>



<?php include "../resources/controllers/controller.db-disconnect.php"; ?>