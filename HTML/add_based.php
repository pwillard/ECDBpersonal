<?php
// ADD_BASED.PHP
// Add component based on existing component
//
require_once('include/login/auth.php');
include('include/mysql_connect.php');
require_once('include/debug.php');

$owner = $_SESSION['SESS_MEMBER_ID'];
$id    = (int) $_GET['based'];

// Get data from the old component to inherit.
$GetDataComponent = mysqli_query($connection, "SELECT * FROM data WHERE id = " . $id . " AND owner = " . $owner . "");
$executesql       = mysqli_fetch_assoc($GetDataComponent);

// Get some personal data. ID, currency, measurement unit
$GetPersonal = mysqli_query($connection, "SELECT currency, measurement FROM members WHERE member_id = " . $owner . "");
$personal    = mysqli_fetch_assoc($GetPersonal);

// If the owner of component !== $owner. Show error.
if ($executesql['owner'] !== $owner)
    {
    header("Location: error.php?id=2");
    } //$executesql['owner'] !== $owner

// Get the head category ID, based of the sub category, ($executesql['category']).
if ($executesql['category'] < 999)
    {
    $head_cat_id = substr($executesql['category'], -3, 1);
    } //$executesql['category'] < 999
else
    {
    $head_cat_id = substr($executesql['category'], -4, 2);
    }

// Get the head category name, based of the head category ID.
$GetHeadCatName          = mysqli_query($connection, "SELECT * FROM category_head WHERE id = " . $head_cat_id . "");
$executesql_head_catname = mysqli_fetch_assoc($GetHeadCatName);

// Sub category == $sub_cat_id
$sub_cat_id = $executesql['category'];

// Get the sub category name, based of the sub category ID.
$GetSubCatName          = mysqli_query($connection, "SELECT * FROM category_sub WHERE id = " . $sub_cat_id . "");
$executesql_sub_catname = mysqli_fetch_assoc($GetSubCatName);

// Get ALL the sub categories.
$GetDataComponentsAll = "SELECT * FROM category_sub";
$sql_exec             = mysqli_Query($connection, $GetDataComponentsAll);
?>
<?php
// Custom Page Titles
$pageTitle = 'Add component - ecDB';
include("include/head.php");
?>
	
	<body>
		<div id="wrapper">
			
			<!-- Header -->
				<?php	include 'include/header.php';	?>
			<!-- END -->
			
			<!-- Main menu -->
				<?php	include 'include/menu.php';	?>
			<!-- END -->
			
			<!-- Main content -->
			<div id="content">
				
				<h1>Add new component based on <a href="component.php?view=<?php
				echo $executesql['id'];
				?>">
				<?php
				echo $executesql['name'];
				?></a>
				</h1>
				
				<?php
				include('include/include.php');
				$Add = new ShowComponents;
				$Add->Add();
				?>
				
				<form class="globalForms noPadding" action="" method="post">
					<div class="textBoxInput">
						<label class="keyWord boldText">Comment</label>
						<div class="text">
							<textarea name="comment" rows="4"><?php
							echo $executesql['comment'];
							?></textarea>
						</div>
					</div>
					<table class="globalTables leftAlign noHover" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="boldText">
									Name
								</td>
								<td>
									<input name="name" class="medium" type="text" value="<?php
									echo $executesql['name'];
									?>" id="name" />
								</td>
								<td class="boldText">
									Category
								</td>
								<td>
									<select name="category">
										<?php
//=======================================================================										
$HeadCategoryNameQuery = "SELECT * FROM category_head ORDER by name ASC";
$sql_exec_headcat      = mysqli_Query($connection, $HeadCategoryNameQuery);

while ($HeadCategory = mysqli_fetch_array($sql_exec_headcat))
    {
    
    echo '<option class="main_category" value="';
    echo $HeadCategory['id'];
    echo '" disabled>';
    echo $HeadCategory['name'];
    echo '</option>';
    
    $subcatfrom = $HeadCategory['id'] * 100;
    $subcatto   = $subcatfrom + 99;
    
    $SubCategoryNameQuery = "SELECT * FROM category_sub WHERE id BETWEEN " . $subcatfrom . " AND " . $subcatto . " ORDER by name ASC";
    $sql_exec_subcat      = mysqli_Query($connection, $SubCategoryNameQuery);
    
    while ($SubCategory = mysqli_fetch_array($sql_exec_subcat))
        {
        echo '<option value="';
        echo $SubCategory['id'];
        echo '"';
        if ($executesql_sub_catname['id'] == $SubCategory['id'])
            {
            echo ' selected';
            } //$executesql_sub_catname['id'] == $SubCategory['id']
        echo '>';
        echo $SubCategory['name'];
        echo '</option>';
        } //$SubCategory = mysqli_fetch_array($sql_exec_subcat)
    } //$HeadCategory = mysqli_fetch_array($sql_exec_headcat)
?>
									</select>
								</td>
								<td class="boldText">
									Quantity
								</td>
								<td>
									<input name="quantity" type="text" class="small" value="<?php
									echo $executesql['quantity'];
									?>" id="quantity" />
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Manufacturer
								</td>
								<td>
									<div class="ui-widget">
									<input id="manufacturer" name="manufacturer"  type="text" value="<?php
									echo $executesql['manufacturer'];
									?>" />
									</div>
								</td>
								<td class="boldText">
									Package
								</td>
								<td>
									<div class="ui-widget">
									<input id="package" name="package"  type="text" value="<?php
									echo $executesql['package'];
									?>" />
									</div>
								</td>
								<td class="boldText">
									Pins
								</td>
								<td>
									<input name="pins" type="text" class="small" value="<?php
									echo $executesql['pins'];
									?>" />
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Location
								</td>
								<td>
									<div class="ui-widget">
									<input id="location" name="location" type="text"  value="<?php
									echo $executesql['location'];
									?>" id="location" />
									</div>
								</td>
								<td class="boldText">
									Price
								</td>
								<td>
									<input name="price" type="text" class="small" value="<?php
									echo $executesql['price'];
									?>" id="price" /> <?php
									echo $personal['currency'];
									?>
								</td>
								<td class="boldText">
									To order
								</td>
								<td>
									<input name="orderquant" type="text" class="small" value="<?php
									echo $executesql['order_quantity'];
									?>" id="orderquant" />
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
if ($executesql['smd'] == 'Yes')
    {
    echo '<input type="radio" name="smd" value="Yes" checked="checked" /> Yes ';
    echo '<input type="radio" name="smd" value="No" /> No';
    } //$executesql['smd'] == 'Yes'
else
    {
    echo '<input type="radio" name="smd" value="Yes" /> Yes ';
    echo '<input type="radio" name="smd" value="No" checked="checked" /> No';
    }
?>
								</td>
								<td class="boldText">
									Recycled
								</td>
								<td>
									<?php
if ($executesql['scrap'] == 'Yes')
    {
    echo '<input type="radio" name="scrap" value="Yes" checked="checked" /> Yes ';
    echo '<input type="radio" name="scrap" value="No" /> No';
    } //$executesql['scrap'] == 'Yes'
else
    {
    echo '<input type="radio" name="scrap" value="Yes" /> Yes ';
    echo '<input type="radio" name="scrap" value="No" checked="checked" /> No';
    }
?>
								</td>
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
							

								<td class="boldText">
									Data Sheet
								</td>
								<td>
									<div class="ui-widget">
									<input id = "datasheet" name="datasheet" type="text"  value="<?php echo $executesql['datasheet'];?>" />
								</div>
								</td>

								<td class="boldText">
									Image
								</td>
								<td>
									<div class="ui-widget">
									<input id="images" name="cimage" type="text" class="medium" value="<?php echo $executesql['cimage']; ?>" />
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
									<div class="ui-widget">
									 <input id = "appnote" name="appnote" type="text"  value="<?php echo $executesql['appnote']; ?>" />
								    </div>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
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
									<input name="projquant" type="text" class="small" value="<?php
if (isset($_POST['submit']))
    {
    echo $_POST['projquant'];
    } //isset($_POST['submit'])
?>" />
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
				<?php
include 'include/footer.php';
?>
			<!-- END -->
		</div>
	</body>
</html>
