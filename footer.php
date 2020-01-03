<?php
/**
 * The template for displaying the footer
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trends-theme
 */

?>

  <footer class="page-footer">
    <div class="container">
      <div class="page-footer__col page-footer__col--logo">
        <svg width="91" height="94">
          <use xlink:href="#icon-sa"></use>
        </svg>
      </div>
      <div class="page-footer__col page-footer__col--text">
        <h4 class="page-footer__title"><?php the_field('footer_about_title', 'option'); ?></h4>
        <?php the_field('footer_about_copy', 'option'); ?>
      </div>
      <div class="page-footer__col page-footer__col--social">
        <a class="page-footer__link" href="https://sustainability.com/" target="_blank">SustainAbility.com</a>
        <ul class="social">
          <li>
            <a href="https://www.linkedin.com/company/sustainability" target="_blank">
              LinkedIn
              <svg width="18" height="17">
                <use xlink:href="#icon-linkedIn"></use>
              </svg>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/sustability" target="_blank">
              Twitter
              <svg width="19" height="15">
                <use xlink:href="#icon-twitter"></use>
              </svg>
            </a>
          </li>
        </ul>
        <p class="page-footer__copyright">© <?php echo date ('Y'); ?> SustainAbility
          <a href="https://sustainability.com/terms-conditions/" target="_blank">Terms & Conditions</a>
          Website by <a href="https://wolfandplayer.com/" target="_blank">Wolf&Player</a></p>
      </div>
      <div class="page-footer__col">
        <a class="page-footer__wp" href="https://wolfandplayer.com/" target="_blank">
          <svg width="50" height="50">
            <use xlink:href="#icon-wp-2"></use>
          </svg>
          Wolf&Player</a>
        <a class="scroll-top" href="#">
          <svg width="16" height="16">
            <use xlink:href="#icon-arrow-right"></use>
          </svg>
        </a>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

  </body>
</html>
