<?php if( is_admin() ) {?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/theme-options/inc/settings.css" type="text/css"/>
<?php }?>
<?php
include_once get_template_directory().'/inc/formClass.php';

?>
<div class="wrap">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page_title">Theme Settings</h3>
    </div>
  </div>
<?php global $social_arr, $header_widgets, $footer_widgets;?>
  <form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields('theme_settings'); ?>
    <?php $options = get_option('theme_settings'); ?>
    <?php //do_settings_sections('theme_settings');?>
     <?php /* show saved options message */    
    if ($_REQUEST['settings-updated']) : ?>
    <div class="updated">
    <p><strong class="alret">
    <?php _e('Options saved'); ?>
    </strong></p>
    </div>
    <?php endif; ?>
    <div class="the-container">

        <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#welcome">Welcome</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#basics">Basics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#social">Social</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#misc">Misc</a>
    </li>
   <?php if($options['theme_styles'] =='yes'){?> <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#styles">Styles</a>
   </li><?php }?>

     <?php /*?><li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu4">Additional Info on Product(s)</a>
    </li> <?php */?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="welcome" class="container tab-pane active"><br>
     <?php include('pg/welcome.php');?>
    </div>
    <div id="basics" class="container tab-pane fade"><br>
     <?php include('pg/basic.php');?>
    </div>
   <div id="social" class="container tab-pane fade"><br>
      <?php include('pg/social.php');?>
    </div>
   <div id="misc" class="container tab-pane fade"><br>
      <?php include('pg/misc.php');?>
    </div>
    <?php if($options['theme_styles'] =='yes'){?> <div id="styles" class="container tab-pane fade"><br>
      <?php include('pg/styles.php');?>
    </div><?php }?>
    <?php /*?><div id="menu4" class="container tab-pane fade"><br>
      <?php include('pg/menu4.php');?>
    </div><?php */?>
  </div>
</div>
      <p>
    <input name="theme_settings[submit]" id="submit" value="Save Changes" type="submit" class="btn btn-primary btn-md float-right"/>
    </p>      
    </div>

  </form>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>
<!--/the page--> 