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






<div class="container">
    <div class="inner-container container pb-6 mt-5 text-center">
        <div class="row align-items-center justify-content-center gx-5 fadein-ele">

            <?php echo get_the_content();?>

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

    <img class="star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(30,60); ?>;width: 200px !important;opacity: 0;right: 0px;"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star7.png" alt="">
    <img class="star8 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;bottom: 20px;left: <?php echo rand(-300,-250); ?>;width: 305px !important;opacity: 0;"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star8.png" alt="">
    <!-- <img class="star9 fadein-ele" style="  width: 370px !important;position: absolute;bottom: -120px;left: 543px;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star6.png" alt="">
    <img class="star10 fadein-ele"
        style="  width: 370px !important;position: absolute;bottom: 0;right: -165px;z-index: 0;"
        src="<?php echo get_template_directory_uri();?>/assets/images/star9.png" alt=""> -->


    <?php if($subtitle)
{
    ?>

    <?php 
    if($heading_size=='h1')
    {
        ?>
    <h1 class="text-center""><?php echo $subtitle;?></h1>

    <?php
    }
    else if($heading_size=='h2')
    {
        ?>
    <h2 class=" text-center"><?php echo $subtitle;?></h2>

        <?php
    }
    

        ?>
        <?php
}
?>

        <div class="mt-3 text-start content-txt-div">

            <?php echo $content;?>
        </div>

</div>

<?php
        }
        else
        {
?>

<div class="row g-0  <?php echo $idx ==0 ? 'mt-5' : 'mt-6' ; ?> ">

    <div class="col-12 position-relative ">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container inner-container">

                    <div class="row align-items-center g-0">
                        <div class="col-12 text-left">

                            <?php if($subtitle)
{
    ?>

                            <?php 
    if($heading_size=='h1')
    {
        ?>
                            <h1 class="text-center""><?php echo $subtitle;?></h1>

    <?php
    }
    else if($heading_size=='h2')
    {
        ?>
    <h2 class=" text-center"><?php echo $subtitle;?></h2>

                                <?php
    }
    

        ?>
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


<!-- <div class="row g-0 mt-6">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container inner-container">

                    <div class="row align-items-center g-0">
                        <div class="col-12 text-left">



                            <h2 class="text-center">星際薩滿行者</h2>
                            <div class="mt-4">
                                作為一位星際薩滿行者，Bosco會透過在非物質的維度中修行下載宇宙能量和向各上師學習。根據Dr. Michael
                                Harner的定義，「薩滿」是指可以透過轉換意識狀態進入非物質維度旅行的人；而「薩滿行者」則是指掌握這種轉換意識狀態的技術，但不只服務於某特定族群或宗族的薩滿。而Bosco之所以被稱為「星際薩滿行者」，是由於他所遊歷的非物質維度並不限於一般薩滿所進入的空間，他可以透過轉換意識狀態遊歷於宇宙的不同空間維度，是一位遊走於星際間的「薩滿」，因此被稱為「星際薩滿行者」。

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="container inner-container mt-5 text-center mb-5">

    <h2>宇宙知識傳遞者</h2>


    <div class="mt-4 text-start">
        然而，Bosco並非一出生就擁有這種天賦。在小時候，Bosco只是一個普通的小朋友，也跟一般人一樣信仰宗教和心理學，曾經希望長大後成為老師。然而，後來他偶然在書局裡看到一本身心靈書籍，這本書籍改變了他一生。Bosco被這本書中的知識吸引，也著迷於與宇宙的連結。就這樣，Bosco內心的「星際種子」就開始萌芽。他開始沈迷於宇宙知識，經常翻看來自不同地方的身心靈書籍，研讀不同的通靈資料；由神智學（Theosophy）到揚升大師運動（Ascended
        Masters Movement）乃至新時代運動（New Age
        Movement）。然而，他發現有很多很珍貴的知識都因為現今泛濫的網絡資訊而被遺忘和誤解；他這些資訊的遺失是一件很可惜的事情，因此決定把這些難以觸及（unreachable）的知識變成大家可以觸及（reachable）的資訊，讓每一個人都可以獲得這些知識，擺脫一知半解的靈修方法，以在靈性修練中更加精進。
    </div>
</div>


<div class="row g-0 mt-6">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container inner-container">

                    <div class="row align-items-center g-0">
                        <div class="col-12 text-left">



                            <h2 class="text-center">多次元靈魂療癒師
                            </h2>
                            <div class="mt-4">

                                Bosco的薩滿修練是從療癒心靈的工作開始的。Bosco本身是美國國家催眠治療師協會（NGH）和美國催眠師考試局（ACHE）認證的專業催眠治療師，以及NGH認證的催眠治療發證導師；希望把傳統催眠治療和身心靈治療結合來為個案解決問題。後來，Bosco在催眠狀態中連結到宇宙力量和高我，然後他開始把這些力量運用在冥想、療癒和考試等日常生活事務當中，並一直跟隨高我的引導跟隨不同的光行者老師學習，掌握不同的靈性技術，例如：啟動靈視力、連結指導靈等等，並且從不同老師口中學習在市場上的身心靈書籍中沒有交代和提及的知識。
                                <br> <br>
                                後來，Bosco在指導靈和上師的引導下，進一步掌握如何運用各種來自本源的能量進行療癒、轉化生命、改變運勢等等的方法；並進入不同的跨次元學校學習各種宇宙知識以及療癒技巧，再講所有曾經學習過的知識、能量、技術和療法應用在療癒中。Bosco的多次元靈魂療癒技術包含了家族系統排列、祖先療癒、各種靈氣、身心病理學、靈魂碎片修復、薩滿祛除療癒、前世能量治療、力量動物、Ho‘oponopono、星癒引導、天使療癒、以太水晶療癒、光語療癒等等的元素。Bosco發現，雖然當中加入了很多來自不同系統的元素，但並不會導致頻率紊亂，而且反而讓療癒變得更有效。
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>





<div class="container inner-container mt-5 text-center mb-5">

    <h2>從零開始的啟蒙
    </h2>


    <div class="mt-4 text-start">
        Bosco深明都市人在靈性修行道路上所面對的挑戰。他小時候從來沒有任何靈性慧根，也不是天生的通靈管道；他只是希望追求宇宙真理和把宇宙的「道」實踐在生活當中，善用宇宙知識和資源以成就更好的自己。因此，Bosco一開始只會研讀和學習有關各大宗教和吸引力法則的知識。然而，在尋覓的過程中，他因為想要更進一步成長和改變而踏上靈修的道路。他開始學習如何運用直覺、如何看見能量、如何掃描人體氣場、如何與其他維度/密度的存有接觸等等，一步一步地從三維意識的人變成意識跟宇宙頻率共振的療癒師。
    </div>
</div>




<div class="row g-0 mt-6">

    <div class="col-12 position-relative">

        <div class="about-div-wrapper  pt-5 pb-5">
            <div class="about-div">
                <div class="container inner-container">

                    <div class="row align-items-center g-0">
                        <div class="col-12 text-left">



                            <h2 class="text-center">進入光碼的維度

                            </h2>
                            <div class="mt-4">

                                透過在非物質的維度裡學習療癒和宇宙知識，Bosco認識到宇宙一切萬有背後其實都是由光碼編程而成。這是由於我們正在體驗的外在實相，其實都是內在實相（internal
                                reality）的編程所產生的。而療癒的關鍵，就在於重新將影響我們人生的光碼（能量）編寫，把內在實相中影響著我們的舊有制約和程式解除，並運用來自宇宙本源的各種光碼為內在實相重新編程，從而轉化我們的人生。
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<div class="container inner-container mt-5 text-center mb-5">

    <h2>Bosco的願景

    </h2>


    <div class="mt-4 text-start">
        Bosco成立星際種子學院，因為他相信每個人心目中都擁有非常強大的智慧；一旦這些智慧被啟動，就會在人的生命產生巨變。透過分享沒有被污染的宇宙知識和療癒技術，他希望可以幫助大家激活自己內心的星際種子，重新掌握自己過去世的知識和智慧，再次履行自己的靈魂使命，成為更好的自己！
    </div>
</div>


 -->








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

        $('.soul-healing-content-' + group).html(content)

    })

})
</script>


<?php


get_footer();