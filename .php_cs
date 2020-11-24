<?php

declare(strict_types=1);

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
        __DIR__.'/src',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => [
            'return', 'throw', 'try', 'exit', 'if', 'switch', 'yield'
        ],
    ],
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => true,
    'ordered_imports' => [
        'sort_algorithm' => 'alpha',
        'imports_order' => [
            'const',
            'class',
            'function',
        ],
    ],
    'phpdoc_scalar' => true,
    'phpdoc_to_comment' => true,
    'return_type_declaration' => true,
    'single_blank_line_before_namespace' => true,
    'ternary_operator_spaces' => true,
    'trim_array_spaces' => true,

    // Strict rules
    'declare_strict_types' => true,
    'fully_qualified_strict_types' => true,
    'strict_comparison' => true,
    'strict_param' => true,
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.php_cs.cache');
