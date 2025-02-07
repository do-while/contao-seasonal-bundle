<?php

declare(strict_types=1);

/**
 * Contao Seasonal Bundle
 *
 * @copyright  Softleister 2025
 * @author     Softleister <info@softleister.de>
 * @license    LGPL
 */

namespace Softleister\SeasonalBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SeasonalExtension extends Extension
{
    public function load( array $configs, ContainerBuilder $container ): void
    {
        ( new YamlFileLoader( $container, new FileLocator( __DIR__ . '/../../config' ) ) )
            ->load( 'services.yaml' )
        ;
    }
}