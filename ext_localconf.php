<?php
// Register a node in ext_localconf.php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][time()] = [
    'nodeName' => 'textileMarkdown',
    'priority' => 40,
    'class' => \SIMONKOEHLER\Textile\Form\Element\MarkdownPreview::class,
];
