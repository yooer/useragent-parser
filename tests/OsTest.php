<?php

namespace UserAgent\Tests;

use PHPUnit\Framework\TestCase;
use UserAgent\Detect\Os;

class OsTest extends TestCase
{
    public function testWindowsOs()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        
        $result = Os::analyze($ua);
        
        $this->assertEquals('Windows', $result['name']);
        $this->assertEquals('10', $result['version']);
        $this->assertEquals('win-6', $result['code']);
        $this->assertTrue($result['x64']);
    }
    
    public function testMacOs()
    {
        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15';
        
        $result = Os::analyze($ua);
        
        $this->assertEquals('Mac OS X', $result['name']);
        $this->assertEquals('10.15.7', $result['version']);
        $this->assertEquals('mac-3', $result['code']);
    }
    
    public function testLinuxOs()
    {
        $ua = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0';
        
        $result = Os::analyze($ua);
        
        $this->assertEquals('Ubuntu', $result['name']);
        $this->assertEquals('', $result['version']);
        $this->assertEquals('ubuntu-2', $result['code']);
        $this->assertTrue($result['x64']);
    }
}