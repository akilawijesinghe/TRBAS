<?php

if ($error) {
    echo '<div class="alert alert-danger">' . $error . '</div>';
} else {

?>

    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" controls>
            <source src="<?= $video_path ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
<?php } ?>