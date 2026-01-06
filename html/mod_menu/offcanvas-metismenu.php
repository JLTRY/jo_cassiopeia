<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

HTMLHelper::_('bootstrap.offcanvas');

$app = Factory::getApplication('site');
$template = $app->getTemplate(true);
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

if ($template->params->get('logoFile')) {
    $logo = HTMLHelper::_('image', Uri::root(false) . htmlspecialchars($template->params->get('logoFile'), ENT_QUOTES), $sitename, ['loading' => 'eager', 'decoding' => 'async'], false, 0);
} elseif ($template->params->get('siteTitle')) {
    $logo = '<span title="' . $sitename . '">' . htmlspecialchars($template->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
    $logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block', 'loading' => 'eager', 'decoding' => 'async'], true, 0);
}

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
            <div class="d-lg-none mb-3">
                <a class="brand-logo" href="/<?php echo Uri::root(true); ?>/">
                    <?php echo $logo; ?>
                </a>
            </div>

            <?php require ModuleHelper::getLayoutPath('mod_menu', 'dropdown-metismenu'); ?>

            <div class="d-lg-none mt-3">
                <?php
                    $modules = ModuleHelper::getModules('offcanvas');
                    foreach ($modules as $module) {
                        echo ModuleHelper::renderModule($module, []);
                    }
                ?>
            </div>
        </div>
    </div>
</nav>
