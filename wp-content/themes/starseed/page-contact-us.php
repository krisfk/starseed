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





<img class="star7 fadein-ele" style="  width: 200px !important;position: absolute;top: 49px;left: 485px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star7.png" alt="">
<img class="star8 fadein-ele" style="  width: 305px !important;position: absolute;bottom: 20px;left: -140px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star8.png" alt="">
<img class="star9 fadein-ele" style="  width: 370px !important;position: absolute;bottom: -120px;left: 543px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
<img class="star10 fadein-ele" style="  width: 370px !important;position: absolute;bottom: 0;right: -165px;z-index: 0;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt="">

<div class="inner-container  mt-5 text-center">
    <div class="row align-items-center justify-content-center gx-5 fadein-ele">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top ">
            <h1>聯絡我們
            </h1>
        </div>

        <div class="mt-4">

            我們樂意為您提供任何協助 <br>

            <table class="mx-auto text-start contact-table">
                <tr>
                    <td>Whatsapp:</td>
                    <td>5340 8275</td>
                </tr>
                <tr>
                    <td>Facebook:</td>
                    <td>
                        <a href="https://galacticstarseedacademy.com/"
                            target="_blank">https://galacticstarseedacademy.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>Instagram:</td>
                    <td>
                        <a href="https://www.instagram.com/g.s.a.official/"
                            target="_blank">https://www.instagram.com/g.s.a.official/</a>

                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>

                        <a href="mailto:boscofth0506@gmail.com" target="_blank">boscofth0506@gmail.com</a>
                    </td>
                </tr>
            </table>


            <br>

        </div>

    </div>
</div>

</div>






<div class="container mt-6  text-center inner-container pb-5">








</div>




<script type="text/javascript">


</script>


<?php


get_footer();