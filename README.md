Wiki2LaTeX - WikiFM mod
=======================

w2l is though to elaborate wiki pages which do not contains LaTeX code. Now, in wikifm.org we use LaTeX code: this generates lots of bugs. Fortunately all LaTeX code is used inside specif tag:
* \begin{equation} <-> \end{equation}
* $$ <-> $$
* <math> <-> </math> (for inline code)
* others??
Our purpose is, simply, to avoid w2l to run on this code and copy and paste it, as it is, in the .tex file.

The idea is to mask LaTeX code before the Parser acts on it, in this way contents will be skipped by the other functions.

Why LaTeX text in a wiki page? Because of MathJax (mediawiki extension).

Notes:
------
- The Namespace LaTeX is undefined, can it be useful? User can define templates.
- The documentation comments are used also to signal relevant parts of code which need corrections.
- FIX $this->addSimpleReplace("...","{\dots}") in w2lParser::initParsing() & w2lPserse::doSpecialChars()

TODO:
-----
- Translate w2l messages in w2lMessages.php, translate in italian and restore english.
- look at code:other things todo are here.


Notes on Parser:
----------------
- maskLatexCommandChars: is str_replace correct??
- maybe the 'insert_includeonly' and 'leave_noinclude' config values should be user defined, now their values are defined in the class itself.
- __FIXED__ HORRIBLE HACK in Wiki2LaTeXParser::doCurlyBraces() fix it.


fixMainBug branch: KNOWN BUG
-----------------------------
- __FIXED__(now an empty space is left bewteen dollars)open and close <math></math> will produce $$, which is interpreted by LaTeX 
- act like other LaTeX code inside a wiki page for \begin{multline} \begin{align}