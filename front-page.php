<?php 

 get_header();

 //  start of header
 echo '<section class="bg-attachment position-relative d-flex align-items-end justify-content-center hero-content" style="background:url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;background-position:top;padding-bottom:15px;height:87vh;">';
 
 echo '<div class="position-absolute w-100 h-100" style="top:0;left:0;background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,0) 0%, rgba(75,113,255,1) 70%);mix-blend-mode:multiply;"></div>';
 
 echo '<div class="col-12 ml-auto p-0">';
//  echo '<div class="bg-accent pt-3 pb-3">';
 echo '<h1 class="text-white text-center mb-0 page-title text-uppercase text-shadow" style="letter-spacing:0.2em;">' . get_the_title() . '</h1>';
//  echo '</div>';
 
 if(have_rows('header_content')): while(have_rows('header_content')): the_row();
//  echo '<div class="pt-3 pb-3 pl-md-5 pl-3 pr-md-5 pr-3" style="background:rgba(255,255,255,.6);">';
 
 echo '<div class="text-center" style="">';
 echo '<h2 class="subtitle text-white" style="font-size:19px;">' . get_sub_field('subtitle') . '</h2>';
 echo '<div class="text-white" style="font-size:120%;">';
 echo get_sub_field('content');
 echo '</div>';
 
 echo '</div>';
//  echo '</div>';
 endwhile; endif;
 
 echo '</div>';
 
 
 echo '</section>';
 //  end of header
 
 // start of intro
 echo get_template_part('partials/section-intro-content');
 // end of intro
 
 // start of content
 if(have_rows('content_group')): 
     while(have_rows('content_group')): the_row();
 
     if(have_rows('content_sections')): 
     while(have_rows('content_sections')): the_row();
     $option = get_sub_field('option');
     $classes = get_sub_field('classes');
     $style = get_sub_field('style');
     $bgImg = get_sub_field('background_image');
     $imgDataAos = get_sub_field('image_data_aos');
     $img = get_sub_field('image');
     $contentDataAos = get_sub_field('content_data_aos');
     $content = get_sub_field('content');
     $bigImage = get_sub_field('big_image');
 
     if($option == 'Content + Image'){
     echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;' . $style . '">';
 
     echo '<div class="container">';
     echo '<div class="row row-content align-items-center justify-content-between">';
     echo '<div class="col-md-6" data-aos="' . $contentDataAos . '">';
         echo $content;
     echo '</div>';
 
     if($img):
     echo '<div class="col-md-6" data-aos="' . $imgDataAos . '">';
         echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
     echo '</div>';
     endif;
 
     echo '</div>';
     echo '</div>';
 
     echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bigImage['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;' . $style . '"></section>';

        echo '<div class="container pb-5 pt-5">';
        echo '<div class="row pb-5">';
        echo '<div class="col-12 text-center">';

        echo '<h2>' . $bigImage['title'] . '</h2>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
     endwhile; 
     endif;
 
 endwhile; 
 endif;
 // end of content
 
 // start of services
if(have_rows('services_content')): while(have_rows('services_content')): the_row();
$bgImg = get_sub_field('background_image');
$content = get_sub_field('content');
$relationship = get_sub_field('relationship');

echo '<section class="position-relative bg-attachment" style="padding-top:75px;padding-bottom:175px;">';

echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;']);

// echo '<div class="position-absolute w-100 h-100 bg-accent" style="mix-blend-mode:multiply;top:0;"></div>';

echo '<div class="position-relative pt-5 pb-5">';
// echo '<div class="position-absolute w-100 h-100" style="mix-blend-mode:screen;opacity:.62;top:0;left:0;pointer-events:none;background:#0f2849;"></div>';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center text-white pb-5">';

echo $content;

echo '</div>';
echo '</div>';


if( $relationship ):
    echo '<div class="row justify-content-center">';
    $counter = 0;
foreach( $relationship as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
$counter++;
echo '<div class="col-lg-4 col-md-6 text-white mb-5">';
echo '<div class="position-relative pt-2 pr-4 pl-4 h-100 d-flex align-items-end col-services" style="border:1px solid var(--accent-quinary);">';

echo '<div class="position-absolute w-100 h-100 bg-accent" style="top:0;left:0;mix-blend-mode:overlay;opacity:.65;"></div>';

echo '<a href="' . get_the_permalink() . '" class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-quaternary);opacity:0;pointer-events:none;text-decoration:none;background:var(--accent-tertiary);">';
echo '<h3 class="mb-0 bold h4" style="">' . get_the_title() . '</h3>';
echo '</a>';

echo '<div class="w-100 position-relative" style="height:250px;">';
echo '<span class="h1 pb-5 d-inline-block blair-light">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

// echo '<h3 class="mb-0 pb-4 h4" style="border-bottom:10px solid var(--accent-quinary);"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';

echo '<div class="container position-absolute" style="bottom:0;">';

echo '<div class="row align-items-baseline">';
echo '<div class="col-md-2 pb-lg-0 pl-0 pb-3 text-white">';

echo '<div class="" style="border:1px solid var(--accent-tertiary);border-radius:50%;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:15px;" fill="white"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
echo '</div>';

echo '</div>';

echo '<div class="col-lg-5 text-white pl-0">';
echo '<h4 class="mb-0 h5 pb-4" style="border-bottom:10px solid var(--accent-secondary);"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
echo '</div>';
endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of services

// start of content bottom
if(have_rows('content_group_bottom')): 
    echo '<div class="content-group-bottom">';
    
    while(have_rows('content_group_bottom')): the_row();

    if(have_rows('content_sections')): 
    while(have_rows('content_sections')): the_row();
    $classes = get_sub_field('classes');
    $style = get_sub_field('style');
    $bgImg = get_sub_field('background_image');
    $imgDataAos = get_sub_field('image_data_aos');
    $img = get_sub_field('image');
    $contentDataAos = get_sub_field('content_data_aos');
    $content = get_sub_field('content');

    if($bgImg){

        echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;background-repeat:no-repeat;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative mt-5 mb-5 ' . $classes . '" style="padding:250px 0;' . $style . '">';
    }

    echo '<div class="position-absolute w-100 h-100 overlay-bg" style="top:0;left:0;"></div>';

    echo '<div class="container">';
    echo '<div class="row row-content align-items-center justify-content-between">';
  

    echo '<div class="col-lg-6 pb-lg-0 pb-4" data-aos="' . $imgDataAos . '">';
    if($img):
        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
    endif;
    echo '</div>';

    echo '<div class="col-lg-5" data-aos="' . $contentDataAos . '">';
    echo $content;
echo '</div>';

    echo '</div>';
    echo '</div>';

    echo '</section>';
    endwhile; 
    endif;

endwhile; 
echo '</div>';
endif;
// end of content bottom

// start of insights
if(have_rows('relationship_content')): while(have_rows('relationship_content')): the_row();
echo '<section class="pt-5 pb-5">';
echo '<div class="container">';

echo '<div class="row justify-content-center">';

echo '<div class="col-md-9 text-center pb-5">';

echo get_sub_field('content');

echo '</div>';

echo '</div>';

$featured_posts = get_sub_field('relationship');

if( $featured_posts ):
    echo '<div class="row justify-content-center">';
    
foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
echo '<a href="' . get_the_permalink() . '" class="col-md-4">';

echo '<div class="img-hover overflow-h">';
the_post_thumbnail('full',array('class'=>'w-100','style'=>'height:230px;object-fit:contain;object-position:top;'));
echo '</div>';

echo '</a>';
// echo '<hr class="mt-2">';
endforeach;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
    echo '</div>';
endif;

echo '</div>';
echo '</section>';
endwhile; endif;
// end of insights

// start of partners
// if(have_rows('partners_group')): while(have_rows('partners_group')): the_row();
// echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="">';
// echo '<div class="container" style="">';
// echo '<div class="row justify-content-center" style="">';
// echo '<div class="col-12 text-center" style="">';
// echo get_sub_field('content');
// echo '</div>';

// $gallery = get_sub_field('gallery');
// if( $gallery ): 
// foreach( $gallery as $image ):
// echo '<div class="col-md-4 col-12 col col-partners overflow-h">';
// echo '<div class="position-relative">';
// // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 h-auto','style'=>'object-fit:contain;'] );
// // echo '</a>';
// echo '</div>';
// echo '</div>';
// endforeach; 
// endif;

// echo '</div>';
// echo '</div>';
// echo '</section>';
// endwhile; endif;
// end of partners

// start of testimonials
echo '<section class="pt-5 pb-5 testimonials position-relative z-1" style="">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12 text-center pb-5">';

$testimonialsGroup = get_field('testimonials_content');
$tTitle = $testimonialsGroup['title'];
$tContent = $testimonialsGroup['content'];

echo '<h3 class="text-accent h1">' . $tTitle . '</h3>';

if($tContent) {
echo $tContent;
}
echo '</div>';
echo '</div>';
echo '</div>';




$counterTestimonial = 0;
if(have_rows('testimonials')): 
    echo '<div class="bg-accent text-white pt-5 pb-5" style="border-top:15px solid var(--accent-secondary);border-bottom:15px solid var(--accent-secondary);">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="testimonials-carousel owl-carousel owl-theme">';

    while(have_rows('testimonials')): the_row(); 
$counterTestimonial++;

echo '<div class="col-testimonial mt-2 mb-2 pl-md-0 pr-md-0 pl-5 pr-4" data-aos="fade-up" data-aos-delay="' . $counterTestimonial . '00">';

echo wp_get_attachment_image(129,'full','',['class'=>'bg-img position-absolute img-quotes','style'=>'width:25px;height:auto;']);
echo '<div class="position-relative pl-md-5 pr-md-5">';

echo '<small class="gray-text-1">';
echo get_sub_field('content');
echo '</small>';

echo '<div class="row align-items-center">';
$testimonialsImage = get_sub_field('headshot'); 
if($testimonialsImage){
echo '<div class="col-lg-3 col-5">';
echo wp_get_attachment_image($testimonialsImage['id'],'full','',['class'=>'img-testimonial h-auto w-100']); 
echo '</div>';
}

echo '<div class="col-lg-9 col-7">';
echo '<small>';
echo '<span class="h6"><strong>' . get_sub_field('name') . '</strong></span><br><span class="d-block">' . get_sub_field('job_title') . '</span>';

echo '</small>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
endwhile; 

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

endif;

echo '</section>';
// end of testimonials

 
  get_footer();

?>