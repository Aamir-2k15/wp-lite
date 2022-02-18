<?php /* get theme options */ $options = get_option('theme_settings');global $options; ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=(isset($options['site_dsec']) ? $options['site_dsec']: '');?>">
<meta name="author" content="<?=(isset($options['author_desc']) ? $options['author_desc']: '');?>">
<?php if(!is_front_page()){$page_title = wp_title('', false).' | '; }else{$page_title = 'Home | ';}?>
<title> <?php echo $page_title;?><?php bloginfo('name'); ?> </title>

    <link rel="shortcut icon" href="<?= (isset($options['favicon']) ? $options['favicon'] : ''); ?>" type="image/x-icon">
<link rel="icon" href="<?= (isset($options['favicon']) ? $options['favicon'] : ''); ?>" type="image/x-icon">
        <!-- Main Stylesheet File -->
        <?php wp_head();?>
  </head>
  <body>
  <header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <a href="<?= site_url(); ?>" class="navbar-brand">
       <img src="<?php echo isset($options['logo'])?$options['logo']:''; ?>" alt="<?php bloginfo('name'); ?>" class="img-fluid" width="<?=(isset($options['logo_maxwidth'])?$options['logo_maxwidth']:'');?>" height="<?=isset($options['logo_maxheight'])?$options['logo_maxheight']:'';?>">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                    $args = array(
                        'theme_location' => 'primary_menu',
                        'menu' => 'primary_menu',
                        'container' => 'false',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'menu',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new Walker_Nav_Primary(), // This controls the display of the Bootstrap Navbar
                        'fallback_cb' => 'Walker::fallback', // For menu fallback
                    );
                    ?>
                    <?php wp_nav_menu($args); ?>  
        </div>
      </div>
    </nav>    
    </header>