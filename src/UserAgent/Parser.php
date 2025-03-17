<?php
/**
 * Useragent Class
 * @package UserAgent
 * @author yooer <myooer@gmail.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

namespace UserAgent;

use UserAgent\UserAgent;

class Parser 
{
    /**
     * analyze
     * @static
     * @param  string $string         UserAgent String]
     * @param  string $imageSize      Image Size(16 / 24)
     * @param  string $imagePath      Image Path
     * @param  string $imageExtension Image Description
     * @return UserAgent
     */
    public static function analyze($string, $imageSize = null, $imagePath = null, $imageExtension = null) 
    {
        $class = new UserAgent();
        $imageSize === null || $class->imageSize = $imageSize;
        $imagePath === null || $class->imagePath = $imagePath;
        $imageExtension === null || $class->imageExtension = $imageExtension;
        $class->analyze($string);

        return $class;
    }
}