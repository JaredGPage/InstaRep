
    <div id="userProfile" class="userProf">
        
        <?php
            $user = $_SESSION["username"];
            // require "php/getPimage.php";
            echo "<img style='height:130px;width:130px;border-radius:100px;border:1px solid black;' src='profileUploads/".$_SESSION["image"]."'>";
        ?>
        
        <div class="bio">
            <?php
                echo '<h3>@'.$user.'</h3>';
                echo '<p>'.$_SESSION["bio"].'</p>';
            ?>
        </div>

        <div id="editBtn">
            <button type="button" id="upprofile" onclick="showUploadPf()">Edit</button>
        </div>
        <div id="editBtnSettings">
            <a onclick="showFeed()"><img src="settings2.png" style="width:50px;height:50px;"></a>
        </div>
              
    </div>
    <br>
    
