<?php
// Program: Maintenance.php
// Author: Pete Willard
// Date: August 2017
// 
// Purpose: Allow Image files and PDF files to be uploaded
// 12/23/2017 1:01:23 PM

?>
<?php
// Custom Page Title
$pageTitle = 'Maintenance - ecDB';
include ("include/head.php")
?>
<!---   Reference Material - Maintenance Methods 
    Here we can upload new IMAGES and PDF files for use
    in the database.
-->
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
                <h3>Reference Materials</h3>
                <p>
				 Images and PDF files are uploaded to the server to be used as references
                 for components.
                </p>
				<div class="message orange">
				PDF files are uploaded as Datasheets unless specified as Application Notes.
				</div>
                <h1>File Upload</h1>
		<form action="maintenance.php" method="post" enctype="multipart/form-data">
                <input type="checkbox" name="appnote" value="Yes" /> Upload as an Application Note?<br>
		<input type="file" class = "bold" name="file" id="file"><br>
                
                
		<input type="submit" value="Upload" name="submit">
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
				</form>

<!--- Automation methods:  
      This method DOES allow for files to be manually added to the folder
      without the use this menu item.  
-->
<?php
if (isset($_POST['submit'])) {
    $name = $_FILES['file']['name'];
   
    $temp_name = $_FILES['file']['tmp_name'];
    if (isset($_POST['appnote'])) {
    $appnote = $_POST['appnote'];
    } else {
     $appnote = "No";
    }

    
    // Not empty
    if (isset($name)) {
        if (!empty($name)) {
            $imglocation = 'img/parts/';
            if ($appnote == "Yes"){
                $pdflocation = 'appnotes/';
            } else {
            $pdflocation = 'sheets/';
            }
            // Determine uploaded file extension
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);

            // Route PDF's to sheets folder
            if ($ext == 'pdf') {
                echo "    PDFfile    ";
                $location = $pdflocation;
                // Move the uploaded file from the temp folder to the PDF folder
                moveIt($location); 
            }

            // IMAGE handler
            if ($ext == 'jpg' || $ext == 'gif' || $ext == 'png') {

                // route images to img/parts folder
                $location = $imglocation;
                moveIt($location); // Move the uploaded file from the temp folder to the img/parts folder

            } 
        // Any other file type... we do nothing
        }   
    }
}

// Should be clear what this does... 
// it is used to move the file to the final location based on file extension

function moveIt($finalLocation) {
// If the file exists... make note of it and don't perform a move step
$delay=5;
    if (file_exists($finalLocation . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " already exists. <br>";
        } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $finalLocation . $_FILES["file"]["name"]);

        $message = " - File Uploaded";
        echo $_FILES["file"]["name"] . $message . "<br>";
        //echo "<script type='text/javascript'>alert('$message');</script>";


        // make all the files in the current folder lower case
        lcFolder($finalLocation);
        }
        //header('Refresh: $delay; url=maintenance.php');
   }


// This is only compatible with LINUX and WINDOWS - Sorry
// This will rename all the files in the reference folders to 
// Lowercase

function lcFolder($folderlocation){

    $CWD = getcwd();
    chdir($folderlocation);
   

    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        // A very "Windosy thing to"
        $syscommand = system(`for /f "Tokens=*" %f in ('dir /l/b/a-d') do (rename "%f" "%f")`, $retval);
    } else {
        // Assume linux default
        $syscommand = shell_exec("rename 'y/A-Z/a-z/' *");
    }

    chdir($CWD);

}


?>


</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
        </div>

    </body>
</html>
