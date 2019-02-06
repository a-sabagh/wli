<footer id="footer">
    <div class="top-footer">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 top-footer-menu text-md-right text-center">
                    <?php
                    wp_nav_menu(array(
                        'container' => '',
                        'theme_location' => 'footer',
                        'depth' => '1'
                    ));
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="top-footer-socials text-md-left text-center">
                        <ul>
                            <li class="social-facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li class="social-instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
                            <li class="social-telegram"><a href=""><i class="fa fa-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--.row-->
        </div><!--.container-->
    </div><!--.top-footer-->
    <div class="mid-footer">
        <div class="container">
            <div class="row">
                <?php 
                if(is_active_sidebar("footer_side")){
                    dynamic_sidebar("footer_side");
                }
                ?>
            </div><!--.row-->
        </div>
    </div><!--.mid-footer-->
    <div class="bottom-footer">
        <div class="container">
            <div class="row justfy-content-between aling-items-center">
                <div class="col-sm text-center text-sm-right">
                    <p class="copyright">تمامی حقوق محفوظ است</p>
                </div>
                <div class="col-sm text-sm-left text-center">
                    <a href="#" class="back-to-top">برو به بالا</a>
                </div>
            </div><!--.row-->
        </div><!--.container-->
    </div><!--.bottom-footer-->
</footer><!--#footer-->
<?php wp_footer(); ?>
</body>
</html>