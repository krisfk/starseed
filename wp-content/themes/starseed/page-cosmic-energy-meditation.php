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
    wp_redirect(get_site_url().'/cosmic-energy-meditation-content');
    exit;
}
?>



<img class="star0 fadein-ele" style=" width: 500px !important;position: absolute;top: 82px;left: -444px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star0.png" alt="">

<img class="star2 fadein-ele" style="  width: 320px !important;position: absolute;top: -2px;left: 540px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star2.png" alt="">

<img class="star3 fadein-ele " style=" width: 300px !important;position: absolute;top: 120px;right: -163px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star3.png" alt="">

<img class="star4 fadein-ele" style="width: 170px !important;position: absolute;bottom: 51px;left: 600px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star4.png" alt="">



<?php
// if( !pms_is_member_of_plan( array( 178 ) ) ) 
// {
//     wp_redirect(get_site_url().'/key');
//     exit;
// }
?>
<?php 
// echo get_queried_object()->term_id;
// $category_img = z_taxonomy_image_url(get_queried_object()->term_id);
// get_queried_object()->term_id
?>

<div class="inner-container  mt-5 text-center">
    <div class="row align-items-center justify-content-center gx-5">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top  ">
            <h1>
                <?php echo get_the_title();?>
                <?php //echo get_the_title();?>
            </h1>
        </div>

        <div class="mt-4 line-height">
            <?php 
            echo get_the_content();
            //echo get_the_content();?>
        </div>


        <a href="<?php echo get_site_url();?>/key" class="page-reg-btn">揚升之鑰會員登入</a>
        <a href="<?php echo get_site_url();?>/register" class="page-reg-btn">新會員加入</a>


        <div class="row mt-3">

            <div class="col-6">
                <img class="w-100" src="http://64.227.13.14/starseed/wp-content/uploads/2021/08/key-topic-1.jpeg"
                    alt="">
            </div>
            <div class="col-6">
                <img class="w-100" src="http://64.227.13.14/starseed/wp-content/uploads/2021/08/key-topic-1.jpeg"
                    alt="">
            </div>
        </div>

    </div>
</div>

</div>






<div class="container mt-6  text-center inner-container pb-5">


    <img class="left-star star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(500,600); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="left-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(700,900); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(1100,1300); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="left-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(1500,1700); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">








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