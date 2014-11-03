<?php get_header(); ?>


<section id="content">

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h2 class="post-title-list"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <span class="date"><?php the_time('M') ?></span>
        <div class="post-content">
          <?php the_excerpt(); ?>
          <a class="readmore" href="<?php the_permalink() ?>">read more...</a>
        </div>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>

  <div class="pagination">
    <?php next_posts_link('<span class="typcn typcn-arrow-left-thick"></span>') ?>
    <?php previous_posts_link('<span class="typcn typcn-arrow-right-thick next"></span>') ?>
  </div>

</section>

<?php get_footer(); ?>