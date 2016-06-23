<?php
/**
* Implements hook_form_system_theme_settings_alter() function.
*/
function STARTER_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
    // Bug workaround (#943212).
    if (isset($form_id)) {
        return;
    }   
}