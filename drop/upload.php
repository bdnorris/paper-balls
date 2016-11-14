<?php
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'drops';   //2




//function allowed_file(){
if (!empty($_FILES)) {

//Add the allowed mime-type files to an 'allowed' array
 $allowed = array('application/pdf', 'image/gif', 'image/jpeg', 'image/png', 'image/jpg', 'video/mp4', 'video/m4v', 'video/quicktime');
 //$allowed = array('image/jpeg', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation');
//Check uploaded file type is in the above array (therefore valid)
    //if(in_array($_FILES['resume']['type'], $allowed) AND in_array($_FILES['reference']['type'], $allowed)){
    if (in_array($_FILES["file"]["type"], $allowed)) {

   //If filetypes allowed types are found, continue to check filesize:

            if($_FILES["resume"]["size"] < 28214400 AND $_FILES["reference"]["size"] < 28214400 ){

              //if both files are below given size limit, allow upload
              //Begin filemove here....

                  $tempFile = $_FILES['file']['tmp_name'];          //3

                  $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

                  $targetFile =  $targetPath. $_FILES['file']['name'];  //5

                  move_uploaded_file($tempFile,$targetFile); //6

            }

    }



}
?>
