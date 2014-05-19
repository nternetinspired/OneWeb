<?php
/* =====================================================================
Template:   OneWeb for Joomla
Author:     Seth Warburton - Internet Inspired! - @nternetinspired
Version:    3.0
Created:    April 2013
Copyright:  Seth Warburton - (C) 2013 - All rights reserved
Licenses:   GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
            DBAD License http://philsturgeon.co.uk/code/dbad-license
Sources:    http://construct-framework.com
/* ===================================================================== */

defined('_JEXEC') or die('caught by _JEXEC');

jimport('joomla.filesystem.file');

include_once(dirname(__FILE__) . '/scssc.php');

class JFormFieldCompile extends JFormField
{
	protected function getInput()
	{

		$app = JFactory::getApplication();
		$jinput = $app->input;
		$compile = 0;
		$compile = $jinput->get('compilescss');
		$currentpath = realpath(__DIR__ ) ;
		$pageurl = str_replace('&amp;compilescss=1', '', JURI::getInstance ());

		if ($compile) {

			$scss = new scssc();
			$scss->setImportPaths($currentpath. "/scss/");
			$scss->setFormatter('scss_formatter_compressed');

			try
			{
				$css = $scss->compile('@import "style.scss"');
				file_put_contents(JPATH_ROOT . '/templates/oneweb/css/style.css', $css);
			}
			catch (Exception $e)
			{
				$app->enqueueMessage($e->getMessage(), 'error');
			}
		}
		return '<button onclick="window.location.href=\''.$pageurl.'\'+\'&amp;compilescss=1\'" class="btn btn-primary" type="button">Compile SCSS</button>';
	}

}
?>