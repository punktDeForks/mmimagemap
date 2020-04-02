<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
$extensionName = "mmimagemap";
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'mmimagemap',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:mmimagemap/Resources/Public/Icons/module-mmimagemap.svg']
);

//$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName).'_pi1';
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extensionName . '/Configuration/PageTS/ModWizards.ts">'
    );
}


/**
    * Registers a Backend Module
*/
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'MikelMade.Mmimagemap',
        'file',	 // Make module a submodule of 'file'
        'mod1',	// Submodule key
        '1',						// Position
        array(
            'Backend' => 'list,addmap,listedit,edit'
        ),
        array(
            'access' => 'user,group',
            'icon'   => 'EXT:' . $extensionName . '/Resources/Public/Icons/module-mmimagemap.svg',
            'labels' => 'LLL:EXT:' . $extensionName . '/Resources/Private/Language/locallang_be.xlf',
        )
    );

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extensionName, 'Configuration/TypoScript', 'mmimagemap');
