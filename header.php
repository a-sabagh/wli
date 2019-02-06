<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="header" class="container-fluid <?php echo (is_home() or is_front_page()) ? " with-search" : "without-search"; ?>">
            <div class="container">
                <div class="row navigation-wrapper align-items-center">
                    <nav class="col-md-9 col-4 navigation">
                        <a href="#" class="menu-toggler hidden-md" ><i class="fa fa-bars"></i></a>
                        <?php
                        wp_nav_menu(array(
                            'container' => '',
                            'theme_location' => 'header',
                            'walker' => new WLI_Arrow_Walker_Nav_Menu(),
                            'depth' => '2'
                        ));
                        ?>
                    </nav>
                    <a href="#" class="col-md-3 col-8 header-logo d-flex justify-content-end" title="صعود چهل ساله" >صعود چهل ساله</a>
                </div><!--.navigation-wrapper-->
                <?php
                if (is_home() or is_front_page()) {
                    wli_search();
                }
                ?>
            </div>
            <!--.container-->
        </header><!--#header-->