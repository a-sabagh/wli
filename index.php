<?php get_header(); ?>
<article id="main" class="home-body container">
    <?php 
    get_template_part("templates/home/section","one");
    get_template_part("templates/home/section","tow");
    get_template_part("templates/home/section","three");
    ?>
</article><!--#main-->
<?php get_footer(); ?>