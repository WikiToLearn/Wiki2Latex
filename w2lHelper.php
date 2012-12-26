<?php

/*
 * File: w2lHelper.php
 *
 * Purpose:
 * Provides all functions, which integrate into Mediawiki. Connection to the hooks listed in wiki2latex.php.
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

$w2lLanguages = array(
	'Italian' => 'italian',
	'Dutch'=>'dutch',
	'English' => 'english',
	'French' => 'french',
	'German' => 'german',
	'German (new)' => 'ngerman',
	'Hungarian'=>'hungarian',
	'Russian'=>'russian',
	'ukranian'=>'ukrainian',
	'Russian'=>'russian',
);

class Wiki2LaTeXHelper {
		
	function __construct() {
		global $w2lConfig;

		$this->version     = W2L_VERSION;
		$this->required_mw = '1.11';
		
		$this->messagesLoaded = false;
		$this->config  =& $w2lConfig;

		//Set wiki2latex recognized actions. 
		//You find the called methods in w2lCore.php (w2l***->on*** (with the first * Uppercase))
		$this->actions = array('w2llatexform', 'w2ltexfiles', 'w2lpdf', 'w2ltextarea', 'w2lcleartempfolder');
		
		return true;
	}

	function Setup() {
		global $wgExtensionCredits, $w2lConfig, $wgUser;

		// A current MW-Version is required so check for it...
		wfUseMW($this->required_mw);
		
		
		// Check if messages are loaded. If not do so.
		if ( $this->messagesLoaded == false ) {
			wfLoadExtensionMessages( 'wiki2latex' );
			$this->messagesLoaded = true;
		}

		$wgExtensionCredits['other'][] = array(
			'name'        => wfMsg('wiki2latex'),
			'author'      => 'Hans-Georg Kluge and [http://code.google.com/p/wiki2latex/wiki/HallOfFame many contributors]',
			'description' => wfMsg('w2l_description'),
			'url'         => 'http://www.mediawiki.org/wiki/Extension:Wiki2LaTeX',
			'version'     => $this->version
		);

		if ( $wgUser->getOption('w2lDebug') == true ) {
			error_reporting(E_ALL);
		}
		return true;

	}

	function onBeforePageDisplay(&$out) {
		$script = <<<EOF
<style type="text/css">/*<![CDATA[*/
li#ca-latex {margin-left:1.6em;}
div.w2l-debug {
	border:1px solid black;
	padding:1em;
}
/*]]>*/</style>
EOF;

		$out->addScript($script."\n");

		return true;

	}

	public function onSkinTemplateContentActions(&$content_actions) { /*Check the wiki2latex.php file, where there is the hook*/
		// Generate the small Wiki2LaTeX-Tab
		global $wgUser;
		global $wgTitle;

		// Check if messages are loaded. If not do so.
		if ($this->messagesLoaded == false ) {
			wfLoadExtensionMessages( 'wiki2latex' );
			$this->messagesLoaded = true;
		}

		$values = new webRequest(); /*Info: http://www.mediawiki.org/wiki/Manual:WebRequest.php*/
		$action = $values->getVal('action');

		$current_ns = $wgTitle->getNamespace(); /*This deprecated feature should no longer be used, but is still available for reasons of backwards compatibility. This feature was deprecated in version 1.19.*/

		$disallow_actions = array('edit', 'submit'); // disallowed actions
		
		 /*Do not show the tab for anonymous or logged off users */
		if ( ($wgUser->getID() == 0) AND ($this->config['allow_anonymous'] == false) ) {
			return true;
		}

		/*Check current and allowed Namespaces and, finally, generate the tab!*/
		if ( ( in_array($current_ns, $this->config['allowed_ns']) ) and !in_array($action, $disallow_actions)) {
			$content_actions['latex'] = array(
				'class' => ( in_array($action, $this->actions )  ) ? 'selected' : false,
				'text' => wfMsg('w2l_tab'),
				'href' => $wgTitle->getLocalUrl( 'action=w2llatexform' )
			);
		}

		return true;
	}
	
	public function onSkinTemplateNavigation(&$sktemplate, &$links) {

		global $wgUser;
		global $wgTitle;
		
		// Check if messages are loaded. If not do so.
		if ($this->messagesLoaded == false ) {
			wfLoadExtensionMessages( 'wiki2latex' );
			$this->messagesLoaded = true;
		}
		$values = new webRequest();
		$action = $values->getVal('action');

		$current_ns = $wgTitle->getNamespace();
		$disallow_actions = array('edit', 'submit'); // disallowed actions

		if ( ($wgUser->getID() == 0) AND ($this->config['allow_anonymous'] == false) ) {
			return true;
		}

		/*Check current and allowed Namespaces and, finally, generate the tab!*/
		if ( ( in_array($current_ns, $this->config['allowed_ns']) ) and !in_array($action, $disallow_actions)) {
			$links['views']['wiki2latex'] = array(
				'class' => ( in_array($action, $this->actions )  ) ? 'selected' : false,
				'text' => wfMsg('w2l_tab'),
				'href' => $wgTitle->getLocalUrl( 'action=w2llatexform' ),
				'img' => 'get-pdf.png',
			);
		}

		return true;
	}

	public function onUnknownAction($action, $article) {
		global $wgUser;
		// Check the requested action
		// return true if is not an action for w2l.
		// otherwise return false;

		$action = strtolower($action);
		if ( !in_array($action, $this->actions) ) {
			// Not our action, so return!
			return true;
		}

		// Check, if anonymous usage is allowed...
		if ( ($wgUser->getID() == 0) AND ($this->config['allow_anonymous'] == false) ) {
			return true;
		}
		
		if ( $this->messagesLoaded  == false) {
			$this->onLoadAllMessages();  /*Attention this function in undefined!!!! This will return an error*/
		}

		// we are on our own, now!
		
		$w2l = new Wiki2LaTeXCore; /*Go to the main code!!*/
		$w2l->onUnknownAction($action, $article);
		return false;

	}
	

	function onGetPreferences ( $user, &$preferences ) { 
	/*Hook to  GetPreferences ?Modify user preferences.?*/
		global $w2lLanguages;
		wfLoadExtensionMessages( 'wiki2latex' );
		$preferences['w2lShowLog'] = array(
			'type' => 'toggle',
			'label-message' => 'w2l_show_log', // a system message
			'section' => 'wiki2latex',
		);
		$preferences['w2lShowParsed'] = array(
			'type' => 'toggle',
			'label-message' => 'w2l_show_parsed', // a system message
			'section' => 'wiki2latex',
		);
		$preferences['w2lDebug'] = array(
			'type' => 'toggle',
			'label-message' => 'w2l_use_debug', // a system message
			'section' => 'wiki2latex',
		);
		$preferences['w2lBabelDefault'] = array(
			'type' => 'select',
			'label-message' => 'w2l_babel', // a system message
			'section' => 'wiki2latex',
			'options' => $w2lLanguages,
			'default' => 'english',
		);
		return true;
	}

}

