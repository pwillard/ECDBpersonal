<?php
	require_once('include/login/auth.php');
	include('include/mysql_connect.php');

	
	$owner 	= 	$_SESSION['SESS_MEMBER_ID'];
	$id 	= 	(int)$_GET['edit'];

	$GetDataComponent = mysqli_query($connection,"SELECT * FROM data WHERE id = ".$id." AND owner = ".$owner."");
	$executesql = mysqli_fetch_assoc($GetDataComponent);
	
	$GetPersonal = mysqli_query($connection,"SELECT currency, measurement FROM members WHERE member_id = ".$owner."");
	$personal = mysqli_fetch_assoc($GetPersonal);
	
	if ($executesql['owner'] !== $owner) {
		header("Location: error.php?id=2");
	}

	if ($executesql['category'] < 999) {
		$head_cat_id = substr($executesql['category'], -3, 1);
	}
	else {
		$head_cat_id = substr($executesql['category'], -4, 2);
	}

	$GetHeadCatName = mysqli_query($connection,"SELECT * FROM category_head WHERE id = ".$head_cat_id."");
	$executesql_head_catname = mysqli_fetch_assoc($GetHeadCatName);


	$sub_cat_id = $executesql['category'];
	
	$GetSubCatName = mysqli_query($connection,"SELECT * FROM category_sub WHERE id = ".$sub_cat_id."");
	$executesql_sub_catname = mysqli_fetch_assoc($GetSubCatName);
	
	$GetDataComponentsAll = "SELECT * FROM category_sub";
	$sql_exec = mysqli_query($connection,$GetDataComponentsAll);
	
	if(isset($_POST['delete'])) {
		$sqlDeleteComopnent = "DELETE FROM data WHERE id = ".$id." ";
		$sql_exec_component_delete = mysqli_query($connection,$sqlDeleteComopnent);

		$sqlDeleteProject = "DELETE FROM projects_data WHERE projects_data_component_id = '$id'";
		$sql_exec_project_delete = mysqli_query($connection,$sqlDeleteProject);

		header("Location: .");
	}
	
	if(isset($_POST['based'])) {
		header("Location: add_based.php?based=$id");
	}
	
	if (isset($_POST['quantity_increase'])) {
		$quantity_before	=	$_POST['quantity'];
		$quantity_after		= 	$quantity_before + 1;
		
		$sql = "UPDATE data SET quantity = '".$quantity_after."' WHERE id = ".$id." ";
		$sql_exec = mysqli_query($connection,$sql);
		header("location: " . $_SERVER['REQUEST_URI']);
	}
	
	if (isset($_POST['quantity_decrease'])) {
		$quantity_before	=	$_POST['quantity'];
		$quantity_after 	= 	$quantity_before - 1;
		
		$sql = "UPDATE data SET quantity = '".$quantity_after."' WHERE id = ".$id." ";
		$sql_exec = mysqli_query($connection,$sql);
		header("location: " . $_SERVER['REQUEST_URI']);
	}
	
	if (isset($_POST['orderquant_increase'])) {
		$quantity_before	=	$_POST['orderquant'];
		$quantity_after		= 	$quantity_before + 1;
		
		$sql = "UPDATE data SET order_quantity = '".$quantity_after."' WHERE id = ".$id." ";
		$sql_exec = mysqli_query($connection,$sql);
		header("location: " . $_SERVER['REQUEST_URI']);
	}
	
	if (isset($_POST['orderquant_decrease'])) {
		$quantity_before	=	$_POST['orderquant'];
		$quantity_after 	= 	$quantity_before - 1;
		
		$sql = "UPDATE data SET order_quantity = '".$quantity_after."' WHERE id = ".$id." ";
		$sql_exec = mysqli_query($connection,$sql);
		header("location: " . $_SERVER['REQUEST_URI']);
	}
?>

<?php 
 // Custom Page Titles
 $pageTitle = "Edit component - ecDB";
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
				<h2>
				<a href="category.php?cat=
					<?php 
						echo $executesql_head_catname['id']; 
						echo '"> ';
						echo $executesql_head_catname['name']; 
						echo '</a> / ';
						
						echo '<a href="category.php?subcat=';
						echo $executesql_sub_catname['id']; 
						echo '"> ';
						echo $executesql_sub_catname['name']; 
					?>
				</a> 
				<a href="component.php?view=
					<?php echo $executesql['id']; ?>">
					<?php echo $executesql['name']; ?>
				</a>
		
				</h2>
				
				
				<?php
					include('include/include.php');
					$Add = new ShowComponents;
					$Add->Add();
				?>
				
				
				<form class="globalForms noPadding" action="" method="post">
					<div class="textBoxInput">
						<label class="keyWord boldText">Comment</label>
						<div class="text">
							<textarea name="comment" rows="4" cols="104"><?php echo $executesql['comment']; ?></textarea>
						</div>
					</div>
					<table class="globalTables leftAlign noHover" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="boldText">
									Name
								</td>
								<td>
									<input name="name" type="text" class="medium" value="<?php echo $executesql['name']; ?>" id="name" >
								</td>
								<td class="boldText">
									Category
								</td>
								<td>
									<select name="category">
										<?php
											$HeadCategoryNameQuery = "SELECT * FROM category_head ORDER by name ASC";
											$sql_exec_headcat = mysqli_Query($connection,$HeadCategoryNameQuery);
		
											while ($HeadCategory = mysqli_fetch_array($sql_exec_headcat)) {
												
												echo '<option class="main_category" value="';
												echo $HeadCategory['id'];
												echo '" disabled>';
												echo $HeadCategory['name'];
												echo '</option>';
												
												$subcatfrom = $HeadCategory['id'] * 100;
												$subcatto = $subcatfrom + 99;
												
												$SubCategoryNameQuery = "SELECT * FROM category_sub WHERE id BETWEEN ".$subcatfrom." AND ".$subcatto." ORDER by name ASC";
												$sql_exec_subcat = mysqli_Query($connection,$SubCategoryNameQuery);
												
												while ($SubCategory = mysqli_fetch_array($sql_exec_subcat)) {
													echo '<option value="';
													echo $SubCategory['id'];
													echo '"';
														if ($executesql_sub_catname['id'] == $SubCategory['id']) {
															echo ' selected';
														}
													echo '>';
													echo $SubCategory['name'];
													echo '</option>';
												}
											}
										?>
									</select>
								</td>
								<td class="boldText">
									Quantity
								</td>
								<td>
									<input name="quantity" type="text" class="small" value="<?php echo $executesql['quantity']; ?>" id="quantity">
									<button class="button white small" name="quantity_increase" type="submit"><span class="fa  fa-plus-square fa-lg"></span></button>
									<button class="button white small" name="quantity_decrease" type="submit"><span class="fa  fa-minus-square fa-lg"></span></button>
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Manufacturer
								</td>
								<td>
									<div class="ui-widget">
									<input id="manufacturer" name="manufacturer" type="text"  value="<?php echo $executesql['manufacturer']; ?>" >
										</div>
								</td>
								<td class="boldText">
									Package
								</td>
								<td>
									<div class="ui-widget">
									<input id="package" name="package" type="text"  value="<?php echo $executesql['package']; ?>" >
										</div>
								</td>
								<td class="boldText">
									Pins
								</td>
								<td>
									<input name="pins" type="text" class="small" value="<?php echo $executesql['pins']; ?>" >
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Location
								</td>
								<td>
									<div class="ui-widget">
									<input id="location" type="text" name="location"  value="<?php echo $executesql['location']; ?>" id="location" >
									<div class="ui-widget">
								</td>
								<td class="boldText">
									Price
								</td>
								<td>
									<input name="price" type="text" class="small" value="<?php echo $executesql['price']; ?>" id="price" > <?php echo $personal['currency']; ?>
								</td>
								<td class="boldText">
									To order
								</td>
								<td>
									<input name="orderquant" type="text" class="small" value="<?php echo $executesql['order_quantity']; ?>" id="orderquant">
									<button class="button white small" name="orderquant_increase" type="submit"><span class="fa  fa-plus-square fa-lg"></span></button>
									<button class="button white small" name="orderquant_decrease" type="submit"><span class="fa  fa-minus-square fa-lg"></span></button>
								</td>
							</tr>
							

							<tr>
								<td class="boldText">
									SMD
								</td>
								<td>
									<?php
										if($executesql['smd'] == 'Yes'){
											echo '<input type="radio" name="smd" value="Yes" checked="checked" > Yes ';
											echo '<input type="radio" name="smd" value="No" > No';
										}
										else{
											echo '<input type="radio" name="smd" value="Yes" > Yes ';
											echo '<input type="radio" name="smd" value="No" checked="checked" > No';
										}
									?>
								</td>
								<td class="boldText">
									Recycled
								</td>
								<td>
									<?php
										if($executesql['scrap'] == 'Yes'){
											echo '<input type="radio" name="scrap" value="Yes" checked="checked" > Yes ';
											echo '<input type="radio" name="scrap" value="No" > No';
										}
										else{
											echo '<input type="radio" name="scrap" value="Yes" > Yes ';
											echo '<input type="radio" name="scrap" value="No" checked="checked" > No';
										}
									?>
								</td>


								<td></td>
								<td></td>


							<tr>
								<td class="boldText">
									Datasheet 
								</td>
								<td>
									<div class="ui-widget">
									<input id="datasheet" name="datasheet" type="text" 
									value="<?php echo $executesql['datasheet']; ?>" >
									<div class="ui-widget">
								</td>	
								<td class="boldText">
									Image 
								</td>
								<td>
									<div class="ui-widget">
									<input id="images" name="cimage" type="text" 
									value="<?php echo $executesql['cimage']; ?>" >
									</div>
								</td>
								<td></td>
								<td></td>
						
							<tr>
								<td class="boldText">
									Appnote 
								</td>
								<td>
									<div class="ui-widget">
									<input id="appnote" name="appnote" type="text" 
									value="<?php echo $executesql['appnote']; ?>" >
									<div class="ui-widget">
								</td>


								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>			
							<tr>
								<td></td>
								<td class="boldText">
									Add to project
									</td>
								<td class="boldText">
									Quantity
								</td>

								
									<?php
										$Echo = "SELECT projects_data_component_id FROM projects_data WHERE projects_data_component_id = ".(int)$_GET['edit']." ";
										$sql_echo = mysqli_query($connection,$Echo);
										
										if (mysqli_num_rows($sql_echo) == 0) {
											echo '<td></td>';
											echo '<td></td>';
											echo '<td></td>';
										}
										else {
											echo '<td class="boldText">Project</td>';
											echo '<td class="boldText">Quantity</td>';
											echo '<td></td>';											
										}
										
									?>
							</tr>
							<tr>
								<td></td>
								<td>
									<select name="project">
										<?php
											include('include/include_component_edit_project_add.php');
											$MenuProj = new AddMenuProj;
											$MenuProj->MenuProj();
										?>
									</select>
								</td>
								<td>
									<input name="projquant" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['projquant']; } ?>" >
								</td>

								<td>
									<?php
										include('include/include_component_edit_project_edit.php');
										$MenuProj = new EditProj;
										$MenuProj->MenuProj();
									?>
								</td>



						</tbody>
					</table>
					
					<div class="buttons">
						<div class="input">
							<button class="button green" name="update" type="submit"><span class="fa  fa-save fa-lg"></span> Update</button>
							<button class="button" name="based" type="submit"><span class="fa  fa-plus-square fa-lg"></span> New based on this</button>
							<button class="button red" name="delete" type="submit"><span class="fa  fa-trash fa-lg"></span> Delete</button>
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
