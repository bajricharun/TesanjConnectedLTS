<?php

if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user_id']) {
    $current_id = $_GET['id'];
    $flag = 1;
} else {
    $current_id = $_SESSION['user_id'];
    $flag = 0;
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['profile']) || isset($_POST['post']) || isset($_POST['pic'])){
        $filename = basename($_FILES["fileUpload"]["name"]);
        $filetype = pathinfo($filename, PATHINFO_EXTENSION); // get file extension and check its type.
        if($filetype != "png" && $filetype != "jpg" && $filetype!= "jpeg" && $filetype != "gif" && $filetype != "pdf" && $filetype != "docx"){
            echo 'Samo JPG, JPEG, PNG, GIF, PDF i DOCX formati su dozvoljeni.';
        }
        if (isset($_POST['profile'])) {
            $last_id = $current_id;
            $filepath = "data/cv/" . $last_id . '.' . $filetype;
            if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath)){
                header("refresh:5; url=user_profile.php");
            }
        }
    }
            if (isset($_POST['pic'])) {
                $last_id = $current_id;
                $filepath = "data/images/profiles/" .  $last_id . '.' . $filetype;
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath)){
                    header("refresh:5; url=user_profile.php");
                }
            }
            if(isset($_POST['post'])){
                $last_id = mysqli_insert_id($conn);
                $filepath = "data/images/posts/" . $last_id . '.' . $filetype;
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath)){
                    header("refresh:5; url=home.php");
                }
            }
    }
?>
