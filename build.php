<?php
function template(string $csp) {
    return implode("\n\n", [
        '<meta http-equiv="Content-Security-Policy" content="' . htmlspecialchars($csp) . '">',
        file_get_contents('template.html'),
        '<hr><strong>Policy:</strong><br><code>' . htmlspecialchars($csp) . '</code>',
    ]);
}

function load(string $file) {
    ob_start();
    require $file;
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

// Clear old build
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/dist', FilesystemIterator::SKIP_DOTS)) as $file) {
    unlink($file);
}

// Build site
foreach (scandir(__DIR__ . '/build/examples') as $example) {
    if (substr($example, -4) !== '.txt') continue;

    file_put_contents(
        __DIR__ . '/dist/' . substr($example, 0, -4) . '.html',
        template(file_get_contents(__DIR__ . '/build/examples/' . $example))
    );
}
file_put_contents(__DIR__ . '/index.html', load(__DIR__ . '/build/index.php'));