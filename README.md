w2l is though to elaborate wiki pages which do not contains LeTeX code. Now, in wikifm.org we use LaTeX code: this generates lots of bugs. Fortunately all LaTeX code is used inside specif tag:
* \begin{equation} <-> \end{equation}
* $$ <-> $$
* <math> <-> </math> (for inline code)
Our purpose is to simply avoid w2l to run on this code and copy and paste it, as it is, in the .tex file.

Notes:
- The Namespace LaTeX is undefined, can it be useful? User can define templates.
- The documentation comments are used also to signal relevant parts of code which need corrections.

TODO:
- Translate w2l messages in w2lMessages.php, translate in italian and restore english.


Notes on Parser:
- maskLatexCommandChars: is str_replace correct??
- maybe the 'insert_includeonly' and 'leave_noinclude' config values should be user defined, now their values are defined in the class itself.
- HORRIBLE HACK in Wiki2LaTeXParser::doCurlyBraces() fix it.