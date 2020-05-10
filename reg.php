<?php 
require 'functions/functions.php';
session_start();
if (isset($_SESSION['user_id'])) {
    header("location:home.php");
}
session_destroy();
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>TC | Registracija</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
    <link rel="stylesheet" type='text/css' href='./resources/css/reg.css' />
</head>

<body>
    <div class='thin-head'>
        <img src="./resources/images/tclogo111.png" class="logo">
    </div>
    <div class="form-wrap">
    <form method="post" onsubmit="return validateRegister()">
            <h1>Registracija</h1>
                    <h2>Potrebne informacije su označene sa *</h2>
                    <hr>
                    <label>Ime<span>*</span></label><br>
                    <input type="text" name="userfirstname" id="userfirstname" required>
                    <div class="required"></div>
                    <br>
                    <label>Prezime<span>*</span></label><br>
                    <input type="text" name="userlastname" id="userlastname" required>
                    <div class="required"></div>
                    <br>
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail" required>
                    <div class="required"></div>
                    <br>
                    <label>Šifra<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass" required>
                    <div class="required"></div>
    
                    <br>
                    <br>
                    Datum rođenja<span>*</span><br>
                    <select name="selectday">-->
                    <?php
                    for($i=1; $i<=31; $i++){
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <select name="selectmonth">
                    <?php
                    echo '<option value="1">Januar</option>';
                    echo '<option value="2">Februar</option>';
                    echo '<option value="3">Mart</option>';
                    echo '<option value="4">April</option>';
                    echo '<option value="5">Maj</option>';
                    echo '<option value="6">Juni</option>';
                    echo '<option value="7">Juli</option>';
                    echo '<option value="8">August</option>';
                    echo '<option value="9">Septembar</option>';
                    echo '<option value="10">Oktobar</option>';
                    echo '<option value="11">Novemebar</option>';
                    echo '<option value="12">Decembar</option>';
                    ?>
                    </select>
                    <select name="selectyear">
                    <?php
                    for($i=2017; $i>=1900; $i--){
                        if($i == 1996){
                            echo '<option value="'. $i .'" selected>'. $i .'</option>';
                        }
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <br><br>
                    <!--Gender-->
                    <div class="radio">
                    <label>M</label><br>
                    <input type="radio" name="usergender" value="M" id="malegender" class="usergender" required>
                    <br><label>Ž</label><br>
                    <input type="radio" name="usergender" value="F" id="femalegender" class="usergender" required>
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Mjesto stanovanja</label><br>
                    <input type="text" name="userhometown" id="userhometown" required>
                    <br>
                    <!--Package Two-->
                    <h2>Dodatne informacije</h2>
                    <hr>
                    <!--Subjects Status-->
                    <label>Vaše obrazovanje</label><br>
                    <input type="text" name="education" placeholder="Npr. Fakultet elektrotehnike" required>
                    <br>
                    <label>Zaposlen</label>
                    <input type="radio" name="userstatus" value="S" id="singlestatus" required>
                    <label>Nezaposlen</label>
                    <input type="radio" name="userstatus" value="E" id="engagedstatus" required>
                    <label>Učenik/Student</label>
                    <input type="radio" name="userstatus" value="M" id="marriedstatus" required>
                    <br><br>
                    <h3><label>Vaš posao</label></h3><br>
                    <input type='text' name='user_job' placeholder='Vas posao' required><br><br>
                    <h3><label>Vaše kvalifikacije</label></h3><br>
                    <label>Nekvalificirani  radnik (NK) </label><br>
                    <input type='radio' name='qval' value='NK' required><br> 
                    <label>Polukvalificirani radnik (PKV)</label><br>
                    <input type='radio' name='qval' value='PK' required><br> 
                    <label>Kvalificirani radnik - KV </label><br>
                    <input type='radio' name='qval' value='K' required><br> 
                    <label>Srednja stručna sprema –  IV. stepen </label><br>
                    <input type='radio' name='qval' value='SK' required><br> 
                    <label>Visokokvalificiran radnik - VKV </label><br>
                    <input type='radio' name='qval' value='VKV' required><br> 
                    <label>Viša stručna sprema - VŠS</label><br>
                    <input type='radio' name='qval' value='OS' required><br> 
                    <label>Visoka stručna sprema - VSS</label><br>
                    <input type='radio' name='qval' value='VSS' required><br> 
                    <label>Magistar specijalist </label><br>
                    <input type='radio' name='qval' value='MS' required><br> 
                    <label>Magistar nauka </label><br>
                    <input type='radio' name='qval' value='MN' required><br> 
                    <label>Doktor  nauka  </label><br>
                    <input type='radio' name='qval' value='DN' required><br>
                    <br><br> 
                    <h3><label>Radnik ili firma</label></h3><br>
                    <label>Radnik</label><br>
                    <input type="radio" name="stat" value="R" id="radnik" required><br>
                    <label>Firma</label><br>
                    <input type="radio" name="stat" value="P" id="poslodavaoc" required><br><br>
                    <div class="required"></div>
                    </div>
                    <!--About Me-->

                    <h3><label>O meni/CV</label></h3><br>
                    <textarea rows="12" name="userabout" id="userabout" required></textarea>
                    <br><br>
                    <p id='policy'><input type='checkbox' required>Sa ovim prihvaćate uvjete korištenja definisane sa <a href='./Privacy&Policy/privacy&policy.html'>pravilima korištenja</a>.</p>
                    <br><br>
                    <input type="submit" value="Podnesi prijavu" name="register" id='submit'>
                </form>


    </div>
</body>


</html>
<?php
$conn = connect();
    if (isset($_POST['register'])) { // Register process
        // Retrieve Data
        $usereducation = $_POST['education'];
        $userfirstname = $_POST['userfirstname'];
        $userlastname = $_POST['userlastname'];
        $userpassword = md5($_POST['userpass']);
        $confirm = md5($_POST['userpassconfirm']);https://start.fedoraproject.org/
        $useremail = $_POST['useremail'];
        $userbirthdate = $_POST['selectyear'] . '-' . $_POST['selectmonth'] . '-' . $_POST['selectday'];
        $usergender = $_POST['usergender'];
        $userhometown = $_POST['userhometown'];
        $userabout = $_POST['userabout'];
        $stat = $_POST['stat'];
        $qual = $_POST['qval'];
        $userjob = $_POST['user_job'];
        if (isset($_POST['userstatus'])){
            $userstatus = $_POST['userstatus'];
        }
        else{
            $userstatus = NULL;
        }
        // Check for Some Unique Constraints
        $query = mysqli_query($conn, "SELECT * FROM users WHERE  user_email = '$useremail'");
        if(mysqli_num_rows($query) > 0){
                ?> <script>
                alert("Ovaj Email se već koristi.");
                </script> <?php
        }
        else {
        // Insert Data
        $sql = "INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status, user_stat, user_about, user_hometown, user_job, user_qual, user_education)
                VALUES ('$userfirstname', '$userlastname', '$usernickname', '$userpassword', '$useremail', '$usergender', '$userbirthdate', '$userstatus', '$stat', '$userabout', '$userhometown', '$userjob', '$qual', '$usereducation')";
        $query = mysqli_query($conn, $sql);

        if ($stat == "P") {
            if($query){
            $_SESSION['user_id'] = $row1['user_id'];
                header("location:adminPass.php");
            }
        } else {
            if($query){
                $query1 = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
                $row1 = mysqli_fetch_assoc($query1);
                $_SESSION['user_id'] = $row1['user_id'];
                header("location:home.php");
            }
        }
    }
}

?>
