# Parameter Option Parser Lib

POP (Parameter Option Parser) can parse options and values from a string


## Install by ppm
```shell script
ppm --install="<alias>@github/intellivoid/pop" --branch="production" --fix-conflict
```

## Build and install locally
```shell script
make clean build
sudo make install
```


## CLI Example
```
$ ./example/bin-cli -h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test
Array
(
    [h] => 127.0.0.1
    [u] => user
    [p] => passwd
    [debug] => 1
    [max-size] => 3
    [test] => 1
)
```

## Example
```php
<?php
/** @noinspection PhpIncludeInspection */
require("ppm");

ppm\ppm::import("net.intellivoid.pop");

$string = '-h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test';
print_r(pop\pop::parse($string));
```
Output:
```php
Array
(
    [h] => 127.0.0.1
    [u] => user
    [p] => passwd
    [debug] => 1
    [max-size] => 3
    [test] => 1
)
```