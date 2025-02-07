<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

use Contao\DC_Table;
use Contao\DataContainer;


$GLOBALS['TL_DCA']['tl_season_profile'] = [
    'config' => [
        'dataContainer'               => DC_Table::class,
        'ctable'                      => ['tl_season_period'],
        'switchToEdit'                => true,
        'enableVersioning'            => true,
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ]
    ],
    'list' => [
        'sorting' => [
            'mode'                    => DataContainer::MODE_SORTED,
            'fields'                  => ['title'],
            'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
            'panelLayout'             => 'search,limit'
        ],
        'label' => [
            'fields'                  => ['title'],
            'format'                  => '%s'
        ],
        'operations'
    ],
    'palettes' => [
        'default'                     => '{title_legend},title'
    ],
    'fields' => [
        'id' => [         'sql'       => ['type' => 'integer', 'notnull' => false, 'unsigned' => true, 'autoincrement' => true] ],
        'tstamp' => [     'sql'       => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0']        ],
        'title' => [
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => ['mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'],
            'sql'                     => ['type' => 'string', 'length' => 255, 'notnull' => true, 'default' => '']
        ],
    ]
];
