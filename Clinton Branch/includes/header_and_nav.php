

<body>
<!-- ==================== HEADER LOGO, LOGIN ==================== -->
<div class="make_fixed">
<header class="above_nav">
        <div class="header_img"><a href="index.php"><img src="../../BEA/uta-bea-website/img/bea/18446931_217171768798887_7988745256987778538_n.png" alt="" class="image1" /></a>
        </div>

        <h1 class="header_title">Broadcast Educators Association<br> UTA Chapter</h1>

        <div class="user">
       	<?php 
		
		if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
			
            echo '<a href="login.php" class="login_user">Login</a> | <a href="register.php" class="reg_user">Register</a>';
		
		} else {
			if ($_SESSION['admin'] == 1) { 
				$secondLink = "<a href='admin.php'>Admin Profile</a>";
			} else {
				$secondLink = "<a href='new_user.php'>My Profile</a>";
			}
			echo "<a href='logout.php'>Logout</a> | $secondLink";
			
			$fname = $_SESSION['fname'];
			$fname_disabled = 'disabled';
			
			$lname = $_SESSION['lname'];
			$lname_disabled = 'disabled';
			
			$email = $_SESSION['email'];
			$email_disabled = 'disabled';
			
		}
			
		?>
        </div>

        <div class="clear_float"></div>
</header>

<!-- ==================== NAVIGATION ==================== -->
	<div class="menu_bar">
    	<a href="#" class="btn_menu"><span class="h_icon">☰</span>Broadcasters Educators Association<br>UTA Chapter</a>
    </div>
	<nav>
		<ul>
        	
			<li><a href="index.php" class="nav_item">Home</a></li>
            
            <li class="submenu" id="account"><a href="#" class="nav_item">Account<span class="arrow"><img src="images/arrow_down.png" alt="" /></span></a>
				<ul class="children">
                <?php
				if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
                	echo '<li><a href="login.php">Sign in</a></li><li><a href="register.php">Register</a></li>';
				
				} else {
					if ($_SESSION['admin'] == 1) {
						$secondLink = "<a class='mobile_login' href='admin.php'>Admin Profile</a>";
					
					} else {
						$secondLink = "<a class='mobile_login' href='new_user.php'>My Profile</a>";
					}
					echo "<a class='mobile_login' href='logout.php'>Logout</a> $secondLink";	
				}
					
				?>
                </ul>       
            </li>
        
			<li class="submenu"><a href="#" class="nav_item">Officers<span class="arrow"><img src="../../BEA/uta-bea-website/img/bea/arrow_down.png" alt=""/></span></a>
                <ul class="children">
                    <li><a href="#">Officer Information</a></li>
                    
                </ul>
            </li>
            
             <li class="submenu"><a href="#" class="nav_item">Calendar<span class="arrow"><img src="../../BEA/uta-bea-website/img/bea/arrow_down.png" alt=""/></span></a>
                <ul class="children">
                    <li><a href="#">Upcoming Events</a></li>
                   
                </ul>
            </li>
            
			 <li class="submenu"><a href="#" class="nav_item">Meetings<span class="arrow"><img src="../../BEA/uta-bea-website/img/bea/arrow_down.png" alt=""/></span></a>
                <ul class="children">
                    <li><a href="#">Upcoming Meetings</a></li>
                   
                </ul>
            </li>
            	
			
		</ul>
	</nav>	
    <div class="clear_float"></div>
</div>