<?php
/*
 * File:    w2lKindleTemplate.php
 * Created: 2012-12-24
 * Version: 0.1
 *
 * Purpose:
 * Contains the standard Kindle-Template.
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
/**
 * If no template is defined use this.
 * 
 * There are w2l specific string!
 * ((W2L_REQUIRED_PACKAGES))
 * ((W2L_HEAD))
 * ((W2L_CONTENT))
 */
$tmpl = <<<EOF
==Wiki2LaTeX's Magic Template==
<latexfile name="Main">
\documentclass[{$docClassOptions}]{{$docClass}}
\usepackage[{$paper}]{geometry}
\usepackage[italian]{babel} % Quotes won't work without babel
\usepackage[utf8]{inputenc}  % This is very important!
\usepackage{amssymb}
\usepackage{amsmath}
\usepackage{booktabs}
\usepackage{multirow}
\usepackage{fullpage}
\usepackage{float}
\usepackage{parskip}
\usepackage{listings}
\usepackage{textcomp}
\usepackage{hyperref}

\usepackage[urw-garamond]{mathdesign}

\providecommand{\\norm}[1]{\\left\\lVert#1\\right\\rVert}
\providecommand{\\abs}[1]{\\left\\lvert#1\\right\\rvert}
\providecommand{\\vecb}[1]{\\boldsymbol{#1}}
\providecommand{\\ten}[1]{\\overset{\\Rightarrow}{#1}}
\providecommand{\\tens}[1]{\\underline{\\underline{#1}}}
\providecommand{\\media}[1]{\\left<#1\\right>}
\providecommand{\\ver}[1]{\\vecb{\hat {#1}}}

\\newcommand{\\ud}{\\mathrm{d}}
\\newcommand{\\erf}{\\mathrm{erf}}
\\newcommand{\\const}{\\text{costante}}
\\newcommand{\\riq}{\\boxed}
\\newcommand{\\ve}{\\vecb}
\\newcommand{\\clearemptydoublepage}{\\newpage{\\pagestyle{empty}\\cleardoublepage}}
\\newcommand{\\giorgi}{4\\pi\\varepsilon_0}
\\newcommand{\\e}{\\vathrm{e}}
\\newcommand{\\field}[1]{\\mathbb{#1}}

\\newcommand{\\executeiffilenewer}[3]{%
\\ifnum\\pdfstrcmp{\\pdffilemoddate{#1}}%
{\\pdffilemoddate{#2}}>0%
{\\immediate\\write18{#3}}\\fi%
}

\\newcommand{\\includesvg}[1]{%
\\executeiffilenewer{#1.svg}{#1.pdf}%
{inkscape -z -D --file='#1'.svg %
--export-pdf='#1'.pdf}%
\\includegraphics{#1.pdf}%
}


((W2L_REQUIRED_PACKAGES))

((W2L_HEAD))

\\begin{document}
\\section*{WikiFM -- Don't panic}
Documento scaricato da WikiFM, il wiki dove la scienza diventa libera, e patrimonio di tutti. Tutti i contenuti su WikiFM, incluso questo documento, sono rilasciati sotto licenza libera GNU GPL e CC-BY-SA.
Guarda http://www.wikifm.org per maggiori informazioni, per ottenere il sorgente di questo documento, o per trovare altro materiale libero.

WikiFM -- Libera Scienza.

\\tableofcontents

\\section*{}

((W2L_CONTENT))


\\end{document}
</latexfile>
EOF;
