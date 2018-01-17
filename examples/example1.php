<?php
require_once '../vendor/autoload.php';
use RobinTheHood\SyntaxHighlighter\SyntaxHighlighter;

$syntaxHl = new SyntaxHighlighter();
echo $syntaxHl->generate();
