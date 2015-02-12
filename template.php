<?php
/**
 * @file
 * template.php
 */

/**
 * Implements hook_preprocess().
 */
function p6bootstrap_preprocess(&$vars, $hook) {
  $vars['user_roles_array'] = _p6_user_roles();
  foreach ($vars['user_roles_array'] as $role) {
    // Add role names as classes for the logged-in user.
    $vars['classes_array'][] = _p6_is_variable($role);
    // Add role names as $variables for the logged-in user.
    $vars[_p6_is_variable($role)] = TRUE;
  }
}

/**
 * Implements hook_html_head_alter().
 */
function p6bootstrap_html_head_alter(&$head_elements) {
  global $theme_path;

  // Remove the default "shortcut icon", if we are using the theme defined icon.
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortcut icon') {
      if (theme_get_setting('toggle_favicon') && theme_get_setting('favicon_ico')) {
        unset($head_elements[$key]);
      }
    }
  }

  // Add favicon.
  if (theme_get_setting('toggle_favicon') && theme_get_setting('favicon_ico')) {
    $favicon = theme_get_setting('favicon_ico');
    $type = theme_get_setting('favicon_mimetype');

    $head_elements['favicon_ico'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'shortcut icon',
        'href' => url(drupal_strip_dangerous_protocols($theme_path . '/' . $favicon), array('absolute' => TRUE)),
        'type' => $type,
      ),
      '#weight' => 100,
    );
  }

  // apple-touch-icon-57x57.
  if ($icon = theme_get_setting('apple_touch_icon_57x57')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_57x57'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '57x57',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 101,
    );
  }

  // apple-touch-icon-114x114.
  if ($icon = theme_get_setting('apple_touch_icon_114x114')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_114x114'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '114x114',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 102,
    );
  }

  // apple-touch-icon-72x72.
  if ($icon = theme_get_setting('apple_touch_icon_72x72')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_72x72'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '72x72',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 103,
    );
  }

  // apple-touch-icon-144x144.
  if ($icon = theme_get_setting('apple_touch_icon_144x144')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_144x144'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '144x144',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 104,
    );
  }

  // apple-touch-icon-60x60.
  if ($icon = theme_get_setting('apple_touch_icon_60x60')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_60x60'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '60x60',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 105,
    );
  }

  // apple-touch-icon-120x120.
  if ($icon = theme_get_setting('apple_touch_icon_120x120')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_120x120'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '120x120',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 106,
    );
  }

  // apple-touch-icon-76x76.
  if ($icon = theme_get_setting('apple_touch_icon_76x76')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_76x76'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '76x76',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 107,
    );
  }

  // apple-touch-icon-152x152.
  if ($icon = theme_get_setting('apple_touch_icon_152x152')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_152x152'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '152x152',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 108,
    );
  }

  // apple-touch-icon-180x180.
  if ($icon = theme_get_setting('apple_touch_icon_180x180')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['apple_touch_icon_180x180'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => '180x180',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 108,
    );
  }

  // favicon-192x192.
  if ($icon = theme_get_setting('favicon_192x192')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['favicon_192x192'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'sizes' => '192x192',
        'type' => 'image/png',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 109,
    );
  }

  // favicon-160x160.
  if ($icon = theme_get_setting('favicon_160x160')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['favicon_160x160'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'sizes' => '160x160',
        'type' => 'image/png',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 110,
    );
  }

  // favicon-96x96.
  if ($icon = theme_get_setting('favicon_96x96')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['favicon_96x96'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'sizes' => '96x96',
        'type' => 'image/png',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 111,
    );
  }

  // favicon-16x16.
  if ($icon = theme_get_setting('favicon_16x16')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['favicon_16x16'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'sizes' => '16x16',
        'type' => 'image/png',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 112,
    );
  }

  // favicon-32x32.
  if ($icon = theme_get_setting('favicon_32x32')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $icon);

    $head_elements['favicon_32x32'] = array(
      '#type' => 'html_tag',
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'sizes' => '32x32',
        'type' => 'image/png',
        'href' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 113,
    );
  }

  // apple-mobile-web-app-title.
  if ($content = theme_get_setting('application_name')) {
    // Apple version.
    $head_elements['apple_mobile_web_app_title'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'apple-mobile-web-app-title',
        'content' => $content,
      ),
      '#weight' => 114,
    );
    // Microsoft version.
    $head_elements['application_name'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'application-name',
        'content' => $content,
      ),
      '#weight' => 115,
    );
  }

  // msapplication-config.
  if ($config = theme_get_setting('msapplication_config')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $config);
    // Apple version.
    $head_elements['msapplication_config'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'msapplication-config',
        'content' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 116,
    );
  }

  // msapplication-TileColor.
  if ($tilecolor = theme_get_setting('msapplication_tilecolor')) {
    $head_elements['msapplication_tilecolor'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'msapplication-TileColor',
        'content' => $tilecolor,
      ),
      '#weight' => 117,
    );
  }

  // msapplication-TileImage.
  if ($tileimage = theme_get_setting('msapplication_tileimage')) {
    $path = drupal_strip_dangerous_protocols($theme_path . '/' . $tileimage);
    $head_elements['msapplication_tileimage'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'msapplication-TileImage',
        'content' => url($path, array('absolute' => TRUE)),
      ),
      '#weight' => 118,
    );
  }
}

/**
 * Implements hook_preprocess_HOOK().
 */
// function p6bootstrap_preprocess_html(&$vars) {
// }

/**
 * Implements hook_process_HOOK().
 */
function p6bootstrap_process_html(&$vars) {
  global $language;

  $vars['rdf_header'] = '';
  $vars['rdf_profile'] = '';
  $vars['html_attributes'] = '';
  // Support RDF if it's enabled.
  if (module_exists('rdf')) {
    $vars['rdf_header'] = ' PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN"';
    $vars['rdf_profile'] = ' profile="' . $vars['grddl_profile'].'"';
  }

  $vars['html_attributes_array'] = array();
  $vars['html_attributes_array']['lang'][] = $language->language;
  $vars['html_attributes_array']['dir'][] = $language->dir;
  $vars['html_attributes_array']['class'][] = 'no-js';

  $vars['html_attributes'] = drupal_attributes($vars['html_attributes_array']);


  // Google Analytics.
  $vars['ga_tracking_code'] = '';
  if ($vars['ga_tracking_id'] = theme_get_setting('ga_tracking_id')) {
    $ga_allowed_domains = theme_get_setting('ga_allowed_domains');
    $ga_allowed_domains = trim($ga_allowed_domains);
    $ga_allowed_domains = str_replace(' ', '', $ga_allowed_domains);
    if (!empty($ga_allowed_domains)) {
      $ga_allowed_domains = explode(',', $ga_allowed_domains);
    }

    if (empty($ga_allowed_domains) || (!empty($ga_allowed_domains) && is_array($ga_allowed_domains) && in_array($_SERVER['HTTP_HOST'], $ga_allowed_domains))) {
      $vars['ga_tracking_code'] = "<!-- BEGIN: Google Analytics tracking code. -->\n" .
        "<script>" .
          "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){" .
          "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o)," .
          "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)" .
          "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');" .

          "ga('create', '" . $vars['ga_tracking_id'] . "', 'auto');" .
          "ga('send', 'pageview');" .
        "</script>\n" .
        "<!-- END: Google Analytics tracking code. -->\n";
    }
  }
}

/**
 * Preprocess variables for page.tpl.php
 */
function p6bootstrap_preprocess_page(&$vars) {
  // Configure the widths of each sidebar.
  if (!empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
    $vars['content_column_class'] = ' class="col-sm-6 col-sm-push-3"';
    $vars['sidebar_first_class']  = ' class="col-sm-3 col-sm-pull-6"';
    $vars['sidebar_second_class'] = ' class="col-sm-3"';
  }
  elseif (!empty($vars['page']['sidebar_first']) || !empty($vars['page']['sidebar_second'])) {
    if (empty($vars['page']['sidebar_first'])) {
      $vars['content_column_class'] = ' class="col-sm-9"';
      $vars['sidebar_second_class']  = ' class="col-sm-3"';
    }
    elseif (empty($vars['page']['sidebar_second'])) {
      $vars['content_column_class'] = ' class="col-sm-9 col-sm-push-3"';
      $vars['sidebar_first_class']  = ' class="col-sm-3 col-sm-pull-9"';
    }
  }
  else {
    $vars['content_column_class'] = ' class="col-sm-12"';
  }

  $main_menu_name = variable_get('menu_main_links_source', 'main-menu');
  $meta_menu_name = variable_get('menu_secondary_links_source', 'user-menu');

  $is_front_page = drupal_is_front_page();
  // Add a JavaScript setting for the front page status.
  drupal_add_js(array('p6bootstrap' => array('isFront' => $is_front_page)), 'setting');

  // Front page only alterations.
  if ($is_front_page) {
    // Disable default system message, "No front page content has been created yet".
    // unset($vars['page']['content']['system_main']['default_message']);

    // Disable promoted nodes.
    // unset($vars['page']['content']['system_main']['nodes']);

    // Hide title.
    // $vars['title'] = '';

    // Hide breadcrumbs.
    // $vars['breadcrumb'] = '';

    // Override main menu content for home page.
    $vars['p6b_main_menu'] = _p6bootstrap_menu($main_menu_name, 1);
  }
  else {
    $vars['p6b_main_menu'] = _p6bootstrap_menu($main_menu_name, NULL);
  }

  $vars['p6b_meta_menu'] = _p6bootstrap_menu($meta_menu_name, 1, array('class' => array('pull-right')));

  // Applies to page title (H1).
  $vars['title_attributes_array']['class'][] = 'page-header';

  // Add node type as a template suggestion.
  if (!empty($vars['node']) && !empty($vars['node']->type)) {
    // Template suggestions.
    $vars['theme_hook_suggestions'][] = 'page__node__' . $vars['node']->type;
  }

  // Search box.
  $vars['search_box'] = drupal_get_form('search_block_form');

  // dpm($vars, 'page');
}

/**
 * Process variables for page.tpl.php
 */
function p6bootstrap_process_page(&$vars) {
  $logged_in = $vars['logged_in'];

  // // Change 'no content' message for taxonomy pages.
  // if (isset($vars['page']['content']['system_main']['no_content'])) {
  //   $vars['page']['content']['system_main']['no_content']['#prefix'] = '<div class="p6-term-empty">';
  //   $vars['page']['content']['system_main']['no_content']['#suffix'] = '</div>';
  //   if ($logged_in) {
  //     $vars['page']['content']['system_main']['no_content']['#markup'] = t('There is currently no content classified with this term, or you do not have access to this category.');
  //   }
  //   else {
  //     $options['query'] = drupal_get_destination();
  //     $vars['page']['content']['system_main']['no_content']['#markup'] = t('You need to <a href="!login">log in</a> to access your files.', array('!login' => url('user/login')));
  //   }
  // }
}

/**
 * Preprocess variables for node.tpl.php
 */
// function p6bootstrap_preprocess_node(&$vars) {
//   $node = $vars['node'];
// }

/**
 * Implements hook_preprocess_region().
 */
function p6bootstrap_preprocess_region(&$vars) {
  switch ($vars['region']) {
    case 'content':
    case 'navigation':
      $vars['theme_hook_suggestions'][] = 'region__no_wrapper';
      break;
  }
}

/**
 * Implements hook_preprocess_views_view_table().
 */
function p6bootstrap_preprocess_views_view_table(&$vars) {
  // Table classes.
  // @see http://getbootstrap.com/css/#tables
  $vars['classes_array'][] = 'table-hover';
}

/**
 * Overrides theme_mark().
 */
function p6bootstrap_mark($vars) {
  $type = $vars['type'];
  global $user;
  if ($user->uid) {
    if ($type == MARK_NEW) {
      return ' <span class="label label-info">' . t('new') . '</span>';
    }
    elseif ($type == MARK_UPDATED) {
      return ' <span class="label label-success">' . t('updated') . '</span>';
    }
  }
}

/**
 * Overrides theme_textarea().
 */
function p6bootstrap_textarea($vars) {
  // Remove grippie.
  $vars['element']['#resizable'] = FALSE;
  return theme_textarea($vars);
}

/**
 * Theme the way an 'all day' label will look.
 */
function p6bootstrap_date_all_day_label() {
  return ''; // '(' . t('All day', array(), array('context' => 'datetime')) .')';
}

/**
 * Implements hook_form_alter().
 */
function p6bootstrap_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    case 'search_form':
      $form['basic']['keys']['#attributes']['placeholder'] = t('Enter keywords');
      break;

    case 'search_block_form':
      unset($form['search_block_form']['#theme_wrappers']);
      $form['search_block_form']['#attributes']['placeholder'] = t('Search "Stanford West Apartments" ...');
      $form['actions']['submit']['#attributes']['class'] = array();
      $form['actions']['submit']['#attributes']['title'] = t('Search');
      $form['actions']['submit']['#value'] = '<i class="glyphicon glyphicon-search"></i>';
      break;
  }
}

/**
 * Loads a block object from the database.
 *
 * @param $module
 *   Name of the module that implements the block to load.
 * @param $delta
 *   Unique ID of the block within the context of $module. Pass NULL to return
 *   an empty block object for $module.
 * @param $render
 *
 * @return
 *   A block object or rendered HTML for the block.
 */
function _p6bootstrap_get_block($module, $delta, $render = TRUE) {
  $block = block_load($module, $delta);
  $render_array = _block_get_renderable_array(_block_render_blocks(array($block)));

  if ($render) {
    return render($render_array);
  }
  else {
    return $render_array;
  }
}

/**
 * Formats strings compatible to be used as PHP variables.
 *
 * @return string
 */
function _p6_is_variable($var = NULL) {
  return @str_replace('-', '_', 'is_' . drupal_html_class($var));
}

/**
 * Retrieve an array of roles excluding Drupal core's for the logged-in user.
 *
 * @return array
 */
function _p6_user_roles() {
  global $user;

  $user_roles = $user->roles;
  $all_roles  = user_roles(FALSE);

  // Remove core roles from the list.
  unset($user_roles[1]);
  unset($user_roles[2]);

  $user_roles_array = array();

  foreach (array_intersect($all_roles, $user_roles) as $role_name) {
   $user_roles_array[] = $role_name;
  }

  return $user_roles_array;
}

/**
 * Gets the data structure representing a named menu tree.
 *
 * Since this can be the full tree including hidden items, the data returned
 * may be used for generating an an admin interface or a select.
 *
 * @param $menu_name
 *   The named menu links to return
 * @param $max_depth
 *   Optional maximum depth of links to retrieve. Typically useful if only one
 *   or two levels of a sub tree are needed in conjunction with a non-NULL
 *   $link, in which case $max_depth should be greater than $link['depth'].
 * @param $attributes
 *   An associative array of key-value pairs to be converted to attributes of
 *   the menu wrapper.
 *
 * @return
 *   Returns HTML.
 */
function _p6bootstrap_menu($menu_name, $max_depth = NULL, $attributes = array()) {
  $menu_output = &drupal_static(__FUNCTION__, array());

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name, $max_depth);
    $menu_output[$menu_name] = menu_tree_output($tree);
  }

  $attributes['role'][] = 'navigation';
  $attributes['class'][] = 'p6-' . $menu_name;
  return '<nav' . drupal_attributes($attributes) . '>' . render($menu_output[$menu_name]) . '</nav>';
}

/**
 * Overrides theme_menu_tree().
 */
function p6bootstrap_menu_tree(&$variables) {
  return '<ul>' . $variables['tree'] . '</ul>';
}

/**
 * Overrides theme_menu_link().
 */
function p6bootstrap_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  if ($element['#href'] == 'search/node') {
    $element['#localized_options']['attributes']['class'] = array('icon', 'icon-search');
    $element['#localized_options']['attributes']['data-toggle'] = 'modal';
    $element['#localized_options']['attributes']['data-target'] = '#p6b-modal-searchbox';
    $element['#localized_options']['attributes']['onclick'] = 'javascript: return false;';
    $element['#localized_options']['external'] = TRUE;
    $element['#href'] = '#';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Overrides theme_file_icon().
 */
function p6bootstrap_file_icon($vars) {
  $file = $vars['file'];
  $icon_directory = drupal_get_path('theme', 'p6bootstrap') . '/ico';
  $mime = check_plain($file->filemime);
  $icon_url = file_icon_url($file, $icon_directory);
  return '<img class="file-icon" alt="" title="' . $mime . '" src="' . $icon_url . '" />';
}

/**
 * Overrides theme_file_link().
 */
function p6bootstrap_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  $size = ''; // ' <small>' . format_size($file->filesize) . '</small>';

  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . $size . '</span>';
}

/**
 * Overrides theme_file_widget().
 */
function p6bootstrap_file_widget($vars) {
  $element = $vars['element'];
  $output = '';

  $hidden_elements = array();
  foreach (element_children($element) as $child) {
    if (isset($element[$child]['#type']) && ($element[$child]['#type'] === 'hidden')) {
      $hidden_elements[$child] = $element[$child];
      unset($element[$child]);
    }
  }

  if (($element['#field_name'] == 'field_productresource_file') && isset($element['description'])) {
    $element['description']['#title'] = t('File name');
    $element['description']['#description'] = t('The file name will be used as the label of the link to the file.');
    $element['description']['#required'] = TRUE;

    $default_filename = $element['filename']['#markup'];
    $element['description']['#default_value'] =  trim(strip_tags($default_filename));
    if ($element['description']['#value'] == '') {
      $element['description']['#value'] = $element['description']['#default_value'];
    }
  }

  $element['upload_button']['#prefix'] = '<span class="input-group-btn">';
  $element['upload_button']['#suffix'] = '</span>';

  // The "form-managed-file" class is required for proper Ajax functionality.
  $output .= '<div class="file-widget form-managed-file clearfix input-group">';
  if (!empty($element['fid']['#value']) && ($element['#field_name'] != 'field_productresource_file')) {
    // Add the file size after the file name.
    $element['filename']['#markup'] .= ' <span class="file-size">(' . format_size($element['#file']->filesize) . ')</span> ';
  }
  $output .= drupal_render_children($element);
  $output .= '</div>';
  $output .= render($hidden_elements);

  return $output;
}

/**
 * Implements hook_field_attach_view_alter().
 *
 * Prepends an empty SPAN tag with the selected color's value as background style.
 */
function p6bootstrap_field_attach_view_alter(&$output, $context) {
  if (isset($output['#entity_type']) && ($output['#entity_type'] == 'node') && ($output['#bundle'] == 'product')) {
    if (isset($output['field_product_color']) && ($options = $output['field_product_color']['#items'])) {
      foreach ($options as $key => $color) {
        $output['field_product_color'][$key]['#markup'] = '<span style="background-color: #' .
          $color['value'] . ';" class="hidden-print"></span><br>' .
          $output['field_product_color'][$key]['#markup'];
      }
    }
  }
}

/**
 * Implements template_preprocess_field().
 *
 * If Display Suite is enabled check if its functions override this one.
 */
function p6bootstrap_preprocess_field(&$variables, $hook) {
  $element = $variables['element'];

  if ($element['#field_type'] == 'text_long') {
    foreach ($element['#items'] as $delta => $item) {
      if (($item['format'] == NULL) && !empty($item['value'])) {
        $element[$delta]['#markup'] = nl2br($item['value']);
      }
    }
  }
}
