<?php get_header(); ?>


<section id="content">

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h2 class="post-title-list"><?php the_title(); ?></h2>
        <span class="date"><?php the_time('F j, Y') ?></span>
        <div class="post-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>

</section>

<?php get_footer(); ?>