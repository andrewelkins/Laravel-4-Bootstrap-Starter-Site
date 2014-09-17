# Lazy Map

This small library aims at providing a very simple and efficient map of lazy-instantiating objects.

[![Build Status](https://travis-ci.org/Ocramius/LazyMap.png?branch=master)](https://travis-ci.org/Ocramius/LazyMap)
[![Coverage Status](https://coveralls.io/repos/Ocramius/LazyMap/badge.png?branch=master)](https://coveralls.io/r/Ocramius/LazyMap)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Ocramius/LazyMap/badges/quality-score.png?s=7b727f09ad4fe0ff092312a85eec8999e2e3e120)](https://scrutinizer-ci.com/g/Ocramius/LazyMap/)
[![Total Downloads](https://poser.pugx.org/ocramius/lazy-map/downloads.png)](https://packagist.org/packages/ocramius/lazy-map)
[![Latest Stable Version](https://poser.pugx.org/ocramius/lazy-map/v/stable.png)](https://packagist.org/packages/ocramius/lazy-map)
[![Latest Unstable Version](https://poser.pugx.org/ocramius/lazy-map/v/unstable.png)](https://packagist.org/packages/ocramius/lazy-map)
[![Dependency Status](https://www.versioneye.com/php/ocramius:lazy-map/dev-master/badge.png)](https://www.versioneye.com/php/ocramius:lazy-map/dev-master)

## Installation

The suggested installation method is via [composer](https://getcomposer.org/):

```sh
php composer.phar require ocramius/lazy-map:1.0.*
```

## Usage

The current implementation is very simple and allows to define a map of "services" through a
`LazyMap\CallbackMap`:

```php
$map = new \LazyMap\CallbackLazyMap(function ($name) {
    $object = new \stdClass();

    $object->name = $name;

    return $object;
});

var_dump($map->foo);
var_dump($map->bar);
var_dump($map->{'something special'});
```

## Purpose

The idea behind the library is to avoid un-efficient lazy-loading operations like following:

```php
private function getSomething($name)
{
    if (isset($this->initialized[$name])) {
        return $this->initialized[$name];
    }

    return $this->initialized[$name] = new Something($name);
}
```

This reduces overhead greatly when you'd otherwise call `getSomething()` thousands of times.
That's especially useful when mapping a lot of different services and iterating over them
over and over again.
