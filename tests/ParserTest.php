<?php

namespace UserAgent\Tests;

use PHPUnit\Framework\TestCase;
use UserAgent\Parser;

class ParserTest extends TestCase
{
    public function testParserWithChrome()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        
        $result = Parser::analyze($ua);
        
        $this->assertEquals($ua, $result->useragent);
        $this->assertEquals('Google Chrome', $result->browser['name']);
        $this->assertEquals('Windows', $result->os['name']);
        $this->assertEquals('10', $result->os['version']);
        $this->assertEquals('', $result->device['title']);
    }
    
    public function testParserWithMobile()
    {
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Mobile/15E148 Safari/604.1';
        
        $result = Parser::analyze($ua);
        
        $this->assertEquals($ua, $result->useragent);
        $this->assertEquals('Safari', $result->browser['name']);
        $this->assertEquals('iOS', $result->os['name']);
        $this->assertEquals('14.6', $result->os['version']);
        $this->assertEquals('Apple iPhone', $result->device['title']);
    }
    
    public function testImageSizeCustomization()
    {
        $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        
        $result = Parser::analyze($ua, 24, '/custom/path/', '.gif');
        
        $this->assertEquals(24, $result->imageSize);
        $this->assertEquals('/custom/path/', $result->imagePath);
        $this->assertEquals('.gif', $result->imageExtension);
    }
}