
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" onsubmit="return validateLogin()">
            <h1>Prijava</h1>
            <input type="email" name="adminemail" id="adminemail" placeholder="E-mail">
            <input type="password" placeholder="Lozinka" name="adminpwd" id="adminpwd">
            <input type="submit" value="Prijavi se" name="login">
    </form>
    <?php
            $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$useremail' AND user_password = '$userpass'");
            if (isset($_POST['login']) && !empty($_POST['adminemail']) 
               && !empty($_POST['adminpwd'])) {
               if ($_POST['adminemail'] == 'harunbajric@protonmail.com' && $_POST['adminpwd'] == 'harun123') {
                    $row = mysqli_fetch_assoc($query);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_firstname'] . " " . $row['user_lastname'];
                    header("location:login.php");
                }
                else {
                    echo "Not cool";
                }
            }
?>
</body>
</html>