<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

namespace Softleister\SeasonalBundle;

use Contao\Backend;
use Contao\Date;

 
/**
 * Additional field
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['season_profile'] = [
    'inputType'               => 'select',
    'foreignKey'              => 'tl_season_profile.title',
    // 'options_callback'        => ['pp_tl_content', 'getPProfiles'],
    'eval'                    => ['chosen'=>true, 'includeBlankOption'=>true, 'blankOptionLabel'=>'--immer anzeigen--', 'tl_class'=>'clr w50'],
    'sql'                     => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0'],
    'relation'                => ['type' => 'belongsTo', 'load' => 'lazy'],
];



// /**
//  * OnLoad-Callback to add the pprofile field
//  */
// $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = ['pp_tl_content', 'insertPProfiles'];


/**
 * Class - Add pp_profile field to all content element types
 */
// class pp_tl_content extends Backend
// {
//     public function insertPProfiles( )
//     {
//         foreach( $GLOBALS['TL_DCA']['tl_content']['palettes'] as $palette=>$fields ) {
//             // Check exceptions
//             if( $palette === '__selector__' ) continue;
//             if( $palette === 'default' ) continue;
//             if( strstr($GLOBALS['TL_DCA']['tl_content']['palettes'][$palette], ',pp_profile') != false ) continue;

//             // add publication profile to palette
//             $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] = str_replace( ",stop", ",stop,pp_profile", $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] );
//         }
//     }


//     //---------------------------------------------------------------
//     // Creates a select with all publishing profiles
//     //---------------------------------------------------------------
//     public function getPProfiles( )
//     {
//         $objPf = $this->Database->prepare("SELECT c.title AS cat, p.* FROM tl_pprofiles AS p, tl_pcategories AS c WHERE p.pid = c.id ORDER BY c.title, p.sorting")
//                                 ->execute( );

//         $arrOptions = [];
//         while( $objPf->next() ) {
//             $format = $objPf->year ? 'd.m.' : 'd.m.Y';
//             $arrOptions[$objPf->cat][$objPf->id] = $objPf->title . ' &nbsp; (' . ($objPf->year ? 'Jährlich: ' : 'Zeitraum: ') . Date::parse( $format, $objPf->start ) . ' - ' . Date::parse( $format, $objPf->stop ) . ')';
//         }

//         return $arrOptions;
//     }
// }
