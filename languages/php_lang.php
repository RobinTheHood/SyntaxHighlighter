<?php
return [
    'default' => [
        [
            'name' => 'T_KEYWORD',
            'regex' => '(?i)(?:__halt_compiler|abstract|and|array|as|break|callable|case|catch|clone|const|continue|declare|default|die|do|echo|else|elseif|empty|enddeclare|endfor|endforeach|endif|endswitch|endwhile|eval|exit|extends|final|finally|for|foreach|function|global|goto|if|implements|include|include_once|instanceof|insteadof|interface|isset|list|namespace|or|print|private|protected|public|require|require_once|return|static|switch|throw|trait|try|unset|use|var|while|xor|yield)'
        ],
        [
            'name' => 'T_KEYWORD',
            'regex' => '(?i)new',
            'context' => 'class-name'
        ],
        [
            'name' => 'T_KEYWORD',
            'regex' => '(?i)class',
            'context' => 'class-name'
        ],
        [
            'name' => 'T_VARIABLE',
            'regex' => '\$[_a-zA-Z][_a-zA-Z0-9]*'
        ],
        [
             'name' => 'T_IDENT',
             'regex' => '[_a-zA-Z][_a-zA-Z0-9]*'
        ],
        [
            'name' => 'T_REF',
            'regex' => '->',
            'context' => 'ref'
        ],
        [
            'name' => 'T_STRING',
            'regex' => "'",
            'context' => 'string1'
        ],
        [
            'name' => 'T_STRING',
            'regex' => '"',
            'context' => 'string2'
        ],
        [
            'name' => 'T_COMMENT',
            'regex' => '\/\/.*',
        ],
        [
            'name' => 'T_COMMENT',
            'regex' => '\/\*',
            'context' => 'comment'
        ],
        [
            'name' => 'T_NUMBER',
            'regex' => '(?:0x)?[\da-f]+'
        ]
    ],

    'class-name' => [
        [
            'name' => 'T_CLASSNAME',
            'regex' => '[_a-zA-Z][_a-zA-Z0-9]*',
            'context' => '_back'
        ],
    ],

    'ref' => [
        [
            'name' => 'T_FUNCTION_CALL',
            'regex' => '[_a-zA-Z][_a-zA-Z0-9]*(?=\s*\(.*\))',
            'context' => '_back'
        ],
        [
             'name' => 'T_REF_VARIABLE',
             'regex' => '[_a-zA-Z][_a-zA-Z0-9]*',
             'context' => '_back'
        ],
    ],

    'comment' => [
        [
            'name' => 'T_COMMENT',
            'regex' => '\*\/',
            'context' => '_back'
        ],
        [
            'name' => 'T_COMMENT',
            'regex' => '.*(?=\\*\\/)|.*',
        ]
    ],

    'string1' => [
        [
            'name' => 'T_STRING',
            'regex' => "'",
            'context' => '_back'
        ],
        [
            'name' => 'T_STRING_ESCAPE',
            'regex' => '\\\\',
            'context' => 'string-escape'
        ],
        [
            'name' => 'T_STRING',
            'regex' => '[^\\\|^\']*',
        ]
    ],

    'string2' => [
        [
            'name' => 'T_STRING',
            'regex' => '"',
            'context' => '_back'
        ],
        [
            'name' => 'T_STRING_ESCAPE',
            'regex' => '\\\\',
            'context' => 'string-escape'
        ],
        [
            'name' => 'T_STRING',
            'regex' => '[^\\\|^"]*',
        ]
    ],

    'string-escape' => [
        [
            'name' => 'T_STRING_ESCAPE',
            'regex' => ".",
            'context' => '_back'
        ]
    ]
];
