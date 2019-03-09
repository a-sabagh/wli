<?php
$post_id = get_the_ID();
$like_count = (get_post_meta($post_id, "lj_like_wp", TRUE)) ? get_post_meta($post_id, "lj_like_wp", TRUE) : 0;
?>
<article class="d-flex flex-wrap  post-item align-items-top">
    <div class="flex-grow-1 post-title" >
        <i class="fa fa-file-text-o"></i>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a>
    </div>
    <div class="post-meta d-flex flex-column text-md-left">
        <span class="date"><?php echo get_the_date(); ?></span>
        <span class="like"><?php echo $like_count; ?></span>
    </div>
</article>