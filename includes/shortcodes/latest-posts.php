<?php

function wli_shortcode_latest_posts() {
    ob_start();
    $outpout = ob_get_clean();
    $paginate_num = get_query_var('paged');
    ?>
    <section class="archive-post-list">
        <?php
        $lp_args = array(
            'post_type' => 'post',
            'paged' => $paginate_num
        );
        $lp = new WP_Query($lp_args);
        if ($lp->have_posts()):
            while ($lp->have_posts()):
                $lp->the_post();
                get_template_part("templates/archive/loop", "content");
            endwhile;
        else:
            get_template_part("templates/archive/loop", "noresult");
        endif;
        wp_reset_postdata();
        ?>
    </section>
    <section class="text-center">
        <?php
        if ($lp->max_num_pages > 1) {
            wli_pagination($lp);
        }
        ?>
    </section>
    <?php
    return $outpout;
}

add_shortcode('lp', 'wli_shortcode_latest_posts');
//[wlilp PARAM=""]content[/wlilp]