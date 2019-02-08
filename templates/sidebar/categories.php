<?php
$cargs = array(
    'hide_empty' => true,
    'hierarchical' => false,
    'exclude' => 1,
);
$categories = get_categories($cargs);
if (is_singular(array('post'))) {
    $current_post = get_the_ID();
    $post_categories = get_the_category();
    $current_categories = array();
    foreach ($post_categories as $category) {
        $current_categories[] = $category->term_id;
    }
} else {
    $current_post = 0;
    $current_categories = array(current($categories)->term_id);
}
?>

<section class="widg constant-widg single-category-widg">
    <h3 class="widg-title">دسته بندی مطالب</h3>
    <div class="widg-content">
        <ul>
            <?php
            if (is_array($categories)):
                foreach ($categories as $category):
                    $cq_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'cat' => array($category->term_id)
                    );
                    $cq = new WP_Query($cq_args);
                    ?>
                    <li <?php echo (in_array($category->term_id, $current_categories)) ? 'class="active-cat"' : ''; ?>>
                        <a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
                        <span class="post-counts">(<?php echo $cq->found_posts;  ?>)</span>
                        <span class="expand-posts"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        <ul class="posts-list">
                            <?php
                            if ($cq->have_posts()):
                                while ($cq->have_posts()):
                                    $cq->the_post();
                                    $post_id = get_the_ID();
                                    ?>
                                    <li <?php echo($post_id == $current_post) ? 'class="active"' : ''; ?>>
                                        <i class="fa fa-file-text-o"></i>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                    </li>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </li>
                    <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</section>