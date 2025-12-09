<?php

/*
 * WARNING!
 *
 * Do not use this index.php as an entry point on production.
 *
 * Instead, set your website document root to /dist directory.
 *
 */

// --- Custom Favicon and HTML Head Injection ---
// This block forces the browser to load the custom favicon before
// the FileGator application is initialized.
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tekkura Web Panel - File Manager</title>
    <!-- FORCED CUSTOM FAVICON PATH (This is the fix) -->
    <link rel="icon" type="image/png" href="/images/custom/favicon.png">
    <link rel="shortcut icon" href="/images/custom/favicon.ico">
</head>
<body>';
// --- END Injection ---

define('APP_ENV', 'development');
define('APP_PUBLIC_PATH', 'dist/');

// This requires the core application, which will now render its content
// inside the <body> tag we just opened.
require __DIR__.'/dist/index.php'; 

// --- HTML Closing Tags ---
// We must close the tags that we manually opened above.
echo '</body></html>';
// --- END Closing Tags ---
