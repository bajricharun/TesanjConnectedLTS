<?php
echo '<div class="profile">';
echo '<center>';
$row = mysqli_fetch_assoc($profilequery);
// Name and Nickname
if(!empty($row['user_nickname']))
    echo $row['user_firstname'] . ' ' . $row['user_lastname'] . ' (' . $row['user_nickname'] . ')';
else
    echo '<h1>' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '</h1>';
// Profile Info & View
$width = '168px';
$height = '168px';
echo '<div id="profile-pic" style="float:left;">';
include 'includes/profile_picture.php';
echo '</div>';
// Gender
echo '<div id="profile-info">';

echo  "<p><b>Kontakt:</b> " . $row['user_email'] . '</p>';
if($row['user_gender'] == "M")
    echo '<p><b>Spol:</b> Muško</p>';
else if($row['user_gender'] == "F")
    echo '<p><b>Spol:</b> Žensko</p>';
// Status
    if($row['user_qual'] == 'NK') {
        echo '<p><b>Kvalifikacije: </b>Nekvalificirani radnik</p>';
    }
    else if ($row['user_qual'] == 'PK') {
        echo '<p><b>Kvalifikacije: </b>Polukvalificirani radnik</p>';
    }
    else if ($row['user_qual'] == 'K') {
        echo '<p><b>Kvalifikacije: </b>Kvalificirani radnik</p>';
    }
    else if ($row['user_qual'] == 'SK') {
        echo '<p><b>Kvalifikacije:</b> Srednja stručna sprema - IV. stepen</p>';
    }
    else if ($row['user_qual'] == 'VKV') {
        echo '<p><b>Kvalifikacije:</b>Visokokvalificirani radnik</p>';
    }
    else if ($row['user_qual'] == 'OS') {
        echo '<p><b>Kvalifikacije:</b>Viša stručna sprema</p>';
    }
    else if ($row['user_qual'] == 'VSS') {
        echo '<p><b>Kvalifikacije:</b>Visoka stručna sprema</p>';
    }
    else if ($row['user_qual'] == 'MS') {
        echo '<p><b>Kvalifikacije:</b> Magistar specijalist</p>';
    }
    else if ($row['user_qual'] == 'MN') {
        echo '<p><b>Kvalifikacije:</b>Magistar nauka</p>';
    }
    else if ($row['user_qual'] == 'DN') {
        echo '<p><b>Kvalifikacije:</b>Doktor nauka</p>';
    }
echo '<p><b>Posao</b>: ' . $row['user_job'] . '</p>';
if(!empty($row['user_status'])){
    if($row['user_status'] == "S")
        echo '<p><b>Status zaposlenja:</b> Zaposlen</p>';
    else if($row['user_status'] == "E")
        echo '<p><b>Status zaposlenja:</b> Nezaposlen</p>';
    else if($row['user_status'] == "M")
        echo '<p><b>Status zaposlenja:</b> Student/Učenik</p>';
    echo '<p><b>O ' . $row['user_firstname'] .  ': '. '</b>' . $row['user_about'] . '</p>';

}
// Birthdate
// Additional Information
    echo '<p><b>Mjesto stanovanja:</b> ' . $row['user_hometown'] . '</p>';
    echo '<p><b>Obrazovanje: </b>'. $row['user_education'] . '</p>';


// Friendship Status
$target = glob("data/cv/" . $row['user_id'] . ".*");
if($target) {
    echo '<p>Dodatne informacije o korisniku možete preuzeti <a href="' . $target[0] . '" rel="noopener noreferrer" target="_blank" >ovdje.</a></p>'; 
} 

echo '</center>'; 
echo '</div>';
echo'</div>';

$query4 = mysqli_query($conn, "SELECT * FROM user_phone WHERE user_id = {$row['user_id']}");
if(!$query4){
    echo mysqli_error($conn);
}
if(mysqli_num_rows($query4) > 0){
        echo '<div class="profile hide">';
    echo '<center class="changeprofile">'; 
    echo 'Phones:';
        while($row4 = mysqli_fetch_assoc($query4)){
        echo $row4['user_phone'];
            }
    echo '</center>';
    echo '</div>';
}

?>
