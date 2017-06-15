<?php

namespace Polifonic\Twig\Extension\Validator;

use Twig_Extension;
use Twig_SimpleFilter;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorExtension extends Twig_Extension
{
    protected $validator;

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
                array($this, 'valid'),
                array('is_safe' => array('html'))
            ),
            new Twig_SimpleFilter(
                'invalid',
                array($this, 'invalid'),
                array('is_safe' => array('html'))
            ),
            new Twig_SimpleFilter(
                'validate',
                array($this, 'validate'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function valid($object, array $groups = null)
    {
        $violations = $this->validate($object, $groups);

        return count($violations) == 0 ? 1 : 0;
    }

    public function invalid($object, array $groups = null)
    {
        $violations = $this->validate($object, $groups);

        return count($violations) > 0 ? 1 : 0;
    }

    public function validate($object, array $groups = null)
    {
        return $this->getValidator()
            ->validate(
                $object,
                null,
                $groups
            );
    }

    /**
     * @return string The name of the extension
     */
    public function getName()
    {
        return 'validate';
    }

    protected function getValidator()
    {
        return $this->validator;
    }
}
