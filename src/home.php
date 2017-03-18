<?php get_header(); ?>
<?php
  $slug = get_post_field('post_name', get_post());
?>

<main class="<? echo $slug; ?>">

  <div class="content inner-wrapper">
    <div class="content-inner">
      <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h1 class="entry-title">
            <?php the_title(); ?>
          </h1>
          <div class="entry-content">
            <div class="entry-text">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
