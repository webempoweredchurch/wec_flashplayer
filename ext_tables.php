<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

t3lib_div::loadTCA("tt_content");

$TCA["tt_content"]["types"]["list"]["subtypes_excludelist"][$_EXTKEY."_pi1"]="layout,select_key,pages";
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

$TCA["tt_content"]["types"]["list"]["subtypes_excludelist"][$_EXTKEY."_pi2"]="layout,select_key,pages";
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi2']='pi_flexform';

t3lib_extMgm::addPlugin(Array("LLL:EXT:wec_flashplayer/locallang_db.php:tt_content.list_type_pi1", $_EXTKEY."_pi1"),"list_type");
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:wec_flashplayer/flexform_ds_video.xml');

t3lib_extMgm::addPlugin(Array("LLL:EXT:wec_flashplayer/locallang_db.php:tt_content.list_type_pi2", $_EXTKEY."_pi2"),"list_type");
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi2', 'FILE:EXT:wec_flashplayer/flexform_ds_audio.xml');

// Adds wizard icon to the content element wizard.
if (TYPO3_MODE=='BE')	{
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_wecflashplayer_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_wecflashplayer_pi1_wizicon.php';
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_wecflashplayer_pi2_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi2/class.tx_wecflashplayer_pi2_wizicon.php';
}
?>