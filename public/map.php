<?php
    
    include "../resources/controllers/controller.db-connect.php";
    include "../resources/controllers/controller.session.php";
    include "../resources/controllers/controller.map.php";
    
    
    
    /** -------------------------------------------------- **/
    /** --- PAGE SPECIFIC                             ---- **/
    /** -------------------------------------------------- **/
    
    //Map Details.
    if (isset($_GET["id"]))
    {
        $mapid = htmlspecialchars($_GET["id"]);
        
        $sql_mapDetails = "SELECT * FROM maps WHERE mapid='" . $mapid . "'";
        $result_mapDetails = mysqli_query($db_connection, $sql_mapDetails);
        
        $sql_mapComments = "SELECT * FROM mapcomments WHERE mapid='" . $mapid . "' ORDER BY cid";
        $result_mapComments = mysqli_query($db_connection, $sql_mapComments);
    }
    
?>



<html>
	<head>
		<?php include "../resources/views/view.meta.php"; ?>
		
		<title>Map - BroodWarMaps.Net</title>
	</head>
	
	
	
	<body>
		<div class="parallax-wrapper"></div>
		<div class="page-structure-wrapper">
    		<?php include "../resources/views/view.header.php"; ?>
    		
    		
    		
    		<div class="middle">
    			<?php include "../resources/views/view.navbar.php"; ?>
    			
    			
    			
    			<div class="middle-content">
					<div class="middle-content-section-outer">
						<div class="middle-content-section-inner">
            				
                			<?php
                                
                			while ($row = mysqli_fetch_assoc($result_mapDetails))
                			{
                			    $mapid =         $row["mapid"];
                			    $mapname =       strip_tags($row["mapname"]);
                			    $pic =           $row["pic"];
                			    $author =        strip_tags($row["author"]);
                			    $tileset =       $row["tileset"];
                			    $last_updated =  $row["date"];
                			    $map_size =      $row["size"];
                			    
                			    $link_melee =    $row["mel"];
                			    $link_obs =      $row["obs"];
                			    
                			    echo "<div class='map-details'>";
                			    echo "   <div class='news-article-title'>", $mapname, "</div>";
                			    echo "   <div><b>Map ID: </b> #", $mapid, "</div>";
                			    echo "   <br />";
                			    echo "   <div><b>Author: </b> ", $author, "</div>";
                			    echo "   <div><b>Map Size:</b> ", $map_size, "</div>";
                			    echo "   <div><b>Tileset:</b> ", $tileset, "</div>";
                			    echo "   <div><b>Last Updated:</b> ", $last_updated, "</div>";
                			    
                			    if (!empty($link_melee))
                			    {
                			        echo "<br />";
                			        echo "<div>";
                			        echo "   <form action='http://www.panschk.de/mappage/", $link_melee, "' method='get'>";
                			        echo "       <button class='site-button'><i class='fas fa-file-download fa-fw icon'></i> Download Melee Version</button>";
                			        echo "   </form>";
                			        echo "</div>";
                			    }
                			    
                			    if (!empty($link_obs))
                			    {
                			        echo "<br />";
                			        echo "<div>";
                			        echo "   <form action='http://www.panschk.de/mappage/", $link_obs, "' method='get'>";
                			        echo "       <button class='site-button'><i class='fas fa-file-download fa-fw icon'></i> Download Observer Version</button>";
                			        echo "   </form>";
                			        echo "</div>";
                			    }
                			    echo "</div>";
                			    
                			    
                			    echo "<div class='map-image'>";
                			    echo "   <a href='http://www.panschk.de/mappage/", $pic, "' target='_blank'><img src='http://www.panschk.de/mappage/", $pic, "' /></a>";
                			    echo "</div>";
                			    
                			    echo "<div class='clear'></div>";
                			}
                			
                			?>
                			
        				</div>
    				</div>
    				
    				
    				
					<div class="middle-content-section-outer">
						<div class="middle-content-section-inner-map-comments">
            				
                			<?php
                			
                			$numberOfComments = mysqli_num_rows($result_mapComments);
                                
                			echo "<div class='map-comments-title'><i class='fas fa-comments fa-fw icon'></i> Comments (", $numberOfComments, ")</div>";
                			while ($row = mysqli_fetch_assoc($result_mapComments))
                			{
                			    $cuname =    strip_tags($row["cuname"]);
                			    $ctext =      stripslashes(nl2br($row["ctext"]));
                			    
                			    echo "<div>";
                			    echo "   <div class='map-comment-username'><i class='fas fa-user fa-fw icon'></i> ", $cuname, "</div>";
                			    echo "   <div class='map-comment-text'>", $ctext, "</div>";
                			    echo "</div>";
                			}
                			
                			?>
                			
        				</div>
    				</div>
    			
    			
    			
    			
        		<?php
        			
                    if (isUserLoggedIn())
                    {
                        echo "<div class='middle-content-section-outer'>";
						echo "    <div class='middle-content-section-inner-map-comments'>";

						echo "        <div class='map-comments-title'>Post Comment</div>";
                        
                        
                        echo "        <form class='post-comment-form' action='' method='post'>";
                        echo "            <div class='profile-row'><i class='fas fa-user fa-fw icon'></i> <b>" . getLoggedInUsername() . "</b></div>";
                        echo "            <div>";
                        echo "                <textarea rows='12' name='ctext' placeholder='Enter comment here...' style='width: 100%;'></textarea>";
                        echo "                <input type='hidden' name='mapid' value='", $mapid, "' />";
                        echo "            </div>";
                        echo "            <div class='post-comment-button'><button class='site-button' type='submit' name='post-comment'>Post</button></div>";
                        echo "        </form>";
                        echo "    </div>";
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