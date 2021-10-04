<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>


<div class="container position-relative pt-5">
    <img class="star7 fadein-ele" style="  width: 200px !important;position: absolute;top: 49px;left: 485px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star7.png" alt="">
    <img class="star8 fadein-ele left-star"
        style="  width: 305px !important;position: absolute;top: 240px;left: -140px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star8.png" alt="">
    <img class="star9 fadein-ele"
        style="  width: 370px !important;position: absolute;top: 520px;left: 543px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
    <img class="star10 fadein-ele right-star"
        style="  width: 370px !important;position: absolute;top: 600;right: -165px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt="">

    <?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
</div>
<?php
get_footer();