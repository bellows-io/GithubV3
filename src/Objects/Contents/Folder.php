<?php

namespace GithubV3\Objects\Contents;

class Folder {

	protected $name;
	protected $path;
	protected $type;
	protected $contents;

	public function __construct($name, $path, array $contents) {
		$this->name = $name;
		$this->path = $path;
		$this->contents = $contents;
	}

	public function getName() {
		return $this->name;
	}

	public function getPath() {
		return $this->path;
	}

	public function getContents() {
		return $this->contents;
	}

}