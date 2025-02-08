<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

namespace Softleister\SeasonalBundle\EventListener;

use Contao\Date;
use Contao\Model;
use Contao\System;
use Contao\Database;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;


#[AsHook('isVisibleElement')]
class IsVisibleElementListener
{
    public function __invoke( Model $element, bool $isVisible ): bool
    {
        if( $isVisible && ($element instanceof \Contao\ContentModel) ) {        // gilt nur für sichtbare Elemente, unsichtbare bleiben so

            // Show always in Backend
            $container = System::getContainer( );
            $request = $container->get( 'request_stack' )->getCurrentRequest( );
    
            if( $request && $container->get( 'contao.routing.scope_matcher' )->isBackendRequest( $request ) ) {
                return $isVisible = true;
            }

            // Check if this content element can be shown
            if( $element->season_period > 0 ) {
                $db = Database::getInstance( );

                $objPeriod = $db->prepare( "SELECT * FROM tl_season_period WHERE published=1 AND id=?" )
                                ->limit( 1 )
                                ->execute( $element->season_period );

                if( $objPeriod->numRows > 0 ) {
                    $now = Date::floorToMinute( );           // aktuelle Minute
                    $start = (int) $objPeriod->start;
                    $stop  = (int) $objPeriod->stop;

                    // Zeitraum gültig?
                    if( ( $start > $now ) || ( $stop <= $now ) ) {                              // IF( Passt nicht in den aktuellen Zeitraum? )
                        $isVisible = false;                                                     //   erstmal => ausblenden
                        if( !empty( $objPeriod->year ) ) {  
                            $count = 0;  
                            while( (($start < $now) || ($stop < $now)) && ($count++ < 20) ) {   //   WHILE( Start UND Stop kleiner als JETZT )
  
                                if( ($now >= $start) && ($now < $stop) ) {                      //   Gefunden! => doch anzeigen
                                    $isVisible = true;  
                                    break;  
                                }  
  
                                $start = strtotime( '+1 year', $start );                        //   Intervall + 1 Jahr
                                $stop  = strtotime( '+1 year', $stop );  
  
                                if( ( $start === false ) || ( $stop === false ) ) break;        //   Abbruch bei Konvertierfehler
                            }
                        }
                    }
                }
            }
        }
        return $isVisible;
    }
}
