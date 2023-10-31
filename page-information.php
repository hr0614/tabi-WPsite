<?php get_header(); ?>
<body>
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1
    );
    $articles = new WP_Query($args);
    echo '<script>console.log(' . json_encode($articles) . ');</script>';
  ?>

  <div class="contents-wrapper">
    <div class="contents-box">
      <h2>Information</h2>
      <?php
      foreach($articles->posts as $post){
        echo '<script>console.log(' . json_encode($post) . ');</script>';

        echo " 
        <div class='post-container'>
          <div class='post-header-container'>
            <div class='post-header'>
              <div class='post-date'>" . date("Y-m-d", strtotime($post->post_date)) . "</div>
              <div class='post-date'>$post->post_title</div>
            </div>
          </div>
        
          <div class='post-content'>
            $post->post_content
          </div>
        </div>";
      };
      ?>
    </div>
  </div>
</body>
<?php get_footer(); ?>