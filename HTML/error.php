<?php
	require_once('include/login/auth.php');
	require_once('include/debug.php');
	
	if(isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		
		if ($id == 1) {
			$message = "You don't have permission to view this component.";
		}
		elseif ($id == 2) {
			$message = "You don't have permission to edit this component.";
		}
		elseif ($id == 3) {
			$message = "Oh crap! Something broke...";
		}
		else {
			$message = "";
		}
	}
	if (empty($_GET['id'])) {
		$message = 'Error!';
	}
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Error - ecDB';
 include("include/head.php")  
 ?>
	
	<body>
		<div id="wrapper">
			<!-- Header -->
				<?php include 'include/header.php'; ?>
			<!-- END -->
			<!-- Main menu -->
				<?php include 'include/menu.php'; ?>
			<!-- END -->
			<!-- Main content -->
				<div id="content">
					<div class="message red">
						<?php echo $message; ?>
					</div>
				</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
		</div>
	</body>
</html>
