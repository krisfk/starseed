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


<img class="star7 fadein-ele" style="  width: 200px !important;position: absolute;top: 49px;left: 485px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star7.png" alt="">
<img class="star8 fadein-ele" style="  width: 305px !important;position: absolute;bottom: 20px;left: -140px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star8.png" alt="">
<img class="star9 fadein-ele" style="  width: 370px !important;position: absolute;bottom: -120px;left: 543px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
<img class="star10 fadein-ele" style="  width: 370px !important;position: absolute;bottom: 0;right: -165px;z-index: 0;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt="">

<?php
$id = get_the_id();
$terms = get_the_terms( $id, 'category' );
foreach($terms as $term) {
	$term_id = $term->term_id;
}
$category_img = z_taxonomy_image_url($term_id);

?>
<div class="inner-container pb-6 mt-5">
    test
    <div class="row align-items-center justify-content-center gx-5 mobile-column-reverse">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top  fadeleft-ele">
            <h1 class="mt-4"><?php echo get_the_title();?>

            </h1>
            <div class="mt-4 mb-4 content-txt-div text-justify">
                <!--   -->
                <?php //echo do_shortcode('[pms-restrict]'); ?>
                <!-- [pms-restrict] -->
                <?php
                

			echo get_the_content();
			?>
                <?php //echo do_shortcode('[/pms-restrict]'); ?>


            </div>




        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12  position-relative  faderight-ele">
            <img class="post-img w-100"
                src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $category_img;?>" alt="">


        </div>
    </div>
</div>


</div>


<?php
$idx=0;
if( have_rows('content_sections') )
{
    while(have_rows('content_sections') )
    {
        the_row(); 
        $subtitle = get_sub_field('subtitle_text');
        $content = get_sub_field('content');
        $heading_size= get_sub_field('heading_size');
        if($idx %2 ==1)
        {
                ?>
<div class="container inner-container mt-4 text-center mb-5">


    <img class="left-star star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:-10;position: absolute;top: <?php echo rand(100,200); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">
    <?php if($subtitle)
{
    ?>

    <h2 class=" text-center"><?php echo $subtitle;?></h2>

    <?php
}
?>

    <div class="mt-3 text-start mobile-align content-txt-div">

        <?php echo $content;?>
    </div>

</div>

<?php
        }
        else
        {
?>
<div class="row g-0  <?php echo $idx ==0 ? 'mt-5' : 'mt-6' ; ?> ">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container inner-container">

                    <div class="row align-items-center g-0">
                        <div class="col-12 text-left">

                            <?php if($subtitle)
{
    ?>

                            <h2 class=" text-center"><?php echo $subtitle;?></h2>
                            <?php
}
?>
                            <div class="mt-4 text-start mobile-align content-txt-div">
                                <?php echo $content;?>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
        }

        $idx++;
    }
}
?>



<?php
// echo do_shortcode('[apwp_player playlist_id="21"]'); 
?>

<!-- <div class="search-track-div">
    <input class="search-track form-control" type="text" placeholder="Search sound track ...">


</div> -->
<?php
if(get_field('have_playlist'))
{
    ?>
<div class="playlist-div container mt-5 text-center pb-5 inner-container pe-3 ps-3 d-none">
    <h2 class="mt-4">播放列</h2>
    <div class="mt-4">

        <ul id="playlist">

            <?php
            $idx=1;
        if( have_rows('playlist') )
        {
            while(have_rows('playlist') )
            {
                the_row(); 

                ?>

            <?php 
                if($idx===1)
               {
                   ?>
            <li>
                <audio id="audio" preload="auto" tabindex="0" controls="" controlsList="nodownload" type="audio/mpeg">
                    <source type="audio/mp3" src="<?php echo get_sub_field('audio_file');?>">
                    Sorry, your browser does not support HTML5 audio.
                </audio>
            </li>
            <?php
               }
               ?>



            <li><a
                    href="<?php echo get_sub_field('audio_file');?>"><?php echo $idx.'. '. get_sub_field('sound_track_name');?></a>
            </li>


            <?php
            $idx++;
            }
        }
        
        // echo  get_field('notice_content');
        
        ?>
        </ul>

    </div>
</div>


<?php
}
?>




<div class="container mt-5 text-center pb-5 inner-container">

</div>




<script type="text/javascript">
$(function() {




    $('.search-track').bind('keyup', function() {

        var searchString = $(this).val();

        $(".duration-playlist li").each(function(index, value) {

            currentName = $(value).text();
            if (currentName.toUpperCase().indexOf(searchString.toUpperCase()) > -1) {
                $(value).show();
            } else {
                $(value).hide();
            }

        });

    });



    $(window).on('load', function() {
        $('.search-track-div').insertBefore($('.slimScrollDiv'));

    });



    // 
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
<style type="text/css">

</style>

<?php


get_footer();