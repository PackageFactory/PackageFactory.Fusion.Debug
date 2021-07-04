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

To show multiple debug outputs in a row, `Debug.var_dump(...)` calls can be chained arbitrarily:

```fusion
var_dump = ${Debug.var_dump(myValue).var_dump(myOtherValue)}
```

### print_r

`Debug.print_r(...)` is a small wrapper around the `print_r` function of the PHP standard library.

```fusion
print_r = ${Debug.print_r(myValue)}
```

However, the signature of `Debug.print_r(...)` deviates a little and accepts the following parameters:

* **$value : mixed** - The value to debug
* **$pre : boolean (optional, default = true)** - If true, the output will be wrapped in a `<pre>`-Tag

To show multiple debug outputs in a row, `Debug.print_r(...)` calls can be chained arbitrarily:

```fusion
print_r = ${Debug.print_r(myValue).print_r(myOtherValue)}
```

### var_export

`Debug.var_export(...)` is a small wrapper around the `var_export` function of the PHP standard library.

```fusion
var_export = ${Debug.var_export(myValue)}
```

However, the signature of `Debug.var_export(...)` deviates a little and accepts the following parameters:

* **$value : mixed** - The value to debug
* **$pre : boolean (optional, default = true)** - If true, the output will be wrapped in a `<pre>`-Tag

To show multiple debug outputs in a row, `Debug.var_export(...)` calls can be chained arbitrarily:

```fusion
var_export = ${Debug.var_export(myValue).var_export(myOtherValue)}
```

## Contribution

We will gladly accept contributions. Please send us pull requests.

## License

see [LICENSE](./LICENSE)
