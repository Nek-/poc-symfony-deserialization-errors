<?php

namespace App\Symfony;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideOriginalDateTimeNormalizer implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $def = $container->findDefinition('serializer.normalizer.datetime');
        $def->setClass(DateTimeNormalizer::class);
    }
}
