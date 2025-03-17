<?php
/**
 * Useragent Class
 * @package UserAgent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

namespace UserAgent;

use UserAgent\Detect\Browser;
use UserAgent\Detect\Device;
use UserAgent\Detect\Os;

class UserAgent 
{
    private $_imagePath = "";
    private $_imageSize = 16;
    private $_imageExtension = ".png";

    private $_data = array();

    public function __get($param) 
    {
        $privateParam = '_' . $param;
        switch ($param) {
        case 'imagePath':
            return $this->_imagePath;
            break;
        default:
            if (isset($this->$privateParam)) {
                return $this->$privateParam;
            } elseif (isset($this->_data[$param])) {
                return $this->_data[$param];
            }
            break;
        }

        return null;
    }

    public function __set($name, $value) 
    {
        $trueName = '_' . $name;
        if (isset($this->$trueName)) {
            $this->$trueName = $value;
        }
    }

    public function __construct() 
    {
        $this->_imagePath = '/assets/images/agent/';
    }

    private function _makeImage($dir, $code) 
    {
        return $this->imagePath . $dir . '/' . $code . $this->imageExtension;
    }

    private function _makePlatform() 
    {
        $this->_data['platform'] = &$this->_data['device'];
        if ($this->_data['device']['title'] != '') {
            $this->_data['platform'] = &$this->_data['device'];
        } elseif ($this->_data['os']['title'] != '') {
            $this->_data['platform'] = &$this->_data['os'];
        } else {
            $this->_data['platform'] = array(
                "link" => "#",
                "title" => "Unknown",
                "code" => "null",
                "dir" => "browser",
                "type" => "os",
                "image" => $this->_makeImage('browser', 'null'),
            );
        }
    }

    public function analyze($string) 
    {
        $this->_data['useragent'] = $string;
        
        // 使用新的命名空间类
        $this->_data['device'] = Device::analyze($string);
        $this->_data['os'] = Os::analyze($string);
        $this->_data['browser'] = Browser::analyze($string);
        
        // 为每个组件添加图片
        $this->_data['device']['image'] = $this->_makeImage('device', $this->_data['device']['code']);
        $this->_data['os']['image'] = $this->_makeImage('os', $this->_data['os']['code']);
        $this->_data['browser']['image'] = $this->_makeImage('browser', $this->_data['browser']['code']);

        // platform
        $this->_makePlatform();
    }
}