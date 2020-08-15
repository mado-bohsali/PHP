<?php
/*
Code MUST follow a “coding style guide” PSR [PSR-1].

Code MUST use 4 spaces for indenting, not tabs.

There MUST NOT be a hard limit on line length; the soft limit MUST be 120 characters; lines SHOULD be 80 characters or less.

There MUST be one blank line after the namespace declaration, and there MUST be one blank line after the block of use declarations.

Opening braces for classes MUST go on the next line, and closing braces MUST go on the next line after the body.

Opening braces for methods MUST go on the next line, and closing braces MUST go on the next line after the body.

Visibility MUST be declared on all properties and methods; abstract and final MUST be declared before the visibility;
static MUST be declared after the visibility.

Control structure keywords MUST have one space after them; method and function calls MUST NOT.

Opening braces for control structures MUST go on the same line, and closing braces MUST go on the next line after the body.

Opening parentheses for control structures MUST NOT have a space after them,
and closing parentheses for control structures MUST NOT have a space before.

Flags used as parameters reflect specific reserved keywords (optional)

Regardless, values are not preserved between script runs,
unless you persist them explicitly in a file or some form of cache or some other form of persistence layer.

*/
declare(strict_types=1);

namespace You;

function callee(int $param): string {
  echo substr('ideeën', -3); //multibyte
  echo PHP_EOL;
  echo mb_substr('ideeën', 0); //takes into account multibyte characters
  echo PHP_EOL;

  return "{$param} time(s)";
}

$variableFunc = function(string $name): void {
  echo $GLOBALS['count']. ' with '.$name;
};

//The __invoke method is a magic function that can be attached to classes such that when initialized to a
//variable will make that assigned variable into a callable function.

class Enemy{

    public function __invoke()
    {
        echo "Invoking a magical function";
        echo PHP_EOL;
        echo "".is_callable('__invoke');
    }
}

$enemy = new Enemy();
$enemy();
echo callee(1);
print_r(get_extension_funcs('gd'));

echo PHP_EOL;

$variableFunc('myself');


/** --Docblock--
* Determines the output directory where your files will
* go, based on where the system temp directory is. It will use /tmp as
* the default path to the system temp directory.
* @param string $systemTempDirectory
* @return string
*/

function determineOutputDirectory(string $systemTempDirectory = '/tmp'): string {
 // … code goes here
 return "$systemTempDirectory";
}

//Anonymous functions
$callable = function(float $value): int {
  if (0.0 <= $value) {
    return 1;
  } else {
    return -1;
  }
};

$anonymousFunction = function() use(&$enemy) {
  return $enemy;
};

?>
