<?php
namespace SyntaxHighlighter;

use Tokenizer\Tokenizer;

class SyntaxHighlighter
{
    private $fileSyntax = __DIR__ . '/../languages/php_lang.php';
    private $fileSyntaxStyle = __DIR__ . '/../styles/default.css';
    private $filePath = __FILE__;
    private $selectedLine = 0;
    private $lineNumber = 1;

    public function setFilePath($path)
    {
        $this->filePath = $path;
    }

    public function setFileSytle($path)
    {
        $this->fileSyntaxStyle = $path;
    }

    public function setFileSyntax($path)
    {
        $this->fileSyntax = $path;
    }

    public function selectLine($line)
    {
        $this->selectedLine = $line;
    }

    public function generate($options = [])
    {
        $tokenizer = new Tokenizer($this->filePath, $this->fileSyntax);
        $tokens = $tokenizer->getAllTokens();
        $html = $this->asHtml($tokens);

        if (!$options['no-style'])
        {
            $html = $this->loadStyle($this->fileSyntaxStyle) . $html;
        }
        return $html;
    }

    public function loadStyle($path)
    {
        $html .= '<style>';
        $html .= \file_get_contents($path);
        $html .= '</style>';
        return $html;
    }

    public function asHtml($tokens)
    {
        $html = '<div class="syntax-highlighter"><table>';
        $html .= $this->lineStart($this->lineNumber++);
        foreach($tokens as $token) {
            $valuesPerLine = explode("\n", $token->value);
            $html .= $this->createLine($valuesPerLine, $token->type);
        }
        $html .= $this->lineEnd();
        $html .= '</table></div>';
        return $html;
    }

    private function createLine($values, $class)
    {
        $html = $this->lineContent($values[0], $class);

        array_shift($values);
        foreach($values as $value) {
            $html .= $this->lineEnd();
            $html .= $this->lineStart($this->lineNumber++);
            $html .= $this->lineContent($value, $class);
        }
        return $html;
    }

    public function lineContent($value, $class)
    {
        return '<span class="' . $class . '" >' . \htmlentities($value) . '</span>';
    }

    public function lineStart($lineNumber)
    {
        if ($lineNumber == $this->selectedLine) {
            $html = '<tr class="selected-line">';
        } else {
            $html = '<tr>';
        }
        $html .= '<td class="line-number">' . $lineNumber . '</td>';
        $html .= '<td class="code">';
        return $html;
    }

    public function lineEnd()
    {
        $html = '</td>';
        $html .= '</tr>';
        return $html;
    }

    public function asTerminal($tokes)
    {

    }
}
