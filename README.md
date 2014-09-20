X
=
X is a collection of php functions to quickly debug php while working with web or cli (command line interface)

X is a replacement for the common php print_r/var_dump debug approach


Usage
=====
```php
<?php

// common php
echo "<pre>";
print_r($GLOBALS);
print_r($_POST);
print_r($_GET);
echo "</pre>";

// X
x($GLOBAS, $_POST, $_GET);

// ------------------------------------

// common php
echo "<pre>";
foreach ($_FILES as $file) {
    print_r($file);
}
echo "</pre>";

// X
foreach ($_FILES as $file) {
    x($file);
}

// ------------------------------------

// common php
echo "<pre>";
print_r($_REQUEST);
print_r($_POST);
die;

// X
xd($_REQUEST, $_POST);

```

