<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$info = $this->item->params->get('info_block_position', 0);
?>
<article class="article">
	<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
			<ul class="actions">
				<?php if ($params->get('show_print_icon')) : ?>
					<li class="print-icon"> <?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($params->get('show_email_icon')) : ?>
					<li class="email-icon"> <?php echo JHtml::_('icon.email',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
				<?php endif; ?>
			</ul>
	<?php endif; ?>
	<?php if ($params->get('show_title')) : ?>
		<header>
			<h1>
				<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" title="<?php echo $this->escape($this->item->title); ?>"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
				<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h1>
		</header>
	<?php endif; ?>
	<?php if ($this->item->state == 0): ?>
		<div class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></div>
	<?php endif; ?>
	<?php if ($info == 0 OR $info == 2) : ?>
		<footer class="article-meta">
			<ul>
		<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
			<li class="createdby">
				<?php $author = $this->item->author; ?>
				<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
				<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true) : ?>
					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)); ?>
				<?php else :?>
					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
				<?php endif; ?>
			</li>
		<?php endif; ?>
		<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
			<li class="parent-category-name">
				<?php $title = $this->escape($this->item->parent_title);
				$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'" title="'.$title.'">'.$title.'</a>';?>
				<?php if ($params->get('link_parent_category') and !empty($this->item->parent_slug)) : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
				<?php endif; ?>
			</li>
		<?php endif; ?>
		<?php if ($params->get('show_category')) : ?>
			<li class="category-name">
				<?php $title = $this->escape($this->item->category_title);
				$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'" title="'.$title.'">'.$title.'</a>';?>
				<?php if ($params->get('link_category') and $this->item->catslug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
				<?php endif; ?>
			</li>
		<?php endif; ?>
		<?php if ($params->get('show_publish_date')) : ?>
			<li class="published">
				<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
			</li>
		<?php endif; ?>
		<?php if ($info == 0): ?>
			<?php if ($params->get('show_modify_date')) : ?>
							<li class="modified">
								<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</li>
					<?php endif; ?>
					<?php if ($params->get('show_create_date')) : ?>
							<li class="created">
								<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</li>
					<?php endif; ?>
					<?php if ($params->get('show_hits')) : ?>
							<li class="hits">
								<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
							</li>
					<?php endif; ?>
				</ul>
		<?php endif; ?>
		</footer>
	<?php endif; ?>
<div class="article-body">
	<?php if (!$params->get('show_intro')) : ?>
		<?php echo $this->item->event->afterDisplayTitle; ?>
	<?php endif; ?>
		<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
		<figure class="img-<?php echo htmlspecialchars($imgfloat); ?>">
			<img title="<?php echo htmlspecialchars($images->image_intro_caption); ?>" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
				<?php if ($images->image_intro_caption): ?>
					<figcaption><?php echo htmlspecialchars($images->image_intro_caption); ?></figcaption>
				<?php endif; ?>
		</figure>
	<?php endif; ?>

	<?php echo $this->item->introtext; ?>

	<?php if ($info == 1 OR $info == 2) : ?>
		<footer class="article-meta">
			<ul>
		<?php if ($info == 1) : ?>
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
				<li class="createdby">
					<?php $author = $this->item->author; ?>
					<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
					<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true) : ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)); ?>
					<?php else :?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
				<li class="parent-category-name">
					<?php $title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
					<?php if ($params->get('link_parent_category') and !empty($this->item->parent_slug)) : ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
					<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_category')) : ?>
				<li class="category-name">
					<?php $title = $this->escape($this->item->category_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
					<?php if ($params->get('link_category') and $this->item->catslug) : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
					<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
					<?php endif; ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_publish_date')) : ?>
				<li class="published">
					<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
				</li>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($info == 1 OR $info == 2) : ?>
			<?php if ($params->get('show_modify_date')) : ?>
							<li class="modified">
								<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</li>
					<?php endif; ?>
					<?php if ($params->get('show_create_date')) : ?>
							<li class="create">
								<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</li>
					<?php endif; ?>
					<?php if ($params->get('show_hits')) : ?>
							<li class="hits">
								<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
							</li>
					<?php endif; ?>
				</ul>
		<?php endif; ?>
		</footer>
	<?php endif; ?>


	<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode($returnURL));
	endif;
?>
	<a class="readmore" href="<?php echo $link; ?>">
	<?php if (!$params->get('access-view')) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
		</a>
	<?php endif; ?>
	</div>
</article>
<?php echo $this->item->event->afterDisplayContent; ?>
