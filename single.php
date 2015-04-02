<?php get_header(); ?>

  <section id="content">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article>
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="post-content"><?php the_content(); ?></div>
          <time class="post-date">
            <i class="typcn typcn-calendar-outline"></i> <a href="<?php the_permalink(); ?>"><?php the_time('F j, Y') ?></a>
            <i class="typcn typcn-folder"></i> <?php the_category(', '); ?>
          </time>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>

  </section>

<?php get_footer(); ?>