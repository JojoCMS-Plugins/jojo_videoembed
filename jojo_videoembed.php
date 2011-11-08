<?php
/**
 *
 * Copyright 2007 Michael Cochrane <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

class Jojo_Plugin_jojo_videoembed extends Jojo_Plugin
{
    public static function videoembed($content)
    {
        if (strpos($content, '[[youtube:') === false && strpos($content, '[[videoembed:') === false) {
            return $content;
        }
        global $smarty;
        $smarty->assign('videow', Jojo::getOption('videoembed_width', 425));
        $smarty->assign('videoh', Jojo::getOption('videoembed_height', 350));

        /* Find all video filter tags */
        preg_match_all('/\[\[[a-z]+: ?([^\]]*)\]\]/', $content, $matches);

        foreach($matches[1] as $k => $url) {
            $smarty->assign('videourl', $url);
            if (strpos($url, ':dim')) {
                $url = explode(':dim', $url);
                $dim = explode('x', $url[1]);
                $smarty->assign('videow', $dim[0]);
                $smarty->assign('videoh', $dim[1]);
                $url = $url[0];
            }
            $video = false;
            if (strpos($url, 'youtube')) {
                if (!strpos($url, 'user')) {
                    preg_match('~v=([^\/&]+)~', $url, $id);
                    if (!$id) { 
                        preg_match('~/v/([^\/&]+)~', $url, $id);
                    }
                    if ($id) {
                    $smarty->assign('youtubeid', $id[1]);
                    }
                    $video = true;
                } else {
                    $id = array_pop(explode('/', $url));
                    $smarty->assign('youtubeid', $id);
                    $video = true;                
                }
            }
            if (strpos($url, 'vimeo')) {
                preg_match('~com\/([^\/]+)~', $url, $id);
                $video = true;
                $smarty->assign('vimeoid', $id[1]);
            }
            if ($video) {
                /* Get the embed html */
                $html = $smarty->fetch('jojo_videoembed.tpl');
                $content = str_replace($matches[0][$k], $html, $content);
            }
        }

        return $content;
    }
}