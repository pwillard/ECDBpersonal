<?php
	// Program: PROJ_ADD.PHP
	//
	require_once('include/login/auth.php');
	require_once('include/debug.php');
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Add Project - ecDB';
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
				<h1>Add Project</h1>

				<table class="viewComponent" cellpadding="0" cellspacing="0">
					<form action="" method="post">
						<tr>
							<td class="what">Name</td>
							<td><input name="name" id="name" type="text" class="textfield"" /></td>
						</tr>
						
						<tr>
							<td class="what"></td>
							<td></td>
						</tr>

						<tr>
							<td class="what"></td>
							<td><input type="submit" name="submit" class="submit" value="" /></td>
						</tr>
						
						<tr>
							<td class="what"></td>
							<td>
								<?php
									include('include/include_proj_add.php');

									$AddProj = new Proj;
									$AddProj->AddProj();
								?>
							</td>
						</tr>
					</form>
				</table>
				<div class="uploadedImags">
				
				</div>
			</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
		</div>
	</body>
</html>