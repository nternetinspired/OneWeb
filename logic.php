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

$app                   = JFactory::getApplication();

// Define shortcuts for template parameters
$loadMoo               = $this->params->get('loadMoo');
$jQuery                = $this->params->get('jQuery');
$bootBloatJS           = $this->params->get('bootBloatJS');
$scripts               = $this->params->get('scripts');
$frontpage             = $this->params->get('frontpage');
$setGeneratorTag       = $this->params->get('setGeneratorTag');
$analytics             = $this->params->get('analytics');
$googleplus            = $this->params->get('googleplus');
$googleWebFonts        = $this->params->get('googleWebFonts');
$twitter               = $this->params->get('twitter');
$twitterLink           = $this->params->get('twitterLink');
$dribbble              = $this->params->get('dribbble');
$dribbbleLink          = $this->params->get('dribbbleLink');
$facebook              = $this->params->get('facebook');
$facebookLink          = $this->params->get('facebookLink');
$googleplus            = $this->params->get('googleplus');
$googleplusLink        = $this->params->get('googleplusLink');
$github                = $this->params->get('github');
$githubLink            = $this->params->get('githubLink');
$debug                 = $this->params->get('debug');

// Detecting Active Variables
$option                = $app->input->getCmd('option', '');
$view                  = $app->input->getCmd('view', '');
$itemid                = $app->input->getCmd('Itemid', '');

// Are we are on the homepage?
$menu                  = $app->getMenu();
if ($menu->getActive() == $menu->getDefault()) {$siteHome = 'home';} else {$siteHome = 'sub';};

// Do we have social links?
$social                = ($twitterLink?1:0)+ ($dribbbleLink?1:0)+ ($facebookLink?1:0)+ ($googleplusLink?1:0)+ ($githubLink?1:0);

#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/

// To enable use of site configuration
$pageParams            = $app->getParams();

// Returns a reference to the global document object
$doc                   = JFactory::getDocument();

// Define relative path to the  current template directory
$template              = 'templates/'.$this->template;

// Change generator tag
$this->setGenerator($setGeneratorTag);

#----------------------------- End Construct Code -----------------------------#

// Remove MooTools if set to no.
if ( !$loadMoo ) {
   unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
}
// Self explanatory
if ( !$bootBloatJS ) {
  unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery.min.js']);
  unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery-noconflict.js']);
  unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery-migrate.min.js']);
  unset($doc->_scripts[$this->baseurl.'/media/jui/js/bootstrap.min.js']);
  unset($doc->_scripts[$this->baseurl.'/media/system/js/tabs-state.js']);
}

#----------------------------- Inject extras into the head -----------------------------#
// Currently the latest minified version from Google. It's smaller than the Joomla version.
if ($jQuery) {
  $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/jquery-1.8.2.min.js');
}
// Global styles
$doc->addStyleSheet($template.'/css/style.css');
// Google fonts styles
if ($googleWebFonts != "") {
  $doc->addStyleSheet(''.$googleWebFonts.'');
}
//Debug stylesheet
if ($debug =="1") {
  $doc->addStyleSheet('https://rawgithub.com/nternetinspired/debug-css/master/debug.css');
}
// Metas
$doc->setMetaData( 'HandheldFriendly', 'True' );
$doc->setMetaData( 'MobileOptimized', '320' );
// This lets mobile devices know we have thought about them
$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1.0' );
// Kick IE out of compatibility mode and disable it
//$doc->setMetaData( 'X-UA-Compatible', 'IE=edge;chrome=1' );
// For Win mobile
//$doc->setMetaData( 'cleartype', 'on');
