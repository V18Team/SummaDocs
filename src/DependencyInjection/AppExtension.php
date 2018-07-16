<?php
/**
 *
 * This code is part of SummaDocs system.
 * (c) SummaDocs 2018
 *
 * If you want, you can see license file at https://github.com/v18-team/SummaDocs/LICENSE
 *
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

namespace App\DependencyInjection;

use App\Config\FrontConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->register('app.front.config', FrontConfig::class);
    }
}