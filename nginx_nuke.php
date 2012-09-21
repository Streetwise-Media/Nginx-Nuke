<?php

/*
Plugin Name: Nginx Nuke
Plugin URI: http://streetwise-media.com
Description: Programmatically flush nginx cache
Author: Brian Zeligson
Version: 0.1
Author URI: http://brianzeligson.com
*/


class NginxNuke
{
    
    private static $cache_dir =  '/path/to/your/nginx/cache/';
    
    public static function clear($dir=false)
    {
        if (!$dir or !is_dir($dir) or !stristr($dir, self::$cache_dir)) $dir=self::$cache_dir;
        foreach(glob($dir . '/*') as $file)
        {
            if(is_dir($file))
                self::clear($file);
            else
                unlink($file);
        }
        if ($dir !== self::$cache_dir) rmdir($dir);
    }
    
}

$m = array('NginxNuke', 'clear');
$actions = array(
            'publish_page', 'publish_post'
            );
foreach($actions as $action) add_action($action, $m);