<?php
/** Initicalize */
$assets_dir = get_template_directory_uri()."/assets";
$images_dir = $assets_dir."/images";
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href='<?= get_stylesheet_uri(); ?>'>
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>
<body>

    <h1>固定ページ</h1>

    <?php
    $args = [
    'category_name' => 'news',
    'numberposts' => 1
    ];
    $custom_posts = get_posts($args);
    $post = $custom_posts[0];
    echo the_title();
    echo the_content();
    ?>

    <ul>
    <?php
    // 条件を渡して記事を取得
    foreach ( $custom_posts as $post ): setup_postdata($post); ?>
        <li><?php the_time('Y/m/d') ?> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endforeach; ?>
    </ul>

    <?php wp_footer(); ?>
</body>
</html>