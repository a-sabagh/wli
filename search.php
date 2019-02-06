<?php
get_header();
?>
<article id="main" class="container-fluid single-gray">
    <div class="single-content">
        <div class="row no-gutters">
            <?php get_sidebar(); ?>
            <div class="col-md-8 main-content order-md-1 order-0">
                <?php get_template_part("templates/header"); ?>
                <section class="archive-post-list">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part("templates/archive/loop", "content");
                        endwhile;
                    else:
                        get_template_part("templates/archive/loop", "noresult");
                    endif;
                    ?>
                </section>
                <section class="pagination-wrapper text-center">
                    <?php
                    global $wp_query;
                    if($wp_query->max_num_pages > 1){
                        wli_pagination();
                    }
                    ?>
                </section>
            </div><!--.main-content-->
        </div>
    </div><!--.single-content-->
</article><!--#main-->
<?php get_footer(); ?>