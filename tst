<!--            <div class="tabcontent" id="signin">
                <form method="post" onsubmit="return validateLogin()">
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="loginuseremail">
                    <div class="required"></div>
                    <br>
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="loginuserpass">
                    <div class="required"></div>
                    <br><br>
                    <input type="submit" value="Login" name="login">
                </form>

            </div>
                            -->
                            <!--
            <div class="tabcontent" id="signup">
                <form method="post" onsubmit="return validateRegister()">
                    <h2>Highly Required Information</h2>
                    <hr>
                    <label>First Name<span>*</span></label><br>
                    <input type="text" name="userfirstname" id="userfirstname">
                    <div class="required"></div>
                    <br>
                    <label>Last Name<span>*</span></label><br>
                    <input type="text" name="userlastname" id="userlastname">
                    <div class="required"></div>
                    <br>
                    <label>Nickname</label><br>
                    <input type="text" name="usernickname" id="usernickname">
                    <div class="required"></div>
                    <br>
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass">
                    <div class="required"></div>
                    <br>
                    <label>Confirm Password<span>*</span></label><br>
                    <input type="password" name="userpassconfirm" id="userpassconfirm">
                    <div class="required"></div>
                    <br>
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail">
                    <div class="required"></div>
                    <br>
                    Birth Date<span>*</span><br>
                    <select name="selectday">-->
                    <?php
                    for($i=1; $i<=31; $i++){
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <select name="selectmonth">
                    <?php
                    echo '<option value="1">January</option>';
                    echo '<option value="2">February</option>';
                    echo '<option value="3">March</option>';
                    echo '<option value="4">April</option>';
                    echo '<option value="5">May</option>';
                    echo '<option value="6">June</option>';
                    echo '<option value="7">July</option>';
                    echo '<option value="8">August</option>';
                    echo '<option value="9">September</option>';
                    echo '<option value="10">October</option>';
                    echo '<option value="11">Novemeber</option>';
                    echo '<option value="12">December</option>';
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
                    <input type="radio" name="usergender" value="M" id="malegender" class="usergender">
                    <label>Male</label>
                    <input type="radio" name="usergender" value="F" id="femalegender" class="usergender">
                    <label>Female</label>
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Hometown</label><br>
                    <input type="text" name="userhometown" id="userhometown">
                    <br>
                    <!--Package Two-->
                    <h2>Additional Information</h2>
                    <hr>
                    <!--Marital Status-->
                    <input type="radio" name="userstatus" value="S" id="singlestatus">
                    <label>Single</label>
                    <input type="radio" name="userstatus" value="E" id="engagedstatus">
                    <label>Engaged</label>
                    <input type="radio" name="userstatus" value="M" id="marriedstatus">
                    <label>Married</label>
                    <br><br>
                    <!--About Me-->
                    <label>About Me</label><br>
                    <textarea rows="12" name="userabout" id="userabout"></textarea>
                    <br><br>
                    <input type="submit" value="Create Account" name="register">
                </form>body{
    background-image: url("./background/gradina.jpg");
    background-size: cover;
    overflow-x: hidden;
}
a {
    color: black;
    text-decoration: none;
}
.navbar {
    overflow: hidden;
    background-color: #2c3039;
    width: 110%;
    height: 15%;
    margin-top: -1.5%;
    margin-left: -9%;
}
.search{
    margin-left: 43.7%;
    margin-top: -5.8%;
    width: 50%;
}
.logo{
    width: 15%;
    height: 19%;
    margin-left: -1%;
    margin-top: -7.5%;
}

i.fa.fa-user{
    font-size: 2vw;
    margin-left: 90%;
    margin-top: -2.3%;

}
i.fa.fa-bell{
    font-size: 2vw;
    margin-left: 93%;
    margin-top: -2.3%;
}
i.fa.fa-search{
    font-size: 2vw;
    margin-left: 55.4%;
    margin-top: -2.3%;
}
i.fa.fa-gears {
    font-size: 2vw;
    margin-top: -2.3%;
}
.fa-bars{
    display: none;
}
.button5{
    margin-top: -100%;
    display: none;
}
#timeline{
    margin-top: 5%;
    margin-left: 3%;
    background-color: #757575;
    opacity: 0.9;
    border-radius: 5%;
    border: 2px solid black;
    height: 80%;
    width: 70%;
}
h3{
    text-align: center;
    padding: 2%;
}
p{
    text-align: center;
}
.hotnews{
    margin-top: -38.3%;
    margin-left: 75%;
    background-color: #757575;
    opacity: 0.9;
    border-radius: 5%;
    border: 2px solid black;
    height: 80%;
    width: 25%;
}

#drp-content {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: aliceblue;
}
#notifications {
    display: none;
}

/*POSTAVKEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/


.postavke{
    background: #2c3039;
    height: 50%;
    width: 70%;
    text-align: center;
    margin-left: 14%;
    margin-top: 5%;
    opacity: 0.8888;
}
.naslov{
    background: white;
    
    
}
.promjeni{
    font-size: 50px;
    color: white;
}
.form{
    display: flex;
    flex-direction: column;
    color: white;
    width: 20%;
    align-items: center;
    margin-left: 40%;
    font-size: 25px;
}




































@media only screen and (max-width:768px){
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
        background-repeat: no-repeat ;
        height: 100%;
        background-position-x: 30%;
    }
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    .text a {
        color:white;        
        font-size: 5vw;
    }
    .navbar{
        margin-top: -3%;
        margin-left: -3%;
        width: 110%;
        height: 10%;
    }
    .logo{
        width: 35%;
        height: 14%;
        margin-top: -15%;
        margin-left: -10%;
    }
    .search{
        display: none;
    }
    .fa-gears{
        display:none;
        margin-left: 68%;
        margin-top: -10%;
    }
    .fa-user{
        display: none;
        margin-left: -12%;
        margin-top: -9.8%;
    }
    .fa-bell{
        display: none;
        margin-left: -11%;
        margin-top: -9.5%;
    }
    .fa-search{
        display: none;
        font-size: 140%;
        margin-left: 87%;
        margin-top: -11.4%;
    }
    .fa-bars{
        display: block;
        font-size: 140%;
        margin-left: 95%;
        margin-top: -11.4%;
    }
    #timeline{
        width: 93%;
        margin-top: 10%;
    }
    .hotnews{
        display: none;
    }
    #notifications {
        display: none;
    }
}
@media only screen and (max-width:360px){
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
        background-repeat: no-repeat ;
        height: 100%;
        background-position-x: 30%;
    }
    .text a {
        color:white;     
        font-size: 5vw;
    }
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    .navbar{
        margin-top: -3%;
        margin-left: -3%;
        width: 110%;
        height: 10%;
    }
    .logo{
        width: 39%;
        height: 12%;
        margin-top: -23%;
        margin-left: -10%;
    }
    .search{
        display: none;
    }
    .fa-gears{
        display:none;
        margin-left: 68%;
        margin-top: -10%;
    }
    .fa-user{
        display: none;
        margin-left: -12%;
        margin-top: -9.8%;
    }
    .fa-bell{
        display: none;
        margin-left: -11%;
        margin-top: -9.5%;
    }
    .fa-search{
        font-size: 140%;
        margin-left: 78%;
        margin-top: -16%;
    }
    .fa-bars{
        display: block;
        font-size: 140%;
        margin-left: 90%;
        margin-top: -14.7%;
    }
    #timeline{
        width: 93%;
        margin-top: 10%;
    }
    .hotnews{
        display: none;
    }
    #notifications {
        display: none;
    }
}
@media only screen and (max-width:375px){
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
        background-repeat: no-repeat ;
        height: 100%;
        background-position-x: 30%;
    }
    .text a {
        color:white;       
        font-size: 5vw;
    }
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    .navbar{
        margin-top: -3%;
        margin-left: -3%;
        width: 110%;
        height: 10%;
    }
    .logo{
        width: 39%;
        height: 12%;
        margin-top: -20%;
        margin-left: -10%;
    }
    .search{
        display: none;
    }
    .fa-gears{
        display:none;
        margin-left: 68%;
        margin-top: -10%;
    }
    .fa-user{
        display: none;
        margin-left: -12%;
        margin-top: -9.8%;
    }
    .fa-bell{
        display: none;
        margin-left: -11%;
        margin-top: -9.5%;
    }
    .fa-search{
        font-size: 140%;
        margin-left: 78%;
        margin-top: -16%;
    }
    .fa-bars{
        display: block;
        font-size: 140%;
        margin-left: 90%;
        margin-top: -14.7%;
    }
    #timeline{
        width: 93%;
        margin-top: 10%;
    }
    .hotnews{
        display: none;
    }
    #notifications {
        display: none;
    }
}
@media only screen and (max-width:414px){
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
        background-repeat: no-repeat ;
        height: 100%;
        background-position-x: 30%;
    }
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    .text a {
        color:white;
        font-size: 5vw;
    }
    .navbar{
        margin-top: -3%;
        margin-left: -3%;
        width: 110%;
        height: 10%;
    }
    .logo{
        width: 39%;
        height: 12%;
        margin-top: -20%;
        margin-left: -10%;
    }
    .search{
        display: none;
    }
    .fa-gears{
        display:none;
        margin-left: 68%;
        margin-top: -10%;
    }
    .fa-user{
        display: none;
        margin-left: -12%;
        margin-top: -9.8%;
    }
    .fa-bell{
        display: none;
        margin-left: -11%;
        margin-top: -9.5%;
    }
    .fa-search{
        font-size: 140%;
        margin-left: 78%;
        margin-top: -16%;
    }
    .fa-bars{
        display: block;
        font-size: 140%;
        margin-left: 90%;
        margin-top: -14.7%;
    }
    #timeline{
        width: 93%;
        margin-top: 10%;
    }
    .hotnews{
        display: none;
    }
    #notifications {
        display: none;
    }
}
@media only screen and (max-width:375px) and (max-height:812px){
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
        background-repeat: no-repeat ;
        height: 100%;
        background-position-x: 30%;
    }
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    .navbar{
        margin-top: -3%;
        margin-left: -3%;
        width: 110%;
        height: 10%;
    }
    .text a {
        color:white;
        font-size: 5vw;
    }
    .logo{
        width: 39%;
        height: 12%;
        margin-top: -20%;
        margin-left: -10%;
    }
    .search{
        display: none;
    }
    .fa-gears{
        display:none;
        margin-left: 68%;
        margin-top: -10%;
    }
    .fa-user{
        display: none;
        margin-left: -12%;
        margin-top: -9.8%;
    }
    .fa-bell{
        display: none;
        margin-left: -11%;
        margin-top: -9.5%;
    }
    .fa-search{
        font-size: 140%;
        margin-left: 78%;
        margin-top: -16%;
    }
    .fa-bars{
        display: block;
        font-size: 140%;
        margin-left: 90%;
        margin-top: -14.7%;
    }
    #timeline{
        width: 93%;
        margin-top: 10%;
    }
    .hotnews{
        display: none;
    }
    #notifications {
        display: none;
    }
}

@media (min-height: 800px) and (min-width: 1900px) {
    body{
        background-image: url("./background/gradina.jpg");
        background-size: cover;
    }
    .navbar {
        overflow: hidden;
        background-color: #2c3039;
        width: 110%;
        height: 15%;
        margin-top: -1.5%;
        margin-left: -9%;
    }
    .search{
        margin-left: 43.7%;
        margin-top: -5%;
        width: 50%;
    }
    .logo{
        width: 15%;
        height: 19%;
        margin-left: -1%;
        margin-top: -7.5%;
    }
    .fa-gears{
        font-size: 190%;
        margin-left: 96%;
        margin-top: -2.7%;
    }
    .fa-user{
        font-size: 190%;
        margin-left: -7%;
        margin-top: -2.7%;
    }
    .fa-bell{
        font-size: 190%;    
        margin-left: -7%;
        margin-top: -2.7%;
    }
    .fa-search{
        font-size: 190%;
        margin-left: -29%;
        margin-top: -2.7%;
    }
    .fa-bars{
        display: none;
    }

    .timeline{
        margin-top: 5%;
        margin-left: 3%;
        background-color: #757575;
        opacity: 0.9;
        border-radius: 5%;
        border: 2px solid black;
        height: 80%;
        width: 70%;
    }
    h3{
        text-align: center;
        padding: 2%;
    }
    p{
        text-align: center;
    }
    .hotnews{
        margin-top: -40.7%;
        margin-left: 75%;
        background-color: #757575;
        opacity: 0.9;
        border-radius: 5%;
        border: 2px solid black;
        height: 80%;
        width: 25%;
    }    
    #drp-content {
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: aliceblue;
    }
    #notifications {
        display: none;
    }
}


