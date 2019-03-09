<?php

function wli_search() {
    ?>
    <div class="search-wrapper row justify-content-center align-items-center">
        <div class="col-md-7 search-form-wrapper text-center">
            <form action="<?php echo home_url(); ?>" class="search-form" method="get">
                <input class="search-input" type="text" name="s" placeholder="جستجو در دانشنامه">
                <button class="search-submit" type="submit" value="" title="جستجو"><i class="fa fa-search"></i></button>
            </form>
            <div class="search-form-sujestion">
                <strong>پیشنهاد جستجو: </strong>
                <?php
                $args = array(
                    "orderby" => "count",
                    "order" => "DESC",
                    "number" => 3
                );
                $tags = get_tags($args);
                foreach ($tags as $tag) {
                    ?>
                    <a href="<?php echo get_tag_link($tag) ?>" title="<?php echo $tag->name; ?>" class="tagcloud-id-<?php echo $tag->term_id ?>" ><?php echo $tag->name; ?><span class="seprator"> , </span></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * rangraz pagination
 */
if (!function_exists("wli_pagination")) {

    function wli_pagination($wp_query = null) {
        if (!isset($wp_query)) {
            global $wp_query;
        }

        $q = (int) $wp_query->max_num_pages;
        $p = 7;
        $n = (get_query_var("paged")) ? get_query_var("paged") : 1;

        if ($n < ($p / 2) || $p > $q) {
            $start = 1;
            $end = (int) ($p > $q) ? $q : $p;
        } elseif ($n + ($p / 2) > $q) {
            $start = (int) $q - $p + 1;
            $end = (int) $q;
        } else {
            $start = (int) ( $n - floor($p / 2));
            $end = (int) ($n + floor($p / 2));
        }
        echo '<ul class="pagination pagination-border">';
        for ($i = $start; $i <= $end; $i++):
            $active = ($i == $n) ? 'class="active"' : '';
            echo '<li><a ' . $active . ' title="' . $i . '" href="' . add_query_arg(array('paged' => $i)) . '">' . $i . '</a></li>';
        endfor;
        echo '</ul>';
    }

}

/*
 * rangraz breadcrumbs
 */

if (!function_exists("wli_breadcrumbs")) {

    function wli_breadcrumbs() {
        $bd = array(
            array(
                'title' => get_bloginfo('blogname'),
                'link' => get_home_url()
            )
        );

        if (is_single()) {

            $post = get_queried_object();
            $bd_post = array(
                'title' => $post->post_title,
                'link' => '#'
            );
            $categories = get_the_category($post->ID);
            $category = current($categories);
            $bd_category = array(
                'title' => $category->name,
                'link' => get_category_link($category)
            );
            array_push($bd, $bd_category, $bd_post);
        } elseif (is_archive()) {
            $category = get_queried_object();
            $bd_category = array(
                'title' => $category->name,
                'link' => '#'
            );
            array_push($bd, $bd_category);
        } elseif (is_404()) {
            $error = array(
                'title' => 'خطای ۴۰۴',
                'link' => '#'
            );
            array_push($bd, $error);
        }
        ?>
        <nav class="breadcrumbs-wrapper">
            <ul>
                <?php
                foreach ($bd as $bd_item):
                    if ($bd_item['link'] == '#') {
                        echo '<li class="last-item">' . $bd_item['title'] . '</li>';
                    } else {
                        echo '<li><a titel=" ' . $bd_item['title'] . ' " href="' . $bd_item['link'] . '">' . $bd_item['title'] . '</a></li>';
                    }
                endforeach;
                ?>
            </ul>
        </nav>
        <?php
    }

}

if (!function_exists("rng_custom_excerpt")) {

    function rng_custom_excerpt($count) {
        $output = get_the_content();
        $output = strip_tags($output);
        $output = mb_substr($output, 0, $count);
        $output = mb_substr($output, 0, mb_strrpos($output, " "));
        $output .= "...";
        return $output;
    }

}

if (!function_exists("share_excerpt")) {

    function share_excerpt() {
        rng_custom_excerpt(140);
    }

}

if (!function_exists("wli_add_col")) {

    function wli_add_col($columns) {
        return $columns + array('tax_id' => 'ID');
    }

}
if (!function_exists("wli_show_id")) {

    function wli_show_id($value, $name, $id) {
        return 'tax_id' === $name ? $id : $value;
    }

}

add_action("manage_edit-category_columns", 'wli_add_col');
add_filter("manage_edit-category_sortable_columns", 'wli_add_col');
add_filter("manage_category_custom_column", 'wli_show_id', 10, 3);

if (!function_exists("wli_new_customizer_settings")) {

    /**
     * custom setting
     * @param type $wp_customize
     */
    function wli_new_customizer_settings($wp_customize) {
        // add a setting for the site logo
        $wp_customize->add_setting('wli_home_categories');
        // Add a control to upload the logo
        $wp_customize->add_control
                (
                'wli_home_categories', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'static_front_page',
            'label' => __('شناسه دسته بندی ها'),
            'description' => __('شناسه دسته بندی ها را با علامت کاما (,) از هم جدا کنید. 5 عدد دسته بندی نمایش می دهد.'),
            'input_attrs' => array(
                'style' => 'width: 100%;text-align:left;direction:ltr;margin-top: 10px;',
                'placeholder' => __('ID,ID,ID,ID,ID')
            )
                )
        );
    }

}
add_action('customize_register', 'wli_new_customizer_settings');
