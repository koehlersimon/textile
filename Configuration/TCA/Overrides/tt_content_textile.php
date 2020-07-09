<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
	$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
		'tt_content',
		'CType',
		[
			'LLL:EXT:textile/Resources/Private/Language/locallang.xlf:textile.widget.title',
			'textile',
			'textile-icon'
		],
		'header',
		'after'
	);

	// New palette header
	$GLOBALS['TCA']['tt_content']['palettes']['header'] = array(
  			'showitem' => 'header,header_layout,header_position','canNotCollapse' => 1
	);

	// New palette header
	$GLOBALS['TCA']['tt_content']['palettes']['subheader'] = array(
  			'showitem' => 'subheader,date','canNotCollapse' => 1
	);

	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['textile'] = 'textile-icon';
	$GLOBALS['TCA']['tt_content']['types']['textile'] = [
		'showitem' => '
                --palette--;;header,
				--palette--;;subheader,
                bodytext,
				markdown_preview,
				--div--;Additional,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
            	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            	--div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
            	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
        ',
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
					'type' => 'text',
			        'rows' => 15,
                ]
            ],
			'markdown_preview' => [
				'label' => 'LLL:EXT:textile/Resources/Private/Language/locallang.xlf:textile.markdown_preview',
				'config' => [
	                'type' => 'user',
					'renderType' => 'textileMarkdown',
	                'parameters' => array(
	                    'color' => 'blue'
	                )
	            ],
            ]
        ]
    ];

});
