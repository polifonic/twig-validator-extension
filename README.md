Twig Validator Extension
========================

Usage
-----

``` twig
{% if object|valid %}...{% endif %}

```

With validation groups:

``` twig
{% if object|valid([ "group1", "group2" ]) %}...{% endif %}

```
