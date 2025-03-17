<?php

namespace UserAgent\Tests;

use PHPUnit\Framework\TestCase;
use UserAgent\Detect\Device;

class DeviceTest extends TestCase
{
    public function testIPhoneDevice()
    {
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Mobile/15E148 Safari/604.1';
        
        $result = Device::analyze($ua);
        
        $this->assertEquals('Apple iPhone', $result['title']);
        $this->assertEquals('Apple', $result['brand']);
        $this->assertEquals('iPhone', $result['model']);
        $this->assertEquals('iphone', $result['code']);
    }
    
    public function testSamsungDevice()
    {
        $ua = 'Mozilla/5.0 (Linux; Android 11; SM-G998B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36';
        
        $result = Device::analyze($ua);
        
        $this->assertEquals('Samsung G998B', $result['title']);
        $this->assertEquals('Samsung', $result['brand']);
        $this->assertEquals('G998B', $result['model']);
        $this->assertEquals('samsung', $result['code']);
    }
    
    public function testDesktopDevice()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        
        $result = Device::analyze($ua);
        
        $this->assertEquals('', $result['title']);
        $this->assertEquals('', $result['brand']);
        $this->assertEquals('', $result['model']);
        $this->assertEquals('null', $result['code']);
    }
}