<?php

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function p6bootstrap_form_system_theme_settings_alter(&$form, &$form_state)  {
  // Get the active theme name, we need it at some stage.
  $theme_name = $form_state['build_info']['args'][0];
  $theme_path = drupal_get_path('theme', $theme_name);

  $form['p6bootstrap'] = array(
    '#type' => 'vertical_tabs',
    '#title' => t('Favicons'),
    '#prefix' => '<h2><small>Other Settings</small></h2>',
    '#weight' => $form['general']['#weight'] - 0.1,
  );
  $form['p6bootstrap']['google_analytics'] = array(
    '#type' => 'fieldset',
    '#title' => t('Google Analytics'),
    '#description' => t('Enable <a href="!url">Google Analytics</a> web statistics tracking system for your website.', array('!url' => 'http://www.google.com/analytics/')),
  );
  $form['p6bootstrap']['google_analytics']['ga_tracking_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Tracking ID'),
    '#attributes' => array(
      'placeholder' => 'UA-00000000-0',
    ),
    '#default_value' => check_plain(theme_get_setting('ga_tracking_id')),
  );
  $form['p6bootstrap']['google_analytics']['ga_allowed_domains'] = array(
    '#type' => 'textfield',
    '#title' => t('Allowed hosts'),
    '#description' => t('Enable tracking only for these hostnames. Separate by comma. Leave blank to enable at all times.'),
    '#attributes' => array(
      'placeholder' => 'example.com, www.example.com, ' . $_SERVER['HTTP_HOST'],
    ),
    '#states' => array(
      'visible' => array(
        ':input[name="ga_tracking_id"]' => array('filled' => TRUE),
      ),
    ),
    '#default_value' => check_plain(theme_get_setting('ga_allowed_domains')),
  );
  $form['p6bootstrap']['favicon'] = array(
    '#type' => 'fieldset',
    '#title' => t('Favicons'),
    '#description' => t('<p>P6Bootstrap theme includes a set of icons to demonstrate the proper file names and sizes. You can use an online <a href="!icongenerator">icon generator</a>, or manually create the needed icons to replace the existing icon set.</p><p>Check out the <a href="!faq">FAQ</a> for more details and specifications on each icon.</p>', array('!icongenerator' => 'http://realfavicongenerator.net/', '!faq' => 'http://realfavicongenerator.net/faq')),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_57x57'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-57x57.png'),
    '#description' => t('iPhone and iPad users can turn web pages into icons on their home screen. Such link appears as a regular iOS native application. When this happens, the device looks for a specific picture. The 57x57 resolution is convenient for non-retina iPhone with iOS6 or prior. Learn more in <a href="!docs">Apple docs</a>.', array('!docs' => 'https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html')),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_57x57')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-57x57.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_60x60'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-60x60.png'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for non-retina iPhone with iOS7.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_60x60')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-60x60.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_72x72'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-72x72.png'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for non-retina iPad with iOS6 or prior.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_72x72')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-72x72.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_76x76'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-76x76.png (recommended)'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for non-retina iPad with iOS7.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_76x76')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-76x76.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_114x114'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-114x114.png'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for retina iPhone with iOS6 or prior.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_114x114')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-114x114.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_120x120'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-120x120.png (recommended)'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for retina iPhone with iOS7.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_120x120')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-120x120.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_144x144'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-144x144.png'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for retina iPad with iOS6 or prior.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_144x144')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-144x144.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_152x152'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-152x152.png (recommended)'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for retina iPad with iOS7.'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_152x152')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-152x152.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_180x180'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-180x180.png (recommended)'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for <a href="!iphone6plus">iPhone 6 Plus with iOS8</a>.', array('!iphone6plus' => 'https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html#//apple_ref/doc/uid/TP40006556-CH27-SW2')),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_180x180')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-180x180.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon.png'),
    '#description' => t('Same as <code>apple-touch-icon-57x57.png</code>, for "default" requests, as some devices may look for this specific file. This picture may save some 404 errors in your HTTP logs. See <a href="!appledocs">Apple docs</a>.', array('!appledocs' => 'https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html')),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_180x180')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon.png',
    ),
  );
  $form['p6bootstrap']['favicon']['apple_touch_icon_precomposed'] = array(
    '#type' => 'textfield',
    '#title' => t('apple-touch-icon-precomposed.png'),
    '#description' => t('Same as <code>apple-touch-icon.png</code>, expect that is already have rounded corners (but neither drop shadow nor gloss effect).'),
    '#default_value' => check_plain(theme_get_setting('apple_touch_icon_precomposed')),
    '#attributes' => array(
      'placeholder' => 'favicons/apple-touch-icon-precomposed.png',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_ico'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon.ico (recommended)'),
    '#description' => t('Used by IE, and also by some other browsers if we are not careful.'),
    '#default_value' => check_plain(theme_get_setting('favicon_ico')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon.ico',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_16x16'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon-16x16.png'),
    '#description' => t('The classic favicon, displayed in the tabs.'),
    '#default_value' => check_plain(theme_get_setting('favicon_16x16')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon-16x16.png',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_32x32'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon-32x32.png'),
    '#description' => t('For Safari on Mac OS.'),
    '#default_value' => check_plain(theme_get_setting('favicon_32x32')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon-32x32.png',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_96x96'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon-96x96.png'),
    '#description' => t('For <a href="!googletv">Google TV</a>.', array('!googletv' => 'https://developers.google.com/tv/web/docs/design_for_tv#favicons')),
    '#default_value' => check_plain(theme_get_setting('favicon_96x96')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon-96x96.png',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_160x160'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon-160x160.png'),
    '#description' => t('For <a href="!operaspeeddial">Opera Speed Dial</a> (<a href="!opera15">up to Opera 12; this icon is deprecated starting from Opera 15</a>), although the optimal icon is not square but rather 256x160. If Opera is a major platform for you, you should create this icon yourself.', array('!operaspeeddial' => 'http://dev.opera.com/articles/view/opera-speed-dial-enhancements/', '!opera15' => 'http://realfavicongenerator.net/faq#opera15_speeddial')),
    '#default_value' => check_plain(theme_get_setting('favicon_160x160')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon-160x160.png',
    ),
  );
  $form['p6bootstrap']['favicon']['favicon_192x192'] = array(
    '#type' => 'textfield',
    '#title' => t('favicon-192x192.png'),
    '#description' => t('For <a href="!androidchrome">Android Chrome M36+</a>.', array('!androidchrome' => 'https://developers.google.com/chrome/mobile/docs/installtohomescreen')),
    '#default_value' => check_plain(theme_get_setting('favicon_192x192')),
    '#attributes' => array(
      'placeholder' => 'favicons/favicon-192x192.png',
    ),
  );
  $form['p6bootstrap']['favicon']['application_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Web App title'),
    '#description' => t('For <code>apple-mobile-web-app-title</code> and <code>application-name</code> meta tags.'),
    '#default_value' => check_plain(theme_get_setting('application_name')),
    '#attributes' => array(
      'placeholder' => variable_get('site_name'),
    ),
  );
  $form['p6bootstrap']['favicon']['msapplication_tilecolor'] = array(
    '#type' => 'textfield',
    '#title' => t('Windows 8 - Tile color'),
    '#description' => t('For <code>msapplication-TileColor</code> meta tag.'),
    '#default_value' => check_plain(theme_get_setting('msapplication_tilecolor')),
    '#attributes' => array(
      'placeholder' => '#b5d23e',
    ),
  );
  $form['p6bootstrap']['favicon']['msapplication_tileimage'] = array(
    '#type' => 'textfield',
    '#title' => t('Windows 8 - Tile image'),
    '#description' => t('For <code>msapplication-TileImage</code> meta tag.'),
    '#default_value' => check_plain(theme_get_setting('msapplication_tileimage')),
    '#attributes' => array(
      'placeholder' => 'favicons/mstile-144x144.png',
    ),
  );
  $form['p6bootstrap']['favicon']['msapplication_config'] = array(
    '#type' => 'textfield',
    '#title' => t('Windows 8 - Tile image config'),
    '#description' => t('For <code>msapplication-config</code> meta tag. Other tile images are defined in the <em>browserconfig.xml</em> file. Make sure to edit it accordingly.'),
    '#default_value' => check_plain(theme_get_setting('msapplication_config')),
    '#attributes' => array(
      'placeholder' => 'favicons/browserconfig.xml',
    ),
  );

  // Enable default favicon and hide its settings form in general theme settings.
  $form['favicon']['default_favicon']['#default_value'] = 1;
  $form['favicon']['default_favicon']['#disabled'] = TRUE;
}
