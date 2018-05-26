<?php
class ProjAdd {
	public function AddProj	() {

		require_once('include/login/auth.php');
		include('include/mysql_connect.php');
		
		if(isset($_POST['submit'])) {
			$owner			=	$_SESSION['SESS_MEMBER_ID'];
			$name 			= 	mysqli_real_escape_string($connection,$_POST['name']);		

			if ($name == '') {
				echo '<div class="message red">';
				echo 'You have to specify a name!';
				echo '</div>';
			}
			else {
				$sql="INSERT into projects (project_owner, project_name) VALUES ('$owner', '$name')";
				$sql_exec = mysqli_query($connection,$sql);
				
				$proj_id = mysqli_insert_id(mysqli_insert_id);
				
				echo '<div class="message green center">';
				echo 'Project added!';
				echo '</div>';
			}
		}
	}
}
?>