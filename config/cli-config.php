<?php

require_once 'vendor/autoload.php';
require_once 'config/doctrine.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
