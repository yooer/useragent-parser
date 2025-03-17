# UserAgent Parser

A PHP library for parsing and detecting user agent strings to identify browsers, operating systems, and devices.

## Features

- Detects browser type and version
- Identifies device type and brand
- Detects operating system and version
- Supports mobile device detection
- Compatible with most mainstream browsers and operating systems

## Installation

Using Composer:

```bash
composer require yooer/useragent-parser
```

## Usage

Basic usage:

```php
<?php
require 'vendor/autoload.php';

use UserAgent\Parser;

// Get current user agent string
$userAgentString = $_SERVER['HTTP_USER_AGENT'];

// Parse the user agent
$ua = Parser::analyze($userAgentString);

// Get browser information
echo "Browser: " . $ua->browser['name'] . " " . $ua->browser['version'] . "\n";

// Get OS information
echo "OS: " . $ua->os['name'] . " " . $ua->os['version'] . "\n";

// Get device information
echo "Device: " . $ua->device['title'] . "\n";
```

For more advanced usage, see the example files in the examples directory.

## License

This project is licensed under the GNU GPL v3 License - see the LICENSE file for details.
