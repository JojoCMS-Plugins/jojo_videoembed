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

$_options[] = array(
    'id'          => 'videoembed_width',
    'category'    => 'Video',
    'label'       => 'video Width',
    'description' => 'Pixel width for the video',
    'type'        => 'text',
    'options'     => '',
    'default'     => Jojo::getOption('youtube_width', 425),
    'plugin'      => 'jojo_videoembed'
);

$_options[] = array(
    'id'          => 'videoembed_height',
    'category'    => 'Video',
    'label'       => 'video Height',
    'description' => 'Pixel height for the video',
    'type'        => 'text',
    'options'     => '',
    'default'     => Jojo::getOption('youtube_height', 350),
    'plugin'      => 'jojo_videoembed'
);

Jojo::addFilter('output', 'videoembed', 'jojo_videoembed');