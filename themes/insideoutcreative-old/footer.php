<footer>
<section class="pt-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-3 col-6 text-center pb-5">
<a href="<?php echo home_url(); ?>">
<?php $logo = get_field('logo','options'); $logoFooter = get_field('logo_footer','options'); 
if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto']); 
} elseif($logo) {
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']);
}
?>
</a>
</div>

</div>
</div>
</div>
</section>

<section class="bg-accent" style="padding:50px 0;">
    <div class="container">
        <div class="row">
   
<div class="col-12 text-center text-white">
<?php echo get_template_part('partials/si'); ?>
<div class="text-gray-1 pt-4">
<?php the_field('website_message','options'); ?>
</div>
        </div>
    </div>
</section>

<div class="text-center pt-3 pb-3 pl-5 pr-5">
    <div class="d-flex justify-content-center align-items-center">

        
        <?php echo '<a href="https://insideoutcreative.io/" target="_blank" title="Website Development, Design &amp SEO in Colorado - Florida" style="">';
echo '<img class="auto img-backlink" src="
https://insideoutcreative.io/wp-content/uploads/2022/06/created-by-inside-out-creative-black.png
" alt="Website Development, Design &amp SEO in Colorado - Florida" width="175px" />';
echo '</a>'; ?>

    </div>
</div>
</footer>
<?php if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>