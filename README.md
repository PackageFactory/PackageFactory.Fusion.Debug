# PackageFactory.Fusion.Debug

> Provides simple methods to debug stuff in Fusion


## ⚠⚠⚠ Still under development ⚠⚠⚠

This package is still under development. This message will disappear once the package is ready for testing.

## Installation

```
composer require --dev packagefactory/fusion-debug
```

## Dump Values

### var_dump

You can use `Debug.var_dump(...)` to show debug information on any value you pass as a first parameter.

```fusion
var_dump = ${Debug.var_dump(myValue)}
```

`Debug.var_dump(...)` accepts the following parameters:

* **$value : mixed** - The value to debug
* **$title : string (optional)** - A human-readable title to better recognize the debug output when in a crowded context
* **$plaintext : boolean (optional, default = false)** - If true, the output won't be HTML but plain text
* **$pre : boolean (optional, default = true)** - If true and $plaintext is true as well, the output will be wrapped in a `<pre>`-Tag

To show multiple debug outputs in a row, `Debug.var_dump(...)` calls can be arbitrarily chained:

```fusion
var_dump = ${Debug.var_dump(myValue).var_dump(myOtherValue)}
```

## Contribution

We will gladly accept contributions. Please send us pull requests.

## License

see [LICENSE](./LICENSE)
