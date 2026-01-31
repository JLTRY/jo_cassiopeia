<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('bootstrap.collapse');

if (!$list)
{
	return;
}
$document = JFactory::getDocument();
$document->addStylesheet(JUri::root() . '/templates/bootstrap4/html/mod_articles_categories/trycoaching.css');
?>
<div class="css-trycoaching accordion" id="accordiontrycoaching" style="width:90%;">
	<div class="accordion-item">
		<button class="accordion-button collapsed" 
				data-bs-toggle="collapse" 
				data-bs-target="#collapseOne" 
				aria-expanded="true" aria-controls="collapseOne" style="background-color: rgba(0,0,0,.03)">
			<?php echo $module->title ?>
		</button>
		<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordiontrycoaching">
			<div class="accordion-body">
				<ul class="mod-articlescategories categories-module mod-list">
					<?php require ModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<br/>