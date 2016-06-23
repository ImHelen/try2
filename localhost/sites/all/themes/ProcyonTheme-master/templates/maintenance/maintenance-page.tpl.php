<header role="banner">

        <div class="sm-4 md-2">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
                    <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
                </a>
            <?php endif; ?>
        </div>
        
        <div class="sm-8 md-10">
            <h1><?php print $site_name; ?></h1>
        </div>

</header>

<section role="main">
        
        <div class="container">
        
            <div class="xs-12">
                
                <p><a href="/user"><?php print t('Service entrance'); ?></a></p>

                <?php print $content; ?>
                
            </div> <!-- End main content box -->
        
        </div> <!-- End container -->
            
</section>