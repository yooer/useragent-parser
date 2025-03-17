<?php

namespace UserAgent\Tests;

use PHPUnit\Framework\TestCase;
use UserAgent\Detect\Browser;

class BrowserTest extends TestCase
{
    public function testChromeBrowser()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        
        $result = Browser::analyze($ua);
        
        $this->assertEquals('Google Chrome', $result['name']);
        $this->assertEquals('91.0.4472.124', $result['version']);
        $this->assertEquals('chrome', $result['code']);
    }
    
    public function testFirefoxBrowser()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0';
        
        $result = Browser::analyze($ua);
        
        $this->assertEquals('Firefox', $result['name']);
        $this->assertEquals('89.0', $result['version']);
        $this->assertEquals('firefox', $result['code']);
    }
    
    public function testSafariBrowser()
    {
        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15';
        
        $result = Browser::analyze($ua);
        
        $this->assertEquals('Safari', $result['name']);
        $this->assertEquals('14.1.1', $result['version']);
        $this->assertEquals('safari', $result['code']);
    }
}