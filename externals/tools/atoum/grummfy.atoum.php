<?php

/*
This file will automatically be included before EACH run.

Use it to configure atoum or anything that needs to be done before EACH run.

More information on documentation:
[en] http://docs.atoum.org/en/chapter3.html#Configuration-files
[fr] http://docs.atoum.org/fr/chapter3.html#Fichier-de-configuration
*/

use \mageekguy\atoum;

use	\mageekguy\atoum\report\fields\runner\failures\execute\unix;

$stdOutWriter = new atoum\writers\std\out();
$cliReport = new atoum\reports\realtime\cli();
$cliReport->addWriter($stdOutWriter);

$cliReport->addField(new unix\phpstorm('~/bin/PhpStorm-138.2001.2328/bin/phpstorm.sh'));
$runner->addReport($cliReport);


//$report = $script->addDefaultReport();


//@mkdir(__DIR__ . '/../../../tests/reports/atoum/', 0777, true);
//
//// Please replace in next line "Project Name" by your project name and "/path/to/destination/directory" by your destination directory path for html files.
//$coverageField = new atoum\report\fields\runner\coverage\html('Api Response Formater', __DIR__ . '/../../../tests/reports/atoum/');
//
//// Please replace in next line http://url/of/web/site by the root url of your code coverage web site.
//$coverageField->setRootUrl('http://www.grummfy.be/');
//
//$report->addField($coverageField);
