<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
// ob_start() ;

if($_GET['add-to-cart'])
{
    // echo get_site_url().'/cart';
    // ob_start();
    // print('<script>window.location.href="'.get_site_url().'/cart'.'"</script>');
    wp_redirect(get_site_url().'/cart');
    exit;
    
}

defined( 'ABSPATH' ) || exit;

global $product;

?>




<a href="<?php echo get_site_url();?>/cart" class="cart-a cart-product-page"> <img
        src="<?php echo get_template_directory_uri();?>/assets/images/cart.png" alt=""></a>

<div class="inner-container pb-6 mt-lg-5 mt-md-0 mt-sm-0 mt-0 position-relative">


    <img class="star7 fadein-ele" style="  width: 200px !important;position: absolute;top: 49px;left: 485px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star7.png" alt="">
    <img class="star8 fadein-ele" style="  width: 305px !important;position: absolute;bottom: 20px;left: -140px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star8.png" alt="">
    <img class="star9 fadein-ele" style="  width: 370px !important;position: absolute;bottom: -120px;left: 543px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
    <img class="star10 fadein-ele"
        style="  width: 370px !important;position: absolute;bottom: 0;right: -165px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt="">
    <div class="row align-items-center justify-content-center gx-5 mobile-column-reverse">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top  fadeleft-ele">
            <h1><?php echo get_the_title();?>

            </h1>

            <div class="mt-3 price-div">價錢:$
                <?php echo wc_format_decimal( 	$product->get_regular_price(),2);?>

            </div>
            <div class="mt-4 mb-4">
                <?php
						echo $product->post->post_excerpt;
					?>
            </div>


            <div class="text-end">
                <!-- <a href="#" class="add-to-cart-btn">加入購物車</a> -->

                <?php
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button' : '',
					esc_attr( $product->get_type() ),
					esc_html( '加入購物車' )
				),
			$product );
				?>
            </div>


        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12  position-relative  faderight-ele">
            <!-- <img class="alien-img w-100" src="<?php echo get_template_directory_uri();?>/assets/images/alien.png"
                alt=""> -->

            <!-- <img class="w-100" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" /> -->
            <?php
                    echo get_field('layout_product_img');
                    ?>

        </div>
    </div>
</div>


<?php
if(get_field('main_subtitle'))
{
?>
<div class="inner-container pb-5 mt-4 text-center">
    <h2>
        <?php 
		echo get_field('main_subtitle');
		?></h2>
</div>
<?php
}
?>
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

    <div class="row">
        <div class="col-12 gx-lg-4 gx-md-5 gx-sm-5 gx-5 ">
            <?php if($subtitle)
{
    ?>

            <h2 class=" text-center"><?php echo $subtitle;?></h2>

            <?php
}
?>

            <div class="mt-3 text-start content-txt-div">

                <?php echo $content;?>
            </div>
        </div>

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
                            <div class="mt-4 text-start content-txt-div">
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
if(get_field('icon_and_text_structure'))
{
    ?>
<div class="container inner-container mt-5 icon-and-text-structure-div">
    <img class="star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(500,600); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">

    <img class="star8 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(700,900); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-300,-200); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">


    <div class="row text-center gx-lg-4 gx-md-0 gx-sm-0 gx-0 ">

        <?php
          
          $idx=1;
          $idx2=1;
            if( have_rows('icon_and_text_sections') )
            {
                while(have_rows('icon_and_text_sections') )
                {
                    the_row(); 

                    ?>

        <?php
                
                    ?>
        <div class="col-4">
            <a href="javascript:void(0);" class="soul-healing-icon-a  mt-5" data-group="<?php echo $idx2;?>"
                rel="<?php echo get_sub_field('section_content');?>">

                <img class="w-lg-75 w-md-100  w-sm-100  w-100   icon-img"
                    src="<?php echo wp_get_attachment_image_src(get_sub_field('icon'),'Full')[0];?>" alt="">

                <div class="d-inline-flex align-items-center mt-3">
                    <?php echo get_sub_field('section_title');?>
                    <img class="white-arrow-enter"
                        src="<?php echo get_template_directory_uri();?>/assets/images/white-arrow-enter.png" alt="">
                </div>
            </a>
        </div>
        <?php 
if($idx %3==0)
{
    ?>
        <div class="col-12">
            <div class="mt-4 soul-healing-content content-txt-div  soul-healing-content-<?php echo $idx2;?>">

            </div>

        </div>
        <?php
    $idx2++;
}
?>
        <!-- <div class="col-12">
            <div class="mt-4 soul-healing-content  soul-healing-content-2">

            </div>

        </div> -->
        <?php
        $idx++;
                }
            }

?>

    </div>
</div>
<?php
}
?>



<?php
if(get_field('show_heal_flow'))
{
?>
<div class="container  inner-container mt-5">


    <h1 class="text-center">療癒流程</h1>

    <?php
    $idx =1;
    if( have_rows('heal_flow') )
    {
        while(have_rows('heal_flow') )
        {
            the_row();  
            ?>

    <?php
            if($idx >1)
            {
?>
    <div class="text-center mt-4"> <img class="wide-down-arrow"
            src="<?php echo get_template_directory_uri();?>/assets/images/wide-down-arrow.png" alt=""></div>

    <?php
            }

            ?>

    <div class="heal-step-div text-center mt-4">


        <div class="content pb-5 pt-5">
            <h2><?php echo get_sub_field('flow_title');?></h2>
            <div> <?php echo get_sub_field('flow_content');?>


            </div>
        </div>

    </div>
    <?php
    $idx++;
        }
    }
    ?>



</div>

<!-- $idx=0;
if( have_rows('content_sections') )
{
    while(have_rows('content_sections') )
    {
        the_row();  -->

<?php
}
?>

<?php

if(get_field('show_client_case_share'))
{
    ?>
<div class="sharing-div pt-5 pb-5">


    <div class="container inner-container pt-5 pb-5">
        <div class="slides">


            <?php
          if( have_rows('clients_case_share') )
          {
              while(have_rows('clients_case_share') )
              {
                  the_row();  
                  ?>
            <div class="slide">

                <h2>客戶評語及個案分享</h2>
                <div class="mt-4 ps-3 pe-3 ">
                    <?php echo get_sub_field('sharing_text');?>
                </div>

                <h2 class="mt-4"> <?php echo get_sub_field('client_name');?>
                </h2>
                <div class="mt-4">描述</div>

            </div>
            <?php
              }
            }
        ?>

        </div>
    </div>



</div>
<?php
}
?>




<?php

if(get_field('show_notice_content'))
{
    ?>
<div class="container mt-5 text-center pb-5 inner-container pe-3 ps-3">
    <h1 class="mt-4">注意事項</h1>
    <div class="mt-4">
        <?php
        echo  get_field('notice_content');
        
        ?>
    </div>
</div>

<?php
}
?>








<div class="container mt-5 text-center pb-5 inner-container">

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

        $('.soul-healing-content-' + group).html(content);
        $('.soul-healing-content-' + group).fadeOut(0);
        $('.soul-healing-content-' + group).slideDown(200);

        $("body,html").scrollTop($(this).offset().top);


    })

})
</script>


<?php


get_footer();