<?php

/**
 * author.php
 * 筆者の紹介ページ
 */

/** Initicalize */
require_once(__DIR__ . '/vendor/autoload.php');
$assets_dir = get_template_directory_uri() . "/assets";
$images_dir = $assets_dir . "/images";
$css_dir = $assets_dir . "/css";

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= $css_dir ?>/ress.css">
    <link rel="stylesheet" href='<?= get_stylesheet_uri(); ?>'>
    <link rel="stylesheet" href="<?= $css_dir ?>/content.css">
    <link rel="stylesheet" href="<?= $css_dir ?>/author.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header(); ?>

    <main>
        <div class="main_wave">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:100%;">
                <path id="wave_main" d="" />
            </svg>
        </div>
        <div class="inwave_content" style="background-color:#82D5FA; margin-top:-10px;">
            <div class="author_content_box">
                <?php
                $user_data = get_userdata($author);
                $author_img = get_avatar($author);
                $author_src =  get_content_image($author_img);
                ?>
                <!-- Author情報 (ヘッダー) -->
                <div class="container_row author_head_box">
                    <!-- Author情報 左側 (アイコン) -->
                    <div>
                        <div class="author_icon author_icon_large_size">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span class="author_icon_large_size"></span>
                        </div>
                    </div>
                    <!-- Author情報 右側 -->
                    <div style="width: 100%;">
                        <!-- Author 名前 -->
                        <h1 class="author_name"><?= $user_data->display_name ?></h1>
                        <!-- Author SNS一覧/投稿数 -->
                        <div class="container_row flex_space-between author_sns_box author_sns_posts">
                            <div class="container_row">
                                <div class="author_sns">
                                    <a href="mailto:<?= $user_data->user_email ?>">
                                        <img src="<?= $images_dir ?>/icon/mail_01.svg" alt="mail" height="25px">
                                    </a>
                                </div>
                                <div class="author_sns">
                                    <a href="https://facebook.com/<?= $user_data->facebook ?>">
                                        <img src="<?= $images_dir ?>/icon/facebook_logo.svg" alt="facebook" height="25px">
                                    </a>
                                </div>
                                <div class="author_sns">
                                    <a href="https://twitter.com/<?= $user_data->twitter ?>">
                                        <img src="<?= $images_dir ?>/icon/twitter_logo.svg" alt="twitter" height="25px">
                                    </a>
                                </div>
                                <div class="author_sns">
                                    <a href="https://github.com/<?= $user_data->github ?>">
                                        <img src="<?= $images_dir ?>/icon/github_logo.png" alt="github" height="25px">
                                    </a>
                                </div>
                                <div class="author_sns">
                                    <a href="https://qiita.com/<?= $user_data->qiita ?>">
                                        <img src="<?= $images_dir ?>/icon/qiita_logo.png" alt="qiita" height="25px">
                                    </a>
                                </div>
                            </div>
                            <div>投稿数: <?= count_user_posts($author) ?></div>
                        </div>
                        <!-- Author 自己紹介 -->
                        <div>
                            <?= $user_data->description ?>
                        </div>
                    </div>
                </div>

                <!-- Author 投稿一覧 -->
                <div class="author_posts">
                    <h3>過去の投稿</h3>
                    <?php
                    $posts = get_posts("author=$author&orderby=date&post_type=post&numberposts=1000");
                    if (!empty($posts)) { ?>
                        <ul>
                            <?php foreach ($posts as $post) : setup_postdata($post); ?>
                                <a href="<?php the_permalink() ?>">
                                    <li class="container_row flex_align_center flex_space-between">
                                        <div class="container_row">
                                            <div class="author_posts_icon">
                                                <img src="<?= $author_src ?>" alt="author_icon">
                                            </div>
                                            <div class="author_posts_title">
                                                <?php the_title(); ?>
                                            </div>
                                        </div>
                                        <div class="author_posts_date">
                                            <?php
                                            $post_time = new \HattoriLib\HattoriLib\DateTime\PostTime(get_the_time('U'));
                                            echo $post_time->diffFormat();
                                            ?>
                                        </div>
                                    </li>
                                </a>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    <?php
                    } ?>
                </div>

                <?php
                /*
                echo "<h2>ユーザー一覧</h2>";
                for ($i = 1; $i <= count_users()['total_users']; $i++) {
                    $user_data = get_userdata($i);

                    $author_img = get_avatar($i);
                    $author_src =  get_content_image($author_img);
                    // var_dump($user_data);
                    echo "氏名： " . $user_data->last_name . $user_data->first_name . "<br />";
                    echo "表示名: " . $user_data->display_name . "<br/>";
                    echo "ニックネーム: " . $user_data->user_nicename . "<br/>";
                    echo "メールアドレス: " . $user_data->user_email . "<br/>";
                    echo "投稿数: " . count_user_posts($i) . "<br/>";
                    echo "Twitter: " . $user_data->twitter . "<br/>";
                    echo "アバター： " . $author_src . "<br/>";
                    echo "URL " . $user_data->user_url . "<br/>";
                    echo "自己紹介 " . $user_data->description . "<br/>";
                    echo "<br/><br/>";
                }
                */
                ?>
            </div>
        </div> <!-- inwave_content -->


    </main>

    <?php
    // get_sidebar();
    get_footer();

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
