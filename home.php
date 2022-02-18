<?php get_header();?>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4"><?php __( 'Our latest blog articles', 'wpl22' );?></h1>
<div class="row">
        <?php $n = 1; //$flat_post_arr  = ['','','','',''];?>
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
          <?php if(has_post_thumbnail()):?><a href="<?php the_permalink(); ?>">
            <img class="card-img-top img-fluid " src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
        </a><?php endif;?>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
              <p class="card-text"><?php the_excerpt(); ?></p>
            </div>
          </div>
        </div>
      <?php
		$n++;
    endwhile; wp_reset_postdata();
endif;
?>
 
      </div>
      <!-- /.row -->
	        <div class="row pb-2 pl-5 pr-5 ml-5 mr-5">
        <div class="col">
          <nav class="pgn">
            <?php wplight_pagination();?>
          </nav>
        </div>
      </div>
	  
</div>
         <!-- Footer -->
    <?php get_footer();?>