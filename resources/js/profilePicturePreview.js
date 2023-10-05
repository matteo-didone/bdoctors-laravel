document.addEventListener('DOMContentLoaded', function() {
    // console.log("DOM loaded");  // Check if this logs

    const container = document.getElementById('profilePictureContainer');
    const fileInput = document.getElementById('profileInput');
    const profileImg = document.getElementById('profilePictureDisplay');

    container.addEventListener('click', function(event) {
        // console.log("container clicked");
        event.stopPropagation();  // prevent event from being propagated further
        fileInput.click();
    });


    fileInput.addEventListener('change', function() {
        // console.log("File input changed");  // Check if this logs
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
