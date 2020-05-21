<form action="php/uploadFeedPic.php" id="feedUpload" style="display: none;" method="POST" enctype="multipart/form-data">
    <!-- <div class="uploadBtn"> -->
        <br>
        <p>Upload Image:</p>
        <br>
        <input type="file" name="fileToUpload" id="img" style="display:none;">
        <label for="img" class="customFileInput"></label>
        <input type="submit" onclick="showFeed()">
        <br><br>
        <textarea name="text" placeholder="Description..."></textarea>
        <br>
    <!-- </div> -->
        <br><br>
            <button type="button" onclick="showFeed()">Cancel</button>
        <br><br>
</form>
