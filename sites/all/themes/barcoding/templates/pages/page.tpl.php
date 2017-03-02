<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

    <div id="header" class="site__header">
        <?php print render($page['top_nav_bar']); ?>
        
        <div class="scarf clear">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" class="site__logo" title="<?php print t('Home'); ?>" rel="home" id="logo">Barcoding</a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
      <button aria-hidden="true" class="drawer__trigger">Menu</button>
      <div class="silk-nav drawer">
          <div class="site-search">
            <div class="site-search__trigger">
              <div class="vertically-center">
                  <svg class="symbol symbol-search">
                    <use xlink:href="#search"></use>
                  </svg>
              </div>
            </div>
            <div class="site-search__details">
              <label for="site-search__text" class="visible-for-screen-readers">Search this site for:</label>
              <input placeholder="Search by keyword…" type="text" id="site-search__text" name="site-search__text" class="site-search__text">
              <input type="submit" value="go" aria-label="Query search" class="site-search__submit">
            </div>
          </div>
          <div class="silk-nav__controls"><a href="/" class="silk-nav__trigger silk-nav__trigger--home">
                <svg class="symbol symbol-home">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#home"></use>
                </svg><span>Home</span></a>
            <button class="silk-nav__trigger silk-nav__trigger--revert">
                <svg class="symbol symbol-undo">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#undo"></use>
                </svg><span>Main Menu</span>
            </button>
            <button class="silk-nav__trigger silk-nav__trigger--reverse">
                <svg class="symbol symbol-chevron-left">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chevron-left"></use>
                </svg>
            </button>
          </div>
        <?php print render($page['header']); ?>
          <nav class="nav nav-quick">
            <ul>
              <li><a href="/"> 
                    <svg class="symbol symbol-barcode">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#barcode"></use>
                    </svg><span>Barcode Generator</span></a></li>
              <li><a href="/"> 
                    <svg class="symbol symbol-cart">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cart"></use>
                    </svg><span>Shop</span></a></li>
              <li><a href="/"> 
                    <svg class="symbol symbol-plane">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#plane"></use>
                    </svg><span>Contact</span></a></li>
              <li><a href="/"> 
                    <svg class="symbol symbol-user">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                    </svg><span>Client Login</span></a></li>
            </ul>
          </nav>
      </div>

    </div></div> <!-- /.section, /#header -->

    <?php if ($main_menu || $secondary_menu): ?>
      <div id="navigation"><div class="section">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
      </div></div> <!-- /.section, /#navigation -->
    <?php endif; ?>


    <?php print $messages; ?>

    <main id="main" class="clear">
        
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>


    </main> <!-- /#main -->

    <div id="footer" class="site__footer">
      <?php print render($page['footer']); ?>
        <div class="lace clear">
            <?php print render($page['footer_lace']); ?>
        </div>
        <div class="sole clear">
            <?php print render($page['footer_sole']); ?>
        </div>
    </div> <!--  /#footer -->

