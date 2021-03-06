<?php

/**
* Action Controller
*
* @author 	Carlos Santos
* @version 0.2
* @since 2016-10
*/

if (isset($_GET["a"]) && !empty($_GET["a"])) {
	if ($cfg->db->connect) {
		$a = $db->real_escape_string($_GET["a"]);
	} else {
		$a = $_GET["a"];
	}
/* CLI support cmd eg.: php index.php --a=home */
} else if (isset(getopt(null, ["a::"])["a"])) {
	if ($cfg->db->connect) {
		$a = $db->real_escape_string(getopt(null, ["a::"])["a"]);
		$cfg->cli = true;
	} else {
		$a = getopt(null, ["a::"])["a"];
	}
} else {
	$a = null;
}
