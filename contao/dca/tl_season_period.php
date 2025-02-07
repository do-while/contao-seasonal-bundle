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

use Contao\Date;
use Contao\System;
use Contao\Backend;
use Contao\DC_Table;
use Contao\DataContainer;

System::loadLanguageFile( 'tl_content' );


$GLOBALS['TL_DCA']['tl_season_period'] = [
    'config' => [
        'dataContainer'               => DC_Table::class,
        'ptable'                      => 'tl_season_profile',
        'enableVersioning'            => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid,published,sorting' => 'index'
            ]
        ]
    ],
    'list' => [
        'sorting' => [
            'mode'                    => DataContainer::MODE_PARENT,
            'fields'                  => ['sorting'],
            'headerFields'            => ['title'],
            'panelLayout'             => 'filter;sort,search,limit',
            'defaultSearchField'      => 'title',
        ],
        'label' => [
            'fields'                  => ['title', 'start', 'stop'],
            'format'                  => '<span style="display:inline-block;width:300px">%s</span> <span style="display:inline-block;width:120px">%s</span> <span style="display:inline-block;width:120px">%s</span>',
        ],
    ],
    'palettes' => [
        'default'                     => '{title_legend},title;'
                                        .'{time_legend},start,stop,year;'
                                        .'{publish_legend:hide},published'
    ],
    'fields' => [
        'id' => [         'sql'       => ['type' => 'integer', 'notnull' => false, 'unsigned' => true, 'autoincrement' => true] ],
        'tstamp' => [     'sql'       => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0']        ],
        'sorting' => [    'sql'       => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0']        ],
        'pid' => [
            'foreignKey'              => 'tl_season_profile.title',
            'sql'                     => ['type' => 'integer', 'notnull' => true, 'unsigned' => true, 'default' => '0'],
            'relation'                => ['type' => 'belongsTo', 'load' => 'lazy'],
        ],
        'title' => [
            'search'                  => true,
            'sorting'                 => true,
            'inputType'               => 'text',
            'eval'                    => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50', 'unique' => true],
            'sql'                     => ['type' => 'string', 'length' => 255, 'notnull' => true, 'default' => '']
        ],
        'start' => [
            'inputType'               => 'text',
            'sorting'                 => true,
            'flag'                    => DataContainer::SORT_DAY_ASC,
            'eval'                    => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
            'sql'                     => ['type' => 'string', 'length' => 10, 'notnull' => true, 'default' => '']
        ],
        'stop' => [
            'inputType'               => 'text',
            'sorting'                 => true,
            'flag'                    => DataContainer::SORT_DAY_ASC,
            'eval'                    => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
            'sql'                     => ['type' => 'string', 'length' => 10, 'notnull' => true, 'default' => '']
        ],
        'year' => [
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'eval'                    => ['doNotCopy' => true, 'tl_class' => 'clr w50 m12'],
            'sql'                     => ['type' => 'boolean', 'default' => false]
        ],
        'published' => [
            'toggle'                  => true,
            'filter'                  => true,
            'flag'                    => DataContainer::SORT_INITIAL_LETTER_DESC,
            'inputType'               => 'checkbox',
            'eval'                    => ['doNotCopy' => true, 'tl_class' => 'clr w50 m12'],
            'sql'                     => ['type' => 'boolean', 'default' => false]
        ],
    ]
];
