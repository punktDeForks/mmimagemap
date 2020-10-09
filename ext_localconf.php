<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

//require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('mmimagemap').'Classes/Utility/AjaxDispatcher.php';
//$TYPO3_CONF_VARS['BE']['AJAX']['mmimagemapAjaxDispatcher'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('mmimagemap').'Classes/Utility/AjaxDispatcher.php:Tx_mmimagemap_Utility_AjaxDispatcher->initAndDispatch';

// FE plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    "mmimagemap",
    'Pi1',
    [
        \MikelMade\Mmimagemap\Controller\FrontendDisplayController::class => 'list'
    ]
);

// Create uploads folder if not exists
$uploadFolder = \TYPO3\CMS\Core\Core\Environment::getPublicPath() . '/uploads/tx_mmimagemap';
if (!is_dir($uploadFolder)) {
    TYPO3\CMS\Core\Utility\GeneralUtility::mkdir_deep($uploadFolder);
}
