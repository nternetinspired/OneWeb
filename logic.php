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

// Grab our global variables - set the stage
$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$lang            = JFactory::getLanguage();
$user            = JFactory::getUser();

// Determine active site variables
$langTag         = $lang ? JFactory::getLanguage()->getTag() : null;
$sitename        = htmlspecialchars($app->getCfg('sitename'));

// Grab our template parameters
$frontpage       = $this->params->get('frontpage');
$setGeneratorTag = $this->params->get('setGeneratorTag');
$analytics       = $this->params->get('analytics');
$debug           = $this->params->get('debug');

// Detect active page variables
$option          = $app->input->getCmd('option', '');
$view            = $app->input->getCmd('view', '');
$layout          = $app->input->getCmd('layout', 'default');
$task            = $app->input->getCmd('task', '');
$itemid          = $app->input->getCmd('Itemid', '');
$lang            = $app->input->getCmd('lang', null);
$menu            = $app->getMenu();

// Grab page details we need
$title           = $doc->getTitle();
$description     = $doc->getDescription();
$url             = $doc->getBase();
$pageclass       = $menu->getActive()->params->get('pageclass_sfx');

// Show component output on the homepage?
$showHomepage    = 1;

// Determine if we are on the homepage
$isHomepage      = $langTag ? ($menu->getActive() == $menu->getDefault($langTag)) : ($menu->getActive() == $menu->getDefault());

// Define relative path to the  current template
$template        = 'templates/'.$this->template;

// Load Bootstrap 3 CSS from their CDN
//$doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');

// Global styles
$doc->addStyleSheet($template.'/css/main.css');

// Include any Google fonts required
// $doc->addStyleSheet('//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');

// Load Modernizr; custom build
$doc->addScript($template.'/js/vendor/modernizr-3.2.0.min.js');

// Load Jquery from Google
$doc->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');

// Load Bootstrap 3 JS from their CDN
// $doc->addScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');

// Point to our Apple Touch Icon (180x180px) thingy
$doc->addHeadLink($template.'/img/apple-touch-icon.png', 'apple-touch-icon');

// Load template scripts the Joomla way, in <head>
$doc->addScript($template.'/js/plugins.js');
$doc->addScript($template.'/js/main.js');

#------------------- Modify Joomla's default <head> content -------------------#

// Change the generator tag
$this->setGenerator(JText::_('TPL_ONEWEB_GENERATOR'));

// Let mobile devices know we've got them covered and they shouldn't do their own thang.
$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1.0' );

// NOTE: It's recommended to remove unwanted Joomla scripts with the excellent
// plugin by @phproberto: https://github.com/phproberto/plg_sys_mootable as it
// ensures that another extension or module will not reload all that junk again.
// The following provide an alternative, but less robust method to offload junk.
// Remove junk we don't need.
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery.min.js']);
unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery-noconflict.js']);
unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery-migrate.min.js']);
unset($doc->_scripts[$this->baseurl.'/media/jui/js/bootstrap.min.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/tabs-state.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/html5fallback.js']);
