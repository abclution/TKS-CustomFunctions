# TKS-CustomFunctions

https://stackoverflow.com/questions/43543961/include-external-files-in-functions-php-wordpress

4

You can include external files in functions.php by using either

require_once();
or else you can use

include_once();

es you can include the external file in functions.php

require_once( get_template_directory() . 'anyfilename.php' );


The difference between these two is that in the event that the file is not found require will give out a fatal error and then stop executing the rest of the file where as include will only issue a warning but will continue the execution of the file.