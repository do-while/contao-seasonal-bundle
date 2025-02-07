<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

use Contao\Backend;
use Contao\Date;

 
/**
 * Additional field
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['season_period'] = [
    'inputType'               => 'select',
    'foreignKey'              => 'tl_season_profile.title',
    'options_callback'        => ['season_tl_content', 'getPeriods'],
    'eval'                    => ['chosen'=>true, 'includeBlankOption'=>true, 'blankOptionLabel'=>'--' . ($GLOBALS['TL_LANG']['tl_content']['always'] ?? '') . '--', 'tl_class'=>'clr w50'],
    'sql'                     => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0'],
    'relation'                => ['type' => 'belongsTo', 'load' => 'lazy'],
];



// /**
//  * OnLoad-Callback to add the season field to any element
//  */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = ['season_tl_content', 'insertSeasons'];


/**
 * Class - Add season field to all content element types
 */
class season_tl_content extends Backend
{
    public function insertSeasons( )
    {
        foreach( $GLOBALS['TL_DCA']['tl_content']['palettes'] as $palette => $fields ) {
            if( ( $palette === '__selector__' ) || ( $palette === 'default' ) ) continue;       // das sind keine Elemente => überspringen

            if( strstr($GLOBALS['TL_DCA']['tl_content']['palettes'][$palette], ',season_period') != false ) continue;

            // add publication profile to palette
            $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] = str_replace( ",invisible", ",season_period,invisible", $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] );
            
        }
        $GLOBALS['TL_DCA']['tl_content']['fields']['invisible']['eval'] = ['tl_class'=>'clr m12'];
    }


    //---------------------------------------------------------------
    // Creates a select with all publishing Periods
    //---------------------------------------------------------------
    public function getPeriods( )
    {
        $objPf = $this->Database->prepare("SELECT c.title AS cat, p.* FROM tl_season_period AS p, tl_season_profile AS c WHERE p.pid = c.id ORDER BY c.title, p.sorting")
                                ->execute( );

        $arrOptions = [];
        while( $objPf->next() ) {
            $format = $objPf->year ? 'd.m.' : 'd.m.Y';
            $arrOptions[$objPf->cat][$objPf->id] = $objPf->title . ' &nbsp; (' . ($objPf->year ? $GLOBALS['TL_LANG']['tl_content']['yearly'] : $GLOBALS['TL_LANG']['tl_content']['period']) . ': ' . Date::parse( $format, $objPf->start ) . ' - ' . Date::parse( $format, $objPf->stop ) . ')';
        }

        return $arrOptions;
    }
}
