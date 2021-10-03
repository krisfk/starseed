<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/common.js"></script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">


        <!-- <a href="javascript:void(0);" class="menu-close-btn"></a> -->


        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

        <?php //get_template_part( 'template-parts/header/site-header' ); ?>


        <!-- <img class="bg-img" src="<?php echo get_template_directory_uri();?>/assets/images/bg.jpg" alt=""> -->

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">



                    <div class="main-container mx-auto">

                        <!-- <img class="bg-img-2" src="<?php echo get_template_directory_uri();?>/assets/images/bg.jpg"
                            alt=""> -->
                        <!-- <img class="bg-img-3" src="<?php echo get_template_directory_uri();?>/assets/images/bg.jpg"
                            alt=""> -->
                        <div class="container position-relative pt-3 ">

                            <div class="top-menu-container mb-lg-0 mb-md-2 mb-sm-2 mb-2  ">

                                <div class="row align-items-center top-menu-div">
                                    <div class="col-2">
                                        <a href="<?php echo get_site_url();?>" class="logo-a">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png"
                                                alt="">
                                        </a>

                                        <a href="<?php echo get_site_url();?>" class="mobile-logo-a">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/starseed-mobile-logo.png"
                                                alt="">
                                        </a>
                                        <a href="<?php echo get_site_url();?>" class="mobile-logo-word">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/mobile-logo-word.png"
                                                alt="">

                                        </a>
                                    </div>
                                    <div class="col-10 text-end">

                                        <div class="top-menu-ul-wrapper">
                                            <ul class=" top-menu-ul">

                                                <li class="mobile-logo-li">
                                                    <!-- <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png"
                                                    alt=""> -->
                                                    <a href="<?php echo get_site_url();?>" class="logo-a">
                                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png"
                                                            alt="">
                                                    </a>

                                                </li>
                                                <?php
                                    $main_menu = wp_get_menu_array('main menu');
foreach ($main_menu as $menu_item) {

$url = $menu_item['url'];
$title = $menu_item['title'];
$class = $menu_item['class'];

$temp_arr=explode(get_site_url(),$url);
$slug=str_replace('/en/','',$temp_arr[1]);
$slug=str_replace('/cn/','',$slug);
$slug=str_replace('/','',$slug);


if(count($menu_item['children']))
{
  
    echo '<li><a class="level-1 parent '.$class.'" href="'.$url.'">'.$title;
    ?>
                                                <img class="arrow"
                                                    src="<?php echo get_template_directory_uri();?>/assets/images/white-arrow-enter.png"
                                                    alt="">

                                                <?php
    echo'</a>';

 
    echo '<ul class="mobile-menu-submenu">';
?>

                                                <?php
    
    foreach ($menu_item['children'] as $sub_menu_item) 
    {
        $sub_url = $sub_menu_item['url'];
        $sub_title = $sub_menu_item['title'];
        
        $sub_temp_arr=explode(get_site_url(),$sub_url);
        $sub_slug=str_replace('/en/','',$sub_temp_arr[1]);
        $sub_slug=str_replace('/cn/','',$sub_slug);
        $sub_slug=str_replace('/','',$sub_slug);
        echo'<li><a class="'.$sub_slug.'" href="'.$sub_url.'">'.$sub_title.'</a></li>';
    }
    echo '</ul>';

}
else
{
echo '<li><a class="level-1 '.$slug.' '.$class.'" href="'.$url.'">'.$title.'</a>';

}
echo'</li>';


}


// $langs= icl_get_languages('skip_missing=0&orderby=custom&order=asc&link_empty_to=');


$user_id= get_current_user_id();
$member = pms_get_member($user_id);
$status = $member->subscriptions[0]['status'];
$expired=false;
// echo 111;
if($status=='expired')
{
    $expired=true;

    //   wp_redirect(get_site_url().'/account');
    //   exit;
}

if( pms_is_member_of_plan( array( 178 ) )  || $expired) 
{
    ?>
                                                <li>
                                                    <a class="level-1"
                                                        href="<?php echo get_site_url();?>/account">我的帳號</a>
                                                </li>
                                                <li>
                                                    <a class="level-1"
                                                        href="<?php echo wp_logout_url(get_site_url()) ?>">登出</a>
                                                </li>
                                                <?php    // wp_redirect(get_site_url().'/key');
    // exit;
}

?>


                                                <li>
                                                    <a href="<?php echo get_site_url()?>/cart" class="cart-a"> <img
                                                            src="<?php echo get_template_directory_uri();?>/assets/images/cart.png"
                                                            alt=""></a>

                                                </li>
                                            </ul>
                                        </div>

                                        <!-- <a href="#" class="mobile-menu-btn float-end"> -->

                                        <a id="nav-icon3" href="#" class="mobile-menu-btn float-end">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <!-- </a> -->





                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <script type="text/javascript">
                            $(function() {


                                $('.top-menu-ul li a.level-1.parent').click(function(e) {
                                    if ($(window).width() <= 1200) {
                                        e.preventDefault();
                                        $(this).toggleClass('open');
                                        if ($(this).hasClass('open')) {
                                            $(this).next('.mobile-menu-submenu').slideDown(200);
                                        } else {
                                            $(this).next('.mobile-menu-submenu').slideUp(200);

                                        }
                                    }


                                })



                                $(window).resize(function() {
                                    // alert(6);

                                    if ($(window).width() > 1200) {
                                        $('.top-menu-ul').fadeIn(0);
                                        // $('.menu-close-btn').fadeOut(0);

                                    } else {
                                        $('.top-menu-ul').fadeOut(0);
                                        $('.top-menu-container').css({
                                            'height': 'auto'
                                        });
                                        // $('.top-menu-ul li a.level-1.parent').removeClass('open');
                                        $('.mobile-menu-submenu').fadeOut(0);
                                        $('.mobile-menu-btn').removeClass('open');

                                    }
                                })


                                $('.mobile-menu-btn').click(function(e) {
                                    e.preventDefault();
                                    $(this).toggleClass('open');
                                    if ($(this).hasClass('open')) {
                                        $('.top-menu-ul').fadeIn(200);
                                        $('.top-menu-container').css({
                                            'height': '100%'
                                        });

                                    } else {
                                        $('.top-menu-ul').fadeOut(0);
                                        $('.top-menu-container').css({
                                            'height': 'auto'
                                        });

                                    }

                                })

                                // $('.menu-close-btn').click(function(e) {
                                //     e.preventDefault();
                                //     $('.top-menu-ul').fadeOut(0);

                                //     // $('.menu-close-btn').fadeOut(0);

                                // })

                                $('.level-1').mouseenter(function() {

                                    if ($(window).width() > 1200) {
                                        $('.mobile-menu-submenu').clearQueue().fadeOut(0);


                                        if ($(this).hasClass('parent')) {
                                            $(this).next('.mobile-menu-submenu').fadeIn(0);

                                        }
                                    }



                                })

                                $('.mobile-menu-submenu').mouseleave(function() {

                                    if ($(window).width() > 1200) {

                                        $('.mobile-menu-submenu').fadeOut(0);
                                    }
                                })


                                $('.mobile-menu-submenu').mouseenter(function() {

                                    $(this).clearQueue().fadeIn(0);

                                })


                                $('.level-1').mouseleave(function() {

                                    if ($(window).width() > 1200) {


                                        $('.mobile-menu-submenu').delay(500).fadeOut(0)

                                    }
                                })




                                $('input[type="text"],input[type="submit"],input[type="email"],input[type="tel"],input[type="password"],input[type="number"],button,textarea,select')
                                    .addClass('form-control');
                                $('input[type="checkbox"]').addClass('form-check-input');

                                $('.page-account .pms-form-fields-wrapper,.pms-field-section.pms-section-billing-details.pms-billing-details')
                                    .addClass('row');

                                $('.page-account .pms-form-fields-wrapper .pms-field').addClass('col-5');
                                $('.page-account .pms-field.pms-field-type-heading').addClass('col-10');
                                $('.page-account #pms_edit-profile-form .pms-billing-details').css({
                                    'display': 'inline-flex'
                                });
                                // $('.page-account #pms-field-type-heading').addClass('text-center');


                            })
                            </script>