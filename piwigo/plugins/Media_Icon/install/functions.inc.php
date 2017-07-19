<?php
function media_icon_install_general($config) {
	$query = 'INSERT INTO '.CONFIG_TABLE.' (param,value,comment) VALUES ("media_icon_general" ,"'.pwg_db_real_escape_string(serialize($config)).'", "Media Icon plugin general parameters");';
	pwg_query($query);
}

function media_icon_install_advanced($config) {
	$query = 'INSERT INTO '.CONFIG_TABLE.' (param,value,comment) VALUES ("media_icon_advanced" ,"'.pwg_db_real_escape_string(serialize($config)).'", "Media Icon plugin advanced parameters");';
	pwg_query($query);
}

function media_icon_update_db() {
	global $conf;
	include(dirname(__FILE__).'/config_default.inc.php');

	$config_general = array();
	$config_advanced = array();
	$conf_media_icon_general = unserialize($conf['media_icon_general']);
	$conf_media_icon_advanced = unserialize($conf['media_icon_advanced']);
	
	if (isset($conf['media_icon'])) {
		$query = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE (param="media_icon");';
		pwg_query($query);
	}
	
	if (isset($conf_media_icon_general)) {
		foreach ($config_default_general as $key => $value) {
			if (is_array($config_default_general[$key])) {
				foreach ($config_default_general[$key] as $key2 => $value2) {
					if (is_array($config_default_general[$key][$key2])) {
						foreach ($config_default_general[$key][$key2] as $key3 => $value3) {
							if (isset($conf_media_icon_general[$key][$key2][$key3]))
								$config_general[$key][$key2][$key3] = $conf_media_icon_general[$key][$key2][$key3];
							else
								$config_general[$key][$key2][$key3] = $config_default_general[$key][$key2][$key3];
						}
					} else {
						if (isset($conf_media_icon_general[$key][$key2]))
							$config_general[$key][$key2] = $conf_media_icon_general[$key][$key2];
						else
							$config_general[$key][$key2] = $config_default_general[$key][$key2];
					}
				}
			} else {
				if (isset($conf_media_icon_general[$key][$key2]))
					$config_general[$key] = $conf_media_icon_general[$key];
				else
					$config_general[$key] = $config_default_general[$key];
			}
		}
		media_icon_delete_conf("media_icon_general");
		media_icon_install_general($config_general);
	} else {
		media_icon_install_general($config_default_general);
	}
	
	if (isset($conf_media_icon_advanced)) {
		foreach ($config_default_advanced as $key => $value) {
			if (isset($conf_media_icon_advanced[$key][$key2]))
				$config_advanced[$key] = $conf_media_icon_advanced[$key];
			else
				$config_advanced[$key] = $config_default_advanced[$key];
		}
		media_icon_delete_conf("media_icon_advanced");
		media_icon_install_advanced($config_advanced);
	} else {
		media_icon_install_advanced($config_default_advanced);
	}
}

function media_icon_delete_conf($where) {
	$query = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE (param="'.$where.'");';
	pwg_query($query);
}
?>