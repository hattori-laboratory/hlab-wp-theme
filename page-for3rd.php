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
    <link rel="stylesheet" href="<?= $css_dir ?>/for3rd.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>
<body>
    <div class="no-mobile front">
        <img src="<?= $images_dir ?>/for3rd_front.png" alt="for3rd">
    </div>
    <div class="only-mobile front">
        <img src="<?= $images_dir ?>/for3rd_front_mobile.png" alt="for3rd">
    </div>

    <h2>群機能・自律分散システム研究室<br/>はとても楽しい研究室です。</h2>
    <img src="<?= $images_dir ?>/class_blue.svg" alt="class_blue">

    <div>
        <div class="img_block">
            <img src="<?= $images_dir =?>/sample_icon.png" alt="画像" />
            <div class="mask">
                <div class="caption">一時的な画像たち</div>
            </div>
        </div>
        <div class="img_block">
            <img src="<?= $images_dir =?>/sample_icon.png" alt="画像" />
            <div class="mask">
                <div class="caption">一時的な画像たち</div>
            </div>
        </div>
        <div class="img_block">
            <img src="<?= $images_dir =?>/sample_icon.png" alt="画像" />
            <div class="mask">
                <div class="caption">一時的な画像たち</div>
            </div>
        </div>
        <div class="img_block">
            <img src="<?= $images_dir =?>/sample_icon.png" alt="画像" />
            <div class="mask">
                <div class="caption">一時的な画像たち</div>
            </div>
        </div>
    </div>


    <div class="blue_box">
        <div>
            <div>マルチエージェント、自動運転、宇宙・群ロボット</div>
            <div>ロケット、無線給電、スマフォAI、画像処理</div>
        </div>

        <div>
            <div>上記のキーワードに<span>ピン！</span>ときたら服部・松岡研究室へ！</div>
            <a href="/">                
                <div style="display:flex;">
                    <div>研究室見学</div>
                    <div>受付中</div>
                    <img src="<?= $images_dir ?>/flag.svg" alt="flag">
                </div>
            </a>
        </div>
    </div>

    <div>
        <h3>研究室メンバーのブログも要チェック♪</h3>

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

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>