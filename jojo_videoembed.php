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
            if (strpos($url, 'youtube')) {
                preg_match('~\?v=([^\/&]+)~', $url, $id);
                $smarty->assign('youtubeid', $id[1]);
            }
            if (strpos($url, 'vimeo')) {
                preg_match('~com\/([^\/]+)~', $url, $id);
                $smarty->assign('vimeoid', $id[1]);
            }
            /* Get the embed html */
            $html = $smarty->fetch('jojo_videoembed.tpl');
            $content = str_replace($matches[0][$k], $html, $content);
        }

        return $content;
    }

}