<?php
$urls = [
    '/', '/about', '/services', '/projects', '/projects/clicksoftware-erp',
    '/blog', '/contact', '/request-quote', '/privacy-policy', '/terms',
];
$base = 'http://127.0.0.1:8780';
foreach ($urls as $u) {
    $ctx = stream_context_create(['http'=>['timeout'=>15,'ignore_errors'=>true]]);
    $body = @file_get_contents($base.$u, false, $ctx);
    $status = 'FAIL';
    if (isset($http_response_header[0])) $status = $http_response_header[0];
    $len = $body===false ? 0 : strlen($body);
    printf("%-30s  %s  bytes=%d\n", $u, $status, $len);
}
