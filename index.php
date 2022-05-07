<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href='<?= get_stylesheet_uri(); ?>'>
    <?php wp_head(); ?>
</head>
<body>
    <h1><?= get_bloginfo( 'name' ); ?></h1>
    <h2><?= get_bloginfo( 'description'); ?></h2>
    
    <nav>
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'container_class' => 'primary-menu-container',
                'items_wrap'      => '<ul class="primary-menu-wrapper">%3$s</ul>',
            )
        );
        ?>
    </nav>

    
</body>
</html>

