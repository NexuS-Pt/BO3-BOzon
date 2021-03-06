<?php

define('ROOT_DIR', dirname(__FILE__));

include ROOT_DIR."/backoffice/config/cfg.php";

include ROOT_DIR."/backoffice/controller/database.php";
include ROOT_DIR."/backoffice/controller/https.php";
include ROOT_DIR."/backoffice/controller/classes.php";
include ROOT_DIR."/backoffice/controller/languages.php";
include ROOT_DIR."/backoffice/controller/sessions.php";
include ROOT_DIR."/backoffice/controller/pages.php";
include ROOT_DIR."/backoffice/controller/actions.php";
include ROOT_DIR."/backoffice/controller/id.php";

include ROOT_DIR."/pages-e/_global_.php";

$head = bo3::loade("head.tpl");
$tail = bo3::loade("tail.tpl");

// page controller
$pg_file = sprintf(ROOT_DIR."/pages/%s.php", $pg);
if (file_exists($pg_file)) {
	include $pg_file;
} else {
	include ROOT_DIR."/pages/404.php"; /* 404 must exist */
}

// Preparing tpl to be send as response of the request
$tpl = bo3::c2r([
	"head" => $head,
	"tail" => $tail,

	"og-title" => (isset($og["title"])) ? $og["title"] : $cfg->system->sitename,
	"og-url" => (isset($og["url"])) ? $og["url"] : "{$cfg->system->protocol}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
	"og-image" => (isset($og["image"])) ? $og["image"] : "{$cfg->system->protocol}://{$_SERVER['HTTP_HOST']}{$cfg->system->path}/site-assets/default-share-image.jpg",
	"og-description" => (isset($og["description"])) ? $og["description"] : $lang["system"]["description"],

	"sitename" => $cfg->system->sitename,
	"keywords" => $lang["system"]["keywords"],
	"description" => $lang["system"]["description"],
	"analytics" => $cfg->system->analytics,

	"path" => $cfg->system->path,
	"bo-path" => $cfg->system->path_bo,
	"css" => "{$cfg->system->path}/site-assets/css",
	"js" => "{$cfg->system->path}/site-assets/js",
	"images" => "{$cfg->system->path}/site-assets/images",
	"libs" => "{$cfg->system->path}/site-assets/libs",
	"uploads" => "{$cfg->system->path}/uploads",

	"lg" => $lg_s,

	"bo3-version" => $cfg->system->version,
	"bo3-subversion" => $cfg->system->sub_version
], isset($tpl) ? $tpl : ".::TPL::.::ERROR::.");

// HEADERS
header('Cache-Control: max-age=86400');

// minify system
if ($cfg->system->minify) {
	echo bo3::minifyPage($tpl);
} else {
	echo $tpl;
}
