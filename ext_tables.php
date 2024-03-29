<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Wdcalender',
	'Event Calender'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 
							'Configuration/TypoScript', 
							'Event Calender');

t3lib_extMgm::addLLrefForTCAdescr(
									'tx_pitswdcalender_domain_model_eventcalender',
									'EXT:pits_wd_calender/Resources/Private/Language/locallang_eventcalender.xml'
									);
t3lib_extMgm::allowTableOnStandardPages(
										'tx_pitswdcalender_domain_model_eventcalender'
										);
$TCA['tx_pitswdcalender_domain_model_eventcalender'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pits_wd_calender/Resources/Private/Language/locallang_db.xml:tx_eventcalender',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) .
								'Configuration/TCA/EventCalender.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 
								'Resources/Public/Icons/eventcalender.gif'
	),
);
$pluginSignature = str_replace('_','',$_EXTKEY).'_wdcalender';
$TCA['tt_content']
	['types']
	['list']
	['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 
								'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');
?>