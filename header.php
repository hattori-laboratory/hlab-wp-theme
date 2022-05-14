<header>
    <title><?php wp_title('|', true, 'right');?> HATTORI-LAB</title>
    <h1><a href="/">HATTORI-LAB</a></h1>
    <h2>服部・松岡研究室</h2>
    
    <nav class="no-mobile primary_navigation">
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
</header>