<?php
/**
 * Detailed Information Example
 * 
 * This example shows how to get more detailed UA information and output in HTML format
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use UserAgent\Parser;

// If accessed through a browser, use current browser's UA
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';

// Parse the user agent
$ua = Parser::analyze($userAgent, 24); // Use larger icons (24px)

// HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserAgent Parser Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #444;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        h2 {
            color: #666;
            margin-top: 20px;
        }
        .info-section {
            margin-bottom: 30px;
            background: #fff;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 100px;
            flex-shrink: 0;
        }
        .info-value {
            flex-grow: 1;
        }
        .user-agent {
            font-family: monospace;
            background: #eee;
            padding: 10px;
            border-radius: 4px;
            overflow-wrap: break-word;
            margin-bottom: 20px;
        }
        .icon {
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>UserAgent Parser Demo</h1>
        
        <div class="user-agent">
            <?php echo htmlspecialchars($ua->useragent); ?>
        </div>
        
        <div class="info-section">
            <h2>
                <img src="<?php echo $ua->browser['image']; ?>" alt="Browser" class="icon">
                Browser Information
            </h2>
            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value"><?php echo $ua->browser['name']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Version:</div>
                <div class="info-value"><?php echo $ua->browser['version']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Link:</div>
                <div class="info-value"><a href="<?php echo $ua->browser['link']; ?>" target="_blank"><?php echo $ua->browser['link']; ?></a></div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>
                <img src="<?php echo $ua->os['image']; ?>" alt="OS" class="icon">
                Operating System Information
            </h2>
            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value"><?php echo $ua->os['name']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Version:</div>
                <div class="info-value"><?php echo $ua->os['version']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">64bit:</div>
                <div class="info-value"><?php echo ($ua->os['x64'] ? 'Yes' : 'No'); ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Link:</div>
                <div class="info-value"><a href="<?php echo $ua->os['link']; ?>" target="_blank"><?php echo $ua->os['link']; ?></a></div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>
                <img src="<?php echo $ua->device['image']; ?>" alt="Device" class="icon">
                Device Information
            </h2>
            <div class="info-row">
                <div class="info-label">Title:</div>
                <div class="info-value"><?php echo $ua->device['title']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Brand:</div>
                <div class="info-value"><?php echo $ua->device['brand']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Model:</div>
                <div class="info-value"><?php echo $ua->device['model']; ?></div>
            </div>
            <?php if ($ua->device['link']): ?>
            <div class="info-row">
                <div class="info-label">Link:</div>
                <div class="info-value"><a href="<?php echo $ua->device['link']; ?>" target="_blank"><?php echo $ua->device['link']; ?></a></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>