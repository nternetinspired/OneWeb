<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $this->item->params->get('access-edit');
$user    = JFactory::getUser();
$info = $this->item->params->get('info_block_position', 0);

?>

<?php if ($this->params->get('show_page_heading', 1)) : ?>
<section>
	<header class="page-header">
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	</header>
	<?php endif;
if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
	echo $this->item->pagination;
}
?>
<article class="article">
	<?php if (!$this->print) : ?>
		<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<ul class="actions">
				<?php if ($params->get('show_print_icon')) : ?>
					<li class="print"> <?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($params->get('show_email_icon')) : ?>
					<li class="email"> <?php echo JHtml::_('icon.email',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<li class="edit"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (($params->get('show_title'))) : ?>
	<header>
			<?php if ($this->item->state == 0): ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>
		<h1><?php echo $this->escape($this->item->title); ?></h1>
	</header>
	<?php endif; ?>

<?php if ($info == 0 OR $info == 2) : ?>
	<footer>
		<ul class="article-meta">
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
				<li class="author">
					<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
					<?php if (!empty($this->item->contactid) && $params->get('link_author') == true): ?>
					<?php
					$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
					$menu = JFactory::getApplication()->getMenu();
					$item = $menu->getItems('link', $needle, true);
					$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle; ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
					<?php else: ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
				</li>
					<?php endif; ?>
			<?php endif; ?>
			<?php if ($params->get('show_parent_category icon-tag') && $this->item->parent_slug != '1:root') : ?>
					<li class="parent-category-name">
						<?php	$title = $this->escape($this->item->parent_title);
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
						<?php 	$title = $this->escape($this->item->category_title);
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
			<?php if ($info == 0): ?>
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
			<?php endif; ?>
		</ul>
	</footer>
	<?php endif; ?>
	<?php  if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
		<?php if ($this->params->get('show_vote', 1)) : ?>
			<div class="rating"><?php echo $this->item->event->beforeDisplayContent; ?></div>
		<?php endif; ?>
	<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '0')) OR  ($params->get('urls_position') == '0' AND empty($urls->urls_position)))
		OR (empty($urls->urls_position) AND (!$params->get('urls_position')))): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php if ($params->get('access-view')):?>
	<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
	<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
		<figure class="img-<?php echo htmlspecialchars($imgfloat); ?>">
			<img title="<?php echo htmlspecialchars($images->image_fulltext_caption); ?>" src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
				<?php if ($images->image_intro_caption): ?>
					<figcaption><?php echo htmlspecialchars($images->image_fulltext_caption); ?></figcaption>
				<?php endif; ?>
		</figure>
	<?php endif; ?>
	<?php
	if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
		echo $this->item->pagination;
	endif;
	?>
	<?php if (isset ($this->item->toc)) :
		echo $this->item->toc;
	endif; ?>
	<div class="article-body">
	<?php echo $this->item->text; ?>
	</div>
	<?php if ($info == 1 OR $info == 2) : ?>
		<footer class="article-meta">
			<?php if ($info == 1): ?>
				<ul>
					<?php if ($params->get('show_parent_category') AND !empty($this->item->parent_slug)) : ?>
							<li class="parent-category-name">
								<?php	$title = $this->escape($this->item->parent_title);
								$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
								<?php if ($params->get('link_parent_category') and $this->item->parent_slug) : ?>
									<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
								<?php else : ?>
									<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
								<?php endif; ?>
							</li>
					<?php endif; ?>
					<?php if ($params->get('show_category')) : ?>
							<li class="category-name">
								<?php 	$title = $this->escape($this->item->category_title);
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
					<?php if ($params->get('show_create_date')) : ?>
							<li class="create">
								<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
							</li>
					<?php endif; ?>
			<?php endif; ?>
			<?php if ($info == 1 OR $info == 2) : ?>
				<?php if ($params->get('show_modify_date')) : ?>
						<li class="modified">
							<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
						</li>
				<?php endif; ?>
				<?php if ($params->get('show_hits')) : ?>
						<li class="hits">
							<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
						</li>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		</footer>
	<?php endif; ?>
	<?php if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative):	echo $this->item->pagination; ?>
	<?php endif; ?>
	<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '1')) OR ($params->get('urls_position') == '1'))): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php //optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true and  $user->get('guest') ) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
	<a class="readmore" href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
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
	<?php endif; ?>
</article>
	<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
	echo $this->item->pagination;
?>
	<?php endif; ?>
	<?php echo $this->item->event->afterDisplayContent; ?>

<?php if ($this->params->get('show_page_heading', 1)) : ?>
</section>
<?php endif; ?>
