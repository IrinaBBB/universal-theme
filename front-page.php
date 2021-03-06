<?php get_header(); ?>

<main class="front-page-header">
  <div class="container">
    <div class="hero">
      <div class="left">
        <?php
        global $post;

        $myposts = get_posts([
          'numberposts' => 1,
          'category_name' => 'JavaScript, css, html, web-design'
        ]);

        // Проверяем, есть ли посты
        if ($myposts) {
          // Если есть, запускаем цикл
          foreach ($myposts as $post) {
            setup_postdata($post);
            ?>
            <img src="<?php the_post_thumbnail_url(); ?> " alt="" class="post-thumb">
            <?php $author_id = get_the_author_meta('ID'); ?>
            <a href="<?php echo get_author_posts_url($author_id); ?>" class="author">
              <img src="<?php echo get_avatar_url($author_id); ?>" alt="Avatar: author" class="avatar">
              <div class="author-bio">
                <span class="author-name"><?php the_author(); ?></span>
                <span class="author-rank">Должность</span>
              </div>
            </a>
            <div class="post-text">
              <?php the_category(); ?>
              <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2>
              <a href="<?php echo get_the_permalink(); ?>" class="more">Читать далее</a>
            </div>
            <?php
          }
        } else {
          ?><p>Постов нет</p><?php
        }

        wp_reset_postdata();
        ?>
      </div>
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>

        <ul class="posts-list">
          <?php

          // Объявляем глобальную переменную $post
          global $post;

          $myposts = get_posts([
            'numberposts' => 5,
            'offset' => 1,
            'category_name' => 'JavaScript, css, html, web-design'

          ]);
          // Проверяем, есть ли посты
          if ($myposts) {
            // Если есть, запускаем цикл
            foreach ($myposts as $post) {
              setup_postdata($post);

              ?>
              <li class="post">
                <?php the_category(); ?>
                <a
                    class="post-permalink"
                    href="<?php echo get_the_permalink(); ?>">
                  <h4 class="post-title">
                    <?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?>
                  </h4>
                </a>
              </li>

              <?php
            }
          } else {
            ?><p>Постов нет</p><?php
          }

          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
</main>
<div class="container">
  <ul class="article-list">
    <?php

    // Объявляем глобальную переменную $post
    global $post;

    $myposts = get_posts([
      'numberposts' => 4,
      'category_name' => 'статьи',
      'category__not_in' => [24, 32, 30, 27, 36]

    ]);
    // Проверяем, есть ли посты
    if ($myposts) {
      // Если есть, запускаем цикл
      foreach ($myposts as $post) {
        setup_postdata($post);
        ?>
        <li class="article-item">
          <a class="article-permalink" href="<?php echo get_the_permalink(); ?>">
            <h4 class="article-title">
              <?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?>
            </h4>
          </a>
          <img
              width="65"
              height="65"
              src="<?php echo get_the_post_thumbnail_url(null, 'thumbnail'); ?>"
              alt="">
        </li>

        <?php
      }
    } else {
      ?><p>Постов нет</p><?php
    }

    wp_reset_postdata();
    ?>
  </ul>
  <!-- /.article-list -->

  <div class="main-grid">
    <ul class="article-grid">
      <?php
      global $post;

      // Формируем запрос в базу данных
      $query = new WP_Query([
        // Получаем 7 постов
        'posts_per_page' => 7,
        'category__not_in' => [24, 32, 30, 27, 36]
      ]);

      // Проверяем, есть ли посты
      if ($query->have_posts()) {
        // создаем переменную-счетчик постов
        $cnt = 0;
        // пока посты есть, выводим их
        while ($query->have_posts()) {
          $query->the_post();
          // увеличиваем счетчик постов
          $cnt++;
          switch ($cnt) {
            // выводим первый пост
            case '1':
              ?>
              <li class="article-grid-item article-grid-item-1">
                <a href="<?php the_permalink(); ?>" class="article-grid-permalink">
                  <!--                <img class="article-grid-thumb" src="--><?php //echo get_the_post_thumbnail_url();
                  ?><!--" alt="">-->
                  c
                                <?php $category = get_the_category();
                                echo $category[0]->name; ?>
                            </span>
                  <h4 class="article-grid-title">
                    <?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?>
                  </h4>
                  <p class="article-grid-excerpt">
                    <?php echo mb_strimwidth(get_the_excerpt(), 0, 90, '...'); ?>
                  </p>
                  <div class="article-grid-info">
                    <div class="author">
                      <?php $author_id = get_the_author_meta('ID'); ?>
                      <img src="<?php echo get_avatar_url($author_id); ?>" alt="Avatar: author"
                           class="author-avatar">
                      <span class="author-name">
                                        <strong><?php the_author(); ?> </strong>:
                                        <?php echo mb_strimwidth(get_the_author_meta('description'), 0, 40, '...'); ?>
                                    </span>
                    </div>
                    <!-- /.author -->
                    <div class="comments">
                      <img
                          src="<?php echo get_template_directory_uri() . '/assets/images/comment.svg' ?>"
                          alt="Icon: comment"
                          class="comments-icon">
                      <span class="comments-counter">
                                        <?php comments_number('0', '1', '%'); ?>
                                    </span>
                    </div>
                    <!-- /.comments -->
                  </div>
                  <!-- /.article-grid-info -->
                </a>
              </li>
              <?php
              break;

            // Выводим второй пост
            case '2': ?>
              <li class="article-grid-item article-grid-item-2">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="picture" class="article-grid-thumb">
                <a href="<?php the_permalink(); ?>" class="article-grid-permalink">
                                <span class="tag">
                                    <?php $posttags = get_the_tags();
                                    if ($posttags) {
                                      echo $posttags[0]->name . ' ';
                                    }
                                    ?>
                                </span>
                  <span class="category-name">
                                <?php $category = get_the_category();
                                echo $category[0]->name; ?>
                            </span>
                  <h4 class="article-grid-title">
                    <?php echo get_the_title(); ?>
                  </h4>
                  <div class="article-grid-info">
                    <div class="author">
                      <?php $author_id = get_the_author_meta('ID'); ?>
                      <img src="<?php echo get_avatar_url($author_id); ?>" alt="Avatar: author"
                           class="author-avatar">
                      <div class="author-info">
                       <span class="author-name">
                                        <strong><?php the_author(); ?> </strong>
                      </span>

                        <!-- /.author -->
                        <span class="date"><?php the_time('j F'); ?></span>
                        <!-- / date -->
                        <div class="comments">
                          <img
                              src="<?php echo get_template_directory_uri() . '/assets/images/comment-white.svg' ?>"
                              alt="Icon: comment"
                              class="comments-icon">
                          <span class="comments-counter">
                                          <?php comments_number('0', '1', '%'); ?>
                        </span>
                        </div>
                        <!-- /.comments -->
                        <div class="likes">
                          <img src="<?php echo get_template_directory_uri() . '/assets/images/heart.svg' ?>" alt="Icon: likes"
                               class="likes-icon">
                          <span class="likes-counter">
                            <?php comments_number('0', '1', '%'); ?>
                        </span>
                        </div>
                        <!-- /.likes -->
                      </div>
                    </div>
                    <!-- /.author-info -->

                  </div>
                  <!-- /.article-grid-info -->
                </a>
              </li>
            <?php
            // Выводим третий пост
            case '3': ?>
              <li class="article-grid-item article-grid-item-3">
                <a href="<?php the_permalink(); ?>" class="article-grid-permalink">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="article-thumb">
                  <h4 class="article-grid-title">
                    <?php echo get_the_title(); ?>
                  </h4>
                </a>
              </li>

              <?php break;
            // Выводим остальные посты
            default: ?>

              <li class="article-grid-item article-grid-item-default">
                <a href="<?php the_permalink(); ?>" class="article-grid-permalink">
                  <h4 class="article-grid-title">
                    <?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?>
                  </h4>
                  <p class="article-grid-exerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 50, '...'); ?></p>
                  <span class="article-date"><?php the_time('j F Y'); ?></span>
                </a>
              </li>

              <?php break;
              ?>
            <?php
          }
        }
      } else {
        ?><p>Постов нет</p><?php
      }

      wp_reset_postdata();
      ?>
    </ul>
    <!-- /.article-grid -->
    <?php
    //Подключаем сайдбар
    get_sidebar();
    ?>
  </div>
</div>
<!-- /.container -->
<?php
global $post;

$query = new WP_Query( [
  'posts_per_page' => 1,
  'category_name' => 'investigation',
] );

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    ?>
    <!-- Вывода постов, функции цикла: the_title() и т.д. -->
    <section class="investigation"
             style="background:
                 linear-gradient(0deg, rgba(64, 48, 61, .60), rgba(64, 48, 61, .60)),
                 url(<?php echo get_the_post_thumbnail_url()?>) no-repeat center center; background-size: cover; object-fit: cover; width: 100%;">
      <div class="container">
        <h2 class="investigation-title"><?php the_title(); ?></h2>
        <a href="<?php echo get_the_permalink(); ?>" class="more">Читать статью</a>
      </div>
      <!-- /.container -->
    </section>
    <!-- /.investigation -->
    <?php
  }
} else {
  // Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>


<div class="container">
  <section class="articles-list-bottom">
    <div class="articles-hot">
      <?php
      global $post;

      $query = new WP_Query( [
        'posts_per_page' => 5,
        'category_name' => 'статьи',
      ]);


      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          ?>
            <div class="articles-hot__card">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Picture" class="articles-hot__image">
              <div class="articles-hot__text-block">
                <span class="category-name" style="color:<?php echo $color; ?>"><?php $category = get_the_category(); echo $category[0]->name; ?></span>
                <h2><?php the_title(); ?></h2>
                <p class="article-hot-excerpt">
                  <?php echo mb_strimwidth(get_the_excerpt(), 0, 150, '...'); ?>
                </p>
                <div class="articles-hot__meta">
                  <span class="date"><?php the_time('j F'); ?></span>
                  <div class="comments">
                    <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/comment.svg' ?>"
                        alt="Icon: comment"
                        class="comments-icon">
                    <span class="comments-counter">
                                          <?php comments_number('0', '1', '%'); ?>
                        </span>
                  </div>
                  <!-- /.comments -->
                  <div class="likes">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/heart-dark.svg' ?>" alt="Icon: likes"
                         class="likes-icon">
                    <span class="likes-counter">
                            <?php comments_number('0', '1', '%'); ?>
            </span>
                  </div>
                  <!-- /.likes -->
                </div>
              </div>
              <!-- /.text-block -->

            </div>



          <?php
        }
      } else {
        // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?>
    </div>



    <div class="articles-recent">

    </div>
  </section>
</div>

