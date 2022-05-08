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
    <link rel="stylesheet" href="<?= $css_dir ?>/front-page.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>

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
        <span>かっこいいは正義！</span>
        <span>面白いは原動力！！</span>
        <span>ロボットと自動運転と</span>
        <span>AIの世界へようこそ！！！</span>
        <img src="<?= $images_dir ?>/ev_bus.svg" alt="ev_bus">
    </div>

    <a href="/">
        <div class="headnews container-row">
            <div class="item">
                <div class="container-row">
                    <div class="item headnews_head">News!</div>
                    <div class="item headnews_time">2022.5.7 Sut.</div>
                </div>
                <div>
                    <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
                </div>
                <div class="headnews_author">Author y_takaya</div>
            </div>
            <div class="item">
                <h3 class="headnews_title">「犬ロボット」プロジェクトでいろいろやりました。</h3>
                <h4 class="no-mobile headnews_desc">ここはサブタイトル部分で、それっぽく見せるための工夫です。正直必要ないと思います</h4>
                <div class="headnews_readmore">READ MORE !</div>
            </div>
        </div>
    </a>
    
    <div class="mobile_selector">
        <a href="/">
            <div style="border:solid;">
                <h3>NEWS</h3>
                <h4>最新情報</h4>
            </div>
        </a>
        <a href="/">
            <div style="border:solid;">
                <h3>BLOG</h3>
                <h4>メンバーのブログ</h4>
            </div>
        </a>
        <a href="/">
            <div style="border:solid;">
                <h3>配属希望の方へ</h3>
            </div>
        </a>
        <a href="/">
            <div style="border:solid;">
                <h3>研究室紹介</h3>
            </div>
        </a>
    </div>

    <!-- 次ページ -->

    <div>
        <h3>ニュースリリース</h3>

        <!-- 使い回しを想定しているパーツ -->
        <div style="display:flex;">
            <div> <!-- 左 -->
                <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
            </div>
            <div> <!-- 真ん中 -->
                <div>Mikan</div>
                <div>ううん。魂は救われるエンジェル！</div>
            </div>
            <div> <!-- 右 -->
                <div>3日前</div>
            </div>
        </div>

        <div>READ MORE !</div>
    </div>

    <div>
        <h3>
            <span>メンバーのブログ</span>
            <span>随時更新中</span>
        </h3>

        <!-- 使い回しを想定しているパーツ -->
        <div style="display:flex;">
            <div> <!-- 左 -->
                <img src="<?= $images_dir ?>/sample_icon.png" alt="sample_icon">
            </div>
            <div> <!-- 真ん中 -->
                <div>Mikan</div>
                <div>ううん。魂は救われるエンジェル！</div>
            </div>
            <div> <!-- 右 -->
                <div>3日前</div>
            </div>
        </div>

        <div>READ MORE !</div>
    </div>

    <!-- スマホでは非表示部分 -->
    <div class="no-mobile primary_footer">
        <div>Twitter</div>
        <div>随時更新中！</div>
        <div>検索窓</div>
        <div>なんか写真</div>
        <div>共有リンク</div>
        <div>なんか写真</div>
    </div>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>

