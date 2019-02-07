<?php get_header(); ?>
<article id="main" class="container">
    <div class="page-content">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                get_template_part("templates/header");
                ?>
                <section class="editor-content">
                    <?php the_content(); ?>
                </section><!--.editor-content-->
                <?php
            endwhile;
        endif;
        ?>
    </div><!--.single-content-->
</article><!--#main-->
<?php get_footer(); ?>