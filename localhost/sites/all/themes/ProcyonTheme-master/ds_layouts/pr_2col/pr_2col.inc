<?php
function ds_example() {
    return array(
        'label' => t('SL7 Procyon 2col for Table & up.'),
        'regions' => array(
            'left' => t('Left'),
            'right' => t('Right'),
        ),
        // Add this line if there is a default css file.
        'css' => FALSE,
        // Add this line if you're using DS 2.x for icon preview
        'image' => TRUE,
    );
}