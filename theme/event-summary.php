<?php
/**
 * The template for displaying an event summary.
 *
 * @package Victorian Climbing Club
 */
?>

<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
  <a class="event-summary" href="<?php echo esc_url(get_permalink()) ?>">
    <header class="event-summary__header">
      <?php $location = get_field('location') ?>
    <?php
      include_once("urlSign.php");
      include_once("google_api_key.php");

      $url="https://maps.googleapis.com/maps/api/staticmap?center=" . $location['lat'] . "," . $location['lng'] . "&zoom=11&size=125x125&maptype=roadmap&markers=color:red%7C" . $location['lat'] . "," . $location['lng'];
      $url = signUrl($url . "&key=" . $google_api_key2, '_h9djfVpH3b6nRMhVsdnqES7XPQ=');
?>
    <img class="event-summary__map" src="<?php echo $url; ?>" />

      <h1 class="event-summary__title"><?php the_title(); ?></h1>
      <h2 class="event-summary__location-and-date">
        <span class="event-summary__location">
          <?php $location_name = get_field('location_name'); if ($location_name) : ?>
            <?php esc_html_e($location_name) ?>
          <?php else : ?>
            Missing location
          <?php endif; ?>
        </span>
        •
        <span class="event-summary__date">
          <?php $start_date = DateTime::createFromFormat('Ymd', get_field('start_date')); ?>
          <?php if ($start_date): ?>
            <?php echo $start_date->format('j M Y'); ?>
          <?php else : ?>
            TBA
          <?php endif; ?>
          <?php $end_date = DateTime::createFromFormat('Ymd', get_field('end_date')); ?>
          <?php if ($end_date): ?>
            —
            <?php echo $end_date->format('j M Y'); ?>
          <?php endif; ?>
          <?php esc_html_e(get_field('time')); ?>
        </span>
      </h2>
    </header>

    <div class="event-summary__excerpt">
      <?php the_excerpt(); ?>

      <?php
        $photo_album_url = get_field('photo_album_url');
      ?>
      <?php if ($photo_album_url && strlen($photo_album_url) != 0): ?>
        <p class="event-summary__excerpt__photos"><img src="/wp-content/themes/vcc/images/photos-black.svg" width="28" alt="Photos"> <strong>Photos available</strong></p>
      <?php endif; ?>
    </div>
  </a>
</article>
