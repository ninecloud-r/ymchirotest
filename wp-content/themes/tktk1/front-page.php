<?php
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>
<?php $url = get_theme_file_uri(); ?>

<?php 
// 1. トップページの固定ページIDを指定
$top_page_id = 7007; 

// 2. PC用メイン画像の取得
$img_pc_raw = get_field('top_main_img_pc1', $top_page_id);
$img_pc_url = "";
if ($img_pc_raw) {
    if (is_array($img_pc_raw)) { $img_pc_url = $img_pc_raw['url']; }
    elseif (is_numeric($img_pc_raw)) { $img_pc_url = wp_get_attachment_url($img_pc_raw); }
    else { $img_pc_url = $img_pc_raw; }
}

// 3. スマホ用メイン画像の取得
$img_sp_raw = get_field('top_main_img_sp1', $top_page_id);
$img_sp_url = "";
if ($img_sp_raw) {
    if (is_array($img_sp_raw)) { $img_sp_url = $img_sp_raw['url']; }
    elseif (is_numeric($img_sp_raw)) { $img_sp_url = wp_get_attachment_url($img_sp_raw); }
    else { $img_sp_url = $img_sp_raw; }
}

// スマホ用が空ならPC用を代用
if (!$img_sp_url) { $img_sp_url = $img_pc_url; }
?>

<div class="section concept-section">
    <div class="container mid">
        <div class="section-img">
            <?php if ($img_pc_url) : ?>
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo esc_url($img_sp_url); ?>">
                    <img src="<?php echo esc_url($img_pc_url); ?>" alt="しっかりした施術で整えます">
                </picture>
            <?php else : ?>
                <img src="<?php echo $url; ?>/view/images/top_img01.webp" alt="しっかりした施術で整えます">
            <?php endif; ?>
        </div>
        <div class="description-area">
            しっかりした施術で<br>
            背骨・筋肉・内臓・頭蓋骨を整えます
        </div>
    </div>
</div>

<div class="section story-section">
    <div class="container">
        <div class="contents-area">
            <div class="content-box">
                <div class="txt-box">
                    <p>すると・・・<br>
                    脳と体がしっかり連携する状態になります<br>
                    もし、非常事態（体調不良）になっても<br>
                    脳と体の連携は保たれます</p>
                </div>
                <div class="img-box">
                    <img src="<?php echo $url; ?>/view/images/top_img03.webp" alt="脳と体の連携">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section concept-section">
    <div class="container mid">
        <div class="section-img">
            <img src="<?php echo $url; ?>/view/images/top_img04.webp" alt="">
        </div>
    </div>
</div>

<div class="section story-section">
    <div class="container">
        <div class="contents-area">
            <div class="content-box">
                <div class="txt-box">
                    <p>この状態を維持すると・・・<br>
                    どのような体調不良でも<br>
                    何種類も体調不良があっても</p>
                </div>
                <div class="img-box">
                    <img src="<?php echo $url; ?>/view/images/top_img02.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section concept-section">
    <div class="container mid">
        <div class="description-area">
            てくてくはこんな施術院です。
        </div>
        <div class="section-img">
            <img src="<?php echo $url; ?>/view/images/7004.jpg" alt="" />
        </div>
        <div class="description-area">
            てくてくはこんな施術院です。
        </div>
    </div>
</div>

<div class="section concept-section">
    <div class="container mid">
        <div class="section-img">
            <img src="<?php echo $url; ?>/view/images/top_img06.webp" alt="">
        </div>
        <div class="description-area">
            てくてくの施術は、体が勝手に不調の克服を<br>
            していくように、仕向けていくためのものです。
        </div>
        <div class="section-img">
            <img src="<?php echo $url; ?>/view/images/top_img05.webp" alt="">
        </div>
    </div>
</div>

<div class="section top-col-section col01">
    <div class="content-box">
        <div class="img-box">
            <img src="<?php echo $url; ?>/view/images/top_img07.webp" alt="">
        </div>
    </div>
</div>

<div class="section top-col-section col02">
    <div class="content-box col-box-wrap">
        <div class="col-box">
            <div class="img-box">
                <a href="<?php echo home_url('/voice-headache'); ?>">
                    <img src="<?php echo $url; ?>/view/images/top_img08.webp" alt="頭痛薬がいらなくなった皆さま" />
                </a>
            </div>
            <h4>頭痛薬がいらなくなった皆さま</h4>
            <div class="txt-box">長年飲んでいた薬が必要なくなった方が多くいらっしゃいます！</div>
            <div class="btn-box">
                <a href="<?php echo home_url('/voice-headache'); ?>">写真をクリックして特設ページへ！</a>
            </div>
        </div>
        <div class="col-box">
            <div class="img-box">
                <a href="<?php echo home_url('/voice-insomnia'); ?>">
                    <img src="<?php echo $url; ?>/view/images/top_img09.webp" alt="不眠を解消された皆さま" />
                </a>
            </div>
            <h4>不眠を解消された皆さま</h4>
            <div class="txt-box">不眠やめまい、ふらつきなどが減ったというお声をよくいただきます！</div>
            <div class="btn-box">
                <a href="<?php echo home_url('/voice-insomnia'); ?>">写真をクリックして特設ページへ！</a>
            </div>
        </div>
        <div class="col-box">
            <div class="img-box">
                <a href="<?php echo home_url('/voice-sciatica'); ?>">
                    <img src="<?php echo $url; ?>/view/images/top_img10.gif" alt="坐骨神経痛を解消された皆さま" />
                </a>
            </div>
            <h4>坐骨神経痛を解消された皆さま</h4>
            <div class="txt-box">医療機関では痛み止め処方や様子見になってしまう状態でも原因を追究し回復を目指します！</div>
            <div class="btn-box">
                <a href="<?php echo home_url('/voice-sciatica'); ?>">写真をクリックして特設ページへ！</a>
            </div>
        </div>
    </div>
</div>
<div class="section line-section">
    <div class="container">
        <div class="section-box">
            <div class="section-title">
                <i class="fa-brands fa-line"></i>てくてくLINE公式アカウント
            </div>
            <div class="text-box">
                LINEからのご予約も承ります。
            </div>
            <div class="btn-box">
                <a href="https://line.me/your-id" target="_blank" rel="noopener">友達登録する</a>
            </div>
        </div>
    </div>
</div>

<div class="section contact-section">
    <div class="container">
        <div class="btn-box">
            <div class="section-title">ご予約・お問い合わせ</div>
            <div class="text-box">長年の不調の根本解決をお手伝いします</div>
            <div class="btn btn-forec">
                <a href="<?php echo home_url('/contact'); ?>">ご予約・お問い合わせ</a>
            </div>
        </div>
    </div>
</div>

<div class="section voice-section">
    <div class="container">
        <div class="section-title">ご利用者様の声<br>（ほかにも色々な不調に対応しております）</div>
        <div class="section-description">長年の不調から解放されたご利用者様のお喜びの声が少しずつ増えてきました</div>
        
        <div class="swiper voice-slider">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type'      => 'voice',
                    'posts_per_page' => 12, // 12件取得
                );
                $voice_query = new WP_Query($args);
                ?>

                <?php if ($voice_query->have_posts()) : while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
                    <div class="swiper-slide col-box">
                        <a href="<?php the_permalink(); ?>">
                            <div class="img-box">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/view/images/top_img09.jpg" alt="no image" />
                                <?php endif; ?>
                            </div>
                            <div class="text-box"><?php the_title(); ?></div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<div class="section feature-section">
    <div class="container">
        <div class="col-box-wrap">
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-regular fa-calendar-check"></i></div>
                <div class="col-title">施術は2週間に1回</div>
                <div class="text-box">本当に体を健康にすることができる技術があれば2週間に1度施術をすれば十分です。</div>
            </div>
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-solid fa-couch"></i></div>
                <div class="col-title">付き添いの方のための<br>ベンチあります</div>
                <div class="text-box">施術の様子をご覧いただける位置に、付き添いの方のためのベンチを用意しております。</div>
            </div>
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-solid fa-car"></i></div>
                <div class="col-title">自動車での来院もOK</div>
                <div class="text-box">施術院前に自動車を駐車できますので、ぜひご利用くださいませ。</div>
            </div>
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-solid fa-ban"></i></div>
                <div class="col-title">物品を売りつけません</div>
                <div class="text-box">症状を改善していくにあたり、道具やサプリメントなどはまったく必要ありません。</div>
            </div>
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-solid fa-shield-heart"></i></div>
                <div class="col-title">安心、安全な施術です</div>
                <div class="text-box">当院では急激に痛みを伴ったり、強い力を加えるような施術は行ないません。</div>
            </div>
            <div class="col-box">
                <div class="benefit-box-icon"> <i class="fa-solid fa-handshake-slash"></i></div>
                <div class="col-title">施術を強制しません</div>
                <div class="text-box">皆さまの体調回復にとってベストな選択をしていくことをお約束します。</div>
            </div>
        </div>
    </div>
</div>

<section class="section blog-section">
  <div class="container">
    <div class="section-title">
      <h2 class="en-title">新着情報</h2>
    </div>

    <ul class="blog-contents-wrap">
      <?php
      // 取得したいカテゴリーのスラッグをカンマ区切りで指定
      // 合計9件（各3件×3カテゴリー分）を日付順に取得
      $args = array(
          'post_type'      => 'post',
          'category_name'  => 'colum,blog,information', // 実際のスラッグに合わせてください
          'posts_per_page' => 9, 
          'no_found_rows'  => true,
      );
      $blog_query = new WP_Query($args);

      if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post();
      ?>
      <li>
        <a class="archive-column" href="<?php the_permalink(); ?>">
          <div class="blog-icon">
            <div class="img-box">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
              <img src="<?php echo $url; ?>/view/images/top_voi04.webp" alt="">
            <?php endif; ?>
            <p class="category-box">
                <?php 
                $cat = get_the_category(); 
                if($cat) echo $cat[0]->name; 
                ?>
            </p>
            </div>
          </div>
          <div class="blog-text">
            <h4><?php the_title(); ?></h4>
            <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
            <p class="time-box"><?php echo get_the_date('Y.m.d'); ?></p>
          </div>
        </a>
      </li>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </ul>

    <div class="btn-box">
      <a href="<?php echo home_url('/category/blog'); ?>" class="btn-readmore">記事一覧を見る</a>
    </div>
  </div>
</section>

<section class="section banner-section">
    <div class="container mid">
        <?php get_template_part('banner'); ?>
    </div>
</section>

<div class="ggmap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6496.61419078715!2d139.446396!3d35.496684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018568b586c2ed9%3A0x465d7bc95eea82d8!2z5aSn5ZKM5Y2X5p6X6ZaT44Kr44Kk44Ot44OX44Op44Kv44OG44Kj44OD44Kv5pW05L2T6ZmiIOOBpuOBj-OBpuOBjw!5e0!3m2!1sja!2sjp!4v1766646206422!5m2!1sja!2sjp" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php get_footer(); ?>