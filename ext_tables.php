<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'textile',
    'Configuration/TypoScript',
    'Textile'
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);
$iconRegistry->registerIcon(
    'textile-icon',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:textile/Resources/Public/Icons/markdown.svg']
);
$iconRegistry->registerIcon(
    'textile-icon-small-png',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:textile/Resources/Public/Icons/markdown-32x32.png']
);
