<?php
/**
 * archive.php
 * 記事一覧を表示.
 */

/** Initicalize */
require_once( __DIR__ . '/vendor/autoload.php' );
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
    <link rel="stylesheet" href="<?= $css_dir ?>/content.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header();?>
	
	<?php
	$categories = get_the_category();
	$tags = get_the_tags();
    $counter = 0;
	?>
	
    <main id="category_main" <?php post_class();?>>
        <div class="main_wave">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
                <path id="wave_main" d=""/>
            </svg>
        </div>
        <div class="inwave_content" style="background-color:#82D5FA; margin-top:-10px">
            <div class="content_box">
                <h3><?= $categories[0]->name;?></h3>
                <div class="headline"></div>

                <div class="post_list_box">                    
                    <?php if(have_posts()):?>
                        <?php while(have_posts()):
                            $counter++;
    
                            the_post();
                            
                            $author = get_the_author_meta('ID', $ID);
                            $author_img = get_avatar($author);
                            $author_src =  get_content_image($author_img);
                            
                            $post_time = new \HattoriLib\HattoriLib\DateTime\PostTime( get_the_time('U') );
                        ?>
        
                            <a href="<?php the_permalink(); ?>">
                                <div class="sns_box">
                                    <div class="sns_box_icon">
                                        <img src="<?= $author_src ?>" alt="author_icon">
                                        <span></span>
                                    </div>
                                    <div class="sns_box_content">
                                        <div class="sns_box_head container_row"> <!-- 真ん中 -->
                                            <div class="sns_box_name"><?= get_the_author() ?></div>
                                            <div class="sns_box_date"><?= $post_time->diffFormat() ?></div>
                                        </div>
                                        <div class="sns_box_body">
                                            <div>
                                                <?php
                                                echo (
                                                    htmlspecialchars(
                                                        substr(strip_tags(the_title()), 0, 66))
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <?php if($categories[0]->count != $counter): ?>
                            <div class="sns_box_border" style="max-width:350px;"></div>
                            <?php endif; ?>
                            
                        <?php endwhile;?>
                        <div id="pager_navigation">
                        <?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
	</main>

    <?php 
    // get_sidebar();
    get_footer();