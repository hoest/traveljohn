<?php get_header(); ?>
<?php
  $slug = get_post_field('post_name', get_post());
?>

<main class="<?php echo $slug; ?> <?php if(is_front_page()) { echo 'frontpage'; } else { echo 'single-page'; } ?>">
  <?php while (have_posts()) : the_post();

  if (is_front_page()) {
    $homepage_banner = rwmb_meta('homepage_banner' );
    if (!empty($homepage_banner)) { ?>
      <div class="yellow-bg">
        <div class="slide" data-slick='{
          "autoplay": true,
          "autoplaySpeed": 3000,
          "fade": true,
          "mobileFirst": true,
          "arrows": false,
          "dots": true
        }'>
          <?php foreach ($homepage_banner as $homepage_banner_image) { ?>
            <img src="<?php echo esc_url( $homepage_banner_image['full_url'] ); ?>"
                 alt="<?php echo esc_attr( $homepage_banner_image['alt'] ); ?>" />
          <?php } ?>
        </div>
      </div>
    <?php } ?>

    <div class="payoff">
      <?php echo do_shortcode( wpautop( rwmb_meta( 'homepage_payoff' ) ) ); ?>
    </div>

    <?php $homepage_slider = rwmb_meta('homepage_slider' );
      if (!empty($homepage_slider)) { ?>
        <div class="cartoons">
          <div class="slide" data-slick='{
            "centerMode": true,
            "slidesToShow": 5,
            "slidesToScroll": 3,
            "autoplay": true,
            "autoplaySpeed": 4000,
            "arrows": false,
            "dots": false,
            "focusOnSelect": true
          }'>
        <?php foreach ($homepage_slider as $slider_image) { ?>
          <div class="image">
            <img src="<?php echo esc_url( $slider_image['full_url'] ); ?>"
                 alt="<?php echo esc_attr( $slider_image['alt'] ); ?>" />
            <div class="image-text"><?php echo $slider_image['description']; ?></div>
          </div>
        <?php } ?>
        </div>
      </div>
    <?php } ?>
  <?php } else {
    $images = rwmb_meta('banner_image' );

    if (!empty($images)) { ?>
      <div class="yellow-bg">
        <div class="banner">
          <?php foreach ($images as $image) { ?>
            <img src="<?php echo esc_url( $image['full_url'] ); ?>"
                 alt="<?php echo esc_attr( $image['alt'] ); ?>">
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  <?php } ?>

  <div class="content inner-wrapper">
    <div class="content-inner">
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
    </div>
  </div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
