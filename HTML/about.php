<?php
	require_once('include/debug.php');
?>

<?php 
 // Custom Page Titles
 $pageTitle = 'About - ecDB';
 include("include/head.php")  
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
				<div class="loginWrapper">
					<div class="left">

						<h1>What is ecDB?</h1>
							
							ecDB is basically a place where you, as an electronics hobbyist (or professional) can add your own components to your personal database to keep track of what components you own, where they are, how many you own and so on.
							[Please Note: this is the original about page]	
						<br /><br />
						<a href="img/about/index.png"><img src="img/about/index_thumbnail.png"></a>				
						<a href="img/about/add.png"><img src="img/about/add_thumbnail.png"></a><br /><br />
						<h1>Who & Why?</h1>
								
							ecDB is created by <a target="_blank" href="http://nilsf.se">Nils Fredriksson</a>. <br /><br />
								
							Me, Nils, have always wanted to have a system like this to keep track of what component I own. Before I created this system I (I guess you too...) had to dig through boxes filled with components to maybe find that component I needed. This is an unnecessary task to do, it not only takes time, and it also can be really frustrating not to find that component you are looking for. So I ended up creating this website where I easily can keep track of my components! 
							
						<br /><br />
						<h1>What does it cost?</h1>
						
							ecDB is completely free!<br />
							But if you like ecDB you can use this button to donate us some money.
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="7ZT5UY5XMHA52">
								<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							</form>
							
						<br />
						<h1>Is ecDB really done?</h1>
						No! ecDB is still under development. Here are some of the upcoming features:<br /><br />
						<del>
						- Public components - a place where you easily can trade components.<br />
							</del>
						- View to physically print the personal database. Old-school typewritten text and nice colums!<br />
						- Datasheet and picture uploading.<br />
						- Advanced component search with parameters.<br />
						- Log for each component. See when the component last was used/edited/bought etc.<br />
						- Barcode implementation for easy storage management.<br />
						- Import and export of personal database to text/spreadsheet.<br />
						- Quick edit function of component data directly from the database view.<br />
						- Add personal categories and fields.<br />
						- Borrow component data from other components in the database to easily add components.
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