<?php
// Include WordPress configuration to get the secret
require_once('../wp-config.php');

// Verify webhook secret using the constant from wp-config.php
if (!defined('GITHUB_WEBHOOK_SECRET')) {
    http_response_code(500);
    exit('Webhook secret not configured');
}

// Get payload and signature
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

// Verify signature using the constant
$expected_signature = 'sha256=' . hash_hmac('sha256', $payload, GITHUB_WEBHOOK_SECRET);
if (!hash_equals($expected_signature, $signature)) {
    http_response_code(403);
    exit('Invalid signature');
}

// Log the webhook request for debugging
error_log('GitHub Webhook received: ' . date('Y-m-d H:i:s'));
error_log('Payload: ' . $payload);

// Decode payload
$data = json_decode($payload, true);
if (!$data) {
    http_response_code(400);
    exit('Invalid payload');
}

// Only process push events to master branch
$branch = str_replace('refs/heads/', '', $data['ref'] ?? '');
if ($data['ref'] !== 'refs/heads/master') {
    http_response_code(200);
    exit('Ignored: not master branch');
}

// Pull the latest changes
$output = [];
$return_var = 0;

// Log the current directory
error_log('Current directory: ' . __DIR__);

// Execute git pull
exec('cd ' . __DIR__ . ' && git pull origin ' . escapeshellarg($branch) . ' 2>&1', $output, $return_var);

// Log the git pull output
error_log('Git pull output: ' . implode("\n", $output));

if ($return_var !== 0) {
    http_response_code(500);
    error_log('Git pull failed: ' . implode("\n", $output));
    exit('Git pull failed: ' . implode("\n", $output));
}

http_response_code(200);
echo 'Successfully updated documentation';
error_log('Documentation update successful');
?> 