<?php
// 
// FILE: login-failed.php
//
// Custom Page Titles
$pageTitle = 'Login - ecDB';
include("include/head.php");
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
				
				<div class="message red">
					Login failed, please try again.
				</div>
				
				<div class="loginWrapper">
					<div class="left">
						<div class="aboutECDB"></div>
						
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
				<?php
				include 'include/footer.php';
				?>
			<!-- END -->
			
		</div>
	</body>
</html>
