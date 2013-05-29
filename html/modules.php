<?php defined('_JEXEC') or die;
/* =====================================================================
Template:	OneWeb for Joomla 2.5
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired
Version: 	3.0
Created: 	April 2013
Copyright:	Seth Warburton - (C) 2013 - All rights reserved
Licenses:	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
Sources:	Beez5 by Angie Radkte
/* ===================================================================== */

/* Let's make the module output using HTML5 elements */
function modChrome_gangnam($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    if (!empty ($module->content)) : ?>
    <div class="module<?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
		<div class="module-inner">
            <?php if ($module->showtitle) : ?>
            <header>
                    <h<?php echo $headerLevel; ?>><?php echo $module->title; ?></h<?php echo $headerLevel; ?>>
    		</header>
            <?php endif; ?>
            <?php echo $module->content; ?>
        </div>
    </div>
	<?php endif;
}