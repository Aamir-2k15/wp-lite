<?php get_header(); ?> <?php global $options;global $social_arr;?>
<div class="container">
<div class="row pt-5 pb-5">
<div class="col-md-12">
    <h1 class="heading-lg-b"><?php printf( __( 'Search Results for: "%s" ', '' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <div class="content pt-5">
 <?php if (have_posts()):while (have_posts()):the_post(); ?>        
        <div class="row border-bottom mb-2 mt-2 pb-4 pt-4 pb-2">
            <div class="col-md-2"><?php if (has_post_thumbnail()) { ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?><a href="<?= the_permalink();?>" class="entry__thumb-link pt-2 pb-2"><img src="<?php echo $image[0]; ?>" class="img-fluid"/></a><?php } ?></div>
            <div class="col-md-10"><h5 class="pt-3 pb-2 heading-sm-b"><a href="<?= the_permalink();?>" class="the-link"><?php the_title(); ?></a></h5><div class="pt-2 pb-2"><?php the_excerpt(); ?></div>          <div class="entry__meta">
            <?= get_the_category_list();?>
          </div></div>
        </div>
<?php    endwhile; else: ?>
<div class="row mb-2 mt-2 pb-4 pt-4 pb-2">
    <div class="col-md-12">
        <h5 class="pt-3 pb-2 heading-sm-b text-danger">
            <i class="fa fa-exclamation-triangle"></i> <?php _e ( 'Nothing found matching your serach criteria!', 'wpl22' );?> 
        </h5>
        <div class="pt-5 pb-5">
            <p><?php __( 'You can try searching again below:', 'wpl22' );?></p>
            <?php custom_serach_form();?>  
        </div>
    </div>    
</div>
</div> 
<?php endif;?> 
        <div class="row pt-2 pb-2"> 
            <div class="col-md-12"><?php wplight_pagination();?></div>
        </div>
    </div>
</div>
</div>
</div>
<?php get_footer(); ?>