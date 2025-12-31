<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */
?>
<hr/>
<table class="table table-striped">
	<?php $link_items = $this->link_items;
		usort($link_items, function($a, $b){ return strcmp($b->displayDate, $a->displayDate);}); 
		foreach ($link_items as $item) : ?>
		<tr>
			<td>
				<a href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
					<?php echo $item->title; ?></a>
			</td>
			<td>
			<span class="icon-calendar icon-fw" aria-hidden="true"></span>
				<?php echo $item->displayDate; ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<hr/>