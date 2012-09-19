<?php

/* Configuration */

// dokuwiki folder (absolute system path)
$dokuwiki_folder =  '/home/jerome/projects/dokuwiki_integrated/dokuwiki';

// dokuwiki url
$dokuwiki_url = 'http://206.12.30.42/dk/dokuwiki';

// link prefix to another page
$link_prefix = 'http://206.12.30.42/dk/doc.php?id=';


/* Initialization */

define('DOKU_PATH', $dokuwiki_folder);
define('DOKU_INC', DOKU_PATH . '/');
define('DOKU_CONF', DOKU_PATH . '/conf/');
define('DOKU_BASE', $dokuwiki_url  . '/');

global $conf;
$conf['datadir'] = DOKU_PATH . '/data';
$conf['cachedir'] = DOKU_PATH . '/data/cache';
$conf['mediadir'] = DOKU_PATH . '/data/media';
$conf['metadir'] = DOKU_PATH . '/data/meta';
$conf['maxseclevel'] = 0;	//links to edit sub-content
$conf['target']['extern'] = '';

$_REQUEST['purge'] = false;	// don't refresh caches

require DOKU_PATH . '/inc/parser/parser.php';
require DOKU_PATH . '/inc/events.php';
require DOKU_PATH . '/inc/mail.php';
require DOKU_PATH . '/inc/cache.php';


/* Let's roll */

// from id parameter, build text file path
$dokuPageId = $_GET['id'];
$pagePath = DOKU_PATH . '/data/pages/'. str_replace(":", "/", $dokuPageId) . '.txt';

// get cached instructions for that file
$cache = new cache_instructions($dokuPageId, $pagePath);
$instructions = $cache->retrieveCache();

// create renderer
require_once DOKU_INC . '/inc/parser/xhtml.php';
require_once 'include/Doku_Renderer_xhtml_export.php';
$renderer = & new Doku_Renderer_xhtml_export();

// init renderer
$renderer->set_base_url($link_prefix);
$renderer->smileys = getSmileys();

// set localizable items
global $lang;
$lang['toc'] = "Table of Contents";
$lang['doublequoteopening']  = '“';
$lang['doublequoteclosing']     = '”';

// instructions processing
$pageTitle = "";
foreach ( $instructions as $instruction )
{
	// get first level 1 header (optional)
	if ($pageTitle == "" && $instruction[0] == "header" && $instruction[1][1] == 1)
		$pageTitle = $instruction[1][0];
	
    // render instruction
	call_user_func_array(array(&$renderer, $instruction[0]),$instruction[1]);
}

// get rendered html
$html = $renderer->doc;

// get metadata infos (optional)
/*
$date_creation = "";
$date_modification = "";
$metadata = p_get_metadata($dokuPageId);
if (isset($metadata))
{
	if (isset($metadata['date']))
	{
		$metadata_date = $metadata['date'];
		if (isset($metadata_date['created']))
		{
			$date_creation = date("F j, Y, g:i:s A", $metadata_date['created']);
		}
		if (isset($metadata_date['modified']))
		{
			$date_modification =date("F j, Y, g:i:s A", $metadata_date['modified']);
		}
	}
}
*/
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?= $pageTitle ?></title>
</head>
<body>
	created: <?= $date_creation ?><br />
	last Modified: <?= $date_modification ?><br />
	<hr />
	<?= $html ?>
</body>
</html>
