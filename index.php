<?php defined('_JEXEC') or die;

/* =============================================================================
	Template:   Oneweb for Joomla
	Author:     Seth Warburton - Internet Inspired! - @nternetinspired
	Version:    6.0
	Created:    December 2015
	Copyright:  Seth Warburton - ©2011–2015. All rights reserved
	Licenses:   GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
				DBAD License http://www.dbad-license.org/
   ========================================================================== */

// Load template logic
include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
?>

<!doctype html>
<html lang="<?= $langTag ; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<jdoc:include type="head" />
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
</head>
    <body class="<?= $pageclass . " " . $option . " view-" . $view . " layout-" . $layout . " menuitem-" . $itemid . "";?>">

		<header role="banner" class="header-row <?php if($this->countModules('banner')) : ?>has-banner<?php else : ?>no-banner<?php endif; ?>">
			<div class="header container">
				<div class="grid">
					<div class="logo grid-item md-one-third" itemscope itemtype="http://schema.org/Organization">
						<a class="logo-link" itemprop="url" href="<?= $this->baseurl ?>" title="Return to the <?= $sitename ?> home page">
							<span class="sr-only"><?= $sitename ?></span>
						</a>
						<object class="logo-image" type="image/svg+xml" data="<?= $this->baseurl ?>/<?= $template ?>/img/logo.svg">
							<div class="logo-image-fallback"></div>
						</object>
					</div>
					<div class="grid-item md-two-thirds">
						<nav class="nav-primary" role="navigation" aria-label="primary-navigation">
							<jdoc:include type="modules" name="menu" style="default" />
						</nav>
					</div>
				</div>
			</div>
		</header>

		<?php if($this->countModules('banner')) : ?>
		<div class="banner-row">
			<div class="banner">
				<jdoc:include type="modules" name="banner" style="default" />
			</div>
		</div>
		<?php endif; ?>

		<?php if($this->countModules('breadcrumbs')) : ?>
		<div class="breadcrumbs-row">
			<div class="breadcrumbs container">
				<div class="grid">
					<jdoc:include type="modules" name="breadcrumbs" style="default" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if($this->countModules('top')) : ?>
		<div class="top-row section">
			<div class="top container">
				<div class="grid">
					<jdoc:include type="modules" name="top" style="default" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if($this->countModules('above')) : ?>
		<div class="above-row section">
			<div class="above container">
				<div class="grid">
					<jdoc:include type="modules" name="above" style="default" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if($isHomepage != 1 or ($showHomepage == 1)) : ?>
		<main class="main-row section" role="main">
			<div class="main container">
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>
		</main>
		<?php endif; ?>

		<?php if($this->countModules('below')) : ?>
		<div class="below-row section">
			<div class="below container">
				<div class="grid">
					<jdoc:include type="modules" name="below" style="default" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if($this->countModules('bottom')) : ?>
		<div class="bottom-row section">
			<div class="bottom container">
				<div class="grid">
					<jdoc:include type="modules" name="bottom" style="default" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<footer class="footer-row section" role="contentinfo">
			<div class="footer container">
				<?php if($this->countModules('contentinfo')) : ?>
				<div class="grid">
					<jdoc:include type="modules" name="contentinfo" style="default"/>
				</div>
				<?php endif; ?>
			</div>

			<div class="copyright-row row">
				<div class="copyright container">
					&copy; <?= date("Y"); ?>&nbsp;<?= htmlspecialchars($app->getCfg('sitename'));?><?= JText::_('TPL_ONEWEB_COPYRIGHT');?>
				</div>
			</div>
		</footer>

		<?php if($this->countModules('debug')) : ?>
			<jdoc:include type="modules" name="debug"/>
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
