<?php 
$sh1_query_var = get_query_var('sh1_query_var');
extract($sh1_query_var);
?>
<div class="col-lg-4 col-md-6">
    <div class="category-item cat-item d-flex flex-column align-items-center">
        <i class="fa <?php echo $icon; ?>"></i>
        <h3 class="cat-title"><a href="<?php echo get_category_link($parent_category) ?>" title="<?php echo $parent_category->name; ?>"><?php echo $parent_category->name; ?></a></h3>
        <?php
        $ccargs = array(
            'child_of' => $parent_category_id,
            'number' => 3
        );
        $child_categories = get_categories($ccargs);
        if (isset($child_categories) and is_array($child_categories) and count($child_categories) > 0) {
            ?>
            <div class="article-label d-flex flex-row align-items-center justify-content-start">
                <label class="flex-grow-0">زیر دسته ها</label>
                <span class="line flex-grow-1"></span>
            </div><!--.article-label-->
            <ul>
                <?php foreach ($child_categories as $child_category) { ?>
                    <li>
                        <i class="fa fa-folder-o"></i>
                        <a class="" title="<?php echo $child_category->name; ?>" href="<?php echo get_category_link($child_category) ?>">
                            <?php echo $child_category->name; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php
        }//endif
        $pcp_args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'cat' => array($parent_category->term_id)
        );
        $pcp = new WP_Query($pcp_args);
        if ($pcp->have_posts()) {
            ?>
            <div class="article-label d-flex flex-row align-items-center justify-content-start">
                <label class="flex-grow-0">مقالات</label>
                <span class="line flex-grow-1"></span>
            </div><!--.article-label-->
            <ul>
                <?php
                while ($pcp->have_posts()) {
                    $pcp->the_post();
                    ?>
                    <li>
                        <i class="fa fa-file-text-o"></i>
                        <a class="" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php
                }//endwhile
                ?>
            </ul>
            <?php
            wp_reset_postdata();
        }//endif
        ?>
    </div><!--.category-item-->
</div><!--.col-lg-4-->