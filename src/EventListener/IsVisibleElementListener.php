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

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Model;


#[AsHook('isVisibleElement')]
class IsVisibleElementListener
{
    public function __invoke( Model $element, bool $isVisible ): bool
    {
        if( $element instanceof \Contao\ContentModel ) {
            // Check if this content element can be shown
            if( $this->myElementCanBeShownInFrontend( $element ) ) {
                return true;
            }
        }

        // Otherwise we don't want to change the visibility state
        return $isVisible;
    }
}
