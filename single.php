<?php get_header(); ?>
<article id="main" class="container-fluid single-gray">
    <div class="single-content">
        <div class="row no-gutters">
            <?php get_sidebar(); ?>
            <div class="col-md-8 main-content order-md-1 order-0">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        ?>
                        <header class="single-header">
                            <?php
                            echo wli_breadcrumbs(); 
                            get_template_part("templates/header");
                            ?>
                        </header>
                        <section class="editor-content">
                            <?php the_content(); ?>
                        </section><!--.editor-content-->
                        <?php
                        get_template_part("templates/single/post", "categories");
                        get_template_part("templates/single/post", "like");
                        get_template_part("templates/single/post", "related");
                    endwhile;
                endif;
                ?>
            </div><!--.main-content-->
        </div>
    </div><!--.single-content-->
</article><!--#main-->
<?php get_footer(); ?>