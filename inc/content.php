<div class="col-md-8">
<?php if(has_post_thumbnail()):?>
<div class="post-featured">
    <img class="card-img-top img-fluid " src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
</div> 
<?php endif;?>
<?php the_content();?>
<?php edit_post_link('edit', '<p>', '</p><br/>');?>
</div>