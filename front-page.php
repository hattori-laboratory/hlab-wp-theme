<?php
/** Initicalize */
$assets_dir = get_template_directory_uri()."/assets";
$images_dir = $assets_dir."/images";
$css_dir = $assets_dir."/css";

function get_content_image ( $content ) {
    $pattern = '/<img.*?src\s*=\s*[\"|\'](.*?)[\"|\'].*?>/i';
    
    if ( preg_match( $pattern, $content, $images ) ){
        if ( is_array( $images ) && isset( $images[1] ) ) {
            return $images[1];
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= $css_dir ?>/ress.css">
    <link rel="stylesheet" href='<?= get_stylesheet_uri(); ?>'>
    <link rel="stylesheet" href="<?= $css_dir ?>/post_like_sns.css">
    <link rel="stylesheet" href="<?= $css_dir ?>/front-page.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>
<body>
    <div class="no-mobile head_img">
        <img src="<?= $images_dir ?>/for3rd_front.png" alt="head">
    </div>
    <div class="only-mobile head_img">
        <img src="<?= $images_dir ?>/for3rd_front_mobile.png" alt="head">
    </div>

    <?php get_header(); ?>
    <main>
        <div class="only-mobile headline" style="width: 270px; margin: 50px 20vw 50px 20vw;">
            <!-- <div id="headline_line"class="item"> -->
            <div>
                <div><span class="headline_highlight">かっこいいは正義！</span></div>
                <div><span class="headline_highlight">面白いは原動力！！</span></div>
                <div><span class="headline_highlight">ロボットと自動運転と<br/>AIの世界へようこそ！！！</span></div>
            </div>
            <!-- 
            <div class="item">
                <img id="headline_pic1" src="<?= $images_dir ?>/book_summer.svg" alt="book_summer">
                <img id="headline_pic2" src="<?= $images_dir ?>/ev_bus.svg" alt="ev_bus">
            </div>
            -->
        </div>
        <div class="no-mobile headline">
            <img src="<?= $images_dir ?>/book_summer.svg" alt="book_summer">
            <span class="headline_highlight">かっこいいは正義！面白いは原動力！！ロボットと自動運転とAIの世界へようこそ！！！</span>
            <img src="<?= $images_dir ?>/ev_bus.svg" alt="ev_bus">
        </div>

        <div class="no-mobile">
            <?php
                $args = [
                'category_name' => 'news',
                'numberposts' => 1
                ];
                $custom_posts = get_posts($args);
                // $post = $custom_posts[0];
                foreach ($custom_posts as $post):
                    setup_postdata( $post );
                    $author = get_the_author_meta();
                    $author_img = get_avatar($author);
                    $author_src =  get_content_image($author_img);
            ?>
            <a href="<?php echo($post->guid); ?>">
                <div class="headnews container_row flex_space-around">
                    <div class="item headnews_left">
                        <div class="container_row flex_space-around headnews_left_item">
                            <div class="item headnews_head">News!</div>
                            <div class="item headnews_time"><?= the_time('Y.m.d D.') ?></div>
                        </div>
                        <div class="headnews_left_item headnews_img" class="headnews_img">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span></span>
                        </div>
                        <div class="headnews_author headnews_left_item">
                            <b>Author</b>
                            <?= get_the_author() ?>
                        </div>
                    </div>
                    <div class="item headnews_right">
                        <h3 class="headnews_title">
                            <?php
                            echo (
                                htmlspecialchars(
                                    substr(strip_tags($post->post_title), 0, 66))
                                );
                            ?>
                        </h3>
                        <h4 class="no-mobile headnews_desc"><?php 
                                // echo var_dump($post);
                                echo (
                                    htmlspecialchars(
                                        substr(strip_tags($post->post_content), 0, 66))
                                    )."...";
                                // var_dump($post);
                            ?>
                        </h4>
                        <a href="<?php echo($post->guid); ?>">
                            <div class="headnews_readmore">続きを読む</div>
                        </a>
                    </div>
                </div>
            </a>
            <?php endforeach;
            wp_reset_postdata();
            ?>
        </div>

        <div class="main_wave">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
                <path id="wave_main" d=""/>
            </svg>
        </div>

        <div class="inwave_content only-mobile">

            <?php
            /** モバイル向け　最新ニュース取得 */
                $args = [
                'category_name' => 'news',
                'numberposts' => 1
                ];
                $custom_posts = get_posts($args);
                // $post = $custom_posts[0];
                foreach ($custom_posts as $post):
                    setup_postdata( $post );
                    $author = get_the_author_meta();
                    $author_img = get_avatar($author);
                    $author_src =  get_content_image($author_img);
            ?>
            <a href="<?php echo($post->guid); ?>">
                <div class="headnews container_row flex_space-around">
                    <div class="item headnews_left">
                        <div class="container_row flex_space-around headnews_left_item">
                            <div class="item headnews_head">News!</div>
                            <div class="item headnews_time"><?= the_time('Y.m.d D.') ?></div>
                        </div>
                        <div class="headnews_left_item headnews_img" class="headnews_img">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span></span>
                        </div>
                        <div class="headnews_author headnews_left_item">
                            <b>Author</b>
                            <?= get_the_author() ?>
                        </div>
                    </div>
                    <div class="item">
                        <h3 class="headnews_title"><?php
                            echo (
                                htmlspecialchars(
                                    substr(strip_tags($post->post_title), 0, 66))
                                );
                            ?></h3>
                        <div class="headnews_readmore">READ MORE !</div>
                    </div>
                </div>
            </a>
            <?php endforeach;
            wp_reset_postdata();
            ?>

            <div class="only-mobile">
                <div class="mobile_selector">
                    <a href="/category/news/">
                        <div class="mobile_selector_item text_center">
                            <div class="container_row  flex_align_center flex_center" style="padding-top:16px;">
                                <!-- <div style="margin-right:10px;">
                                    <img src="<?= $images_dir ?>/calendar.svg" alt="calendar" width="34px">
                                </div> -->
                                <div class="container_coulmn">
                                    <h3 class="moblie_selector_h3">NEWS</h3>
                                    <h4 class="moblie_selector_h4">最新情報</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/category/blog/">
                        <div class="mobile_selector_item text_center">
                            <div class="container_row  flex_align_center flex_center" style="padding-top:16px;">
                                <!-- <div style="margin-right:10px;">
                                    <img src="<?= $images_dir ?>/calendar.svg" alt="calendar" width="34px">
                                </div> -->
                                <div class="container_coulmn">
                                    <h3 class="moblie_selector_h3">BLOG</h3>
                                    <h4 class="moblie_selector_h4">メンバーのブログ</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/for3rd">
                        <div class="mobile_selector_item text_center" style="padding-top:26px;">
                            <div>
                                <h3 class="moblie_selector_h3">配属希望の方へ</h3>
                            </div>
                        </div>
                    </a>
                    <a href="/about">
                        <div class="mobile_selector_item text_center" style="padding-top:26px;">
                            <div>
                                <h3 class="moblie_selector_h3">研究室紹介</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- 次ページ -->

        <div class="topics text_center only-mobile">
            <div class="topics_item container_column flex_center">
                <h3>ニュースリリース</h3>
                <span class="topics_border"></span>
            </div>

            <!-- 使い回しを想定しているパーツ -->
            <div class="container_column">

                <?php
                    /** モバイル向け　最新ニュースを2つ取得 */
                    $counter = 0;
                    $args = [
                    'category_name' => 'news',
                    'numberposts' => 2
                    ];
                    $custom_posts = get_posts($args);
                    $array_size = count($custom_posts);
                    // $post = $custom_posts[0];
                    foreach ($custom_posts as $post):
                        $counter++;
                        setup_postdata( $post );
                        $author = get_the_author_meta();
                        $author_img = get_avatar($author);
                        $author_src =  get_content_image($author_img);?>

                <a href="<?php echo($post->guid); ?>">
                    <div class="sns_box">
                        <div class="sns_box_icon">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span></span>
                        </div>
                        <div class="sns_box_content">
                            <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                <div class="sns_box_name"><?= get_the_author() ?></div>
                                <div class="sns_box_date"><?= the_time('Y.m.d D') ?></div>
                            </div>
                            <div class="sns_box_body"> <!-- 右 -->
                                <div>
                                    <?php
                                    echo (
                                        htmlspecialchars(
                                            substr(strip_tags($post->post_title), 0, 66))
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <?php if($array_size != $counter): ?>
                <span class="sns_box_border"></span>
                <?php endif; ?>

                <?php endforeach; ?>
            </div>
            <a href="/category/news/">
                <div class="read_more">READ MORE !</div>
            </a>
        </div>

        <div class="topics text_center only-mobile">
            <div class="topics_item container_column flex_center">
                <h4>メンバーのブログ</h4>
                <h3>随時更新中</h3>
                <span class="topics_border"></span>
            </div>

            <!-- 使い回しを想定しているパーツ -->
            <div class="container_column">

            <?php
                    /** モバイル向け　最新ブログを2つ取得 */
                    $counter = 0;
                    $args = [
                    'category_name' => 'blog',
                    'numberposts' => 2
                    ];
                    $custom_posts = get_posts($args);
                    $array_size = count($custom_posts);
                    // $post = $custom_posts[0];
                    foreach ($custom_posts as $post):
                        $counter++;
                        setup_postdata( $post );
                        $author = get_the_author_meta();
                        $author_img = get_avatar($author);
                        $author_src =  get_content_image($author_img);?>

                <a href="<?php echo($post->guid); ?>">
                    <div class="sns_box">
                        <div class="sns_box_icon">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span></span>
                        </div>
                        <div class="sns_box_content">
                            <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                <div class="sns_box_name"><?= get_the_author() ?></div>
                                <div class="sns_box_date"><?= the_time('Y.m.d D') ?></div>
                            </div>
                            <div class="sns_box_body"> <!-- 右 -->
                                <div>
                                    <?php
                                    echo (
                                        htmlspecialchars(
                                            substr(strip_tags($post->post_title), 0, 66))
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            <?php if($array_size != $counter): ?>
                <span class="sns_box_border"></span>
                <?php endif; ?>

                <?php endforeach; ?>
            </div>
            <a href="/category/blog/">
                <div class="read_more">READ MORE !</div>
            </a>
        </div>

        <div class="inwave_content no-mobile" style="padding: auto 30px;">
            <div class="white_box white_box_topic" style="min-height:720px">
                <div class="container_row" style="height:55vh; padding-top:5vh;">

                    <div class="topics text_center" style="margin-right:10px;">
                        <div class="topics_item container_column flex_center">
                            <h3>ニュースリリース</h3>
                            <span class="topics_border"></span>
                        </div>
                        
                        <!-- 使い回しを想定しているパーツ -->
                        <div class="container_column">

                            <?php
                            /** PC向け　最新ニュースを3つ取得 */
                                $counter = 0;
                                $args = [
                                'category_name' => 'news',
                                'numberposts' => 3
                                ];
                                $custom_posts = get_posts($args);
                                $array_size = count($custom_posts);
                                // $post = $custom_posts[0];
                                foreach ($custom_posts as $post):
                                    $counter++;
                                    setup_postdata( $post );
                                    $author = get_the_author_meta();
                                    $author_img = get_avatar($author);
                                    $author_src =  get_content_image($author_img);?>

                            <a href="<?php echo($post->guid); ?>">
                                <div class="sns_box">
                                    <div class="sns_box_icon">
                                        <img src="<?= $author_src ?>" alt="author_icon">
                                        <span></span>
                                    </div>
                                    <div class="sns_box_content">
                                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                            <div class="sns_box_name"><?= get_the_author() ?></div>
                                            <div class="sns_box_date"><?= the_time('Y.m.d D') ?></div>
                                        </div>
                                        <div class="sns_box_body"> <!-- 右 -->
                                            <div>
                                                <?php
                                                echo (
                                                    htmlspecialchars(
                                                        substr(strip_tags($post->post_title), 0, 66))
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        
                            <?php if($array_size != $counter): ?>
                            <span class="sns_box_border"></span>
                            <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                        <a href="/category/news/">
                            <div class="read_more">READ MORE !</div>
                        </a>
                    </div>
                
                
                    <div class="topics text_center" style="margin-left:10px;">
                        <div class="topics_item container_column flex_center">
                            <h4>メンバーのブログ</h4>
                            <h3>随時更新中</h3>
                            <span class="topics_border"></span>
                        </div>
                        
                        <!-- 使い回しを想定しているパーツ -->
                        <div class="container_column">

                            <?php
                            /** PC向け　最新ブログを3つ取得 */
                                $counter = 0;
                                $args = [
                                'category_name' => 'blog',
                                'numberposts' => 3
                                ];
                                $custom_posts = get_posts($args);
                                $array_size = count($custom_posts);
                                // $post = $custom_posts[0];
                                foreach ($custom_posts as $post):
                                    $counter++;
                                    setup_postdata( $post );
                                    $author = get_the_author_meta();
                                    $author_img = get_avatar($author);
                                    $author_src =  get_content_image($author_img);?>
                            
                            <a href="<?php echo($post->guid); ?>">
                                <div class="sns_box">
                                    <div class="sns_box_icon">
                                        <img src="<?= $author_src ?>" alt="author_icon">
                                        <span></span>
                                    </div>
                                    <div class="sns_box_content">
                                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                        <div class="sns_box_name"><?= get_the_author() ?></div>
                                        <div class="sns_box_date"><?= the_time('Y.m.d D') ?></div>
                                    </div>
                                        <div class="sns_box_body"> <!-- 右 -->
                                            <div>
                                                <?php
                                                echo (
                                                    htmlspecialchars(
                                                        substr(strip_tags($post->post_title), 0, 66))
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </a>
                            <?php if($array_size != $counter): ?>
                            <span class="sns_box_border"></span>
                            <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                        <a href="/category/blog/">
                            <div class="read_more">READ MORE !</div>
                        </a>
                        
                    </div>
                </div> <!-- end container_row -->
                
                <!--
                <div style="margin: 0 30px 30px auto; width:250px;">
                    <img src="<?= $images_dir ?>/city_2.svg" alt="city">
                </div>
                -->
            </div> <!-- end white_box -->
        </div>
        
        <!-- PC用フッター情報 -->
        <div class="no-mobile primary_footer">
            <div class="footer_part">
                <div class="container_row flex_center footer_flex" style="height:100%;">
                    <div style="flex-grow: 2;"> <!-- 左 -->
                        <div class="primary_footer_box">
                            <div style="padding:5px;">
                                <!-- <a class="twitter-timeline" data-width="580" data-height="880" href="https://twitter.com/yuzukichu_lip?ref_src=twsrc%5Etfw">Tweets by yuzukichu_lip</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                            </div>
                        </div>
                    </div> <!-- 左 -->

                    <div class="container_column" style="flex-grow: 3;"> <!-- 右 -->
                        <div class="container_row" style="flex-grow: 2;">

                            <div class="container_column" style="flex-grow: 10;"> <!--TODO-->
                                <div class="primary_footer_box">
                                    <div style="margin:10px; font-weight:bold; color:white; font-size:14vh; line-height:14vh; min-height:36vh;">
                                        随時<br/>更新中！
                                    </div>
                                </div>
                                <div class="primary_footer_box">
                                    <!-- 検索窓 -->
                                    <input type="text" name="search_box" id="search_box" class="footer_search_box">
                                </div>
                            </div>

                            <div class="primary_footer_box footer_img footer_img_02" style="flex-grow: 15;"> <!--TODO-->
                                <!-- 宇宙飛行士の写真 -->
                            </div>

                        </div>

                        <div class="container_row" style="flex-grow: 1;">
                            <div class="primary_footer_box" style="flex-grow:1;">
                                <!-- 共有リンク -->
                            </div>
                            <div class="primary_footer_box footer_img footer_img_01" style="flex-grow:2";>
                                <!-- 服部先生 -->
                                <!-- <img src="<?=$images_dir?>/footer_1.jpeg" alt="footer" style="object-position: 0 100%;"> -->
                            </div>
                        </div>
                    </div> <!-- 右 -->
                </div> <!-- container 大外 -->
            </div>
        </div>
    </main>

    <?php get_footer();