<?php
/* get theme options */$options = get_option('theme_settings');global $options;?><footer class="pt-5 pb-1 bg-dark">
<div class="footer-top pb-3">
        <div class="container">
            <div class="row">

                <div class="col-md-5 footer-info">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>

                <div class="col-md-2 footer-links">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>

                <div class="col-md-3 footer-contact text-white">
                    <h4><?php __( 'Contact Us', 'wpl22' );?></h4>
                    <p><strong><?php __( 'Phone', 'wpl22' );?>:</strong> <?= $options['phone']; ?><br>
                        <strong><?php __( 'Email', 'wpl22' );?>:</strong> <?= $options['site_email']; ?><br>
                    </p>

                    <div class="social-links">
                        <a href="<?= $options['twitter']; ?>" class="twitter"><i class="fa fa-twitter text-white"></i></a>
                        <a href="<?= $options['facebook']; ?>" class="facebook"><i class="fa fa-facebook text-white"></i></a>
                        <a href="<?= $options['instagram']; ?>" class="instagram"><i class="fa fa-instagram text-white"></i></a>
                        <a href="<?= $options['linkedin']; ?>" class="linkedin"><i class="fa fa-linkedin text-white"></i></a>
                        <a href="<?= $options['youtube']; ?>" class="youtube"><i class="fa fa-youtube text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="border-top pt-3 pb-3">  
            <p class="m-0 text-center text-white">Copyright © <strong><?php bloginfo('name'); ?></strong> <?php echo date("Y");?></p>
</div>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<?php wp_footer();?>
</footer>
</body>
</html>