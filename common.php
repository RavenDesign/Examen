<?php

/**
 * Escapes HTML for output
 *
 * Voor alle informatie omtrend -> http://php.net/manual/en/function.htmlspecialchars.php
 * 
 */

function escape($html) {
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}