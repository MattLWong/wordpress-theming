<?php

get_header();

if (have_posts()):
  $counter = 1;
  while (have_posts()) : the_post();  ?>
  <article class="post">
    <h2> <a href="<?php the_permalink()?>"><?php the_title()?></a> </h2>
    <p class='post-info'><?php echo the_time('F j, Y g:i a') ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")); ?>"><?php the_author() ?>  </a> | Posted in

    <?php
      $categories = get_the_category();
      $separator = ", ";
      $output = "";

      if ($categories) {
        foreach ($categories as $category) {
          $output .= "<a href='" . get_category_link($category->term_id) . "'>" . $category->cat_name . "</a>" . $separator;
        }
        echo trim($output, ", ");
      }

    ?>

    </p>

    <p><?php the_content() ?></p>
  </article>


  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();

?>
