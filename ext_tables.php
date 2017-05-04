<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['wt_gallery']); // Get backandconfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'files/static/', 'Add default CSS');

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] = 'pi_flexform';


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'LLL:EXT:wt_gallery/locallang_db.xml:tt_content.list_type_pi1', 
		$_EXTKEY.'_pi1',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
	),
	'list_type'
);

if ($confArr['picturePathTextField'] != 1 ) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:wt_gallery/be/flexform_ds_pi1.xml');
} else {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:wt_gallery/be/flexform_ds_pi1_old.xml');
}

if (TYPO3_MODE=='BE') $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_wtgallery_pi1_wizicon'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'pi1/class.tx_wtgallery_pi1_wizicon.php';

?>