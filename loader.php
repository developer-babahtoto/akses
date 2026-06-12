<?php
/**
 * LOADER - ACCESS THIS VIA BROWSER
 */
define('DS_EXEC', true);
$k = __DIR__ . '/inc.key';

if (file_exists($k)) {
    include($k);
} else {
    header("HTTP/1.1 404 Not Found");
}
?>