<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_wecflashplayer_class=1
');

t3lib_extMgm::addPItoST43($_EXTKEY,"pi1/class.tx_wecflashplayer_pi1.php","_pi1","list_type",1);
t3lib_extMgm::addPItoST43($_EXTKEY,"pi2/class.tx_wecflashplayer_pi2.php","_pi2","list_type",1);
?>