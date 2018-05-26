<?php
	require_once('include/debug.php');
	require_once('include/login/auth.php');
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Contact - ecDB';
 include("include/head.php")  
 ?>
	
	<body>
		<div id="wrapper">
			<?php
			// If logged in... use standard menu
				if(isset($_SESSION['SESS_MEMBER_ID'])){
					echo '<!-- Header -->';
						include 'include/header.php';
					echo '<!-- END -->';

					echo '<!-- Main menu -->';
						include 'include/menu.php';
					echo '<!-- END -->';
				}
				else {
					echo '<!-- Header -->';
						include 'include/header_public.php';
					echo '<!-- END -->';

					echo '<!-- Main menu -->';
						include 'include/menu_public.php';
					echo '<!-- END -->';
				}
			?>
			<!-- Main content -->
			<div id="content">
				<div class="loginWrapper">
					<div class="left">
						<h1>Contact us</h1>
						If you have any suggestions, questions or what not. Send us an email to info@ecdb.net
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