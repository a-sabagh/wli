<section class="widg">
    <h3 class="widg-title">محبوب ترین مقالات</h3>
    <div class="widg-content">
        <ul class="papular-posts">
            <?php
            $mlq_args = array(
                'post_type' => array('post'),
                'posts_per_page' => 10,
                'meta_key' => 'lj_like_wp',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
            $mlq = new WP_Query($mlq_args);
            if ($mlq->have_posts()):
                while ($mlq->have_posts()):
                    $mlq->the_post();
                    $post_id = get_the_ID();
                    $liked_count = (get_post_meta($post_id, "lj_like_wp", TRUE)) ? get_post_meta($post_id, "lj_like_wp", TRUE) : 0;
                    ?>
                    <li>
                        <i class="fa fa-file-text-o flex-grow-0"></i>
                        <a class="flex-grow-1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="like flex-grow-0"><?php echo $liked_count; ?></span>
                    </li>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</section>