<?php

function wli_shortcode_post_categories($atts) {
    $array_atts = shortcode_atts(array('number' => '6'), $atts, 'ac');
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
                $icon = (isset($parent_category_icon) and ! empty($parent_category_icon)) ? $parent_category_icon : "fa-folder";
                $sh1_query_var = array(
                    'parent_category' => $parent_category,
                    'parent_category_id' => $parent_category_id,
                    'parent_category_icon' => $parent_category_icon,
                    'icon' => $icon
                );
                set_query_var('sh1_query_var', $sh1_query_var);
                get_template_part("templates/shortcodes/post","category");
            endforeach; //parent category
        endif; //isset categories
        ?>
    </div><!--.categories-wrapper-->
    <?php
    $outpout = ob_get_clean();
    return $outpout;
}

add_shortcode('ac', 'wli_shortcode_post_categories');

//[wlic number=""]