<?php
$cargs = array(
    'hide_empty' => true,
    'hierarchical' => false,
    'exclude' => 1,
    'number' => 5
);
$categories = get_categories($cargs);
//array_slice
?>
<div class="row home-cat-boxes">
    <?php
    if (is_array($categories) and count($categories) > 0) {
        $row_categories = array_slice($categories, 0, 3);
        foreach ($row_categories as $category):
            $category_id = $category->term_id;
            $category_icon = get_term_meta($category_id, "wli_category_icon", true);
            $icon = (isset($category_icon) and ! empty($category_icon)) ? $category_icon : "fa-folder";
            ?>
            <div class="col-lg-4 col-sm-6">
                <div class="d-flex flex-column text-center cat-item">
                    <i class="fa <?php echo $icon; ?>"></i>
                    <h3 class="cat-title"><a href="<?php echo get_category_link($category); ?>" title="<?php echo $category->name; ?>" ><?php echo $category->name; ?></a></h3>
                    <?php
                    $pcp_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'cat' => array($category->term_id)
                    );
                    $pcp = new WP_Query($pcp_args);
                    if ($pcp->have_posts()) {
                        ?>
                        <ul class="cat-body">
                            <?php
                            while ($pcp->have_posts()) {
                                $pcp->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                        wp_reset_postdata();
                    }
                    ?>
                </div><!--.cart-item-->
            </div><!--.col-lg-3-->
            <?php
        endforeach;
    }//end if
    ?>
</div><!--.home-cat-boxes-->
<div class="row home-cat-boxes">
    <div class="col-lg-4  col-sm-6">
        <div class="d-flex flex-column text-center cat-item page-type">
            <?php $about_page = 41; ?>
            <h3 class="cat-title"><a href="<?php echo get_the_permalink($about_page); ?>" title="<?php echo get_the_title($about_page); ?>" ><?php echo get_the_title($about_page); ?></a></h3>
            <p class="page-about"><?php echo get_post_meta($about_page,"wli_about_excerpt",true); ?></p>
            <a href="<?php echo get_the_permalink($about_page); ?>" class="btn btn-primary">بیشتر بخوانید</a>
        </div>
    </div>
    <?php
    if (is_array($categories) and count($categories) > 0) {
        $row_categories = array_slice($categories, 3);
        foreach ($row_categories as $category):
            $category_id = $category->term_id;
            $category_icon = get_term_meta($category_id, "wli_category_icon", true);
            $icon = (isset($category_icon) and ! empty($category_icon)) ? $category_icon : "fa-folder";
            ?>
            <div class="col-lg-4 col-sm-6">
                <div class="d-flex flex-column text-center cat-item">
                    <i class="fa <?php echo $icon; ?>"></i>
                    <h3 class="cat-title"><a href="<?php echo get_category_link($category); ?>" title="<?php echo $category->name; ?>" ><?php echo $category->name; ?></a></h3>
                    <?php
                    $pcp_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'cat' => array($category->term_id)
                    );
                    $pcp = new WP_Query($pcp_args);
                    if ($pcp->have_posts()) {
                        ?>
                        <ul class="cat-body">
                            <?php
                            while ($pcp->have_posts()) {
                                $pcp->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                        wp_reset_postdata();
                    }
                    ?>
                </div><!--.cart-item-->
            </div><!--.col-lg-3-->
            <?php
        endforeach;
    }//end if
    ?>
</div><!--.home-cat-boxes-->