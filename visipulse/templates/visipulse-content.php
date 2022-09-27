<?php
//if this file is called directly, abort.
if (! defined ('ABSPATH')) {
    die;
}
?>

<div class="visitor-content" style="background-color: lightskyblue;">
<?php echo get_the_content(); ?>
</div>