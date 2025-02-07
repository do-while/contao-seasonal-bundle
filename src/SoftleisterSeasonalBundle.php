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

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Configures the Contao seasonal bundle.
 *
 * @author Softleister
 */
class SoftleisterSeasonalBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
