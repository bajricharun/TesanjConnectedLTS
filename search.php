<?php
//
require 'functions/functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();

?>

<!DOCTYPE html>
<html>
<head>
    <title>TC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="resources/css/search.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1>Rezultati pretrage</h1>
        <?php
            $location = $_GET['location'];
            $key = $_GET['query'];
             if($location == 'names') {
                $name = explode(' ', $key, 2); // Break String into Array.
                if(empty($name[1])) {
                    $sql = "SELECT * FROM users WHERE users.user_firstname = '$name[0]' OR users.user_lastname= '$name[0]' OR users.user_job = '$name[0]'";
                } else {
                    $sql = "SELECT * FROM users WHERE users.user_firstname = '$name[0]' AND users.user_lastname= '$name[1]' OR users.user_job='$name[0]' OR users.user_job='$name[1]'";
                }
                include 'includes/userquery.php';
            }
             else if ($location == 'posts')  {
               
                $sql = "SELECT posts.post_id, posts.post_caption, posts.post_for, posts.post_by, users.user_id, users.user_firstname, users.user_lastname FROM posts JOIN users ON users.user_id = posts.post_by WHERE posts.post_for = '$key'";
                //$sql = "SELECT * FROM posts WHERE posts.post_for = '$key' AND posts.post_public='Y'";
                $query = mysqli_query($conn, $sql);
                $width = '40px'; // Profile Image Dimensions
                $height = '40px';
                if(!$query){
                    echo mysqli_error($conn);
                }
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
                    echo 'Nismo uspjeli pronaći išta u našoj pretragi.';
                    echo '</div>';
                    echo '<br>';
                }
                while($row = mysqli_fetch_assoc($query)){
                    include 'includes/post_search.php';
                    echo '<br>';
                }
            } 

                
        ?>
    </div>
</body>
</html>
