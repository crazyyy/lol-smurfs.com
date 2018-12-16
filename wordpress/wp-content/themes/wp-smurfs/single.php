<?php get_header(); ?>

  <div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
      <div class="ui center aligned container">
        <h1 class="ui inverted header"><?php the_title(); ?></h1>
      </div>
    </div>

    <div class="ui hidden divider"></div>

    <div class="ui container">
      <div class="ui basic padded segment">
      <style>p {text-align:justify;}</style>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_content(); ?>
        </article>
      <?php endwhile; else: ?>
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      <?php endif; ?>

    </div>
  </div>

<?php get_footer(); ?>
