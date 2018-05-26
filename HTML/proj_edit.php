<?php
	require_once('include/login/auth.php');
	include('include/mysqli_connect.php');
	require_once('include/debug.php');
	
	$owner 	= 	$_SESSION['SESS_MEMBER_ID'];
	$id 	= 	(int)$_GET['proj_id'];
	
	$GetDataProjectName = mysqli_query($connection,"SELECT * FROM projects WHERE project_id = ".$id." AND project_owner = ".$owner."");
	$executesql = mysqli_fetch_assoc($GetDataProjectName);
	
	if(isset($_POST['delete'])) {
		$sqlDeleteProject = "DELETE FROM projects WHERE project_id = ".$id." ";
		$sql_exec_component_delete = mysqli_query($connection,$sqlDeleteProject);

		$sqlDeleteProject = "DELETE FROM projects_data WHERE projects_data_project_id = ".$id." ";
		$sql_exec_project_delete = mysqli_query($connection,$sqlDeleteProject);

		header("Location: .");
	}
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Your Projects - ecDB';
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
					<h1>Edit Project</h1>
					
					<?php
						include('include/include_proj_update.php');
						$AddProj = new ProjAdd;
						$AddProj->AddProj();
					?>
					
					<form class="globalForms" method="post" action="">
						<div class="textInput">
							<label class="keyWord">Project name</label>
							<div class="input"><input name="name" type="text" class="medium" value="<?php echo $executesql['project_name']; ?>" /></div>
						</div>
						<div class="buttons">
							<div class="input">
								<button class="button green" name="submit" type="submit"><span class=" fa fa-save fa-lg"></span> Save</button>
								<button class="button red" name="delete" type="submit"><span class="fa fa-trash fa-lg"></span> Delete</button>
							</div>
						</div>
					</form>
				</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
		</div>
	</body>
</html>