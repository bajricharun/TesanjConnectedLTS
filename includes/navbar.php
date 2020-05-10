<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="../resources/images/tclogo_16x16.png" type="image/x-icon"/>
<link rel="stylesheet" href="../resources/css/navbar.css">
</head>
<body>

<div class="navbar">
<?php
        $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
        <ul> <!-- Ensure there are no enter escape characters.-->
         <a href='home.php'><img class="logo" src="../resources/images/tclogo111.png"></a>
            <div class="icons">
                <a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-bars"></i></a>
            <div id="drp-content">
                <div id="main" class="w3-container w3-center w3-animate-left">
                    <div class="text first"><a href="../user_profile.php">Profil</a></div>
                    <div class="text"><a href="../home.php">Vremenska crta</a></div>
                    <div class="text"><a href="../logout.php">Odjavi se</a></div>
                    <div class='text'><a href='javascript:void(0);' onclick="myFunction()">Natrag</a></div>
                    <form method="get" action="search.php" onsubmit="return validateField()" >
                        
                        <select name="location">
                        <option value="names">Pretraga radnika</option>
                        <option value="posts">Pretraga objava</option>
                        </select> <!-- Ensure there are no enter escape characters.-->
                        <input type="text" placeholder="Traži"  name="query" id="query">
                        <input type="submit" value="Pretraži" id="querybutton">
                    </form>
                </div>
            </div>
        </ul>

</div>    


<script>
function validateField(){
    var query = document.getElementById("query");
    var button = document.getElementById("querybutton");
    if(query.value == "") {
        query.placeholder = 'Upisite nesto!';
        return false;
    }
    return true;
}
</script>   
<script src="../resources/javascript/drpdwn.js"></script>
</body>
</html> 
