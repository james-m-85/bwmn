<?php
    
    //Latest Maps.
    $sql_latestMaps = "SELECT mapid, mapname, tileset FROM maps ORDER BY mapid DESC LIMIT 0, 5";
    $result_latestMaps = mysqli_query($db_connection, $sql_latestMaps);
    
    //Recent Map Updates.
    $sql_recentMapUpdates = "SELECT mapid, mapname, tileset, LENGTH(mapname) AS length FROM maps ORDER BY date DESC LIMIT 0, 10";
    $result_recentMapUpdates = mysqli_query($db_connection, $sql_recentMapUpdates);
    
    //Random Map.
    $sql_randomMap = "SELECT mapid, mapname, tileset, LENGTH(mapname) AS length FROM maps ORDER BY RAND() LIMIT 1";
    $result_randomMap = mysqli_query($db_connection, $sql_randomMap);
    
    //Forum Posts.
    $sql_latestForumPosts = "SELECT title, threadid, LENGTH(title) AS length, LENGTH(lastuser) AS length2, lastuser, subforum FROM mapforum WHERE subforum='main' ORDER BY lastdate DESC LIMIT 0, 10";
    $result_latestForumPosts = mysqli_query($db_connection, $sql_latestForumPosts);
    
    //Articles.
    $sql_articles = "SELECT title, newsid FROM articles ORDER BY newsid DESC LIMIT 0, 5";
    $result_articles = mysqli_query($db_connection, $sql_articles);
    
?>



<div class="middle-navbar">
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="index.php">
    			<i class="fas fa-newspaper fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">News</span>
    		</a>
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-database fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Map Database</span>
    		</a>
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-star fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Latest Maps</span>
    		</a>
		</div>
		<div class="navbar-section-content">
			
			<?php
                while ($row = mysqli_fetch_assoc($result_latestMaps))
    			{
    			    $mapid =     $row["mapid"];
    			    $tileset =   $row["tileset"];
    			    $mapname =   strip_tags($row["mapname"]);
    			    
    			    echo "<div class='navbar-section-content-row-map'>";
    			    echo "   <a class='navbar-map-link' href='map.php?id=", $mapid, "'>";
    			    echo "       <img class='map-tileset-icon' src='http://www.panschk.de/mappage/", $tileset, ".gif' />";
    			    echo "       <span class='navbar-map-name'>", $mapname, "</span>";
    			    echo "   </a>";
    			    echo "</div>";
    			}
			?>
			
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-exclamation-circle fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Recent Map Updates</span>
    		</a>
		</div>
		<div class="navbar-section-content">
			
			<?php
                while ($row = mysqli_fetch_assoc($result_recentMapUpdates))
    			{
    			    $mapid =     $row["mapid"];
    			    $tileset =   $row["tileset"];
    			    $mapname =   strip_tags($row["mapname"]);
    			    
    			    echo "<div class='navbar-section-content-row-map'>";
    			    echo "   <a class='navbar-map-link' href='map.php?id=", $mapid, "'>";
    			    echo "       <img class='map-tileset-icon' src='http://www.panschk.de/mappage/", $tileset, ".gif' />";
    			    echo "       <span class='navbar-map-name'>", $mapname, "</span>";
    			    echo "   </a>";
    			    echo "</div>";
    			}
			?>
			
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-random fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Random Map</span>
    		</a>
		</div>
		<div class="navbar-section-content">
			
			<?php
                while ($row = mysqli_fetch_assoc($result_randomMap))
    			{
    			    $mapid =     $row["mapid"];
    			    $tileset =   $row["tileset"];
    			    $mapname =   strip_tags($row["mapname"]);
    			    
    			    echo "<div class='navbar-section-content-row-map'>";
    			    echo "   <a class='navbar-map-link' href='map.php?id=", $mapid, "'>";
    			    echo "       <img class='map-tileset-icon' src='http://www.panschk.de/mappage/", $tileset, ".gif' />";
    			    echo "       <span class='navbar-map-name'>", $mapname, "</span>";
    			    echo "   </a>";
    			    echo "</div>";
    			}
			?>
			
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-comment-alt fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Forum</span>
    		</a>
		</div>
		<div class="navbar-section-content">
			
			<?php
                while ($row = mysqli_fetch_assoc($result_latestForumPosts))
    			{
    			    $title = strip_tags($row["title"]);
    			    
    			    echo "<div class='navbar-section-content-row'>";
    			    echo "   <span class='navbar-link'>", $title, "</span>";
    			    echo "</div>";
    			}
			?>
			
		</div>
	</div>
	
	
	
	<div class="navbar-section">
		<div class="navbar-section-title">
			<a class="navbar-section-title-link" href="#">
    			<i class="fas fa-file-alt fa-fw icon navbar-section-title-icon"></i>
    			<span class="navbar-section-title-label">Articles</span>
    		</a>
		</div>
		<div class="navbar-section-content">
			
			<?php
                while ($row = mysqli_fetch_assoc($result_articles))
    			{
    			    $title = strip_tags($row["title"]);
    			    
    			    echo "<div class='navbar-section-content-row'>";
    			    echo "   <span class='navbar-link'>", $title, "</span>";
    			    echo "</div>";
    			}
			?>
			
		</div>
	</div>
	
	
	
</div>