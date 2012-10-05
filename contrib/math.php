<?php
/*
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 */
 
 if ( !defined('MEDIAWIKI') ) {
	$msg  = 'To install Wiki2LaTeX, put the following line in LocalSettings.php:<br/>';
	$msg .= '<tt>require_once( $IP."/extensions/path_to_Wiki2LaTeX_files/wiki2latex.php" );</tt>';
	echo $msg;
	exit( 1 );
}
 
if ( !function_exists('w2lMath') ) {

	$w2lTags['math'] = 'w2lMath';
	$wgHooks['w2lBeginParse'][] = 'w2lDoDisplayMath';
        $wgHooks['w2lPreprocess'][] = 'w2lDoDisplayMath';

	function w2lMath($input, $argv, $parser, $frame = false, $mode = 'latex') {


		/*if ( isset($argv['style']) && $argv['style'] == 'display' ) {
			$output  = "\n\\begin{equation}\n";
			$output .= trim($input)."\n";
			$output .= "\\end{equation}\n";
		} else*/

		error_log(trim($input));

		if (isset($argv['style'])) {
			$output  = "\n\\begin{" . $argv['style'] . "}\n";
                        $output .= trim($input)."\n";
                        $output .= "\\end{" . $argv['style'] . "}\n";

		} else {
			$output = "\$";
			$output .= trim($input);
			$output .= "\$";
		}

                $output = str_replace("<math style=\"display\">", "", $output);
                $output = str_replace("<math>", "", $output);
                $output = str_replace("</math>", "", $output);


		return $output;
	}

	function w2lDoDisplayMath(&$parser, &$text) {
		$text = str_replace(":<math>", "<math style=\"equation\">\\nonumber ", $text);
                //$text = str_replace(": <math>", "<math style=\"equation\">\\nonumber ", $text);

		$text = str_replace("\\begin{equation}", "<math style=\"equation\">", $text);
                $text = str_replace("\\end{equation}", "</math>", $text);
                $text = str_replace("\\begin{multline}", "<math style=\"multline\">", $text);
                $text = str_replace("\\end{multline}", "</math>", $text);
                $text = str_replace("\\begin{gather}", "<math style=\"gather\">", $text);
                $text = str_replace("\\end{gather}", "</math>", $text);
                $text = str_replace("\\begin{align}", "<math style=\"align\">", $text);
                $text = str_replace("\\end{align}", "</math>", $text);

                $text = str_replace("\\begin{split}", "<math style=\"display\">i\begin{split}", $text);
                $text = str_replace("\\end{split}", "\\end{split}</math>", $text);

		$text = str_replace("<div class=\"mw-collapsible-content\">", "", $text); //support collapsible

		return true;
	}

}
