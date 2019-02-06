<?php
$post_id = get_the_ID();
$like_count = (get_post_meta($post_id, "lj_like_wp", TRUE)) ? get_post_meta($post_id, "lj_like_wp", TRUE) : 0;
$cookie_name = 'lj_like_wp' . get_the_ID();
$cookie = $_COOKIE[$cookie_name];
$class = (isset($cookie)) ? "liked" : "";
?>
<section class="single-like d-flex align-items-center">
    <span class="flex-grow-0 label" >چه مقدار مفید می دانید</span>
    <span class="line flex-grow-1"></span><!--.line-->
    <div class="lj-like-wrapper">
        <a href="#" class="lj-like-wp <?php echo $class; ?>" title="<?php esc_attr_e("like this", "rng-ajaxlike"); ?>" >
            <?php if (isset($cookie)): ?>
                <i class="fa fa-thumbs-up"></i>
            <?php else: ?>
                <i class="fa fa-thumbs-o-up"></i>
            <?php endif; ?>
        </a>&nbsp;<span class="lj-post-like-count"><?php echo $like_count; ?></span>
    </div>
</section><!--.single-like-->