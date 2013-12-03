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

namespace Muspellheim\BulletinBoard;

/**
 * Class ModuleBulletinBoard render the bulletin board as frontend module.
 *
 * @copyright  Falko Schumann 2013
 * @author     Falko Schumann
 * @package    BulletinBoard
 */
class ModuleBulletinBoard extends \Module
{

	/**
	 * @var string
	 */
	protected $strTemplate = 'mod_bulletin_board';


	/**
	 * @var int|string
	 */
	private $forum;


	/**
	 * @var int|string
	 */
	private $topic;


	/**
	 * @see Module::generate()
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			return $this->displayWildcard();
		}

		if (isset($_GET['items']))
		{
			$this->forum = \Input::get('items');
		}
		else if ($GLOBALS['TL_CONFIG']['useAutoItem'] && isset($_GET['auto_item']))
		{
			$this->forum = \Input::get('auto_item');
		}

		$this->topic = \Input::get('topic');

		return parent::generate();
	}


	/**
	 * @return string
	 */
	private function displayWildcard()
	{
		$objTemplate = new \BackendTemplate('be_wildcard');
		$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['bulletin_board'][0]) . ' ###';
		$objTemplate->title = $this->headline;
		$objTemplate->id = $this->id;
		$objTemplate->link = $this->name;
		$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
		return $objTemplate->parse();
	}


	/**
	 * @see Module::compile()
	 */
	protected function compile()
	{
		$parser = new BreadcrumbParser($this->forum);
		$this->Template->breadcrumb = $parser->parseBreadcrumb();
		if ($this->topic)
		{
			$parser = new TopicParser($this->topic);
			$this->Template->content = $parser->parseTopic();
		}
		else if ($this->forum)
		{
			$parser = new ForumParser($this->forum);
			$this->Template->content = $parser->parseForum();
		}
		else
		{
			$parser = new BoardParser();
			$this->Template->content = $parser->parseBoard();
		}
	}
}
