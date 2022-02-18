<?php /*
 * Template Name: Contact Us
 */ ?>
<?php get_header(); ?>
<section id="contact" class="mt-4">
    <div class="container mt-4">

        <div class="section-header">
            <h3><?php __( 'Contact Us', 'bare' );?></h3>
        </div>

        <div class="row">
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <div class="col-lg-6">
            <?php the_content(); ?>
        <?php edit_post_link('edit', '<p>', '</p><br/>'); ?>
            </div>
            <?php endwhile; endif;?>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-5 info">
                        <i class="ion-ios-location-outline"></i>
                        <p><?= $options['address']; ?></p>
                    </div>
                    <div class="col-md-4 info">
                        <i class="ion-ios-email-outline"></i>
                        <p><?= $options['site_email']; ?></p>
                    </div>
                    <div class="col-md-3 info">
                        <i class="ion-ios-telephone-outline"></i>
                        <p><?= $options['phone']; ?></p>
                    </div>
                </div>

                <div class="form">
                    <?= do_shortcode('[contact-form-7 id="33" title="Contact form 1"]'); ?>
                </div>
            </div>

        </div>
        <div class="row">
        <h4 class="heading-sm-b pt-2 pb-3"><?php __( 'Follow us on:', 'bare' );?></h4>
                            <ul class="list-inline mb-3 contact-social">
                                <?php if (($options['facebook']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['facebook']; ?>"><i class="fa fa-2x  fa-facebook"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['pinterest']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['pinterest']; ?>"><i class="fa fa-2x  fa-pinterest"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['youtube']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['youtube']; ?>"><i class="fa fa-2x  fa-youtube"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['google-plus']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['google-plus']; ?>"><i class="fa fa-2x  fa-google-plus"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['twitter']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['twitter']; ?>"><i class="fa fa-2x  fa-twitter"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['instagram']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['instagram']; ?>"><i class="fa fa-2x  fa-instagram"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['email']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['email']; ?>"><i class="fa fa-2x  fa-envelope"></i> </a> </li>
                                <?php } ?>
                                <?php if (($options['linkedin']) != "") { ?>
                                    <li class="list-inline-item"> <a class="social-icon text-xs-center" target="_blank" href="<?= $options['linkedin']; ?>"><i class="fa fa-2x  fa-linkedin"></i> </a> </li>
                                <?php } ?>
                            </ul>
        </div>
    </div>
</section><!-- / -->
<?php get_footer(); ?>