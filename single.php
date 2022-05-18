<?php
/**
 * single.php
 * 記事ページ
 */

 /** Initicalize */
$assets_dir = get_template_directory_uri()."/assets";
$images_dir = $assets_dir."/images";
$css_dir = $assets_dir."/css";

$ID = $post->post_author;

$author = get_the_author_meta('ID', $ID);
$author_img = get_avatar($author);
$author_src =  get_content_image($author_img);

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
    <link rel="stylesheet" href="<?= $css_dir ?>/single.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header();?>

    <div class="main_wave">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
            <path id="wave_main" d=""/>
        </svg>
    </div>
    <div class="inwave_content" style="background-color:#82D5FA; margin-top:-10px;">
        <div class="single_box">
            <div style="margin: 30px auto 50px auto;">
                <div class="container_row flex_center content_header">
                    <div class="sns_box_icon">
                        <img src="<?= $author_src ?>" alt="author_icon">
                        <span></span>
                    </div>
                    <div class="container_column flex_space-between content_title">
                        <h3 style="font-size: 20px"><?= the_title(); ?></h3>
                        <div style="border: 1px solid #5132D3; width:100%;"></div>
                        <div class="container_row flex_space-between">
                            <div><b>Author</b> <?= get_the_author_meta('nickname',$ID); ?></div>
                            <div><?= the_time('Y.m.d D.'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_content">
                <?php the_content(); ?>
                <div class="content_footer"></div>
            </div>
        </div>
    </div> <!-- inwave_content -->
</main>

<?php 
// get_sidebar();
get_footer();