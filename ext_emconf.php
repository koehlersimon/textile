<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Textile Markup Content Element',
    'description' => 'Provides a new Markup content element and a ViewHelper',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => 'info@simon-koehler.com',
    'company' => 'simon-koehler.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.99-11.2.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
