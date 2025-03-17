<?php
/**
 * Basic Detection Example
 * 
 * This example demonstrates the basic usage of UserAgent Parser
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use UserAgent\Parser;

// If accessed through a browser, use current browser's UA
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';

// Parse the user agent
$ua = Parser::analyze($userAgent);

// Print information
echo "User Agent: " . $ua->useragent . PHP_EOL . PHP_EOL;

echo "Browser Information:" . PHP_EOL;
echo "Name: " . $ua->browser['name'] . PHP_EOL;
echo "Version: " . $ua->browser['version'] . PHP_EOL;
echo "Code: " . $ua->browser['code'] . PHP_EOL;
echo "Link: " . $ua->browser['link'] . PHP_EOL . PHP_EOL;

echo "Operating System Information:" . PHP_EOL;
echo "Name: " . $ua->os['name'] . PHP_EOL;
echo "Version: " . $ua->os['version'] . PHP_EOL;
echo "Code: " . $ua->os['code'] . PHP_EOL;
echo "Link: " . $ua->os['link'] . PHP_EOL;
echo "64bit: " . ($ua->os['x64'] ? 'Yes' : 'No') . PHP_EOL . PHP_EOL;

echo "Device Information:" . PHP_EOL;
echo "Title: " . $ua->device['title'] . PHP_EOL;
echo "Brand: " . $ua->device['brand'] . PHP_EOL;
echo "Model: " . $ua->device['model'] . PHP_EOL;
echo "Code: " . $ua->device['code'] . PHP_EOL;
echo "Link: " . $ua->device['link'] . PHP_EOL . PHP_EOL;

echo "Platform: " . $ua->platform['title'] . PHP_EOL;