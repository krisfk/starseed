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
// if( pms_is_member_of_plan( array( 178 ) ) ) 
// {
//     wp_redirect(get_site_url().'/logged');
//     exit;
// }
?>

<!-- 
<img class="star0" src="<?php echo get_template_directory_uri();?>/assets/images/star0.png" alt="">

<img class="star2" src="<?php echo get_template_directory_uri();?>/assets/images/star2.png" alt="">

<img class="star3" src="<?php echo get_template_directory_uri();?>/assets/images/star3.png" alt="">

<img class="star4" src="<?php echo get_template_directory_uri();?>/assets/images/star4.png" alt=""> -->




<img class="star7 fadein-ele" style="  width: 200px !important;position: absolute;top: 49px;left: 485px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star7.png" alt="">
<img class="star8 fadein-ele" style="  width: 305px !important;position: absolute;bottom: 20px;left: -140px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star8.png" alt="">
<img class="star9 fadein-ele" style="  width: 370px !important;position: absolute;bottom: -120px;left: 543px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
<img class="star10 fadein-ele" style="  width: 370px !important;position: absolute;bottom: 0;right: -165px;z-index: 0;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt="">

<img class="left-star star7 fadein-ele animate__animated animate__fadeIn delay-2"
    style="z-index:0;position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
    src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
    alt="">

<img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
    style="z-index:0;position: absolute;top: <?php echo rand(500,600); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
    src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
    alt="">

<img class="left-star fadein-ele animate__animated animate__fadeIn delay-2"
    style="z-index:0;position: absolute;top: <?php echo rand(700,900); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
    src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
    alt="">

<img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
    style="z-index:0;position: absolute;top: <?php echo rand(1100,1300); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
    src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
    alt="">




<div class="inner-container pb-6 mt-lg-5 mt-md-0 mt-sm-0 mt-0  mb-5 line-height">




    <div class="row align-items-top justify-content-center gx-5 mobile-column-reverse">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12 txt-top " id="form-top">

            <h1>揚升之鑰
            </h1>
            <?php
                        if( !pms_is_member_of_plan( array( 178 ) ) ) 
{
    echo get_field('content_1');

}
            ?>
            <!-- 揚升之鑰是一個為靈修人士提供資源以學習成長和提升能量的平台。這個平台是一個讓靈修人士可以接觸一些平時不會接觸到的知識和宇宙頻率的媒介。


            <div class="mt-4">每月僅 HKD $30 ，即可申請成為星際種子學院會員 <br>
                無限欣賞大量精彩身心靈文章、冥想引導，及參與直播互動。讓正在提升意識的你可以持續學習不同身心靈學派的理論和技術，安在家中療癒自己的生命、提升自己的頻率、轉化自己的人生。
                <br><br>
                現在加入，即享7日免費會員體驗，您可以隨時取消。
            </div> -->

            <?php if( !pms_is_member_of_plan( array( 178 ) ) ) 
            {
                ?>
            <div class="form-div mt-5 form-div-login desktop-form-div-login">

                <div class="text-center">
                    <h4>會員登入</h4>
                </div>
                <?php
if($_GET['f']==1){
    ?>
                <div class="wrong-login-msg">登入資料不正確</div>

                <?php

}
?>
                <?php

wp_login_form();
?>


                <a href="<?php echo get_site_url();?>/register" class="d-inline-block register-a">新會員加入</a>



            </div>
            <?php
            }?>






            <?php 
            // $member = pms_get_member(  );
            // print_r($member);

            $user_id= get_current_user_id();
            $member = pms_get_member($user_id);
            $status = $member->subscriptions[0]['status'];
            if($status=='expired')
            {
                  wp_redirect(get_site_url().'/account');
                  exit;
            }
            
            echo do_shortcode( '[pms-register]' );
            ?>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">


            <?php if( !pms_is_member_of_plan( array( 178 ) ) ) 
            {
                ?>
            <div class="form-div mt-0 form-div-login mobile-form-div-login">

                <div class="text-center">
                    <h4>會員登入</h4>
                </div>
                <?php
if($_GET['f']==1){
    ?>
                <div class="wrong-login-msg">登入資料不正確</div>

                <?php

}
?>
                <?php

wp_login_form();
?>


                <a href="<?php echo get_site_url();?>/register" class="d-inline-block register-a">新會員加入</a>



            </div>
            <?php
            }?>

            <img class="key-img " src="<?php echo get_template_directory_uri();?>/assets/images/key-img.png" alt="">
        </div>
    </div>
</div>

</div>

<div class="row g-0 login-hide">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container">

                    <div class="row align-items-center g-0 line-height">
                        <div class="col-12 text-center mobile-align content-txt-div">
                            <!-- 現在人類正在經歷非常重要的覺醒時期，越來越多靈魂開始回憶起自己的內在自性，認識到自己的靈魂的本質。很多人都希望可以進一步提升自己的意識，不斷找尋適合自己的靈性課程以及療法。可是，上課的日子最多只是數天，比較長的也只是數個月；然而，靈性的修行和意識的提升應該是長期且持續地進行的，因此Bosco就創立了這個「揚升之鑰」持續學習平台，讓各位正在覺醒的靈魂可以在這個平台上持續地學習，定期吸收知識和透過冥想下載宇宙能量，就像一個24小時的靈性課程一樣，讓每一個靈魂都可以在生活中善用這些靈性能量，進一步提升意識和成為更好的自己！
                            <br> <br>
                            在訂閱揚升之鑰後，你將會獲得權限進入「宇宙能量冥想」和「星際種子圖書館」兩個區域。「宇宙能量冥想」是一個下載了大量可以提升你的能量與本源共振的資料庫，而「星際種子圖書館」則是藏有大量身心靈專題教學文章的地方。這是一個知識和技術兼備的成長機會。只要你好好善用這些資源，你就可以獲得全面的意識提升，為揚升之路做好準備。 -->
                            <?php
            echo get_field('content_2');
            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="container mt-5  position-relative">


    <img class="left-star star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:0;position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:0;position: absolute;top: <?php echo rand(500,600); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="left-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:0;position: absolute;top: <?php echo rand(700,900); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="right-star fadein-ele animate__animated animate__fadeIn delay-2"
        style="z-index:0;position: absolute;top: <?php echo rand(1100,1300); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <div class="row align-items-center  position-relative mobile-column-reverse line-height main-entrance">


        <div class="col-lg-8 col-md-12 col-sm-12 col-12  text-end mobile-align">
            <?php
            echo get_field('content_3');
            ?>

            <div class="text-center">
                <a class="know-more-btn" href="<?php echo get_site_url();?>/cosmic-energy-meditation-content-1">
                    <?php 
            if( pms_is_member_of_plan( array( 178 ) ) ) 
            {
                echo '進入';
            }
            else
            {
                 echo '了解更多';
            }
                ?>
                </a>

            </div>

        </div>
        <div class="col-lg-4 col-md-12 col-md-12 col-12 ">
            <img class="w-100 bosco-foto" src="<?php echo get_template_directory_uri();?>/assets/images/sit-2.png"
                alt="">

        </div>

    </div>


    <div class="row align-items-center position-relative mt-lg-0 mt-md-5 mt-sm-5 mt-5 main-entrance">


        <!-- <img class="star11" style=" width: 400px !important;position: absolute;bottom: 330px;left: -170px;"
            src="<?php echo get_template_directory_uri();?>/assets/images/star5.png" alt=""> -->



        <div class="col-lg-4 col-md-12 col-md-12 col-12">
            <img class="w-100 bosco-foto" src="<?php echo get_template_directory_uri();?>/assets/images/library-img.png"
                alt="">

        </div>



        <div class="col-lg-8 col-md-12 col-sm-12 col-12  text-start line-height mobile-align content-txt-div pe-4 ps-4">

            <!-- <div class="container ps-e pe"> -->
            <?php
            echo get_field('content_4');
            ?>
            <!-- </div> -->
            <!-- <h1>星際種子圖書館</h1>
            <div>



                身心靈修行是一門非常博大精深的學問。在靈性修行的不同階段，我們都需要不同程度的知識來幫助我們更深入認識生命乃至整個宇宙。可是，現在坊間的身心靈知識都非常散亂，而且大部分宇宙知識都因為被網絡上泛濫的片面資訊洗版而沈底，這導致很多非常有價值的知識變得難以觸及。而星際種子圖書館的我出現，其實就是將難以觸及的智慧變成可以垂手可得的知識，讓你可以真正深入了解身心靈的世界，從此結束一知半解的修行方式。
                <br>
                Bosco自從踏上靈修旅程之後，一直積極研讀各種身心靈書籍。在尋找知識的過程中，他非常強調尋根究底的精神。這是由於現代的身心靈資訊比較零碎，感覺傳遞知識者並未能把身心靈的概念和詞彙作出全面解釋，甚至有時候還會發現不同的老師對某個概念所作出的解釋不一致的情況。因此，Bosco在探索的過程中很喜歡找出某個特定概念的根源，全面理解某個詞語所隱含的概念。


            </div>
            <a href="#" class="know-more-btn">了解更多</a> -->
            <a class="know-more-btn" href="<?php echo get_site_url();?>/interstellar-seed-library/"> <?php 
            if( pms_is_member_of_plan( array( 178 ) ) ) 
            {
                echo '進入';
            }
            else
            {
                 echo '了解更多';
            }
                ?></a>

        </div>

    </div>



</div>



<?php if( pms_is_member_of_plan( array( 178 ) ) ) 
            {
                ?>
<style type="text/css">
.login-hide {
    display: none;
}
</style>
<?php
            }
                ?>

<script type="text/javascript">
$(function() {

    // if ($('.pms-account-subscription-details-table').length > 0) {
    // window.location = '<?php echo get_site_url();?>/account';
    // }

    // form-div-register
    $('#pms_register-form').addClass('form-div-register');
    $('#pms_register-form').addClass('form-div')
    $('#pms_register-form').addClass('mt-5');
    $('.pms-form-fields-wrapper,.pms-field-section').addClass('row');
    $('.pms-field-type-heading,.pms-field-subscriptions').removeClass('col-6')
    // $('.pms-field-subscriptions').addClass('col-12');
    // $('.pms-field-subscriptions').addClass('m-0');
    $('.pms-field').addClass('col-lg-6');
    $('.pms-field').addClass('col-md-6');
    $('.pms-field').addClass('col-sm-12');
    $('.pms-field').addClass('col-12');
    $('.pms-field-type-heading,.pms-field-subscriptions').removeClass('col-lg-6');
    $('.pms-field-type-heading,.pms-field-subscriptions').removeClass('col-md-6');
    $('.pms-field-type-heading,.pms-field-subscriptions').removeClass('col-sm-6');
    $('.pms-field-type-heading').addClass('col-12 mt-3');
    $('.pms-field-subscriptions').addClass('col-12 m-0');





    $('<a href="#form-top" class="d-inline-block login-a">會員登入</a>').insertBefore($(
        '.pms-form-submit'));
    // $('.pms-field').addClass('mt-3');

    $('#pms_register-form').prepend('<div class="text-center"><h4>新會員加入</h4></div>');


    $('.register-a').click(function() {
        // $('.form-div').fadeOut(0);
        // $('.form-div-register').fadeIn(0);
    })

    $('.login-a').click(function() {
        $('.form-div').fadeOut(0);
        $('.form-div-login').fadeIn(0);

    });
    $('#pms_billing_city,#pms_billing_state').val('Hong Kong');
    $('#pms_billing_country').val('HK');
    // $('#pms_billing_address').val('Hong Kong');
})
</script>


<?php


get_footer();