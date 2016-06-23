<?php
/**
 * Auto rebuild theme registry.
 */
if (theme_get_setting('procyon_rebuild_registry') && !defined('MAINTENANCE_MODE')) {
  system_rebuild_theme_data();
  drupal_theme_rebuild();
}

/**
 * Implements hook_preprocess_views_view_table().
 */
function procyon_preprocess_views_view_table(&$vars) {
  $type = '';
  if (theme_get_setting('procyon_type_table') == 'border') {
    $type = 'border';
  }
  elseif (theme_get_setting('procyon_type_table') == 'stripe') {
    $type = 'stripe';
  }
  elseif (theme_get_setting('procyon_type_table') == 'border_stripe') {
    $type = 'border stripe';
  }
  $vars['classes_array'][] = $type;
}

/**
 * Implements hook_preprocess_page().
 */
function procyon_preprocess_page(&$variables) {
  global $user;
  
  // Templates for node type.
  // page--node--blog.tpl.php for "blog" machine name node type.
  if (!empty($variables['node']) && !empty($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
  }
  
  // Special login page and a password recovery.
  if (theme_get_setting('procyon_login_page')) {
    if(arg(0) == 'user' && !arg(1) && !$user->uid) {
      $variables['theme_hook_suggestions'][] = 'page__user__login';
    }
    if(arg(0) == 'user' && arg(1) == 'password' && !$user->uid) {
      $variables['theme_hook_suggestions'][] = 'page__user__password';
    }
  }
  
  // Error pages.
  // Files in /templates/errors/ folder.
  // page--403.tpl.php & page--404.tpl.php
  if (theme_get_setting('procyon_login_page')) {
    $status = drupal_get_http_header("status");
    if($status == "404 Not Found") {
      $variables['theme_hook_suggestions'][] = 'page__404';
      drupal_set_title('404 - '.t('Forbidden page'));
    }
    if($status == "403 Forbidden") {
      $variables['theme_hook_suggestions'][] = 'page__403';
      drupal_set_title('403 - '.t('Access denied'));
    }
  }
}

/**
 * Implements hook_preprocess_html().
 */
function procyon_preprocess_html(&$variables) {
  global $user;
  
  // HTML Attributes
  $html_attributes = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );
  $variables['html_attributes'] = drupal_attributes($html_attributes);
  
  // Login and a password recovery pages.
  if (theme_get_setting('procyon_login_page')) {
    if(arg(0) == 'user' && !arg(1) && !$user->uid) {
      $variables['theme_hook_suggestions'][] = 'html__user__login';
    }
    if(arg(0) == 'user' && arg(1) == 'password' && !$user->uid) {
      $variables['theme_hook_suggestions'][] = 'html__user__login';
    }
  }
}

/**
 * Implements hook_css_alter().
 * Disable unnecessary css
 */
function procyon_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
}

/**
* Implements hook_preprocess_block().
*/
function procyon_preprocess_block(&$variables, $hook) {
  $variables['title'] = isset($variables['block']->subject) ? $variables['block']->subject : '';
}

/**
 * Implements hook_theme().
 */
function procyon_theme($existing, $type, $theme, $path) {
  $theme = array();
  // Rewrite checkboxes.
  if (theme_get_setting('procyon_switch_checkboxes')) {
    $theme['checkbox'] = array(
      'render element' => 'element',
      'template' => 'templates/fields/field--type-checkbox',
    );
  }
  // Rewrite radios.
  if (theme_get_setting('procyon_switch_radios')) {
    $theme['radio'] = array(
      'render element' => 'element',
      'template' => 'templates/fields/field--type-radio',
    );
  }
  
  return $theme;
}

/**
 * Implements theme_textarea().
 * Disable grippie.
 */
function procyon_textarea($variables) {
  if (theme_get_setting('procyon_disable_grippie')) {
    $variables['element']['#resizable'] = FALSE;
  }
  
  return theme_textarea($variables);
}

/**
 * Implements hook_form_FORM_ID_alter().
 * Login and a password recovery pages.
 */
if (theme_get_setting('procyon_login_page')) {
  function procyon_form_user_login_block_alter(&$form, &$form_state) {
    $form['name']['#title_display'] = 'invisible';
    $form['name']['#attributes'] = array('placeholder' => t('Login'));
    $form['pass']['#title_display'] = 'invisible';
    $form['pass']['#attributes'] = array('placeholder' => t('Password'));
    $form['actions']['submit']['#attributes']['class'][] = 'expand';
  }
  
  function procyon_form_user_login_alter(&$form, &$form_state) {
    $form['name']['#title_display'] = 'invisible';
    $form['name']['#attributes'] = array('placeholder' => t('Login'));
    $form['name']['#description'] = '';
    $form['pass']['#title_display'] = 'invisible';
    $form['pass']['#attributes'] = array('placeholder' => t('Password'));
    $form['pass']['#description'] = '';
    $form['actions']['submit']['#attributes']['class'][] = 'expand';
  }
  
  function procyon_form_user_pass_alter(&$form, &$form_state) {
    $form['name']['#title_display'] = 'invisible';
    $form['name']['#attributes'] = array('placeholder' => t('E-mail'));
    $form['name']['#description'] = '';
    $form['actions']['submit']['#attributes']['class'][] = 'expand';
  }
}