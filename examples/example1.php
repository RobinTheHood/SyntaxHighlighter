<?php
require_once '../vendor/autoload.php';
use SyntaxHighlighter\SyntaxHighlighter;

$syntaxHl = new SyntaxHighlighter();
echo $syntaxHl->generate();
