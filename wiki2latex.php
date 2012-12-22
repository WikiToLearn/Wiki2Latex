<?php

/*
 * File: wiki2latex.php
 *
 * Purpose:
 * Registers Wiki2LaTeX to Mediawiki
 *
 * License:
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

if ( !defined('MEDIAWIKI') ) {
	$msg  = 'To install Wiki2LaTeX, put the following line in LocalSettings.php:<br/>';
	$msg .= '<tt>require_once( $IP."/extensions/path_to_Wiki2LaTeX_files/wiki2latex.php" );</tt>';
	echo $msg;
	exit( 1 );
}

define('W2L_VERSION', 'Aegaeon: 2011-02-22');

$w2lConfig          = array();
$w2lTags            = array();
$w2lParserFunctions = array();

// Require the class-files
require_once('w2lTags.php');
require_once('w2lHelper.php');

// Some functions:
require_once('w2lFunctions.php');

$w2lExtensionTags = new Wiki2LaTeXTags();
$w2lHelper        = new Wiki2LaTeXHelper();

// load config files
require_once('w2lDefaultConfig.php');

if ( file_exists( dirname(__FILE__).'/w2lConfig.php') ) {
	include_once('w2lConfig.php');
}

// Autoload classes
$wgAutoloadClasses['Wiki2LaTeXParser']   = dirname(__FILE__) . '/w2lParser.php';
$wgAutoloadClasses['Wiki2LaTeXCore']     = dirname(__FILE__) . '/w2lCore.php';
$wgAutoloadClasses['Wiki2LaTeXCompiler'] = dirname(__FILE__) . '/w2lLaTeXCompiler.php';

// Connect to hooks
$wgHooks['SkinTemplateContentActions'][] = array(&$w2lHelper); /*This feature was removed completely in version 1.18.0.Maybe it could be removed!![mediawiki.org]*/
$wgHooks['SkinTemplateNavigation'][]     = array(&$w2lHelper); /*http://www.mediawiki.org/wiki/Manual:Hooks/SkinTemplateNavigation */
$wgHooks['UnknownAction'][]              = array(&$w2lHelper); /*This hook allows you to add custom actions to MediaWiki. If an action is requested that the software doesn't handle natively, this hook will be called. [Mediawiki.org]. In w2lHelper::onUnknownAction there is the instantiation of Wiki2LaTeXCore.*/
$wgHooks['BeforePageDisplay'][]          = array(&$w2lHelper);
$wgHooks['GetPreferences'][]             = array(&$w2lHelper);

$wgHooks['ParserFirstCallInit'][]        = array(&$w2lExtensionTags, 'Setup'); /* called when the parser initialises for the first time[mediawiki.org]*/

// Internal usage of hooks
$wgHooks['w2lInitParser'][] =  array(&$w2lExtensionTags, 'w2lSetup'); //"Wiki2LaTeXTags::w2lSetup"

// Messages.php - multilanguages string
$wgExtensionMessagesFiles['wiki2latex']  = dirname( __FILE__ ) . '/w2lMessages.php';

$wgExtensionFunctions[] = array(&$w2lHelper, 'Setup'); /*This variable is an array that stores functions to be called after most of MediaWiki initialization is complete. It should be used for final step of initialization of extension setup code that needs to perform advanced things, like using global functions and instantiating autoloaded classes.[mediawiki.org]*/



