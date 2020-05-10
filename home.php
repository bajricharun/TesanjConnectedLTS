<?php 
require 'functions/functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
$temp = $_SESSION['user_id'];
session_destroy();
session_start();
$_SESSION['user_id'] = $temp;
ob_start(); 
// Establish Database Connection
$conn = connect();
?>
<?php
    $stat = mysqli_query($conn, "SELECT user_stat FROM users WHERE user_id = '$temp'");
    $row1 = mysqli_fetch_assoc($stat);
    $_SESSION['user_stat'] = $row1['user_stat'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>TC | Vremenska crta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <br>
<?php
    $stat = mysqli_query($conn, "SELECT user_stat FROM users WHERE users.user_id = '$temp'");
    $row1 = mysqli_fetch_assoc($stat);
    $_SESSION['user_stat'] = $row1['user_stat'];
   if ($_SESSION['user_stat'] == "P") {
    ?>
        <div class='createpost'>
        <form method='post' action='' onsubmit='return validatePost()' enctype='multipart/form-data'>
            <h2>Objavite</h2><h4>Molimo Vas da koristite enter nakon svake linije teksta.</h4>
            <hr>
            <select name='job' id='job'>
            <option value='0'>Izaberite posao za koji objavljujete</option>
            <option value='Vozač'>Vozač</option>
            <option value='Konobar'>Konobar</option>
            <option value='Ekonomista'>Ekonomista</option>
            <option value='Pravnik'>Pravnik</option>
            <option value='Bankar'>Bankar</option>
            <option value='Knjigovođa'>Knjigovođa</option>
            <option value='Poljoprivrednik'>Poljoprivrednik</option>
            <option value='Stolar'>Stolar</option>
            <option value='Programer'>Programer</option>
            <option value='Dizajner'>Dizajner</option>
            <option value='Krojač'>Krojač</option>
            <option value='Građevinar'>Građevinski radnik</option>
            <option value='Profesor'>Profesor/učitelj/nastavnik</option>
            <option value='Trgovac'>Trgovac</option>
            <option value='Vodoinstalater'>Vodoinstalater</option>
            <option value='Električar'>Električar</option>
            <option value='CNC Operater'>CNC operater</option>
            <option value='Tesar'>Tesar</option>
            <option value='Pekar'>Pekar</option>
            <option value='Ugostiteljski radnik'>Ugostiteljski radnik</option>
            <option value='Administrativni radnik'>Administrativni radnik</option>
            <option value='Radnik u skladištu'>Radnik u skladištu</option>
            <option value='Menadžer'>Menadžer</option>
            <option value='Stražar'>Stražar</option>
            <option value='Automehaničar'>Automehaničar</option>
            <option value='Limar'>Limar</option>
            <option value='Kuhar'>Kuhar</option>
            <option value='Medicinski tehničar'>Medicinski tehničar</option>
            <option value='Farmaceut'>Farmaceut</option>
            <option value='Inženjer'>Inženjer</option>
            <option value='Arhitekta'>Arhitekta</option>
            <option value='Doktor medicinske prakse'>Doktor medicinske prakse</option>
            <option value='Sekretar'>Sekretar</option>
            <option value='Notar'>Notar</option>
            <option value='Advokat'>Advokat</option>
            <option value='Portir'>Portir</option>
            <option value='Čistačica'>Čistačica</option>
            <option value='Domar'>Domar</option>
            <option value='Mašinski tehnicar'>Mašinski tehničar</option>
            <option value='Učenik/student'>Učenik/student</option>
            <option value='Ostalo'>Ostalo</option>
            </select>
            <span style='float:right; color:black'><input type='checkbox' id='public' name='public' checked style="display:none">
            <label for='public'></label></span>
            <span class='required' style='display:none;'> *Ne možete ostaviti opis prazan!</span><br>
            <textarea rows="2" name='caption'></textarea><center><img src='' id='preview' style='max-width:580px; display:none;'>
            </center>
            <div class='createpostbuttons'><!--<form action='' method='post' enctype='multipart/form-data' id='imageform'>-->
                <label><input type='file' name='fileUpload' id='imagefile'><!--<input type='submit' style='display:none;'>--></label>
                <input type='submit' value='Objavi' name='post' style="color:white;"><!--</form>-->
            </div>
        </form>
    </div>
   <?php }?>
        <div class="timeline" >

        <h1>Vremenska crta</h1>
       
        <?php   
        $sql = "SELECT posts.post_caption, posts.post_time, posts.post_public, users.user_firstname,
                        users.user_lastname, users.user_id, users.user_gender, posts.post_id, posts.post_for
                FROM posts
                JOIN users
                ON posts.post_by = users.user_id
                WHERE posts.post_public = 'Y' OR users.user_id = {$_SESSION['user_id']}
                UNION
                SELECT posts.post_caption, posts.post_time, posts.post_public, users.user_firstname,
                        users.user_lastname, users.user_id, users.user_gender, posts.post_id, posts.post_for
                FROM posts
                JOIN users
                ON posts.post_by = users.user_id
                JOIN (
                    SELECT friendship.user1_id AS user_id
                    FROM friendship
                    WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 1
                    UNION
                    SELECT friendship.user2_id AS user_id
                    FROM friendship
                    WHERE friendship.user1_id = {$_SESSION['user_id']} AND friendship.friendship_status = 1
                ) userfriends
                ON userfriends.user_id = posts.post_by
                WHERE posts.post_public = 'N'
                ORDER BY post_time DESC";
        $query = mysqli_query($conn, $sql);
        if(!$query){
            echo mysqli_error($conn);
        }
        if(mysqli_num_rows($query) == 0){
            echo '<div class="post">';
            echo 'Jos uvijek nema objava';
            echo '</div>';
        }
        else{
            $width = '40px'; // Profile Image Dimensions
            $height = '40px';
            while($row = mysqli_fetch_assoc($query)){
                include 'includes/post.php';
                echo '<br>';
            }
        }
        ?>
        <br><br><br>
        </div>
    </div>
    <script src="./resources/javascript/jquery.js"></script>
    <script src="./resources/javascript/drpdwn.js"></script>
    <script>
        // Invoke preview when an image file is choosen.
        $(document).ready(function(){
            $('#imagefile').change(function(){
                preview(this);
            });
        });
        // Preview function
        function preview(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (event){
                    $('#preview').attr('src', event.target.result);
                    $('#preview').css('display', 'initial');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Form Validation
        function validatePost(){
            var required = document.getElementsByClassName("required");
            var caption = document.getElementsByTagName("textarea")[0].value;
            required[0].style.display = "none";
            if(caption == ""){
                required[0].style.display = "initial";
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Form is Posted
    // Assign Variables
    $caption = $_POST['caption'];
   $for = $_POST['job'];
    if(isset($_POST['public'])) {
        $public = "Y";
    } else {
        $public = "N";
    }
    $poster = $_SESSION['user_id'];
    // Apply Insertion Query
    $sql = "INSERT INTO posts (post_caption, post_public, post_for, post_time, post_by)
            VALUES ('$caption', '$public', '$for', NOW(), $poster)";
    $query = mysqli_query($conn, $sql);
    // Action on Successful Query
    if($query){
        // Upload Post Image If a file was choosen
        if (!empty($_FILES['fileUpload']['name'])) {
            echo '';
            // Retrieve Post ID
            $last_id = mysqli_insert_id($conn);
            include 'functions/upload.php';
        }
        header("location: home.php");
    }
}
?>
