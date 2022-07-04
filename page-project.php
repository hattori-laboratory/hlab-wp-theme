<?php

/**
 * page.php
 * 固定記事の表示.
 */

/** Initicalize */
$assets_dir = get_template_directory_uri() . "/assets";
$images_dir = $assets_dir . "/images";
$css_dir = $assets_dir . "/css";

$ID = $post->post_author;

$author = get_the_author_meta('ID', $ID);
$author_img = get_avatar($author);
$author_src =  get_content_image($author_img);

function get_content_image($content)
{
    $pattern = '/<img.*?src\s*=\s*[\"|\'](.*?)[\"|\'].*?>/i';

    if (preg_match($pattern, $content, $images)) {
        if (is_array($images) && isset($images[1])) {
            return $images[1];
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= $css_dir ?>/ress.css">
    <link rel="stylesheet" href='<?= get_stylesheet_uri(); ?>'>
    <link rel="stylesheet" href="<?= $css_dir ?>/post_like_sns.css">
    <link rel="stylesheet" href="<?= $css_dir ?>/single.css">
    <link rel="stylesheet" href="<?= $css_dir ?>/page-project.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header(); ?>

    <div class="main_wave">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
            <path id="wave_main" d="" />
        </svg>
    </div>
    <div class="inwave_content" style="background-color:#82D5FA; margin-top:-10px;">
        <div class="single_box">
            <div style="width:80%; margin: 30px auto;">
                <h3 style="font-size: 30px"><?= the_title(); ?></h3>
                <div style="border: 1px solid #5132D3; width:100%;"></div>
            </div>
            <div class="main_content">
                <?php
                $my_getposts = get_pages(array(
                    'child_of' => get_the_ID(),
                    'sort_column' => 'ID',
                    'sort_order' => 'ASC'
                )); ?>

                <?php foreach ($my_getposts as $post) : ?>
                    <?php setup_postdata($post); ?>

                    <div class="project_box">
                        <div>
                            <a href="<?php the_permalink(); ?>" class="project_head">
                                <div class="project_thumbnail">

                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?= $images_dir ?>/blue_planet.jpg" alt="thumbnail">
                                    <?php endif; ?>

                                    <div class="project_title">
                                        <?php the_title(); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                <?php endforeach;
                wp_reset_postdata(); ?>

                <div class="content_footer"></div>
            </div>
        </div>
    </div> <!-- inwave_content -->
    </main>

    <?php
    // get_sidebar();
    get_footer();
