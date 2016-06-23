<div class="block-v-outer-center">
    
    <div class="block-v-inner-center">
    
        <div class="sm-6 md-4 block-h-center">
            
            <?php if ($logo): ?>
                    <center>
                        <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
                            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
                        </a>
                    </center>
            <?php endif; ?>
            
            <?php print $messages; ?>
            
            <?php print render(drupal_get_form('user_pass')); ?>
    
        </div>
    </div>
    
</div> <!-- End page -->