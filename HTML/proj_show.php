<?php
	require_once('include/login/auth.php');
	require_once('include/debug.php');
	
	if (!isset($_GET["proj_id"])) {
		header("Location: error.php?id=3");
	}
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Show project - ecDB';
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
					<h1>Viewing project 
						<?php
							// Visar projektets namn.
							include('include/mysql_connect.php');
							$project_id = mysqli_real_escape_string($connection,$_GET["proj_id"]);
							$owner = $_SESSION['SESS_MEMBER_ID'];
							
							$result = mysqli_query($connection,"SELECT project_name FROM projects WHERE project_owner = ".$owner." AND project_id = ".$project_id."");

							while($row = mysqli_fetch_array($result))
							{
								echo "<strong>";
								echo $row['project_name'];
								echo "</strong>";
							}
						?>
					</h1>
					
					<table class="globalTables" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th></th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=name&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'desc';
										}
									?>">Name</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=category&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Category</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=manufacturer&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Manufacturer</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=package&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Package</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=smd&order=<?php 
										if(isset($_GET['order'])){
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">SMD</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=price&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Price</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=quantity&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Quantity in stock</a>
								</th>
								<th>
									<a href="?proj_id=<?php echo $project_id; ?>&by=quantity&order=<?php 
										if(isset($_GET['order'])){
											$order = $_GET['order'];
											if ($order == 'asc'){
												echo 'desc';
											}
											else {
												echo 'asc';
											}
										}
										else {
											echo 'asc';
										}
									?>">Quantity in project</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include('include/include_proj_show.php');
	
								$ProjectShowComponents = new ProjectShow;
								$ProjectShowComponents->ProjectShowComponents();
							?>
						</tbody>
					</table>
					
					<div class="totalSumWrapper">
						<?php 
							include('include/include_proj_show_price.php');

							$ProjectSumTotal = new ProjectShowPrice;
							$ProjectSumTotal->ProjectSumTotal();
						?> 
					</div>
				</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
		</div>
	</body>
</html>
