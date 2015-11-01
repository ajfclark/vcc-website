<?php
/**
 * The template for displaying a single event.
 *
 * @package Victorian Climbing Club
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

    <div class="entry-meta">
      <?php vcc_posted_on(); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages(array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'vcc' ),
        'after'  => '</div>',
      ));
    ?>
  </div>

  <footer class="entry-footer">
    <?php vcc_entry_footer(); ?>
  </footer>
</article>