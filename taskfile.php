<?php

use Task\Plugin\PhpSpecPlugin;

$project = new Task\Project('empty');

$project->inject(function ($container) {
    $container['phpspec'] = new PhpSpecPlugin;
});

$project->addTask('test', ['phpspec', function ($phpspec) {
    $phpspec->command('run')
        ->setConfig($this->getProperty('config', 'phpspec.yml'))
        ->setFormat('pretty')
        ->pipe($this->getOutput());
}]);

return $project;