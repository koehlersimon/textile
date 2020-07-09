<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Textile Markdown Parser',
    'description' => 'Write Markdown code in the TYPO3 backend',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => 'info@simon-koehler.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.99-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
