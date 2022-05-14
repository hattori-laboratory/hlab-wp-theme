<?php
/**
 * archive.php
 * 記事一覧を表示.
 */

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
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header();?>
	
	<?php
	$categories = get_the_category();
		$tags = get_the_tags();
	?>
	<header>
        <div id="header_layer">
            <h1><?php the_archive_title('','の記事');?></h1>
		    <?php echo category_description();?>		
			    <nav id="header_nav">
			    </nav>
		</div><!--END-header_layer-->
	</header>
	
    <main id="category_main" <?php post_class();?>>
	    <?php if(have_posts()):?>
	        <?php while(have_posts()):the_post();?>
		        <section class="articles_index">
			        <h2><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
		            <time class="date"><?php the_time('Y.m.d D.'); ?></time>
		            <div class="articles_index_thumbnail">
		                <a href="<?php the_permalink(); ?>">
		                    <?php the_post_thumbnail(); ?>
		                </a>
		            </div>
		            <nav id="tag_navigation">	
	                    <?php if (the_category()) the_category('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?>
	                </nav>
	            </section>
		    <?php endwhile;?>
		    <div id="pager_navigation">
                <?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
            </div>
		<?php endif;?>
	</main>

    <?php 
    get_sidebar();
    get_footer();