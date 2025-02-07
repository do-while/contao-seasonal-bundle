<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

/**
 * -------------------------------------------------------------------------
 * BACK END MODULES - Veröffentlichungsprofile
 * -------------------------------------------------------------------------
 */
$GLOBALS['BE_MOD']['system']['seasons'] = [
    'tables' => ['tl_season_profile', 'tl_season_period'],
];


/**
 * Hook isVisibleElement
 */
$GLOBALS['TL_HOOKS']['isVisibleElement'][]  = ['Softleister\SeasonalBundle\pprofilesHooks', 'ppIsVisibleElement'];
