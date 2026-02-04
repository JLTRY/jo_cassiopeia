<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('bootstrap.collapse');

if (!$list)
{
	return;
}


?>
<div class="css-trycoaching accordion" id="accordiontrycoaching">
<div class="accordion-item">
<button class="accordion-button collapsed" 
		data-bs-toggle="collapse" 
		data-bs-target="#collapseOne" 
		aria-expanded="true" aria-controls="collapseOne" style="background-color: rgba(0,0,0,.03)">
<?php echo $module->title ?>
</button>
<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordiontrycoaching">
      <div class="accordion-body">
		<ul class="mod-articlescategory category-module mod-list accordion-body">
			<?php if ($grouped) : ?>
				<?php foreach ($list as $groupName => $items) : ?>
				<li>
					<div class="mod-articles-category-group"><?php echo Text::_($groupName); ?></div>
					<ul>
						<?php require ModuleHelper::getLayoutPath('mod_articles_category', 'default_items'); ?>
					</ul>
				</li>
				<?php endforeach; ?>
			<?php else : ?>
        <table class="table-striped table">
				<?php $items = $list; ?>

				<?php require ModuleHelper::getLayoutPath('mod_articles_category', 'default_items'); ?>
        </table>

			<?php endif; ?>
</div>
</div>
<br>