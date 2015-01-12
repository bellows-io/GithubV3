<?php

namespace GithubV3\Objects\Contents;

use \GithubV3\Connection;

class FolderGhost extends Folder {

	protected $connection;
	protected $folder;

	protected $owner;
	protected $repo;
	protected $ref;
	protected $sha;

	public function __construct($owner, $repo, $path, $ref, Connection $connection) {
		$paths = explode("/", $path);

		$this->name = end($paths);
		$this->path = $path;
		$this->sha = $sha;
		$this->owner = $owner;
		$this->repo = $repo;
		$this->ref = $ref;

		$this->connection = $connection;
	}

	public function getSha() {
		return $this->sha;
	}

	protected function lazyLoadContents() {
		if (is_null($this->folder)) {
			$this->folder = $this->connection->getContents($this->owner, $this->repo, $this->path, $this->ref);
		}
		return $this->folder;
	}

	public function getContents() {
		return $this->lazyLoadContents()->getContents();
	}

}