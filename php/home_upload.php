<?php
include ('config.php');
ini_set('display_errors', 0); // display error is turn off


session_start();
$u_email = $_SESSION['valid'];

if (!$_FILES["uploadingfile"]["tmp_name"]) {//No file chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else {
    $extension = pathinfo($_FILES['uploadingfile']['name'], PATHINFO_EXTENSION);
    if ((($_FILES["uploadingfile"]["type"] == "application/zip")) && $extension == 'zip') {
        //Directory to put file into
         $folderPath = "../uploads/";
        
        //File name
        $original_file_name = $_FILES["uploadingfile"]["name"];
        $size_raw = $_FILES["uploadingfile"]["size"]; //File size in bytes
        $size_as_mb = number_format(($size_raw / 1048576), 2); //Convert bytes to Megabytes
        $file_ex = pathinfo($original_file_name, PATHINFO_EXTENSION);
        //   echo $size_raw;
        $video_ex_lc = strtolower($file_ex);
        // $new_video_name = uniqid("file",true). '.' .$video_ex_lc;
        
        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $original_file_name);    
             // insert query
            $n=15;
            function getName($n) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }
                return $randomString;
            }
            
            $file_id=getName($n);
            $upload_date = date('Y-m-d');

            // query for checking same file existed in database or not.....
        $sqlqry = "SELECT COUNT(*) FROM `form_detail` WHERE `form_detail`.`file_url` = '$original_file_name'";
        $qry = mysqli_query($con, $sqlqry);
        
        
        
        $sql = "UPDATE `form_detail` SET file_url = '$original_file_name', file_id = '$file_id', file_name = '$withoutExt', upload_date = '$upload_date' WHERE `form_detail`.`Email` = '$u_email'";
        
        
        $query=mysqli_query($con,$sql);
        
        if (move_uploaded_file($_FILES["uploadingfile"]["tmp_name"], "$folderPath" . $original_file_name . "")) {
            //Move file
            // echo "$video_id";
            echo "File Uploaded Successfully.......";
            
        }

        // for checking plagiarism 
        
        if ($qry == FALSE) {
            echo '<div style="color: red;">Error: ' . mysqli_error($con) . '</div>';
        } else {
            $row = mysqli_fetch_row($qry);
            if ($row[0] > 0) {
                echo '<div class="plag-check" id="plg-chk">
                <p><h3>Plagirisim : Not Genuine</h3></p>
              </div>';
            }
        }
    } else {
        echo "File is not a zip";
        exit;
    }
}
// ------------------------------------ For uploading thumbnail and file name ------------------------------

// $extension = pathinfo($_FILES['uploadingfile']['name'], PATHINFO_EXTENSION);
// if ((($_FILES["uploadingfile"]["type"] == "application/zip")) && $extension == 'zip') {
//         //Directory to put file into
//          $folderPath = "uploads/";
?>