Wiki2LaTeX - WikiFM mod
=======================

w2l is thought to elaborate wiki pages which do not contain LaTeX code. Now, in wikifm.org we use LaTeX code: this generates lots of bugs. Fortunately all LaTeX code is used inside specific tags:
* \begin{equation} <-> \end{equation}
* $$ <-> $$
* &lt;math&gt; <-> &lt;/math&gt; (for inline code)
* others??

Our purpose is, simply, to avoid w2l to run on this code and copy and paste it, as it is, in the .tex file.

The idea is to mask LaTeX code before the Parser acts on it, in this way contents will be skipped by the other functions.

Why LaTeX text in a wiki page? Because of MathJax (mediawiki extension).

Notes:
------
- The Namespace LaTeX is undefined, can it be useful? User can define templates.
- The documentation comments are used also to signal relevant parts of code which need corrections.


TODO:
-----
- As for $$ and the equation environ handle the environs _align_, _multiline_, _gather_.
- Translate w2l messages in w2lMessages.php, translate in italian and restore english.
- look at code:other things @todo are here.
- Mediawiki TOC is simply ignored by w2l, what to do?
- Check links.
- FIX $this->addSimpleReplace("...","{\dots}") in w2lParser::initParsing() & w2lPserse::doSpecialChars()

BUGS:
----
- __FIXED__ verbatim before heading makes heading recognition fails. (preProcessing removed extra \n)

Notes on Parser:
----------------
- maskLatexCommandChars: is str_replace correct??
- maybe the 'insert_includeonly' and 'leave_noinclude' config values should be user defined, now their values are defined in the class itself.
- __FIXED__ HORRIBLE HACK in Wiki2LaTeXParser::doCurlyBraces() fix it.
- If you want to handle noinclude, includeonly, onlyinclude give a look at w2lParser::preprocessString();

fixMainBug branch (NOW CLOSED): KNOWN BUG
-----------------------------
- __FIXED__(now an empty space is left bewteen dollars)open and close <math></math> will produce $$, which is interpreted by LaTeX 
- __FIXED__ LaTeX code in transcluded page is handled correctly.
- act like other LaTeX code inside a wiki page for \begin{multline} \begin{align}