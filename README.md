> [!NOTE]
> This repository is archived, but the project is not. Development continues over here:
> https://codeberg.org/PackageFactory/fusion-debug

# PackageFactory.Fusion.Debug

> Provides simple methods to debug stuff in Fusion

This package allows you to debug values in fusion as simple as:

```fusion
debug = ${Debug.var_dump(node).var_dump(request).die()}
```

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

### xdebug_var_dump

`Debug.xdebug_var_dump(...)` is a small wrapper around the `xdebug_var_dump` function of the XDebug PHP extension. If that extension is not enabled, `Debug.xdebug_var_dump(...)` will fall back to the `var_dump` function of the PHP standard library.

```fusion
xdebug_var_dump = ${Debug.xdebug_var_dump(myValue)}
```

However, the signature of `Debug.xdebug_var_dump(...)` deviates a little and accepts the following parameters:

* **$value : mixed** - The value to debug
* **$pre : boolean (optional, default = true)** - If true, the output will be wrapped in a `<pre>`-Tag

To show multiple debug outputs in a row, `Debug.xdebug_var_dump(...)` calls can be chained arbitrarily:

```fusion
xdebug_var_dump = ${Debug.xdebug_var_dump(myValue).xdebug_var_dump(myOtherValue)}
```

## Debug Fusion Objects

### fusionPath

You can use `Debug.fusionPath(...)` to get the current fusion path of a particular fusion object (most commonly it will be `this`).

```fusion
fusionPath = ${Debug.var_dump(Debug.fusionPath(this))}
```

`Debug.fusionPath(...)` accepts the following parameters:

* **$fusionObject : AbstractFusionObject** - The fusion object to get the fusion path from (when in doubt, use `this`)

## Interrupting program execution

### exit

You can use `Debug.exit()` to stop execution of the PHP Script entirely (just as with the `exit` function of the PHP standard library).

`Debug.exit()` takes no parameters.

`Debug.exit()` can be used in any chain of `Debug.var_dump(...)`, `Debug.print_r(...)`, `Debug.var_export(...)` or `Debug.xdebug_var_dump(...)` calls:

```fusion
debug = ${Debug.var_dump(node).var_dump(request).die()}
```

### die

`Debug.die()` is an alias for `Debug.exit()`.

## Contribution

We will gladly accept contributions. Please send us pull requests.

## License

see [LICENSE](./LICENSE)
