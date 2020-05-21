
<div id="userFeed" class="userFeed">

<?php
    require "uploadFeedForm.php";
    require "profilePicForm.php";
    require "profileBioForm.php";
    

    echo '<div id="getFeed">';
    require "php/getFeed.php";
    echo '</div>';

    echo '<div id="getUserFeed" style="display: none">';
    require "php/getUserFeed.php";
    echo '</div>';
?>

</div>