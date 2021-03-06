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
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header role="banner" id="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 clearfix">

        <?php print $p6b_meta_menu; ?>

        <?php if ($logo): ?>
        <a class="logo pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <picture>
            <img src="/sites/all/themes/p6bootstrap/logo.png" srcset="/sites/all/themes/p6bootstrap/logo.png, /sites/all/themes/p6bootstrap/logo_2x.png 2x" alt="Logo" />
          </picture>
        </a>
        <?php endif; ?>

        <?php if (!empty($site_slogan)): ?>
          <p class="lead"><?php print $site_slogan; ?></p>
        <?php endif; ?>

        <a href="#" title="Search" class="nav-search" data-toggle="modal" data-target="#p6b-modal-searchbox" onclick="javascript: return false;"><i class="glyphicon glyphicon-search"></i></a>

        <a id="menuToggle" class="icon nav-toggle" data-icon="=" role="button" href="javascript:void(0);" title="Toggle navigation"></a>
        <?php print $p6b_main_menu; ?>

        <?php print render($page['header']); ?>
      </div>
    </div>
  </div>
</header>


<div class="main-container<?php print ($is_front) ? '' : ' container'; ?>">
  <div class="row">
    <main<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])): ?>
        <div id="p6b-tabs" class="clearfix"><a class="close" data-dismiss="alert" data-target="#p6b-tabs" href="#">&times;</a><?php print render($tabs); ?></div>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

      <div class="p6b-content">
        <?php print render($page['content']); ?>

        <?php if (!empty($page['content_bottom'])): ?>
          <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
              <?php print render($page['content_bottom']); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </main>

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside<?php print $sidebar_first_class; ?> role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside<?php print $sidebar_second_class; ?> role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>
  </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 p6b-equal-height footer-left"><?php print render($page['footer_left']); ?></div>
      <div class="col-sm-4 p6b-equal-height footer-right"><?php print render($page['footer_right']); ?></div>
    </div>
    <div class="row hidden-print">
      <div class="col-sm-12"><?php print render($page['footer']); ?></div>
    </div>
  </div>
</footer>


<?php if (module_exists('search')): ?>
<div class="modal fade" id="p6b-modal-searchbox" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <?php print render($search_box); ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>
