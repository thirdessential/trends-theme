<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trends-theme
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <header class="page-header <?php if (is_front_page()) { echo 'is-hidden'; } ?>">
      <div class="container">
        <?php if (is_front_page()) { ?>

          <div class="page-header__btns-wrap">
            <a class="header-btn header-btn--trends" href="#trend-1"><span>Global
                Trends</span></a>
            <a class="header-btn header-btn--reports" href="#report-1"><span>Sector
                Reports</span></a>
          </div>

        <?php } else { ?>

          <div class="page-header__btns-wrap">
            <a class="header-btn header-btn--trends" href="#trend-1"><span>Global
                Trends</span></a>
            <a class="header-btn header-btn--reports" href="#report-1"><span>Sector
                Reports</span></a>
          </div>

        <?php } ?>

        <div class="page-header__wrap">
          <a href="<?php echo esc_url( home_url() ); ?>" class="page-header__logo">
            <img width="200" height="40" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/new-logo.svg" alt="Sustain Ability">
            <!-- <span>Trends&nbsp;2019</span> -->
          </a>
          <input class="page-header__checkbox" type="checkbox" id="menu">
          <?php /*?><label class="page-header__hamburger" for="menu">
            <span></span>
          </label> <?php */?>

          <nav class="page-header__nav-wrap">
            <div class="page-header__nav-container">
              <div class="page-header__nav">
                <div class="page-header__nav-col page-header__nav-col--trends">
                  <h2 class="page-header__col-title">Global Trends</h2>

                  <?php
                    $args = array(
                      'theme_location'    => 'macro-trends-menu',
                      'container'         => false,
                    );
                    wp_nav_menu($args);
                  ?>

                </div>
                <div class="page-header__nav-col page-header__nav-col--reports">
                  <h2 class="page-header__col-title">Sector Reports</h2>
                  <?php
                    $args = array(
                      'theme_location'    => 'sector-reports-menu',
                      'container'         => false,
                    );

                    wp_nav_menu($args);
                  ?>
                  <a class="btn" href="<?php the_field('download_report', 'option') ?>">
                    Download Full Report
                    <svg width="13" height="16">
                      <use xlink:href="#icon-download"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
