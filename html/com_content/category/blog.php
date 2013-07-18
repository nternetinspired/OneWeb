<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
?>

<section class="blog<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<header class="page-header"><h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>
		<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
			<span class="subheading-category"><?php echo $this->category->title;?></span>
			<?php endif; ?>
		</h2>
	</header>
	<?php endif; ?>
	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<section class="category-desc">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
			<figure><img src="<?php echo $this->category->getParams()->get('image'); ?>"/></figure>
		<?php endif; ?>
		<?php if ($this->params->get('show_description') && $this->category->description) : ?>
			<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
		<?php endif; ?>
	</section>
	<?php endif; ?>
	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
	<section class="items-leading">
		<?php foreach ($this->lead_items as &$item) : ?>
				<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
				?>
		<?php endforeach; ?>
	</section>
	<?php endif; ?>
	<?php if (!empty($this->intro_items)) : ?>
		<section class="intro-articles">
			<?php foreach ($this->intro_items as $key => &$item) : ?>
					<?php
							$this->item = &$item;
							echo $this->loadTemplate('item');
					?>
			<?php endforeach; ?>
		</section>
	<?php endif; ?>
	<?php if (!empty($this->link_items)) : ?>
			<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
		<section class="cat-children">
			<h2><?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?></h2>
			<?php echo $this->loadTemplate('children'); ?>
		</section>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<nav class="pagination">
			<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
				<?php echo $this->pagination->getPagesCounter(); ?>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</nav>
	<?php  endif; ?>
</section>
