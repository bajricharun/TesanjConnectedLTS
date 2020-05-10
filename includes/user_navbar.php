<head>
<link rel="icon" href="./resources/images/tclogo_16x16.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../resources/css/navbar1.css">
</head>

    <?php
        $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
<div class="navbar">

        <ul> <!-- Ensure there are no enter escape characters.-->
                <a href="../homework.php"><img class="logo" src="../resources/images/tclogo111.png"></a>
                <a href="../logout.php"><i class="fa fa-sign-out"></i></a>
                <a href="../user_profile.php"><i class="fa fa-user"></i></a>
                <div class="icons">
                <a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-bars"></i></a>
                    <div id="drp-content">
                        <div id="main">
                            <div class="text"><a href="../user_profile.php">Profil</a></div>
                            <div class="text"><a href="../homework.php">Vremenska crta</a></div>
                            <div class="text"><a href="../logout.php">Odjavi se</a></div>
                        </div>
                    </div>
                </div>

        </ul><div class="globalsearch">
        <form method="get" action="search.php" onsubmit="return validateField()" > <!-- Ensure there are no enter escape characters.-->
        <input type="text" placeholder="Trazi"  name="query" id="query"><input type="submit" value="Pretrazi" id="querybutton">
        </form>
    </div>

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