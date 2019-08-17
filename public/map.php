<?php
    
    include "../resources/controllers/controller.db-connect.php";
    include "../resources/controllers/controller.session.php";
    
    
    
    /** -------------------------------------------------- **/
    /** --- PAGE SPECIFIC                             ---- **/
    /** -------------------------------------------------- **/
    
    //Map Details.
    if (isset($_GET["id"]))
    {
        $mapid = htmlspecialchars($_GET["id"]);
        $sql_mapDetails = "SELECT * FROM maps WHERE mapid='" . $mapid . "'";
        $result_mapDetails = mysqli_query($db_connection, $sql_mapDetails);
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
					<div class='middle-content-section-outer'>
						<div class='middle-content-section-inner'>
            				
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
                			    
                			    echo "<img src='http://www.panschk.de/mappage/", $pic, "' style='height: auto; width: auto; max-height: 350px; max-width: 350px; float: left; margin-right: 20px;' />";
                			    echo "<div class='news-article-title'>", $mapname, "</div>";
                			    echo "<div><b>Map ID: </b> #", $mapid, "</div>";
                			    echo "<br />";
                			    echo "<div><b>Author: </b> ", $author, "</div>";
                			    echo "<div><b>Map Size:</b> ", $map_size, "</div>";
                			    echo "<div><b>Tileset:</b> ", $tileset, "</div>";
                			    echo "<div><b>Last Updated:</b> ", $last_updated, "</div>";
                			    echo "<br />";
                			    
                			    echo "<div>";
                			    if (!empty($link_melee))
                			    {
                			        echo "<button class='site-button' style='font-size: 16px; margin-right: 10px;'><i class='fas fa-file-download fa-fw icon'></i> Download Melee Version</button>";
                			    }
                			    
                			    if (!empty($link_obs))
                			    {
                			        echo "<button class='site-button' style='font-size: 16px;'><i class='fas fa-file-download fa-fw icon'></i> Download Observer Version</button>";
                			    }
                			    echo "<div style='clear: both;'></div>";
                			    echo "</div>";
                			    
//                 			    foreach ($row as $key => $value)
//                 			    {
//                 			        echo "<div style='color: #3399CC;'><b>", $key, ":</b></div>";
//                 			        echo "<div>", $value, "</div>";
//                 			    }
                			}
                                
                			?>
                			
        				</div>
    				</div>
    			</div>
    		</div>
    		
    		
    		
    		<?php include "../resources/views/view.footer.php"; ?>
    	</div>
	</body>
</html>



<?php include "../resources/controllers/controller.db-disconnect.php"; ?>