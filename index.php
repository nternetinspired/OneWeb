<?php defined('_JEXEC') or die;
/* =====================================================================
Template:	OneWeb for Joomla
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired
Version: 	3.0
Created: 	April 2013
Copyright:	Seth Warburton - (C) 2013 - All rights reserved
Licenses:	GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
                DBAD License http://philsturgeon.co.uk/code/dbad-license
/* ===================================================================== */

// Load template logic
include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if !IE]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<jdoc:include type="head" />
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"</script>
    <![endif]-->
</head>
    <body class="<?php echo $siteHome ; ?>-page <?php echo $option . " view-" . $view . " itemid-" . $itemid . "";?>">

        <div class="header-row">
            <div class="wrapper">
                <header role="banner" class="content">
                    <div class="logo">
                        <a href="<?php echo $this->baseurl ?>/" title="<?php echo htmlspecialchars($app->getCfg('sitename'));?>"><?php echo htmlspecialchars($app->getCfg('sitename'));?></a>
                    </div>
                    <?php if($this->countModules('menu')) : ?>
                        <nav role="navigation">
                            <jdoc:include type="modules" name="menu" style="gangnam" />
                        </nav>
                    <?php endif; ?>
                </header>
            </div>
        </div>

        <?php if($this->countModules('banner')) : ?>
            <div class="banner-row">
                <div class="wrapper">
                    <section class="content">
                        <jdoc:include type="modules" name="banner" style="gangnam" />
                    </section>
                </div>
            </div>
        <?php endif; ?>

        <?php if($this->countModules('breadcrumbs')) : ?>
            <div class="breadcrumb-row">
                <div class="wrapper">
                   <section class="content">
                       <jdoc:include type="modules" name="breadcrumbs" style="gangnam" />
                    </section>
                </div>
            </div>
        <?php endif; ?>

        <?php if($this->countModules('above')) : ?>
            <div class="above-row">
                <div class="wrapper">
                    <section class="content">
                       <jdoc:include type="modules" name="above" style="gangnam" />
                    </section>
                </div>
            </div>
        <?php endif; ?>

        <?php if($siteHome != 'home' or ($frontpage == 0)) : ?>
        <div class="main-row">
            <div class="wrapper">
                <main role="main" class="content">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </main>
                <?php if($this->countModules('complementary')) : ?>
                <div role="complementary" class="content">
                    <jdoc:include type="modules" name="complementary" style="gangnam" />
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if($this->countModules('below')) : ?>
            <div class="below-row">
                <div class="wrapper">
                    <section class="content">
                        <jdoc:include type="modules" name="below" style="gangnam" />
                    </section>
                </div>
            </div>
        <?php endif; ?>

        <?php if($this->countModules('footer-menu') OR $this->countModules('contentinfo')) : ?>
            <div class="footer-row">
                <div class="wrapper">
                    <footer role="contentinfo" class="content">
                        <?php if($this->countModules('footer-menu')) : ?>
                            <nav class="footer-menu">
                                <jdoc:include type="modules" name="footer-menu" style="gangnam" />
                            </nav>
                        <?php endif; ?>
                        <?php if($this->countModules('contentinfo')) : ?>
                            <jdoc:include type="modules" name="contentinfo" style="gangnam" />
                        <?php endif; ?>
                    </footer>
                </div>
            </div>
        <?php endif; ?>

        <div class="credit-row">
            <div class="wrapper">
                <footer class="content">
                    <?php if ($social > 0) : ?>
                        <ul class="social">
                            <?php if ($twitterLink != "") : ?>
                                <li><a class="twitter" href="<?php echo ($twitterLink); ?>" title="Follow me on Twitter" target="_blank"><?php echo ($twitter); ?></a></li>
                            <?php endif; ?>
                            <?php if ($dribbbleLink != "") : ?>
                                <li><a class="dribbble" href="<?php echo ($dribbbleLink); ?>" title="See my latest work at Dribbble" target="_blank"><?php echo ($dribbble); ?></a></li>
                            <?php endif; ?>
                            <?php if ($facebookLink != "") : ?>
                                <li><a class="facebook" href="<?php echo ($facebookLink); ?>" title="Annoy me on Facebook" target="_blank"><?php echo ($facebook); ?></a></li>
                            <?php endif; ?>
                            <?php if ($googleplusLink != "") : ?>
                                <li><a class="googleplus" href="<?php echo ($googleplusLink); ?>" title="Find me on G+" target="_blank"><?php echo ($googleplus); ?></a></li>
                            <?php endif; ?>
                            <?php if ($githubLink != "") : ?>
                                <li><a class="github" href="<?php echo ($githubLink); ?>" title="All the codez" target="_blank"><?php echo ($github); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="copyright">
                        <small>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($app->getCfg('sitename'));?></small>
                    </div>
                </footer>
            </div>
        </div>

        <?php if($this->countModules('debug')) : ?>
            <jdoc:include type="modules" name="debug"/>
        <?php endif; ?>

        <?php if ($scripts > 0) : ?>
        	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/scripts.min.js"></script>
            <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/plugins.min.js"></script>
        <?php endif; ?>
        <?php if ($analytics != "") : ?>
            <script>
                var _gaq=[["_setAccount","<?php echo htmlspecialchars($analytics); ?>"],["_trackPageview"]];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
                g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
                s.parentNode.insertBefore(g,s)}(document,"script"));
            </script>
        <?php endif; ?>

    </body>
</html>
