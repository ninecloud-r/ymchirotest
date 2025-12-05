    <?php   $url = get_theme_file_uri(); ?>
<footer>
  <div class="container">
    <div class="footer-contents-wrap">
          <div class="footer-left">
      <a href="#" class="logo">
        <img src="<?php echo $url?>/view/images/logo.png" />
      </a>

      </div>
      <div class="footer-right">
        <ul class="fnav">
          <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              トップページ
            </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/concept' ) ); ?>">
                コンセプト
              </a>
              </li>
              <li>
                <a href="<?php echo esc_url( home_url( '/product' ) ); ?>">
                  製品紹介
                </a>
                </li>
                <li>
                  <a href="<?php echo esc_url( home_url( '/story' ) ); ?>">
                    ストーリー
                  </a>
                  </li>
                  <li>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
                      会社概要
                    </a>
                    </li>
                    <li>
                      <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
                        お問い合わせ
                      </a>
                      </li>
                      <li>
                        <a href="<?php echo esc_url( home_url( '/post-category/news/' ) ); ?>">
                          News & Blog
                        </a>
                        </li>
                        <li>
                          <a href="#">
                            プライバシーポリシー
                          </a>
                          </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="copyright-area">
      copyright by Shoutarou Binagata NAHA
      </div>

  </footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
