<?php get_header(); ?>
<body>
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'date_query' => array(
        array(
          'inclusive'=>true,
          'after'=>'2024/1/05' 
        ),
      ),
    );
    $articles = new WP_Query($args);
    echo '<script>console.log(' . json_encode($articles) . ');</script>';
  ?>
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'category_name' => 'info'
    );
    $info_articles = new WP_Query($args);
    // echo '<script>console.log(' . json_encode($info_articles) . ');</script>';
  ?>
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'category_name' => 'work'
    );
    $work_articles = new WP_Query($args);
    // echo '<script>console.log(' . json_encode($work_articles) . ');</script>';
  ?>


  <div class="info-wrapper">
    <div id="gallery-wrapper">
      <div class="contents-box">
        <h2>Information</h2>
        <div class="tab-002">
          <label>
            <input type="radio" name="tab-002" checked>
              All
          </label>
          <div class="post-wrapper">
            <?php
              foreach($articles->posts as $post){
                echo " 
                  <div class='post-container'>
                    <div class='post-header-container'>
                      <div class='post-header'>
                        <div class='post-date'>$post->post_title</div>
                        <div class='post-date post-time'><i class='fa-regular fa-clock'></i>" . date("Y-m-d", strtotime($post->post_date)) . "</div>
                      </div>
                    </div>
                  
                    <div class='post-content'>
                    ".apply_filters('the_content', $post->post_content)."
                    </div>
                  </div>";
              };
            ?>
          </div>
          <label>
            <input type="radio" name="tab-002">
              お知らせ
          </label>
          <div class="post-wrapper">
            <?php
              foreach($info_articles->posts as $post){
                echo '<script>console.log(' . json_encode($post) . ');</script>';

                echo " 
                <div class='post-container'>
                  <div class='post-header-container'>
                    <div class='post-header'>
                      <div class='post-date'>$post->post_title</div>
                      <div class='post-date post-time'><i class='fa-regular fa-clock'></i>" . date("Y-m-d", strtotime($post->post_date)) . "</div>
                    </div>
                  </div>
                
                  <div class='post-content'>
                  ".apply_filters('the_content', $post->post_content)."
                  </div>
                </div>";
              };
            ?>
          </div>
          <label>
            <input type="radio" name="tab-002" >
              お仕事
          </label>
          <div class="post-wrapper">
            <?php
              foreach($work_articles->posts as $post){
                echo '<script>console.log(' . json_encode($post) . ');</script>';

                echo " 
                <div class='post-container'>
                  <div class='post-header-container'>
                    <div class='post-header'>
                      <div class='post-date'>$post->post_title</div>
                      
                    </div>
                  </div>
                
                  <div class='post-content'>
                  ".apply_filters('the_content', $post->post_content)."
                  </div>
                </div>";
              };
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>