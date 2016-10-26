<?php

namespace Polifonic\Twig\Extension\Validator;

use Twig_Extension;
use Twig_SimpleFilter;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorExtension extends Twig_Extension
{
    protected $container;

    /**
     * @param \Symfony\Component\Validator\ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter(
                'valid',
                array($this, 'validate'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function validate($object, array $groups = null)
    {
        $violations = $this->getValidator()
            ->validate($object, null, $groups);

        return count($violations) == 0;
    }

    /**
     * @return string The name of the extension
     */
    public function getName()
    {
        return 'uam_user_validator';
    }

    protected function getValidator()
    {
        return $this->validator;
    }
}
