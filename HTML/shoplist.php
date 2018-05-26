<?php
	require_once('include/login/auth.php');
	require_once('include/debug.php');
?>
<?php 
 // Custom Page Titles
 $pageTitle = 'Shopping List - ecDB';
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
					
					
					
					<table class="globalTables" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>
								</th>
								<th><a href="?by=name&order=<?php 
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
								<th><a href="?by=manufacturer&order=<?php 
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
								<th><a href="?by=package&order=<?php 
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
								<th><a href="?by=smd&order=<?php 
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
								<th><a href="?by=price&order=<?php 
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
								<th><a href="?by=quantity&order=<?php 
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
								?>">Quantity</a>
								</th>
								<th><a href="?by=quantity_order&order=<?php 
								if(isset($_GET['quantity_order'])){
									$quantity_order = $_GET['quantity_order'];
									if ($quantity_order == 'asc'){
										echo 'desc';
									}
									else {
										echo 'asc';
									}
								}
								else {
									echo 'asc';
								}
								?>">Quantity to order</a>
								</th>
								<th>
									Comment
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include('include/include_shoplist.php');
								$ShoplistList = new Shoplist;
								$ShoplistList->ShoplistList();
							?>
						</tbody>
					</table>
					<div class="totalSumWrapper">
						<?php
							include('include/include_shoplist_sum.php');
							$ShoplistPriceSum = new ShoplistPrice;
							$ShoplistPriceSum->ShoplistPriceSum();
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
