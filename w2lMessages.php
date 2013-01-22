<?php

/**
 * File:    w2lMessages.php
 * Created: 2007-09-01
 * Version: 0.9
 *
 * Purpose:
 * Contains all the strings, which are to be localized
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
$messages = array();


$messages['en'] = array(
	'wiki2latex'           => 'Wiki2LaTeX',
//name of the extension with the version
	'wiki2latex_version'		=> 'Wiki2LaTeX('.W2L_VERSION.')',
//$1,$2 are meant to be the start and the end of a tag
	'wiki2latex_version_tag'		=> '$1 Wiki2LaTeX$2('.W2L_VERSION.')',
	'wiki2latexspecialpage'    => 'Wiki2LaTeX',
	'w2l_tab'              => 'Scarica la versione LaTeX/PDF',
        'tooltip-ca-w2l_tab'              => 'Scarica la versione LaTeX/PDF',
	'w2l_description'      => 'Converts an article to LaTeX and PDF.',
	'w2l_export_title'     => '$1',
	'w2l_export_subtitle'  => 'Export of: $1 with (Wiki2LaTeX)',
	'w2l_export'           => 'Export as ...',
	'w2l_export_textarea'  => '(sorgente)',
	'w2l_export_tex_files' => '(sorgente tex)',
	'w2l_export_pdf'       => 'Compila e scarica PDF!',
	'w2l_export_start'     => 'Start Export',
	'w2l_export_help_text' => 'Se hai bisogno di <strong>aiuto</strong> contatta altri utenti, <a href="index.php/Aiuto:IRC" title="vai alla pagina sulla chat IRC">chat IRC</a>, oppure cerca su <a href="index.php/Aiuto:Indice" title="pagina di Aiuto, indice">Aiuto</a> ', //insert also html code.
	'w2l_export_after_status' => '<h2>Info</h2>
<p>La compilazione in pdf è stata eseguita dall&apos;estensione Wiki2LaTeX ($1).
Se trovi un bug <a href="index.php/Portale_comunità/Contenuti/Elenco_Bug_wiki2latex" title="apri la pagina per la segnalazione dei bug"> segnalalo</a>!</p>',//text inserted after the status log in w2llatexform see w2lCore.
	'w2l_chapter'          => 'chapter',
	'w2l_page'             => 'page',
	'w2l_select_docclass_book' => 'Documentclass Book/scrbook (==heading== gets \chapter{heading})',
	'w2l_select_docclass_report' => 'Documentclass Report/scrreprt (==heading== gets \chapter{heading})',
	'w2l_select_docclass_article' => 'Documentclass Article/scrartcl (==heading== gets \section{heading})',
	'w2l_options' => 'Options',
	'w2l_select_paralist' => 'Paralist',
	'w2l_select_leavenoinclude' => 'Leave NoInclude-blocks in main Article',
	'w2l_select_insertincludeonly' => 'Insert IncludeOnly-blocks in main Article',
	'w2l_select_removetemplates' => 'Remove Template and Parserfunction calls',
	'w2l_select_donotprocesstemplates' => 'Do not process Templates and Parserfunctions (but leave calls in the string)',
	'w2l_select_processtemplates' => 'Process Templates and Parserfunctions',
	'w2l_select_templates_heading' => 'Scegli il formato della pagina...',
	'w2l_select_babel_language' => 'Document Language',
	'w2l_select_template' => 'Dimensione PDF: ',
	'w2l_select_output' => 'Export article...',
	'w2l_select_textarea' => '(sorgente)',
	'w2l_select_texfiles' => '(sorgente tex)',
	'w2l_select_pdf' => 'Compila e scarica il PDF!',
	'w2l_start_export' => 'Start Export',
	'w2l_pdfexport_disabled' => '<p>Sorry, pdf-export is not enabled.</p>',
	'w2l_debug_info' => '<p>Time taken to parse article: $1 seconds. Template-Statistic: $2 Inclusions with $3 Bytes</p>',
	'w2l_result_subtitle' => 'Result of: $1',
	'w2l_result_title' => '$1 (Wiki2LaTeX)',
	'w2l_export_mode' => '<p>Mode: $1</p>',
	'w2l_compile_command' => 'Command: $1',
	'w2l_creating_file_success' => 'Creating file $1 with $2 Bytes '."\n", 
	'w2l_creating_file_error' => 'Error creating file $1'."\n",
	'w2l_temppath' => 'Path: $1',
	'w2l_compile_run' => '== Run #$1 ==',
	'w2l_result_heading' => '<h2>LaTeX-Result</h2>',
	'w2l_result_text' => '<h2>LaTeX-Result</h2>',
	'w2l_result_folder'=> '<table style="width:100%;"><tr><td><big><strong><a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=pdf">$2.pdf</a></strong></big></td><td style="text-align:right;">Additional links: <a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=tex">$2.tex</a>, <a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=log">$2.log</a></td></table>',
	'w2l_result_tex'=> '<big><strong><a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=tex">$2.tex</a></strong></big>',
	'w2l_parser_article_not_existing' => 'Article does not exist: $1',
	'w2l_parser_protocol' => '<p>Error protocol</p>',
	'w2l_parser_no_namespace' => 'Caution: Namespace could not be found: $1.',
	'w2l_delete_success' => 'Files have been removed (click to hide this message)',
	'w2l_delete_error' => 'Files have not been removed. Please delete them manually. (click to hide this message)',
	'w2l_form_delete_link' => 'Delete temporary files',
	'w2l_delete_confirmation' => 'Really delete all files?',
	'w2l_delete_file_confirmation' => 'Really delete file $1?',
	'w2l_latex_failed' => '<p>LaTeX failed to create your file. Most often this error occurs when your LaTeX-Code requests packages which are not part of your LaTeX-Distribution: <a href="$1/extensions/w2l/w2lSendFile.php?fid=$2&fmt=tex">Main.tex</a>, <a href="$1/extensions/w2l/w2lSendFile.php?fid=$2&fmt=log">Main.log</a></p>', 
	'w2l_warning_archive_activated' => '<div style="border:1px solid black; margin:5px 10% 5px 10%;padding:5px;">You have enabled the archive-support of Wiki2LaTeX 0.7. This feature has been removed as of Version 0.8. You can still access your files <a href="$1">here</a>.</div>',
	'w2l_temp_dir_missing' => 'Wiki2LaTeX could not create the temp-dir required in order to create the pdf. Please check that the server has all rights to access your system\'s tmp-dir.',
	'w2l_show_log' => "show log file",
	'w2l_show_parsed' => "show parsed LaTeX-Code",
	'w2l_babel' => 'Preferred Babel Selection',
	'w2l_use_debug' => "Use Wiki2LaTeX in debug mode",
	'prefs-wiki2latex' => 'Wiki2LaTeX',
	'w2l-mathpazo-default' => 'Use Mathpazo by default',
	'w2l-microtype-default' => 'Use Microtype by default',
);
/**
  * @TODO Remove all the link to specific webpages from the source code, create
  * an appropriate class or something suitable to handle this contents. 
  * issues [linksToOutsite] [documentation]
  */
$messages['it'] = array(
	'wiki2latex'           	=> 'Wiki2LaTeX',
//name of the extension with the version
	'wiki2latex_version'		=> 'Wiki2LaTeX('.W2L_VERSION.')',
//$1,$2 are meant to be the start and the end of a tag
	'wiki2latex_version_tag'		=> '$1 Wiki2LaTeX$2('.W2L_VERSION.')',
	'wiki2latexspecialpage'    => 'Wiki2LaTeX',
	'w2l_tab'              => 'Scarica la versione LaTeX/PDF',
	'tooltip-ca-w2l_tab'              => 'Scarica la versione LaTeX/PDF',
	'w2l_description'      => 'Converti un articoli a LaTeX e PDF.',
	'w2l_export_title'     => '$1',
	'w2l_export_subtitle'  => 'Esportazione di: $1 con (Wiki2LaTeX)',
	'w2l_export'           => 'Esporta come ...',
	'w2l_export_textarea'  => '(sorgente)',
	'w2l_export_tex_files' => '(sorgente tex)',
	'w2l_export_pdf'       => 'Compila e scarica PDF!',
	'w2l_export_start'     => 'Inizia esportazione',
	'w2l_export_help_text' => 'Se hai bisogno di <strong>aiuto</strong> contatta altri utenti, <a href="index.php/Aiuto:IRC" title="vai alla pagina sulla chat IRC">chat IRC</a>, oppure cerca su <a href="index.php/Aiuto:Indice" title="pagina di Aiuto, indice">Aiuto</a> ', //insert also html code.
//$1 is the link for bug signaling
//$2,$3 are meant to be the start and the end of a tag
	'w2l_export_after_status' => '<h2>Info</h2>
<p>La compilazione in pdf è stata eseguita dall&apos;estensione $2Wiki2LaTeX$3 ('.W2L_VERSION.').
Se trovi un bug <a href="$1" title="apri la pagina per la segnalazione dei bug"> segnalalo</a>!</p>',//text inserted after the status log in w2llatexform see w2lCore.
	'w2l_chapter'          => 'capitolo',
	'w2l_page'             => 'pagina',
	'w2l_select_docclass_book' => 'Documentclass Book/scrbook (==heading== gets \chapter{heading})',
	'w2l_select_docclass_report' => 'Documentclass Report/scrreprt (==heading== gets \chapter{heading})',
	'w2l_select_docclass_article' => 'Documentclass Article/scrartcl (==heading== gets \section{heading})',
	'w2l_options' => 'Opzioni',
	'w2l_select_paralist' => 'Paralist',
	'w2l_select_leavenoinclude' => 'Lascia NoInclude-blocks nell\'articolo principale',
	'w2l_select_insertincludeonly' => 'Inserisci IncludeOnly-blocks nell\'articolo principale',
	'w2l_select_removetemplates' => 'Remove Template and Parserfunction calls',
	'w2l_select_donotprocesstemplates' => 'Do not process Templates and Parserfunctions (but leave calls in the string)',
	'w2l_select_processtemplates' => 'Process Templates and Parserfunctions',
	'w2l_select_templates_heading' => 'Scegli il formato della pagina...',
	'w2l_select_babel_language' => 'Lingua del documento',
	'w2l_select_template' => 'Formato pagina: ',
	'w2l_select_output' => 'Esporta articolo...',
	'w2l_select_textarea' => '(sorgente)',
	'w2l_select_texfiles' => '(sorgente tex)',
	'w2l_select_pdf' => 'Compila e scarica il PDF!',
	'w2l_start_export' => 'Start Export',
	'w2l_pdfexport_disabled' => '<p>Spiacenti, pdf-export non è abilitato.</p>',
	'w2l_debug_info' => '<p>Time taken to parse article: $1 seconds. Template-Statistic: $2 Inclusions with $3 Bytes</p>',
	'w2l_result_subtitle' => '&Egrave; stato compilato: $1',
	'w2l_result_title' => '$1 (Wiki2LaTeX)',
	'w2l_export_mode' => '<p>Mode: $1</p>',
	'w2l_compile_command' => 'Command: $1',
	'w2l_temppath' => 'Path: $1',
	'w2l_compile_run' => '== Run #$1 ==',
	'w2l_result_heading' => '<h2>Risultato della compilazione</h2>',
	'w2l_result_text' => ' ',//@TODO.. insert text here
	'w2l_result_folder'=> '<div style="padding-left:3%;">
	<p>Scarica il pdf:<br />
		<strong><a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=pdf"> $2.pdf</a></strong>
	</p>
	<p>
		Altri link: <a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=tex">$2.tex</a>, <a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=log">$2.log</a> 
	</p></div>
	<p> Se hai trovato un bug, un errore nel pdf, <a href="index.php/Portale_comunità/Contenuti/Elenco_Bug_wiki2latex" title="apri la pagina per la segnalazione dei bug"> segnalalo</a>!
	</p>',
	'w2l_result_tex'=> '<big><strong><a href="$1/extensions/w2l/w2lSendFile.php?title=$2&fid=$3&fmt=tex">$2.tex</a></strong></big>',
	'w2l_parser_article_not_existing' => 'Article does not exist: $1',
	'w2l_parser_protocol' => '<p>Error protocol</p>',
	'w2l_parser_no_namespace' => 'Caution: Namespace could not be found: $1.',
	'w2l_delete_success' => 'Files have been removed (click to hide this message)',
	'w2l_delete_error' => 'Files have not been removed. Please delete them manually. (click to hide this message)',
	'w2l_form_delete_link' => 'Delete temporary files',
	'w2l_delete_confirmation' => 'Really delete all files?',
	'w2l_delete_file_confirmation' => 'Really delete file $1?',
	'w2l_latex_failed' => '<p>LaTeX failed to create your file. Most often this error occurs when your LaTeX-Code requests packages which are not part of your LaTeX-Distribution: <a href="$1/extensions/w2l/w2lSendFile.php?fid=$2&fmt=tex">Main.tex</a>, <a href="$1/extensions/w2l/w2lSendFile.php?fid=$2&fmt=log">Main.log</a></p>', 
	'w2l_warning_archive_activated' => '<div style="border:1px solid black; margin:5px 10% 5px 10%;padding:5px;">You have enabled the archive-support of Wiki2LaTeX 0.7. This feature has been removed as of Version 0.8. You can still access your files <a href="$1">here</a>.</div>',
	'w2l_temp_dir_missing' => 'Wiki2LaTeX could not create the temp-dir required in order to create the pdf. Please check that the server has all rights to access your system\'s tmp-dir.',
	'w2l_show_log' => "show log file",
	'w2l_show_parsed' => "show parsed LaTeX-Code",
	'w2l_babel' => 'Preferred Babel Selection',
	'w2l_use_debug' => "Use Wiki2LaTeX in debug mode",
	'prefs-wiki2latex' => 'Wiki2LaTeX',
	'w2l-mathpazo-default' => 'Use Mathpazo by default',
	'w2l-microtype-default' => 'Use Microtype by default',
);
