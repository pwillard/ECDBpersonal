<?php
		require_once('include/login/auth.php');
		include('include/mysql_connect.php');
	
	// Get some personal data. ID, currency, measurement unit
	$owner 	= 	$_SESSION['SESS_MEMBER_ID'];
	$GetPersonal = mysqli_query($connection,"SELECT currency, measurement FROM members WHERE member_id = ".$owner."");
	$personal = mysqli_fetch_assoc($GetPersonal);
?>



<?php 
 // Custom Page Titles
 $pageTitle = 'Add Component - ecDB';
 include("include/head.php")  
 ?>


	<body  onLoad="document.forms.add.name.focus()">
		<div id="wrapper">
			
			<!-- Header -->
				<?php include 'include/header.php'; ?>
			<!-- END -->
			
			<!-- Main menu -->
				<?php include 'include/menu.php'; ?>
			<!-- END -->
			
			<!-- Main content -->
			<div id="content">

			<h1>Add new component</h1>
				
				<?php
					include('include/include.php');
					$Add = new ShowComponents;
					$Add->Add();
				?>
				
				
				<form class="globalForms noPadding" action="" method="post" id="add">
					<div class="textBoxInput">
						<label class="keyWord boldText">Comment</label>
						<div class="text">
							<textarea name="comment" rows="4"><?php if(isset($_POST['submit'])) { echo $_POST['comment']; } ?></textarea>
						</div>
					</div>
					<table class="globalTables leftAlign noHover" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="boldText">
									Name
								</td>
								<td>
									<input name="name" id="name" type="text" class="medium" value="<?php if(isset($_POST['submit'])) { echo $_POST['name']; } ?>" autofocus tabindex="0">
								</td>
								<td class="boldText">
									Category
								</td>
								<td>
									<select name="category">
										<?php
											// Include the category selector menu.
											include('include/include_component_add_category_menu.php');
											$MenuCat = new AddMenuCat;
											$MenuCat->MenuCat();
										?>
									</select>
								</td>
								<td class="boldText">
									Quantity
								</td>
								<td>
									<input name="quantity" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['quantity']; } ?>" >
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Manufacturer
								</td>
								<td>
									<div class="ui-widget">
									<input name="manufacturer" id="manufacturer" type="text"  value="<?php if(isset($_POST['submit'])) { echo $_POST['manufacturer']; } ?>" >
									</div>
								</td>
								<td class="boldText">
									Package
								</td>
								<td>
									<div class="ui-widget">
									<input name="package" id="package" type="text"  value="<?php if(isset($_POST['submit'])) { echo $_POST['package']; } ?>" >
									</div>
								</td>
								<td class="boldText">
									Pins
								</td>
								<td>
									<input name="pins" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['pins']; } ?>" >
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Location
								</td>
								<td>
									<div class="ui-widget">
									<input name="location" id="location" type="text" value="<?php if(isset($_POST['submit'])) { echo $_POST['location']; } ?>" >
									</div>
								</td>
								<td class="boldText">
									Price
								</td>
								<td>
									<input name="price" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['price']; } ?>" > <?php echo $personal['currency']; ?>
								</td>
								<td class="boldText">
									To order
								</td>
								<td>
									<input name="orderquant" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['orderquant']; } ?>" >
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="boldText">
									SMD
								</td>
								<td>
									<?php
										if(isset($_POST['submit']) && $_POST['smd'] == 'Yes'){
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
										if(isset($_POST['submit']) && $_POST['scrap'] == 'Yes'){
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
								<td></td>

							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						

							<tr>
								<td class="boldText">
									Data Sheet
								</td>
								<td>
									<div class = "ui-widget">
									<input id="datasheet" name="datasheet" type="text" value="<?php if(isset($_POST['submit'])) { echo $_POST['datasheet']; } ?>" > 
									</div>
								</td>



								<td class="boldText">
									Image
								</td>
								<td>
									<div class = "ui-widget">
									<input id="images" name="cimage" type="text"  value="<?php if(isset($_POST['submit'])) { echo $_POST['cimage']; } ?>" >
									</div>
								</td>
								<td></td>
								<td></td>
								
							</tr>
							<tr>
								<td class="boldText">
									Application Note
								</td>
								<td>
									<div class = "ui-widget">
									<input id="appnote" name="appnote" type="text" value="<?php if(isset($_POST['submit'])) { echo $_POST['appnote']; } ?>" > 
									</div>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td  class="boldText">
									Add component to project
								</td>
								<td  class="boldText">
									Quantity
								</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="bordered">
									</tr>
							<tr>
								<td></td>
								<td>
									<select name="project">
										<?php
											include('include/include_component_add_project.php');
											$MenuProj = new AddMenuProj;
											$MenuProj->MenuProj();
										?>
									</select>
								</td>
								<td>
									<input name="projquant" type="text" class="small" value="<?php if(isset($_POST['submit'])) { echo $_POST['projquant']; } ?>" >
								</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<div class="buttons">
						<div class="input">
							<button class="button green" name="submit" type="submit"><span class="fa fa-save fa-lg"></span> Save</button>
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