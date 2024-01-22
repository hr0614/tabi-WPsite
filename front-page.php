<?php get_header(); ?>
<body>
  <!-- メニュー -->

  <div id="nav-toggle">
    <div>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div id="nav-circle-bg"></div>
  <nav id="nav">
    <ul>
      <li class="menu-list active"><a href="#page-top">Top</a></li>
      <li class="menu-list active"><a href="#profile">Profile</a></li>
      <li class="menu-list active"><a href="#information">Information</a></li>
      <li class="menu-list active"><a href="#original">Illustration</a></li>
      <li class="menu-list active"><a href="#work">Work</a> </li>
      <li class="menu-list active"><a href="#contact">Contact</a></li>
    </ul>
    </div>
  </nav>

  <!-- メニュー -->

  <!-- トップ部分 -->
  <div class="layout-wrapper">
    <div id="page-top">
      <div class="main-illust">
        <picture>
          <source srcset="<?php bloginfo('template_url');?>/img/top/mainimage_sp.jpg" media="(max-width: 480px)">
          <img src="<?php bloginfo('template_url');?>/img/top/mainimage2.jpg">
        </picture>
        <div class="white-gradation"></div>
      </div>
    </div>
    <!-- トップ部分 -->

    <!-- コンテンツ部分 -->
    <div class="contents-wrapper">

      
      <!-- プロフィール部分 -->
      <div id="profile" class="contents-box">
        <h2>Profile</h2>
        <div class="contents-text">
          <img class="prof-icon" src="<?php bloginfo('template_url');?>/img/profile/icon.png">
          <div class="text-wrapper">
            <h3>
              <?php 
                $pageInfo = get_page_by_path("ニックネーム", OBJECT, "profile");
                $postContent = get_post_field('post_content', $pageInfo->ID);
                echo wp_strip_all_tags($postContent);
              ?>
            </h3>
            <?php 
              $pageInfo = get_page_by_path("プロフィール文", OBJECT, "profile");
              $postContent = get_post_field('post_content', $pageInfo->ID);
              echo $postContent;
            ?>
          </div>
        </div>
      </div>
      <!-- 記事データ取得 -->
      <?php
        $args = array(
          'post_type' => 'post',
          'date_query' => array(
            array(
              'inclusive'=>true,
              'after'=>'2024/1/5' 
            ),
          ),
          'posts_per_page' => 5 ,
        );
        $articles = new WP_Query($args);
        echo '<script>console.log(' . json_encode($articles) . ');</script>';
      ?>

      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
          'category_name' => 'work'
        );
        $work_articles = new WP_Query($args);
      ?>

      <!-- infoリスト -->
      <div id="information" class="contents-box">
        <h2>Information</h2>
        <div class="contents-text info-list">
          <ul>
          <?php
            foreach($articles-> posts as $post){
              echo "<li data-micromodal-trigger='$post->ID'>
                  <div class='post-contents' >
                    <div class='post-date'>" . date("Y-m-d", strtotime($post->post_date)) . "</div>
                    <div class='post-title'>$post->post_title</div>
                  </div>
                  <div class='post-border'></div>
                </li>";
            }
          ?>
          </ul>
        </div>
        
        <a class="more-icon" href="/information">More >></a>
        
      </div>

      <!-- オリジナルイラスト -->

      <div id="original" class="contents-box">
        <h2>Illustration</h2>
        <div class="slideshow">
          <div class="original-illust">
            <!-- オリジナルイラストのスライドショー -->
            <ul class="slider">

              <!-- メディア取得 -->
              <?php
                $args = array(
                  'post_status' => 'any',
                  'posts_per_page' => -1,
                  'post_type' => 'attachment',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'attachment_category', // カテゴリから検索
                      'field' => 'slug', // カテゴリのslugから検索
                      'terms' => 'original' // カテゴリのslugがworkのものを検索
                    ),
                    array(
                      'taxonomy' => 'attachment_tag', // タグから検索
                      'field' => 'slug', // タグのslugから検索
                      'terms' => 'pickup' // タグのslugがpickupのものを検索
                    )
                  )
                );
                $media_files = new WP_Query($args);
                foreach($media_files->posts as $post){
                  echo "<li data-micromodal-trigger='modal-1'><img src='$post->guid'></li>";
                }
              ?>

            </ul>
          </div>
        </div>
        <a class="more-icon" href="/gallery?tab=original">Gallery >></a>
      </div>

      <!-- お仕事イラスト -->
      <div id="work" class="contents-box">
        <h2>Work</h2>
        <div class="slideshow">
          <div class="works-illust">
            <!-- お仕事イラストのスライドショー -->
            <ul class="slider">
              <?php
                $args = array(
                  'post_status' => 'any',
                  'post_type' => 'attachment',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'attachment_category', // カテゴリから検索
                      'field' => 'slug', // カテゴリのslugから検索
                      'terms' => 'work' // カテゴリのslugがworkのものを検索
                    ),
                    array(
                      'taxonomy' => 'attachment_tag', // タグから検索
                      'field' => 'slug', // タグのslugから検索
                      'terms' => 'pickup' // タグのslugがpickupのものを検索
                    )
                  )
                );
                $media_files = new WP_Query($args);
                foreach($media_files->posts as $post){
                  echo "<li data-micromodal-trigger='modal-1' class='works-items'>
                  <p class='works-data'>
                    $post->post_excerpt</p>
                  <img src='$post->guid' alt='$post->post_excerpt'>
                  </li>";
                  
                }
                // echo '<script>console.log(' . json_encode($media_files->posts[0]->post_excerpt) . ');</script>';
              ?>
            </ul>
          </div>
        </div>
        <a class="more-icon" href="/gallery?tab=work">Gallery >></a>

        <!-- お仕事履歴リスト -->
        <div class="works-list">
          <div>
            <h4>お仕事履歴<span>（敬称略）</span></h4>
            <div class="list-wrapper">
              <input id="block-01" type="checkbox" class="toggle" checked>
              <label class="Label" for="block-01"><?php echo date('Y');?></label>
              <div class="content">
                <div class="post-list">
                  <ul>
                    <?php
                      foreach($work_articles-> posts as $post){
                        $date = $post->post_date; 
                        if(date("Y",strtotime($date)) === date('Y')){
                          echo "<li data-micromodal-trigger='work$post->ID'>
                            <div class='post-contents' >
                              <div class='post-title'>・$post->post_title</div>
                            </div>
                          </li>";
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <input id="block-02" type="checkbox" class="toggle">
              <label class="Label" for="block-02"><?php echo date('Y')-1;?>〜</label>
              <div class="content">
                <div class="post-list">
                  <ul>
                    <?php
                      foreach($work_articles->posts as $post){
                        $date = $post->post_date; 
                        if(date("Y",strtotime($date)) !== date('Y')){
                          echo "<li data-micromodal-trigger='work$post->ID'>
                          <div class='post-contents' >
                            <div class='post-title'>・$post->post_title</div>
                          </div>
                        </li>";
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- コンタクト部分 -->
      <div id="contact" class="contents-box">
        <h2>Contact</h2>
        <div class="contents-text">
          <div class="contact-text">
            <div class="attention"><p class="alert-text" data-micromodal-trigger="modal-attention" href=""><i class="fa-solid fa-triangle-exclamation"></i>ご依頼について<span>※必ずお読み下さい</span></p></div>
            <?php 
              $pageInfo = get_page_by_path("コンタクト本文", OBJECT, "contact");
              $postContent = get_post_field('post_content', $pageInfo->ID);
              echo $postContent;
            ?>
            <p class="mail"><?php
                $pageInfo = get_page_by_path("メールアドレス", OBJECT, "contact");
                $postContent = get_post_field('post_content', $pageInfo->ID);
                echo wp_strip_all_tags($postContent);
              ?></p>
            <div class="sns-icons">
              <a href="https://twitter.com/tabi_0v0" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
              <a href="https://www.instagram.com/tabi_0v0/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- topへ戻るボタン -->
    <footer id="footer">
      <p id="to-top-button"><a href="#page-top"><i class="fa-solid fa-chevron-up"></i></a></p>
    </footer>
  </div>

  <!-- ギャラリー画像モーダル部分 -->
  <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <img src="<?php bloginfo('template_url');?>/img/illust/IMG_9937.JPG">
        <p class="img_caption"></p>
      </div>
      
    </div>
  </div>

  <!-- infoリストモーダル部分 -->
  <?php
    foreach($articles->posts as $post){
      // echo '<script>console.log(' . json_encode($post) . ');</script>';

      echo "<div class='modal micromodal-slide' id='$post->ID' aria-hidden='true'>
        <div class='modal__overlay' tabindex='-1' data-micromodal-close>
          <div class='postmodal__container' role='dialog' aria-modal='true' aria-labelledby='modal-2-title'>
            <div class='post-header-container'>
              <div class='post-header'>
                <div class='post-date'>$post->post_title</div>
                <div class='post-date post-time'><i class='fa-regular fa-clock'></i>" . date("Y-m-d", strtotime($post->post_date)) . "</div>
              </div>
            </div>
            <div class='post-content'>
              ".apply_filters('the_content', $post->post_content)."
            </div>
          </div>
        </div>
      </div>";
    };
  ?>

  <!-- お仕事リストモーダル部分 -->
  <?php
    foreach($work_articles->posts as $post){
      // echo '<script>console.log(' . json_encode($post) . ');</script>';

      echo "<div class='modal micromodal-slide' id='work$post->ID' aria-hidden='true'>
        <div class='modal__overlay' tabindex='-1' data-micromodal-close>
          <div class='postmodal__container' role='dialog' aria-modal='true' aria-labelledby='modal-2-title'>
            <div class='post-header-container'>
              <div class='post-header'>
                <div class='post-date'>$post->post_title</div>
              </div>
            </div>
            <div class='post-content'>
              ".apply_filters('the_content', $post->post_content)."
            </div>
          </div>
        </div>
      </div>";
    };
  ?>

    <!-- 注意書きページモーダル部分 -->
  <div class="modal micromodal-slide" id="modal-attention" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="attentionmodal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <h2>ご依頼時の注意事項</h2>
        <div class="attention-text">
          <?php 
            $pageInfo = get_page_by_path("依頼注意事項編集", OBJECT, "contact");
            $postContent = get_post_field('post_content', $pageInfo->ID);
            echo $postContent;
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>