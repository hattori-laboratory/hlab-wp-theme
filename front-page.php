<?php
/** Initicalize */
$assets_dir = get_template_directory_uri()."/assets";
$images_dir = $assets_dir."/images";
$css_dir = $assets_dir."/css";
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
    <?php get_header(); ?>
    <main>
        <div class="only-mobile headline">
            <div id="headline_line"class="item">
                <div><span class="headline_highlight">かっこいいは正義！</span></div>
                <div><span class="headline_highlight">面白いは原動力！！</span></div>
                <div><span class="headline_highlight">ロボットと自動運転と<br/>AIの世界へようこそ！！！</span></div>
            </div>
            <div class="item">
                <img id="headline_pic1" src="<?= $images_dir ?>/book_summer.svg" alt="book_summer">
                <img id="headline_pic2" src="<?= $images_dir ?>/ev_bus.svg" alt="ev_bus">
            </div>
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
                $post = $custom_posts[0];
                // echo the_title();
                // echo the_content();
            ?>
            <a href="/">
                <div class="headnews container_row flex_space-around">
                    <div class="item headnews_left">
                        <div class="container_row flex_space-around headnews_left_item">
                            <div class="item headnews_head"><?= the_category() ?></div>
                            <div class="item headnews_time"><?= the_time('Y.m.d D.') ?></div>
                        </div>
                        <div class="headnews_left_item headnews_img" class="headnews_img">
                            <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                            <span></span>
                        </div>
                        <div class="headnews_author headnews_left_item">Author <?= the_author() ?></div>
                    </div>
                    <div class="item headnews_right">
                        <h3 class="headnews_title"><?= the_title() ?></h3>
                        <h4 class="no-mobile headnews_desc"><?= the_content() ?></h4>
                        <div class="headnews_readmore">続きを読む</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="main_wave">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
                <path id="wave_main" d=""/>
            </svg>
        </div>

        <div class="inwave_content only-mobile">
            <a href="/">
                <div class="headnews container_row flex_space-around">
                    <div class="item headnews_left">
                        <div class="container_row flex_space-around headnews_left_item">
                            <div class="item headnews_head">News!</div>
                            <div class="item headnews_time">2022.5.7 Sut.</div>
                        </div>
                        <div class="headnews_left_item headnews_img" class="headnews_img">
                            <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                            <span></span>
                        </div>
                        <div class="headnews_author headnews_left_item">Author y_takaya</div>
                    </div>
                    <div class="item">
                        <h3 class="headnews_title">「犬ロボット」プロジェクトでいろいろやりました。</h3>
                        <h4 class="no-mobile headnews_desc">ここはサブタイトル部分で、それっぽく見せるための工夫です。正直必要ないと思います</h4>
                        <div class="headnews_readmore">READ MORE !</div>
                    </div>
                </div>
            </a>

            <div class="only-mobile">
                <div class="mobile_selector">
                    <a href="/">
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
                    <a href="/">
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
                    <a href="/">
                        <div class="mobile_selector_item text_center" style="padding-top:26px;">
                            <div>
                                <h3 class="moblie_selector_h3">配属希望の方へ</h3>
                            </div>
                        </div>
                    </a>
                    <a href="/">
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
                <div class="sns_box">
                    <div class="sns_box_icon">
                        <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                        <span></span>
                    </div>
                    <div class="sns_box_content">
                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                            <div class="sns_box_name">Mikan</div>
                            <div class="sns_box_date">3日前</div>
                        </div>
                        <div class="sns_box_body"> <!-- 右 -->
                            <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                        </div>
                    </div>
                </div>
                
                <span class="sns_box_border"></span>

                <div class="sns_box">
                    <div class="sns_box_icon">
                        <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                        <span></span>
                    </div>
                    <div class="sns_box_content">
                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                            <div class="sns_box_name">Mikan</div>
                            <div class="sns_box_date">3日前</div>
                        </div>
                        <div class="sns_box_body"> <!-- 右 -->
                            <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="read_more">READ MORE !</div>
        </div>

        <div class="topics text_center only-mobile">
            <div class="topics_item container_column flex_center">
                <h4>メンバーのブログ</h4>
                <h3>随時更新中</h3>
                <span class="topics_border"></span>
            </div>

            <!-- 使い回しを想定しているパーツ -->
            <div class="container_column">
                <div class="sns_box">
                    <div class="sns_box_icon">
                        <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                        <span></span>
                    </div>
                    <div class="sns_box_content">
                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                            <div class="sns_box_name">Mikan</div>
                            <div class="sns_box_date">3日前</div>
                        </div>
                        <div class="sns_box_body"> <!-- 右 -->
                            <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                        </div>
                    </div>
                </div>
                
                <span class="sns_box_border"></span>

                <div class="sns_box">
                    <div class="sns_box_icon">
                        <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                        <span></span>
                    </div>
                    <div class="sns_box_content">
                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                            <div class="sns_box_name">Mikan</div>
                            <div class="sns_box_date">3日前</div>
                        </div>
                        <div class="sns_box_body"> <!-- 右 -->
                            <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="read_more">READ MORE !</div>
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
                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                        <div class="sns_box_name">Mikan</div>
                                        <div class="sns_box_date">3日前</div>
                                    </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>
                        
                            <span class="sns_box_border"></span>
                            
                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                        <div class="sns_box_name">Mikan</div>
                                        <div class="sns_box_date">3日前</div>
                                    </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>

                            <span class="sns_box_border"></span>
                            
                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                        <div class="sns_box_name">Mikan</div>
                                        <div class="sns_box_date">3日前</div>
                                    </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="read_more">READ MORE !</div>
                    </div>
                
                
                    <div class="topics text_center" style="margin-left:10px;">
                        <div class="topics_item container_column flex_center">
                            <h4>メンバーのブログ</h4>
                            <h3>随時更新中</h3>
                            <span class="topics_border"></span>
                        </div>
                        
                        <!-- 使い回しを想定しているパーツ -->
                        <div class="container_column">
                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                    <div class="sns_box_name">Mikan</div>
                                    <div class="sns_box_date">3日前</div>
                                </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>
                            
                            <span class="sns_box_border"></span>

                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                    <div class="sns_box_name">Mikan</div>
                                    <div class="sns_box_date">3日前</div>
                                </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>
                            
                            <span class="sns_box_border"></span>

                            <div class="sns_box">
                                <div class="sns_box_icon">
                                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                                    <span></span>
                                </div>
                                <div class="sns_box_content">
                                    <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                    <div class="sns_box_name">Mikan</div>
                                    <div class="sns_box_date">3日前</div>
                                </div>
                                    <div class="sns_box_body"> <!-- 右 -->
                                        <div>ここは実際どれくらいの長さにしようか悩んではいるけどこれくらいかな</div>
                                    </div>
                                </div>
                            </div>

                            <div class="read_more">READ MORE !</div>
                        </div>
                        
                    </div>
                </div> <!-- end container_row -->
                
                <div style="margin: 0 30px 30px auto; width:250px;">
                    <img src="<?= $images_dir ?>/city_2.svg" alt="city">
                </div>
            </div> <!-- end white_box -->
        </div>
        
        <!-- スマホでは非表示部分 -->
        <div class="no-mobile primary_footer">
            <div class="container_row flex_center">
                <div> <!-- 左 -->
                    <div class="primary_footer_box primary_footer_2x3">
                        <div style="padding:5px;">
                            <a class="twitter-timeline" data-width="580" data-height="880" href="https://twitter.com/yuzukichu_lip?ref_src=twsrc%5Etfw">Tweets by yuzukichu_lip</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>

                <div class="container_column"> <!-- 右 -->
                    <div class="container_row">
                        <div class="container_column">
                            <div class="primary_footer_box primary_footer_2x1">
                                <div style="margin:26px 18px; font-weight:bold; color:white; font-size:120px; line-height:120px;"> 随時<br/>更新中！</div>
                            </div>
                            <div class="primary_footer_box primary_footer_2x1">
                                <!-- 検索窓 -->
                                <input type="text" name="search_box" id="search_box" class="footer_search_box">
                            </div>
                        </div>
                        <div class="primary_footer_box primary_footer_1x2 footer_img">
                            <!-- 宇宙飛行士の写真 -->
                            <img src="<?=$images_dir?>/footer_2.jpeg" alt="footer">
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="primary_footer_box primary_footer_1x1">
                            <!-- 共有リンク -->
                        </div>
                        <div class="primary_footer_box primary_footer_2x1 footer_img">
                            <!-- 服部先生 -->
                            <img src="<?=$images_dir?>/footer_1.jpeg" alt="footer" style="object-position: 0 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php get_footer();