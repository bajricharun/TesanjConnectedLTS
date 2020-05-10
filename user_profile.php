<?php 
require 'functions/functions.php';
session_start();
ob_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();
?>
<?php include 'functions/upload.php'; ?>

<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user_id']) {
    $current_id = $_GET['id'];
    $flag = 1;
} else {
    $current_id = $_SESSION['user_id'];
    $flag = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil | TC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="resources/css/profile.css">

</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1 id='h11'>Profil</h1>
        <?php
        $postsql;
        if($flag == 0) { // Your Own Profile       
            $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                posts.post_public, users.user_id, users.user_gender, users.user_nickname, users.user_email,
                                users.user_birthdate, users.user_hometown, users.user_status, users.user_about, users.user_education,
                                posts.post_id
                        FROM posts
                        JOIN users
                        ON users.user_id = posts.post_by
                        WHERE posts.post_by = $current_id
                        ORDER BY posts.post_time DESC";
            $profilesql = "SELECT users.user_id, users.user_gender, users.user_hometown, users.user_qual, users.user_email, users.user_status, users.user_birthdate,
                                 users.user_firstname, users.user_lastname, users.user_about, users.user_job, users.user_education
                          FROM users
                          WHERE users.user_id = $current_id";
            $profilequery = mysqli_query($conn, $profilesql);

        } else { // Another Profile ---> Retrieve User data and friendship status
            $profilesql = "SELECT users.user_id, users.user_gender, users.user_hometown, users.user_qual, users.user_status, users.user_birthdate,users.user_email,
                                    users.user_firstname, users.user_lastname, users.user_about, users.user_job, users.user_education
                            FROM users WHERE users.user_id = $current_id";
            $profilequery = mysqli_query($conn, $profilesql);
            $row = mysqli_fetch_assoc($profilequery);
            mysqli_data_seek($profilequery,0);
            if(isset($row['friendship_status'])){ // Either a friend or requested as a friend
                if($row['friendship_status'] == 1){ // Friend
                    $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                        posts.post_public, users.user_id, users.user_gender, users.user_nickname, users.user_qual,
                                        users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                        posts.post_id
                                FROM posts
                                JOIN users
                                ON users.user_id = posts.post_by
                                WHERE posts.post_by = $current_id
                                ORDER BY posts.post_time DESC";
                }
                else if($row['friendship_status'] == 0){ // Requested as a Friend
                    $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                        posts.post_public, users.user_id, users.user_gender, users.user_nickname,
                                        users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                        posts.post_id
                                FROM posts
                                JOIN users
                                ON users.user_id = posts.post_by
                                WHERE posts.post_by = $current_id AND posts.post_public = 'Y'
                                ORDER BY posts.post_time DESC";
                }
            } else { // Not a friend
                $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                    posts.post_public, users.user_id, users.user_gender, users.user_nickname, users.user_qual,
                                    users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                    posts.post_id
                            FROM posts
                            JOIN users
                            ON users.user_id = posts.post_by
                            WHERE posts.post_by = $current_id AND posts.post_public = 'Y'
                            ORDER BY posts.post_time DESC";
            }
        }
        
        $postquery = mysqli_query($conn, $postsql);    
        
        
        if($postquery){
            // Posts
            $width = '40px'; 
            $height = '40px';
            if(mysqli_num_rows($postquery) == 0){ // No Posts
                if($flag == 0){ // Message shown if it's your own profile
                    echo '<div class="post">';
                    echo 'Još uvijek nemate objava ili su Vam zabranjene.';
                    echo '</div>';
                    
                } else { // Message shown if it's another profile other than you.
                    echo '<div class="post">';
                    echo 'Ovaj korisnik nema objava ili su mu blokirane.';
                    echo '</div>';
                }
                include 'includes/profile.php';
                if ($flag==0) {
                    echo '<div class="forms">';
                    echo "<form method='post' id='specialForm' action='' onsubmit='return validatePost()' enctype='multipart/form-data'>";
                    echo '<p class="intro-text">Objavite dodatni CV sa potvrdama o certifikatima i sa preporukama od prethodnih poslodavaoca. </p>';
                    echo '<input type="file" name="fileUpload" id="file" style="display: block">';
                    echo "<input type='submit' value='Objavi' name='profile' style='color:white;'>";
                    echo "</form>";
                    echo "<form method='post' id='specialForm' action='' onsubmit='return validatePost()' enctype='multipart/form-data'>";
                    echo '<p class="intro-text">Objavite ili promijenite sliku profila, molimo Vas, koristite samo JPG, PNG, JPEG i GIF formate.</p>';
                    echo "<input type='file' name='fileUpload' id='file' style='display: block'>";
                    echo "<input type='submit' value='Promijeni sliku' name='pic' style='color:white;'>";
                    echo "</form>";
                    echo '</div>';
                }
            } else {
                
                include 'includes/profile.php';
 
                if ($flag==0) {
                    echo '<div class="forms">';
                    echo "<form method='post' id='specialForm' action='' onsubmit='return validatePost()' enctype='multipart/form-data'>";
                    echo '<p class="intro-text">Objavite dodatni CV sa potvrdama o certifikatima i sa preporukama od prethodnih poslodavaoca. </p>';
                    echo '<input type="file" name="fileUpload" id="file" style="display: block">';
                    echo "<input type='submit' value='Objavi' name='profile' style='color:white;'>";
                    echo "</form>";
                    echo "<form method='post' id='specialForm' action='' onsubmit='return validatePost()' enctype='multipart/form-data'>";
                    echo '<p class="intro-text">Objavite ili promijenite sliku profila, molimo Vas, koristite samo JPG, PNG, JPEG i GIF formate.</p>';
                    echo "<input type='file' name='fileUpload'  id='file' style='display: block' >";
                    echo "<input type='submit' value='Promijeni sliku' name='pic' style='color:white;'>";
                    echo "</form>";
                    echo '</div>';
                }
                while($row = mysqli_fetch_assoc($postquery)){
                    include 'includes/post.php';
                }
                // Profile Info
                ?>
                <br>
                <?php
            }
        }

        ?>
        <?php 

        ?>
    </div>
    
</body>
<script>
function showPath(){
    var path = document.getElementById("selectedFile").value;
    path = path.replace(/^.*\\/, "");
    document.getElementById("path").innerHTML = path;
}
function validateNumber(){
    var number = document.getElementById("phonenum").value;
    var required = document.getElementsByClassName("required");
    if(number == ""){
        required[0].innerHTML = "You must type Your Number.";
        return false;
    } else if(isNaN(number)){
        required[0].innerHTML = "Phone Number must contain digits only."
        return false;
    }
    return true;
}
</script>
</html>
