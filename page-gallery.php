<?php get_header(); ?>
<body>
  <div class="info-wrapper">
    <div id="loading">
      <div class="spinner"></div>
    </div>
    <div id="gallery-wrapper">
      <div class="contents-box">
          <h2 id="gallery-top">Illust Gallery</h2>
          <div class="tab-001">
            <label>
              <input type="radio" name="tab-001" id="original" checked>
                Original&FanArt
            </label>
            <div class="masonry">
              
            <!-- メディアの一覧を取得するコード -->
              <?php
                $args = array(
                  'post_status' => 'any',
                  'posts_per_page' => -1,
                  'post_type' => 'attachment',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'attachment_category', // カテゴリから検索
                      'field' => 'slug', // カテゴリのslugから検索
                      'terms' => 'original'
                    ),
                    
                  )
                );
                $media_files = new WP_Query($args);
                foreach($media_files->posts as $post){
                  echo "
                    <div class='masonry-item'>
                      <img data-micromodal-trigger='modal-1' class='thumb' src='$post->guid' alt='$post->post_excerpt'>
                    </div>
                  ";
                }
              ?>
            </div>

            <label>
              <input type="radio" name="tab-001" id="work">
                Work
            </label>
            <div class="masonry">
            <!-- メディアの一覧を取得するコード -->
              <?php
                $args = array(
                  'post_status' => 'any',
                  'posts_per_page' => -1,
                  'post_type' => 'attachment',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'attachment_category', // カテゴリから検索
                      'field' => 'slug', // カテゴリのslugから検索
                      'terms' => 'work'
                    ),
                    
                  )
                );
                $media_files = new WP_Query($args);
                foreach($media_files->posts as $post){
                  echo "
                    <div class='masonry-item'>
                      <img data-micromodal-trigger='modal-1' class='thumb' src='$post->guid' alt='$post->post_excerpt'>
                    </div>
                  ";
                }
              ?>
            </div>
          </div>
      </div>
      <footer id="footer">
        <p id="to-top-button"><a href="#gallery-top"><i class="fa-solid fa-chevron-up"></i></a></p>
      </footer>
    </div>

    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <img src="<?php bloginfo('template_url');?>/img/illust/IMG_9937.JPG">
          <p class="img_caption"></p>
        </div>
      </div>
    </div>  
  </div>
</body>
<?php get_footer(); ?>