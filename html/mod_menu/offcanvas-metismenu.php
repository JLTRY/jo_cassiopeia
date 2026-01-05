<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Helper\ModuleHelper;

HTMLHelper::_('bootstrap.offcanvas');
?>

<nav class="navbar navbar-expand-lg">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar<?php echo $module->id; ?>" aria-controls="navbar<?php echo $module->id; ?>" aria-expanded="false" aria-label="<?php echo Text::_('MOD_MENU_TOGGLE'); ?>">
		<span class="icon-menu" aria-hidden="true"></span>
	</button>
	<div class="offcanvas offcanvas-start" id="navbar<?php echo $module->id; ?>">
		<div class="offcanvas-header">
			<button type="button" class="btn-close btn-close-blue" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<?php require ModuleHelper::getLayoutPath('mod_menu', 'dropdown-metismenu'); ?>
		</div>
	</div>
</nav>
