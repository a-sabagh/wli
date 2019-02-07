<?php

function wli_shortcode_post_categories($atts) {
    $array_atts = shortcode_atts(array('number' => '6'), $atts, 'wlic');
    ob_start();
    $cargs = array(
        'hide_empty' => true,
        'hierarchical' => false,
        'exclude' => 1,
        'number' => $array_atts['number']
    );
    $categories = array_slice(get_categories($cargs), 0, $array_atts['number']);
   
    ?>
    <div class="row categories-wrapper">
        <?php
        if (isset($categories) and is_array($categories) and count($categories) > 0):
            foreach ($categories as $parent_category):
                $parent_category_id = $parent_category->term_id;
                $parent_category_icon = get_term_meta($parent_category_id, "wli_category_icon", true);
                $icon = (isset($parent_category_icon) and !empty($parent_category_icon)) ? $parent_category_icon : "fa-folder";
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
                                <label class="flex-grow-0">دسته های فرزند</label>
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
                        }//endif
                        ?>
                    </div><!--.category-item-->
                </div><!--.col-lg-4-->
                <?php
            endforeach; //parent category
        endif; //isset categories
        ?>
    </div><!--.categories-wrapper-->
    <?php
    $outpout = ob_get_clean();
    return $outpout;
}

add_shortcode('wlic', 'wli_shortcode_post_categories');

//[wlic number=""]