<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package BulletinBoard
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Muspellheim\BulletinBoard',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Muspellheim\BulletinBoard\BulletinBoard'       => 'system/modules/bulletin_board/classes/BulletinBoard.php',
	'Muspellheim\BulletinBoard\BreadcrumbParser'    => 'system/modules/bulletin_board/classes/BreadcrumbParser.php',
	'Muspellheim\BulletinBoard\ForumListParser'     => 'system/modules/bulletin_board/classes/ForumListParser.php',
	'Muspellheim\BulletinBoard\ViewForumParser'     => 'system/modules/bulletin_board/classes/ViewForumParser.php',
	'Muspellheim\BulletinBoard\TopicParser'         => 'system/modules/bulletin_board/classes/TopicParser.php',
	'Muspellheim\BulletinBoard\NewTopicParser'      => 'system/modules/bulletin_board/classes/NewTopicParser.php',

	// Models
	'Muspellheim\BulletinBoard\ForumModel'          => 'system/modules/bulletin_board/models/ForumModel.php',
	'Muspellheim\BulletinBoard\PostModel'           => 'system/modules/bulletin_board/models/PostModel.php',
	'Muspellheim\BulletinBoard\TopicModel'          => 'system/modules/bulletin_board/models/TopicModel.php',

	// Modules
	'Muspellheim\BulletinBoard\ModuleBulletinBoard' => 'system/modules/bulletin_board/modules/ModuleBulletinBoard.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_bulletin_board' => 'system/modules/bulletin_board/templates/modules',
	'bb_forumlist'       => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_viewforum'       => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_board'           => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_board_category'  => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_board_forum'     => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_breadcrumb'      => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_forum'           => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_forum_subforum'  => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_forum_topic'     => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_topic'           => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_topic_new'       => 'system/modules/bulletin_board/templates/bulletin_board',
	'bb_topic_post'      => 'system/modules/bulletin_board/templates/bulletin_board',
));
