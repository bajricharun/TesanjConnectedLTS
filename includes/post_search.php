<?php

echo '<div class="post">';
if($row['post_public'] == 'Y') {
    echo '<div class="info">';
    echo '<p class="public">';
    echo 'Javna objava</p>';
}else {
    echo '<div class="info">';
    echo '<p class="public">';
    echo 'Javna objava</p>';
}
if (!empty($row['post_for'])) {
    echo '<p> Struka potrebna za ovaj posao: '  . $row['post_for'] . '</p>';
}
else {
    echo '<p>Poslodavaoc nije naveo potrebnu struku za ovaj posao.</p>';
    
}
echo '<br><a class="profilelink" href="user_profile.php?id=' . $row['user_id'] .'">' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '</a>';
echo'</div>';
echo '<div class="content">';
echo '<br>';
echo '<p class="caption">' . $row['post_caption'] . '</p>';
echo '<center>'; 
$target = glob("data/images/posts/" . $row['post_id'] . ".*");
if($target) {
    echo '<a href="'. $target[0] . '" ><img src="' . $target[0] . '" id="image"></a>'; 
    echo '<br><br>';
}

echo '</center>';

echo '</div>';
echo '</div>';
?>
