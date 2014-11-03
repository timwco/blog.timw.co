<?php get_header(); ?>

  <section id="content">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article>
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="post-content"><?php the_content(); ?></div>
          <time class="post-date">Published on <?php the_time('F j, Y') ?></time>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>

  </section>

  <p><a href="/"><span class="typcn typcn-arrow-back"></span> back</a></p>

<?php get_footer(); ?>