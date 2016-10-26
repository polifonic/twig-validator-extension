<?php

namespace Polifonic\Twig\Extension\Validator\Symfony;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TwigValidatorExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $definition = new Definition(
            'Polifonic\Twig\Extension\Validator\ValidatorExtension',
            array(
                new Reference('validator'),
            )
        );

        $definition->addTag('twig.extension');

        $container->setDefinition(
            'polifonic.twig.extension.validator',
            $definition
        );
    }
}
