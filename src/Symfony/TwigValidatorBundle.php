<?php

namespace Polifonic\Twig\Extension\Validator\Symfony;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TwigValidatorBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = new TwigValidatorExtension();

        $extension->load(array(), $container);

        $container->registerExtension($extension);
    }
}
