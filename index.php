<?php

/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia_extended
 *
 * @copyright   (C) 2025 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$wa = $this->getWebAssetManager();
$wr = $wa->getRegistry();
$wr->addTemplateRegistryFile('cassiopeia', 0);
require JPATH_THEMES . '/cassiopeia/index.php';
// Remove all existing favicon links
$document = JFactory::getDocument();
// Remove Joomla's default favicons and use template favicon instead
// Handle custom favicon from media field
$faviconFile = $this->params->get('faviconFile');
if (!empty($faviconFile)) {
	// Get the head data and remove Joomla's default favicons
	$headData = $this->getHeadData();
	$newLinks = [];
	
	foreach ($headData['links'] as $key => $link) {
		// Filter out Joomla default favicons
		if (!isset($link['relation']) || 
		    (strpos($link['relation'], 'icon') === false && 
		     $link['relation'] !== 'mask-icon' && 
		     $link['relation'] !== 'alternate icon')) {
			$newLinks[$key] = $link;
		}
	}
	
	// Set filtered links
	$this->setHeadData(['links' => $newLinks]);
	$favicon = explode("#", $faviconFile)[0];
	// Add custom favicon from /files/jo_cassiopeia
	$this->addHeadLink(
		Uri::base(true) . '/files/jo_cassiopeia/' . $favicon,
		'icon',
		'rel',
		['type' => 'image/x-icon']
	);
}
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
    }')
    ->UseStyle('template.jo_cassiopeia.typography')
    ->UseStyle('template.jo_cassiopeia')
    ->UseScript('template.jo_cassiopeia');

