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
    print('<script>window.location.href="'.get_site_url().'/key'.'"</script>');
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





<div class="inner-container  mt-5 text-center fadein-ele">
    <div class="row align-items-center justify-content-center gx-5">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top  ">
            <h1>
                <?php echo get_the_title();?>
            </h1>
        </div>

        <div class="mt-4 content-txt-div">
            <?php echo get_the_content();?>



        </div>

    </div>
</div>

</div>






<div class="container mt-6  text-center inner-container pb-5">

    <?php

$cat_args=array(
    'orderby' => 'name',
    'order' => 'ASC'
     );
  $categories=get_categories($cat_args);
    


$idx=0;

  foreach($categories as $category) { 
    ?>
    <div class="course-entry-div mb-5">
        <!-- <table>
            <tr>
                <td class="position-relative overflow-hidden"
                    style="background: url(<?php echo  z_taxonomy_image_url($category->term_id);?>); background-size:auto 100%;">
                    <div class="course-entry-rect"></div>
                    <img class="course-thumbnail" src="<?php echo  z_taxonomy_image_url($category->term_id);?>" alt="">
                </td>
                <td class="text-start pe-5 ps-4 pt-5 pb-5">
                    <h2><?php 
                     echo $category->name;
                    ?>
                    </h2>

                    <div class="content-txt-div">
                        <?php 
                     echo $category->description;
                    ?>

                    </div>

                    <div class="text-end"> <a href="<?php echo get_site_url()?>/category/<?php echo $category->slug;?>"
                            class="know-more-btn2">了解更多</a>
                    </div>
                </td>
            </tr>
        </table> -->
        <div class="row">
            <div class="entry-row-bg col-lg-5 col-md-5 col-sm-12 col-12  position-relative overflow-hidden"
                style="background: url(<?php echo  z_taxonomy_image_url($category->term_id);?>); background-size:auto 100%;">
                <div class="course-entry-rect"></div>
                <img class="course-thumbnail" src="<?php echo  z_taxonomy_image_url($category->term_id);?>" alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12  text-start p-5">
                <h2><?php 
                     echo $category->name;
                    ?>
                </h2>

                <div class="content-txt-div p-0">
                    <?php 
                     echo $category->description;
                    ?>

                </div>

                <div class="text-end"> <a href="<?php echo get_site_url()?>/category/<?php echo $category->slug;?>"
                        class="know-more-btn2">了解更多</a>
                </div>
            </div>
        </div>
    </div>
    <?php
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