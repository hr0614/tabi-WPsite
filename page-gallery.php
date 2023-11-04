<?php get_header(); ?>
<body>
  <div class="contents-wrapper">
    <div class="contents-box">
    <h2>Illast Gallery</h2>
      <div class="info-text">
        <ul>
          <li>うおおおおおおお</li>
        </ul>
      </div>
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
                <img data-micromodal-trigger='modal-1' class='thumb' src='$post->guid'>
              </div>
            ";
          }
        ?>
      </div>
    </div>
    <!-- <div class="grid">
      <div class="item">1</div>
      <div class="item is-h-2">2</div>
      <div class="item">3</div>
      <div class="item is-h-3">4</div>
      <div class="item">5</div>
      <div class="item">6</div>
      <div class="item">7</div>
    </div> -->
  </div>
  <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <img src="<?php bloginfo('template_url');?>/img/illust/IMG_9937.JPG">
      </div>
    </div>
  </div>
</body>
<?php get_footer(); ?>