<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (!$list) {
    return;
}

// Convertir la chaîne JSON en objet Registry
$moduleParams = new JRegistry($module->params);

// Exemple : récupérer le paramètre "my_param"
$ordering = $moduleParams->get('ordering', '???');
?>
<table class="table table-striped" style="font-size: 13px">
    <?php foreach ($list as $item) : ?>
        <tr>
            <td>
                <a href="<?php echo $item->link; ?>" itemprop="url">
                <?php echo $item->title; ?></a>
            </td>
            <td>
                <span class="icon-calendar icon-fw" aria-hidden="true"></span>
                    
                    <?php if ($ordering == "m_dsc") { echo $item->modified; } else { echo $item->created; } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>