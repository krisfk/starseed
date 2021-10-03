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




<img class="star0 fadein-ele" style=" width: 500px !important;position: absolute;top: 82px;left: -444px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star0.png" alt="">

<img class="star2 fadein-ele" style="  width: 320px !important;position: absolute;top: -2px;left: 540px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star2.png" alt="">

<img class="star3 fadein-ele " style=" width: 300px !important;position: absolute;top: 120px;right: -163px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star3.png" alt="">

<img class="star4 fadein-ele" style="width: 170px !important;position: absolute;bottom: 51px;left: 600px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star4.png" alt="">





<div class="row align-items-center mt-0 mobile-column-reverse ">

    <div class="col-lg-6 col-md-12 col-sm-12 col-12 txt-top content-txt ">
        <!-- <h1>星際種子學院</h1>
        星際種子學院是一個幫助光行者和靈修人士喚醒內心的星際種子的平台。這裡是引導每一個靈魂回家的道路；在這裡，你會更深入認識身心靈的世界，並且在這個世界盡情發光發亮！ -->

        <?php echo get_field('content_1');?>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-12 "><img class="humans-img "
            src="<?php echo get_template_directory_uri();?>/assets/images/humans.png" alt="">
    </div>
</div>


</div>

<div class="row  ">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container">

                    <div class="row align-items-center ">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12  g-0">
                            <img class="w-100 sitting-img"
                                src="<?php echo get_template_directory_uri();?>/assets/images/sitting2.png" alt="">

                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12 g-0  content-txt">

                            <?php echo get_field('content_2');?>

                            <!-- <h1>關於我們</h1>
                            <div>
                                星際種子學院是一個幫助光行者和靈修人士喚醒內心的星際種子的平台。這裡是引導每一個靈魂回家的道路；在這裡，你會更深入認識身心靈的世界，並且在這個世界盡情發光發亮！我們的靈魂來到地球，所渴望的就是體驗完滿的生命。而現在，在這裡，你將會可以在你的靈性修行上更進一步，讓你的療癒、冥想、學習、知識全都進入另一種境界。在這裡，你將會接受成為星際光行者所需要的訓練和教育。我們除了提供教授各種靈性技術的課程和工作坊外，也創立了「揚升之鑰」，一個長期讓大家吸收靈性知識、接受點化和讓宇宙的頻率融入自己生活的學習平台，讓大家的學習不會因為課程或工作坊的時數而受限制，可以定期吸收新知識和接受提升。
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="container mt-5 mb-5 position-relative">


    <img class="star5" style="width: 400px !important;position: absolute;left: -280px;bottom: -70px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star5.png" alt="">

    <img class="star6" style=" width: 350px !important;position: absolute;top: -69px;right: -200px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">



    <div class="row align-items-center mobile-column-reverse">


        <div class="col-lg-8 col-md-12 col-sm-12 col-12  text-end content-txt">
            <?php echo get_field('content_3');?>

            <!-- <h1>關於Bosco</h1>
            <div>
                星際種子學院是一個幫助光行者和靈修人士喚醒內心的星際種子的平台。這裡是引導每一個靈魂回家的道路；在這裡，你會更深入認識身心靈的世界，並且在這個世界盡情發光發亮！我們的靈魂來到地球，所渴望的就是體驗完滿的生命。而現在，在這裡，你將會可以在你的靈性修行上更進一步，讓你的療癒、冥想、學習、知識全都進入另一種境界。在這裡，你將會接受成為星際光行者所需要的訓練和教育。我們除了提供教授各種靈性技術的課程和工作坊外，也創立了「揚升之鑰」，一個長期讓大家吸收靈性知識、接受點化和讓宇宙的頻率融入自己生活的學習平台，讓大家的學習不會因為課程或工作坊的時數而受限制，可以定期吸收新知識和接受提升。
            </div> -->
            <a href="<?php echo get_site_url();?>/about-us" class="know-more-btn">了解更多</a>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 ">
            <img class="w-100 bosco-foto" src="<?php echo get_template_directory_uri();?>/assets/images/bosco-foto.png"
                alt="">

        </div>

    </div>


</div>


<div class="bottom-container-wrapper">
    <div class="container">

        <div class="row align-items-center position-relative h-100">


            <div class="col-lg-6 col-md-12 col-sm-12 col-12  position-relative key-bg">

                <div class="content-txt me-5 px-3">
                    <?php echo get_field('content_4');?>

                    <!-- <h1>揚升之鑰</h1>
                    <div>
                        揚升之鑰是一個讓希望進一步開發靈性潛能的人長期學習和在靈性上成長的平台。在這個平台上，你將會吸收到大量在書局和網上無法找到的資訊，以及連結來自星際和宇宙間的高頻能量，讓來自宇宙本源的能量填滿你生命的每一個部分。
                    </div> -->
                    <a href="<?php echo get_site_url();?>/key" class="know-more-btn">了解更多</a>

                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 position-relative bud-bg ">


                <div class="content-txt me-5 px-3">
                    <!-- <h1>多次元靈魂療癒</h1>
                    <div>
                        多次元靈魂療癒是一種釋放生理、情緒、心智和靈性上的能量堵塞的療癒過程。在這個療癒過程中，Bosco會進入非物質維度找出你希望處理的事項的成因。
                    </div> -->
                    <?php echo get_field('content_5');?>


                    <a href="<?php echo get_site_url()?>/multi-dimensional-soul-healing" class="know-more-btn">了解更多</a>


                </div>


            </div>


        </div>
    </div>
</div>


<?php


get_footer();