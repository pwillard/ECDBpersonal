<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	require_once('include/debug.php');
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Logout - ecDB';
 include("include/head.php")  
 ?>
	
	
	<body>
		<div id="wrapper">
			
			<!-- Header -->
			<div>
				<img src="img/logo.png" alt="ECDB" style="width:175px;height:75px;">
			</div>
			<!-- END -->
			
			<!-- Main menu -->
			<div id="menu">
				<ul>
					<li><a href="."><span class="fa fa-key fa-lg"></span> Login</a></li>
					<li><a href="register.php"><span class="fa fa-user fa-lg"></span> Register</a></li>
					<li><a href="about.php"><span class="fa fa-info-circle fa-lg"></span> About</a></li>
				</ul>
			</div>
			<!-- END -->
			
			<!-- Main content -->
			<div id="content">
				<div class="message green center">
					You have successfully signed out of your account.
				</div>
				
				<div class="loginWrapper">
					<div class="left">
						<div class="aboutECDB">
							You want to build something and need some components for your project. 
							You don't know if you have those components, or where they are.
							This is a problem many of us recognise. 
							We want to change that for you by making a online inventory system for your electronic components that is easy to use. 
							Add your components. Search to find it, and then use it!
						</div>
						<form class="globalForms" name="loginForm" method="post" action="login-exec.php">
							<div class="textInput">
								<label class="keyWord">Username</label>
								<div class="input"><input name="login" class="medium" type="text" id="login"/></div>
							</div>
							<div class="textInput">
								<label class="keyWord">Password</label>
								<div class="input"><input name="password" class="medium" type="password" id="password"/></div>
							</div>
							<div class="buttons">
								<div class="input">
									<button class="button green" name="Submit" type="submit"><span class="fa fa-key fa-lg"></span> Login</button>
								</div>
							</div>
						</form>
					</div>
					<div class="right"></div>
				</div>
				
				
			</div>
			<!-- END -->
			
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
			
		</div>
	</body>
</html>

