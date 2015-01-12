<?php

namespace GithubV3\Objects\Contents;

class File {

	protected $name;
	protected $path;
	protected $sha;
	protected $type;
	protected $content;

	public function __construct($name, $path, $sha, $content) {
		$this->name = $name;
		$this->path = $path;
		$this->sha = $sha;
		$this->content = $content;
	}

	public function getName() {
		return $this->name;
	}

	public function getPath() {
		return $this->path;
	}

	public function getSha() {
		return $this->sha;
	}

	public function getContent() {
		return $this->content;
	}

}