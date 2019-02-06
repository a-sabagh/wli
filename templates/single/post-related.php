<?php
$categories = get_the_category();
$post_cats_id = array();
foreach ($categories as $value) {
    $post_cats_id[] = $value->term_id;
}
$related_args = array(
    'cat' => $post_cats_id,
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'rand'
);
$rquery = new WP_Query($related_args);
if ($rquery->have_posts()):
    ?>
    <section class="related-posts">
        <h5>مقالات مرتبط</h5>
        <ul>
            <?php
            while ($rquery->have_posts()):
                $rquery->the_post();
                $post_id = get_the_ID();
                $like_count = (get_post_meta($post_id, "lj_like_wp", TRUE)) ? get_post_meta($post_id, "lj_like_wp", TRUE) : 0;
                ?>
                <li>
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item"><?php the_title(); ?></a>
                    <span class="like"><?php echo $like_count; ?></span>
                </li>  
                <?php
            endwhile;
            ?>
        </ul>
    </section><!--.related-posts-->

    <?php
endif;
wp_reset_postdata();
?>

