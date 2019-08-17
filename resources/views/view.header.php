<div class="header">
	<div class="header-logo">
		<img src="images/logo.png" />
	</div>
	<div class="header-login">
		
		<?php
			
            if (!isUserLoggedIn())
            {
                echo "<form class='login-form' action='' method='post'>";
                echo "    <div class='login-form-row'><i class='fas fa-user fa-fw icon'></i> <input class='login-form-input' type='text' name='username' placeholder='Username' required></div>";
                echo "    <div class='login-form-row'><i class='fas fa-key fa-fw icon'></i> <input class='login-form-input' type='password' name='password' placeholder='Password' required></div>";
                echo "    <div><input class='login-form-button' type='submit' name='login' value='Login' /></div>";
                echo "</form>";
            }
            else
            {
                echo "<form class='login-form' action='' method='post'>";
                echo "    <div class='profile-row'>You are now logged in as <b>" . getLoggedInUsername() . "</b></div>";
                echo "    <div><input class='logout-form-button' type='submit' name='logout' value='Logout' /></div>";
                echo "</form>";
            }
            
		?>
		
	</div>
</div>