<?php

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bootstrap',
        'storage',
        'vendor',
        'docker',
    ])
    ->name('*.php')
    ->notName('_ide_helper*')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12'                                 => true,
    '@Symfony'                               => true,
    'binary_operator_spaces'                 => [
       'default' => 'align_single_space',
    ],
    'concat_space'                           => [
        'spacing' => 'one',
    ],
])
    ->setFinder($finder);
