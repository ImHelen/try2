<div class="block-v-outer-center">
    <div class="block-v-inner-center">
        <div class="sm-6 block-h-center">
            
            <?php if ($logo): ?>
                <center>
                    <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
                        <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
                    </a>
                </center>
            <?php endif; ?>
            
            <h1>404 - <?php print t('Forbidden page'); ?></h1>
            <a href="javascript:history.go(-1);"><?php print t('Back'); ?></a>
            <a href="/"><?php print t('Home'); ?></a>
            <a href="/user"><?php print t('Login'); ?></a>
    
        </div>
    </div>
</div> <!-- End page -->