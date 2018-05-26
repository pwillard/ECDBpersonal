<!---
FILE: HEADER.PHP
REVISED DATE: Sept 1, 2017
REVISED BY: Pete Willard
-->

<div id="header">
	<!-- Draw Logo -->
	<div>
		<a href="index.php"><img src="img/logo.png" alt="ECDB" style="width:200px;height:75px;"></a>
	</div>
	<!-- Current User logged in/ log out  -->
	<span class="userInfo">
		Logged in as <a href="my.php">
		<?php
			require_once('include/login/auth.php');
			include('include/mysql_connect.php');
			
			$owner = $_SESSION['SESS_MEMBER_ID'];
			$GetName = mysqli_query($connection,"SELECT firstname, lastname FROM members WHERE member_id = ".$owner."");
			$headername = mysqli_fetch_assoc($GetName);
			// Get Current User Name
			if(isset($_POST['submit']) && $_SERVER["REQUEST_URI"] == 'my.php') { echo $_POST['firstname']; } else { echo $headername['firstname']; }
			echo ' ';
			if(isset($_POST['submit']) && $_SERVER["REQUEST_URI"] == 'my.php') { echo $_POST['lastname']; } else { echo $headername['lastname']; }
		?>
		</a> - <a href="logout.php"> Sign out</a>
	</span>
	<!-- Search Function -->
	<?php
	$myArray = array();
	// We don't need a search form on anything but what is defined below
	if ($pageTitle == "Home - ecDB" || 
		$pageTitle == "Category - ecDB" ||
		$pageTitle == "View component - ecDB" ||
		$pageTitle == "Search - ecDB" ) 
	{
		echo '<div class="searchContent">';
		echo 'Search <span class="fa fa-search"></span>';
		echo '<form class="search" action="search.php" method="get">';
		echo '	<input type="text" name="q" autofocus/>';
		echo '</form>';
		echo '</div>';
	} else {
		echo '<div class="searchContent">';
		echo $pageTitle;
		echo '</div>';
	}
		

?>
</div>
<!-- end of generic shared header -->
