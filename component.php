<?php

/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia_extended
 *
 * @copyright   (C) 2025 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$wa = $this->getWebAssetManager();
$wr = $wa->getRegistry();
$wr->addTemplateRegistryFile('cassiopeia', 0);
//require JPATH_THEMES . '/cassiopeia/component.php';


// Advanced Color Settings
$wa->registerAndUseStyle('colors_custom', 'global/colors.css')
    ->addInlineStyle(':root {
        --body-bg: ' . $this->params->get('bodybg') . ';
        --body-color: ' . $this->params->get('bodycolor') . ';
        --btnbg: ' . $this->params->get('btnbg') . ';
        --btnbgh: ' . $this->params->get('btnbgh') . ';
        --btncolor: ' . $this->params->get('btncolor') . ';
        --btncolorh: ' . $this->params->get('btncolorh') . ';
        --btninfobg: ' . $this->params->get('btninfobg') . ';
        --btninfobgh: ' . $this->params->get('btninfobgh') . ';
        --btninfocolor: ' . $this->params->get('btninfocolor') . ';
        --btninfocolorh: ' . $this->params->get('btninfocolorh') . ';
        --btnsecondarybg: ' . $this->params->get('btnsecondarybg') . ';
        --btnsecondarybgh: ' . $this->params->get('btnsecondarybgh') . ';
        --btnsecondarycolor: ' . $this->params->get('btnsecondarycolor') . ';
        --btnsecondarycolorh: ' . $this->params->get('btnsecondarycolorh') . ';
        --footerbg: ' . $this->params->get('footerbg') . ';
        --footercolor: ' . $this->params->get('footercolor') . ';
        --headerbg: ' . $this->params->get('headerbg') . ';
        --headercolor: ' . $this->params->get('headercolor') . ';
        --link-color: ' . $this->params->get('linkcolor') . ';
        --link-hover-color: ' . $this->params->get('linkcolorh') . ';
    }')

    // Advanced Font Settings
    ->registerAndUseStyle('font_advanced', 'global/fonts.css')
    ->addInlineStyle(':root {
        --body-font-size: ' . $this->params->get('bodysize') . 'rem;
        --h1size: ' . $this->params->get('h1size') . 'rem;
        --h2size: ' . $this->params->get('h2size') . 'rem;
        --h3size: ' . $this->params->get('h3size') . 'rem;
        --breadcrumb-font-size : ' . $this->params->get('breadcrumb-font-size') . 'rem;
    }');
   $wa->useAsset('style', 'template.cassiopeia.' . ($this->direction === 'rtl' ? 'rtl' : 'ltr'))
    ->useStyle('template.active.language')
    ->useStyle('template.user')
    ->useScript('template.user');
    $wa->UseStyle('template.jo_cassiopeia.typography')
    ->UseStyle('template.jo_cassiopeia')
    ->UseScript('template.jo_cassiopeia');
$header = Factory::getApplication()->input->getInt('header', 0);
// Logo file or site title param
if ($this->params->get('logoFile')) {
    $app = Factory::getApplication('site');
    $sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
    $logo = HTMLHelper::_('image', Uri::root(false) . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES), $sitename, ['loading' => 'eager', 'decoding' => 'async'], false, 0);
} elseif ($this->params->get('siteTitle')) {
    $logo = '<span title="' . $sitename . '">' . htmlspecialchars($this->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
    $logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block', 'loading' => 'eager', 'decoding' => 'async'], true, 0);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<jdoc:include type="head" />
</head>
	<?php if ($header) : ?>
	<body class="site">
	<?php endif ?>
	<?php if ($header) : ?>
	<div class="container">
		<header class="row navbar navbar-expand-lg navbar-light bg-faded" style="position:relative;">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="col-md-9">
				<a class="navbar-brand pull-left" href="<?php echo JURI::base(); ?>"><?php echo $logo; ?></a>
			</div>
			<div class="col-md-1">
				<jdoc:include type="modules" name="head" style="none" />
			</div>
			<div class="col-md-2">
				
			</div>
			</div>
		</header>
	<?php endif ?>
		<div class="container"> 
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	<?php if ($header) : ?>
		</div>
	</body>
	<?php endif ?>

</html>