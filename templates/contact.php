<?php
/**
 * Template Name: Contact
 */
get_header(); ?>
<style>
    .hero-content,.hero-img{
    display: none;
}
section.hero {
    display: none;
}
</style>
<section class="pt-5 pb-5 position-relative" style="overflow:hidden;">
<?php if(has_post_thumbnail()){
    the_post_thumbnail('full',array('class'=>'bg-img position-absolute w-100 h-100'));
} else { 
echo wp_get_attachment_image(26,'full','',['class'=>'bg-img position-absolute w-100 h-100']); 
} ?>
    <div class="container pb-4">
        <div class="row justify-content-center">
            <div class="col-md-9 pt-5 pb-5 p-4">
            <div class="content">
            <div class="position-absolute bg-white" style="opacity:.75;width:100%;height:100%;top:0;left:0;"></div>
            <div class="position-relative">
<?php if(have_posts()) : while(have_posts()): the_post(); the_content(); endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>