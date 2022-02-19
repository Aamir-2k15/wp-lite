<?php get_header(); ?> <?php global $options; global $social_arr;?>
<div class="container-fluid" id="single">
  <div class="row mr-0 pl-5  pr-5 pt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto text-center"> 
          <div class="pt-5">
              <h1 class="heading-lg-b"><?php  _e( '404 Not Found!', 'wpl22' );?></h1>
            
            <div class="pt-4">
                <p class="lead heading-md"><?php  _e( 'The page you are looking for does not exits.', 'wpl22' );?></p> 
                <div class="mt-5 mb-5 lead"><p class="lead"><?php  _e( 'You can search here:', 'wpl22' );?></p>
                  <?php custom_serach_form();?>                    
                </div>
            </div>
             <?php edit_post_link('edit', '<p>', '</p><br/>'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>