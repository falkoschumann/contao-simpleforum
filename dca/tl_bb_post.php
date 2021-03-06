<?php

/**
 * Bulletin Board for Contao
 *
 * Copyright (c) 2013, Falko Schumann
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 *
 *   Redistributions in binary form must reproduce the above copyright notice, this
 *   list of conditions and the following disclaimer in the documentation and/or
 *   other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @package   BulletinBoard
 * @author    Falko Schumann
 * @license   BSD-2-Clause
 * @copyright Falko Schumann 2013
 */


/**
 * Table tl_bb_post
 */
$GLOBALS['TL_DCA']['tl_bb_post'] = array
(

	// Config
	'config' => array
	(
		'ptable' => 'tl_bb_topic',
		'sql'    => array
		(
			'keys' => array
			(
				'id'  => 'primary',
				'pid' => 'index',
			)
		)
	),

	// Fields
	'fields' => array
	(
		'id'         => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid'        => array
		(
			'sql'        => "int(10) unsigned NOT NULL default '0'",
			'foreignKey' => 'tl_bb_topic.title',
			'relation'   => array(
				'type' => 'belongsTo',
				'load' => 'lazy'
			)
		),
		'tstamp'     => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'poster'     => array
		(
			'sql'        => "int(10) unsigned NOT NULL default '0'",
			'foreignKey' => 'tl_member.username',
			'relation'   => array(
				'type' => 'hasOne',
				'load' => 'eager'
			)
		),
		'posterIp'   => array
		(
			'sql' => "varchar(64) NULL"
		),
		'posterName' => array
		(
			'sql' => "varchar(64) NOT NULL default ''"
		),
		'subject'    => array
		(
			'sql' => "varchar(100) NOT NULL default ''"
		),
		'text'       => array
		(
			'sql' => "mediumtext NULL"
		)
	)
);
