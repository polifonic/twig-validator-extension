Twig Validator Extension
========================

Installation
------------

### As a Twig Extension

Create an instance of `TwigValidatorExtension` and add it to the Twig environment just like any other twig extension.

The `TwigValidatorExtension` constructor needs to be passed a validator (an instance of `Symfony\Component\Validator\Validator\ValidatorInterface`).

``` php
$validator = ...;

$twig = new Twig_Environment($loader);

$twig->addExtension(new TwigValidatorExtension($validator));
```

### As a Symfony bundle

The package includes a Symfony bundle named `TwigValidatorBundle`. This bundle
will automatically add the `TwigValidatorExtension` to twig.

Enable the `TwigValidatorBundle` symfony bundle by adding it to your app's kernel:

``` php
# app/AppKernel.php

public function regsiterBundles()
{
	$bundles = array(
		...
        new Polifonic\Twig\Extension\Validator\Symfony\TwigValidatorBundle(),
	);
}
```


Usage
-----

``` twig
{% if object|valid %}...{% endif %}

```

With validation groups:

``` twig
{% if object|valid([ "group1", "group2" ]) %}...{% endif %}

```
