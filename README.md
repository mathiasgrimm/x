X
=
X is a collection of php functions to quickly debug php while working with web or cli (command line interface)

X is a replacement for the common php print_r/var_dump debug approach


Usage
=====
```php
<?php
new mathiasgrimm\x\X();

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

Output
-------
```php
$aLang = array(
   'PHP',
   'Java',
   'JavaScript'
);

x(1, 2, 3, $aLang);

```

will print:

<pre>
DEBUG X
File: /Users/mathiasgrimm/Google Drive/projects/github/x/test/XTest.php
Line: 15

ARG [0]
1

ARG [1]
2

ARG [2]
3

ARG [3]
Array
(
    [0] => PHP
    [1] => Java
    [2] => JavaScript
)
</pre>


Live Environment Debug 
======================
In general, live environments are hard to debug, however X makes it less terrible.

Lets say you want to debug the Login page of your website while not displaying anything different for a million public users
that are currently using your site.

In general you need a way to say that you are in a debug environment somehow. Either by having an alternative entry point or a url switch.
In this case I will assume you have 2 entry points. index.php and index2.php
index2.php will allow debug verbosity


```php
<?php
// index.php
define('IS_DEBUG', false);

// initialize X
new mathiasgrimm\x\X(IS_DEBUG);

// ...

?>

<?php
// index2.php
define('IS_DEBUG', true);

// initialize X
new mathiasgrimm\x\X(IS_DEBUG);

// ...

?>


<?php
// LoginController.php
class LoginController
// ...

    public function loginAction($username, $password)
    {
        // common php
        if (IS_DEBUG) {
            print_r($_SESSION);
            die();
        }
        
        // X
        // xd($_SESSION);
    }
?>
```

The X functions will be always available along the code but they will echo information just when debug is enabled.





