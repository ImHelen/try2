<header role="banner">
    <div class="sm-4 md-2">
        <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
        </a>
        <?php endif; ?>
    </div>
    
    <div class="sm-8 md-10">
        <h1><?php print $title; ?></h1>
    </div>
    
    <?php if ($page['navigation']): ?>
        <?php print render($page['navigation']); ?>
    <?php endif; ?>
</header>

<?php if ($main_menu): ?>
    <nav id="main-menu" class="navigation" role="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix', 'list-inline'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
    </nav> <!-- #main-menu -->
<?php endif; ?>

<div class="container">
    <?php if ($page['sidebar_first']): ?>
    <aside class="sm-3">
        <?php print render($page['sidebar_first']); ?>
    </aside> <!-- End first sidebar -->
    <?php endif; ?>

    <main role="main" class="<?php if ($page['sidebar_first'] && $page['sidebar_second']): ?>sm-6<?php elseif ($page['sidebar_first']): ?>sm-9<?php elseif ($page['sidebar_second']): ?>sm-9<?php else: ?>xs-12<?php endif; ?>">
        <?php print $breadcrumb; ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php print render($page['content']); ?>
    </main> <!-- End main content box -->
    
    <?php if ($page['sidebar_second']): ?>
    <aside class="sm-3">
        <?php print render($page['sidebar_second']); ?>
    </aside> <!-- End second sidebar -->
    <?php endif; ?>
</div> <!-- End container -->

<?php print render($page['footer']); ?>

<div id="modal1" data-modal>
    <?php print render($page['modal1']); ?>
    <span data-modal-close></span>
</div>

<div id="modal2" data-modal>
    <?php print render($page['modal2']); ?>
    <span data-modal-close></span>
</div>

<?php if (theme_get_setting('procyon_do_not_go')): ?>
<div class="do-not-go">
    <?php print render($page['donotgo']); ?>
</div>
<?php endif; ?>

<?php if (theme_get_setting('procyon_back_to_top')): ?>
<div class="back-to-top">
    
</div>
<?php endif; ?>