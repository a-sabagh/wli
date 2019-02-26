<section class="home-blog">
    <h2 class="text-center">آخرین پست ها</h2>
    <div class="row justify-content-center">
        <?php
        $rp_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
        );
        $rp = new WP_Query($rp_args);
        if ($rp->have_posts()) {
            while ($rp->have_posts()) {
                $rp->the_post();
                ?>
                <div class="col-md-4 blog-item">
                    <a class="img-wrapper" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                        <?php
                        if (has_post_thumbnail()) {
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'blog-thumb', FALSE);
                            echo '<img src="' . $thumbnail_url[0] . '" class="img-fluid" alt="' . $thumbnail_alt . '" >';
                        } else {
                            ?>
                            <img src="<?php echo trailingslashit(WLI_TDU); ?>images/blog-thumb.jpg" class="img-fluid" alt="<?php echo get_the_excerpt(); ?>">
                        <?php } ?>
                    </a>
                    <span class="date"><?php the_date(); ?></span>
                    <h3 class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <p class="excerpt"><?php the_excerpt(); ?></p>
                </div>
                <?php
            }
        } else {
            get_template_part("templates/arthive/loop", "noresult");
        }
        wp_reset_postdata();
        ?>
    </div>
    <div class="more-link d-flex justify-content-center align-items-center">
        <div class="line first flex-grow-1"></div>
        <a href="<?php echo get_the_permalink(43); ?>" class="btn btn-primary flex-grow-0">مطالب بیشتر</a>
        <div class="line last flex-grow-1"></div>
    </div>
</section>