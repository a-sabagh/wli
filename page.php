<?php get_header(); ?>
<article id="main" class="container">
    <div class="page-content">
        <?php get_template_part("templates/header"); ?>
        <section class="editor-content">
            <?php the_content(); ?>
        </section><!--.editor-content-->
    </div><!--.single-content-->
</article><!--#main-->
<?php get_footer(); ?>