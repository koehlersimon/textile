<?php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][time()] = [
    'nodeName' => 'textileMarkup',
    'priority' => 40,
    'class' => \SIMONKOEHLER\Textile\Form\Element\MarkupPreview::class,
];
