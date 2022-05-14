<?php
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
    <link rel="stylesheet" href="<?= $css_dir ?>/for3rd.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>
<body>
    <div style="height:100vh;">
        <div class="no-mobile front">
            <img src="<?= $images_dir ?>/for3rd_front.png" alt="for3rd">
        </div>
        <div class="only-mobile front">
            <img src="<?= $images_dir ?>/for3rd_front_mobile.png" alt="for3rd">
        </div>
    </div>

    <div class="container_column flex_space-around" style="height:100vh;">
        <div>
            <h2 class="head_title">
                群機能・自律分散システム研究室<br/>はとても楽しい研究室です。
            </h2>
            <div class="head_line"></div>
        </div>

        <div class="only-mobile">
            <img src="<?= $images_dir ?>/class_blue.svg" alt="class_blue" class="head_image">
        </div>
    
        <div>
            <div class="container_row flex_center">
                <div class="img_block">
                    <img src="<?= $images_dir ?>/for3rd_project_01.png" alt="画像" style="width:100%; height:100%; object-fit:cover;"/>
                    <div class="mask">
                        <div class="caption">
                            <h3>ロボット犬</h3>
                            <br/>
                            AIを用いて人や状況を認識して、芸をしたり道案内等シーンに合った行動を目指しています。
                        </div>
                    </div>
                </div>
                <div class="img_block">
                    <img src="<?= $images_dir ?>/for3rd_project_02.png" alt="画像" style="width:100%; height:100%; object-fit:cover;" />
                    <div class="mask">
                        <div class="caption">
                            <h3>デジタル画像と画像処理</h3>
                            <br/>
                            デジタル画像を解析・処理してより実用的な情報にする研究開発を行なっています。
                        </div>
                    </div>
                </div>
            </div>
            <div class="container_row flex_center">
                <div class="img_block">
                    <img src="<?= $images_dir ?>/for3rd_project_03.png" style="width:100%; height:100%; object-fit:cover;" alt="画像" />
                    <div class="mask">
                        <div class="caption">
                             <h3>人の流れを自動計測</h3>
                            <br/>
                            行列を自動検出し、利用人数や待ち時間を計測することができます。
                        </div>
                    </div>
                </div>
                <div class="img_block">
                    <img src="<?= $images_dir ?>/for3rd_project_04.png" alt="画像" style="width:100%; height:100%; object-fit:cover;" />
                    <div class="mask">
                        <div class="caption">
                                <h3>学生プロジェクト</h3>
                                <br/>
                                毎年アメリカ ネバダ州で行われるロケット実験に参加することができます。
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blue_box">
        <div class="container_column flex_center" style="height:100%">
            <div class="blue_box_head only-mobile">
                <div class="blue_box_head_highlight">マルチエージェント、自動運転、</div>
                <div class="blue_box_head_highlight">宇宙・群ロボット、ロケット、</div>
                <div class="blue_box_head_highlight">無線給電、スマフォAI、画像処理</div>
            </div>
            <div class="blue_box_head no-mobile">
                <div class="blue_box_head_highlight">マルチエージェント、自動運転、宇宙・群ロボット</div>
                <div class="blue_box_head_highlight">ロケット、無線給電、スマフォAI、画像処理</div>
            </div>
    
            <div class="only-mobile" style="margin:30px;">
                <img src="<?= $images_dir ?>/meta.svg" alt="meta" style="width:70vw;">
            </div>
    
            <div class="white_box">
                <div class="container_column flex_space-around" style="height:100%;">
                    <div class="container_column trip_keyword only-mobile">
                        <div>上記のキーワードに</div>
                        <div class="container_row flex_center" style="margin:10px auto 20px auto">
                            <div>
                                <div style="width:100%; border-bottom: solid 3px #5132D3; margin-top:10px; transform: rotate(10deg);"></div>
                                <div style="transform: rotate(10deg);">
                                    <span style="font-size:42px;">ピン！</span>
                                </div>
                                <div style="width:100%; border-bottom: solid 3px #5132D3; margin-top:5px; transform: rotate(-7deg);"></div>
                            </div>
                            <div style="transform: rotate(15deg);">
                                <img src="<?= $images_dir ?>/pin_man.svg" alt="pin" style="width:88px;">
                            </div>
                        </div>
                        <div>ときたら服部・松岡研究室へ！</div>    
                    </div>
                    <div class="no-mobile">
                        <div class="container_row flex_center trip_keyword">
                            <div>上記のキーワードに</div>
                            <div class="trip_keyword_pin">ピン！</div>
                            <div>ときたら服部・松岡研究室へ！</div>    
                        </div>
                    </div>
                    <a href="/contact">
                        <div class="container_row flex_center trip_button">
                            <div style="container_column">
                                <div style="line-height:30px;">
                                    <span style="font-size:22px;">研究室見学</span><br/>
                                    <span style="font-size:40px;">受付中</span>
                                </div>
                            </div>
                            <div class="trip_img_flag">
                                <img src="<?= $images_dir ?>/flag.svg" alt="flag" style="width:60px;">
                            </div>
                        </div>     
                    </a>
                </div>
                <!-- <div>
                    <div>上記のキーワードに<span>ピン！</span>ときたら服部・松岡研究室へ！</div>
                    <a href="/">                
                        <div style="display:flex;">
                            <div>研究室見学</div>
                            <div>受付中</div>
                            <img src="<?= $images_dir ?>/flag.svg" alt="flag" style="width:100px;">
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>

    <div class="container_column flex_center" style="height:90vh;">
        <div class="only-mobile" style="margin: 7vh auto 7vh auto">
            <h3 style="font-size:20px;">
                研究室メンバーの<br/>
                ブログも要チェック♪
            </h3>
        </div>
        <div class="no-mobile" style="margin: 7vh auto 7vh auto">
            <h3 style="font-size:35px;">
                研究室メンバーのブログも要チェック♪
            </h3>
        </div>

        <div>
            <div class="container_column" style="width:400px; margin:0 auto;">
                <?php
                    /** モバイル向け　最新ニュースを2つ取得 */
                    $counter = 0;
                    $args = [
                        'category_name' => 'blog',
                        'numberposts' => 3
                    ];
                    $custom_posts = get_posts($args);
                    $array_size = count($custom_posts);
                    // $post = $custom_posts[0];
                    foreach ($custom_posts as $post):
                        $counter++;
                        setup_postdata( $post );
                        $author = get_the_author_meta();
                        $author_img = get_avatar($author);
                        $author_src =  get_content_image($author_img);?>
    
                <a href="<?php echo($post->guid); ?>">
                    <div class="sns_box">
                        <div class="sns_box_icon">
                            <img src="<?= $author_src ?>" alt="author_icon">
                            <span></span>
                        </div>
                        <div class="sns_box_content">
                            <div class="sns_box_head"> <!-- 真ん中 -->
                                <div class="sns_box_name"><?= get_the_author() ?></div>
                                <div class="sns_box_date"><?= the_time('Y.m.d D') ?></div>
                            </div>
                            <div class="sns_box_body"> <!-- 右 -->
                                <div>
                                    <?php
                                    echo (
                                        htmlspecialchars(
                                            substr(strip_tags($post->post_title), 0, 66))
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
    
                <?php if($array_size != $counter): ?>
                <span class="sns_box_border"></span>
                <?php endif; ?>
    
                <?php endforeach; ?>
            </div>
            <a href="/blog">
                <div class="read_more">READ MORE !</div>
            </a>
        </div>
    </div>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>