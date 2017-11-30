<?php

get_header();

if (have_posts()):
  $counter = 1;
  while (have_posts()) : the_post();  ?>
  <article class="post">
    <h2> <a href="<?php the_permalink()?>"><?php the_title()?></a> </h2>
    <p><?php the_content() ?></p>
  </article>


  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();

?>