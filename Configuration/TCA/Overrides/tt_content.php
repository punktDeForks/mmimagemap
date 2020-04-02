<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['mmimagemap_pi1'] = 'recursive,select_key,pages';


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('mmimagemap', 'Pi1', 'Mmimagemap');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['mmimagemap_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'mmimagemap_pi1',
    'FILE:EXT:mmimagemap/Configuration/FlexForms/setup.xml'
);