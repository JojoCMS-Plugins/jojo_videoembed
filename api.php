<?php
/**
 *
 * Copyright 2007 Michael Cochrane <code@gardyneholt.co.nz>
 * Copyright 2010 Tom Dale <code@zero.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Tom Dale <code@zero.co.nz>
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

$_options[] = array(
    'id'          => 'videoembed_responsive',
    'category'    => 'Video',
    'label'       => 'Responsive Video',
    'description' => 'Include FitVids code for scaling video to fit the container width (use css max-width to set a maximum scaling if required)',
    'type'        => 'radio',
    'default'     => 'no',
    'options'     => 'yes,no',
);

Jojo::addFilter('output', 'videoembed', 'jojo_videoembed');
