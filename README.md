# TKS-CustomFunctions

https://stackoverflow.com/questions/43543961/include-external-files-in-functions-php-wordpress

4

You can include external files in functions.php by using either

require_once();
or else you can use

include_once();

es you can include the external file in functions.php

require_once( get_template_directory() . 'anyfilename.php' );