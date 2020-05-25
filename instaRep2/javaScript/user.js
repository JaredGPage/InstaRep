function showUploadPf() {
    document.getElementById("feedUpload").style.display = "none";
    document.getElementById("profUpload").style.display = "block";
    document.getElementById("getFeed").style.display = "none";
    document.getElementById("profUploadBio").style.display = "block";
    document.getElementById("getUserFeed").style.display = "none";
}

function showFeed() {
    document.getElementById("feedUpload").style.display = "none";
    document.getElementById("profUpload").style.display = "none";
    document.getElementById("getFeed").style.display = "block";
    document.getElementById("profUploadBio").style.display = "none";
    document.getElementById("getUserFeed").style.display = "none";
}

function showUploadFeed() {
    document.getElementById("feedUpload").style.display = "block";
    document.getElementById("profUpload").style.display = "none";
    document.getElementById("getFeed").style.display = "none";
    document.getElementById("profUploadBio").style.display = "none";
    document.getElementById("getUserFeed").style.display = "none";
}

function showUserFeed() {
    document.getElementById("feedUpload").style.display = "none";
    document.getElementById("profUpload").style.display = "none";
    document.getElementById("getFeed").style.display = "none";
    document.getElementById("profUploadBio").style.display = "none";
    document.getElementById("getUserFeed").style.display = "block";
}

function logout() {
    var r = confirm("Do you really want to logout?");
    if(r){
        window.location.href = "php/logout.php";
    }
}