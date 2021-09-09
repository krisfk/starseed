<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>


<?php
if( !pms_is_member_of_plan( array( 178 ) ) ) 
{
    wp_redirect(get_site_url().'/key');
    exit;
}
?>
<?php 
// echo get_queried_object()->term_id;
$category_img = z_taxonomy_image_url(get_queried_object()->term_id);
// get_queried_object()->term_id
?>

<div class="inner-container  mt-5 text-center">
    <div class="row align-items-center justify-content-center gx-5">

        <div class="col-6 txt-top ">
            <h1>
                <?php echo single_term_title();?>
                <?php //echo get_the_title();?>
            </h1>
        </div>

        <div class="mt-4">
            <?php 
            the_archive_description();
            //echo get_the_content();?>
        </div>

    </div>
</div>

</div>






<div class="container mt-6  text-center inner-container pb-5">





    <img class="star0" src="<?php echo get_template_directory_uri();?>/assets/images/star0.png" alt="">

    <img class="star2" src="<?php echo get_template_directory_uri();?>/assets/images/star2.png" alt="">

    <img class="star3" src="<?php echo get_template_directory_uri();?>/assets/images/star3.png" alt="">

    <img class="star4" src="<?php echo get_template_directory_uri();?>/assets/images/star4.png" alt="">


    <?php
if (have_posts()) {
    while(have_posts())
    {
        the_post();
        ?>
    <div class="course-entry-div mb-5">
        <div class="row">

            <div class="entry-row-bg col-lg-5 col-md-5 col-sm-12 col-12  position-relative overflow-hidden"
                style="background: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $category_img;?>); background-size:auto 100%;">
                <div class="course-entry-rect"></div>
                <img class="course-thumbnail"
                    src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $category_img;?>"
                    alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12  text-start p-5">
                <h2><?php 
                     echo get_the_title();
                    ?>
                </h2>

                <div class="content-txt-div">
                    <?php 
                     echo get_the_content();
                     ?>

                </div>

                <div class="text-end"> <a href="<?php echo get_permalink()?>" class="know-more-btn2">了解更多</a>
                </div>
            </div>

        </div>
    </div>
    <?php
    }
}
       
?>




</div>




<script type="text/javascript">
$(function() {
    $('.slides').slick({
        dots: true,
    });

    $('.soul-healing-icon-a').click(function() {

        $('.soul-healing-icon-a').css({
            'opacity': 0.5
        })

        $('.soul-healing-icon-a').removeClass('active');
        $(this).toggleClass('active');


        $('.soul-healing-icon-a.active').css({
            'opacity': 1
        })


        var group = $(this).attr('data-group');
        var content = $(this).attr('rel');
        $('.soul-healing-content').html('')

        $('.soul-healing-content-' + group).html(content)

    })

})
</script>


<?php


get_footer();