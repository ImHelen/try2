<?php
/**
* Implements hook_form_system_theme_settings_alter() function.
*/
function procyon_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
     // Bug workaround (#943212).
     if (isset($form_id)) {
      return;
     }
     
     // We move default theme settings to new fieldset.
     $form['theme_settings_fieldset'] = array(
          '#type' => 'fieldset',
          '#title' => t('Base theme settings'),
          '#weight' => 2,
          '#collapsible' => TRUE,
          '#collapsed' => TRUE,
     );

     $form['theme_settings_fieldset']['theme_settings'] = $form['theme_settings'];
     unset($form['theme_settings']);
     $form['theme_settings_fieldset']['logo'] = $form['logo'];
     unset($form['logo']);
     $form['theme_settings_fieldset']['favicon'] = $form['favicon'];
     unset($form['favicon']);

     $form['procyon_settings'] = array(
          '#type' => 'fieldset',
          '#title' => t('Procyon settings'),
          '#weight' => 1,
          '#collapsible' => TRUE,
          '#collapsed' => TRUE,
     );
     
     $form['procyon_settings']['procyon_rebuild_registry'] = array(
          '#weight' => 1,
          '#type' => 'checkbox',
          '#title' => t('Rebuild theme registry on every page load.'),
          '#default_value' => theme_get_setting('procyon_rebuild_registry')
     );
     
     $form['procyon_settings']['procyon_switch_checkboxes'] = array(
          '#weight' => 2,
          '#type' => 'checkbox',
          '#title' => t('Procyon switch checkbox style.'),
          '#description' => t('Checkboxes will be displayed as switchers.'),
          '#default_value' => theme_get_setting('procyon_switch_checkboxes')
     );
    
     $form['procyon_settings']['procyon_switch_radios'] = array(
          '#weight' => 3,
          '#type' => 'checkbox',
          '#title' => t('Procyon switch radio-button style.'),
          '#description' => t('Radio-buttons will be themed.'),
          '#default_value' => theme_get_setting('procyon_switch_radios')
     );
    
     $form['procyon_settings']['procyon_disable_grippie'] = array(
          '#weight' => 4,
          '#type' => 'checkbox',
          '#title' => t('Disable textarea grippie.'),
          '#description' => t('Modern browser support textarea resize out the box. You can disable default grippie.'),
          '#default_value' => theme_get_setting('procyon_disable_grippie')
     );
     
     $form['procyon_settings']['procyon_login_page'] = array(
          '#weight' => 5,
          '#type' => 'checkbox',
          '#title' => t('Special login page.'),
          '#description' => t('Special login and a password recovery pages.'),
          '#default_value' => theme_get_setting('procyon_login_page')
     );
     
     $form['procyon_settings']['procyon_error_page'] = array(
          '#weight' => 6,
          '#type' => 'checkbox',
          '#title' => t('Special error pages.'),
          '#description' => t('Special pages for 403 & 404 errors.'),
          '#default_value' => theme_get_setting('procyon_error_page')
     );
     
     $form['procyon_settings']['procyon_do_not_go'] = array(
          '#weight' => 7,
          '#type' => 'checkbox',
          '#title' => t('Screen saver "Do not go".'),
          '#description' => t('Active Screen saver "Do not go" in region at page.tpl.php.'),
          '#default_value' => theme_get_setting('procyon_do_not_go')
     );
     
     $form['procyon_settings']['procyon_back_to_top'] = array(
          '#weight' => 8,
          '#type' => 'checkbox',
          '#title' => t('Back to top.'),
          '#description' => t('Active button "Back to top".'),
          '#default_value' => theme_get_setting('procyon_back_to_top')
     );
     
     $form['procyon_settings']['procyon_type_table'] = array(
          '#weight' => 9,
          '#type' => 'radios',
          '#title' => t('Types of table:'),
          '#options' => array(
               'default' => t('Default'),
               'border' => t('Border'),
               'stripe' => t('Stripe'),
               'border_stripe' => t('Border + Stripe')
          ),
          '#default_value' => theme_get_setting('procyon_type_table')
     );
}