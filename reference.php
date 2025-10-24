<?php

use JulienBoudry\PhpReference\Definition\HasTagApi;
use JulienBoudry\PhpReference\Definition\IsPubliclyAccessible;

return [
    // The namespace for which to generate documentation
    'namespace' => 'CondorcetPHP\Condorcet',

    // Output directory for the generated documentation
    'output' => __DIR__ . '/docs/api-reference',

    // Index File name
    'index-file-name' => 'index',

    // Do not clean the output directory before generation
    'append' => false,

    // Never prompt for user interaction (e.g., yes/no prompts), especially if the output directory is not empty
    'no-interaction' => true,

    // Public API definition - can be:
    // - An instance of a class implementing PublicApiDefinitionInterface
    // - A string corresponding to a registered definition ('api', 'public')
    'api' => new HasTagApi(), // or 'api' as a string
];