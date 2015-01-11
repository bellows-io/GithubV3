<?php

namespace GithubV3\Objects;

use GithubV3\Connection;

class CommitGhost extends Commit {

	protected $commit;
	protected $owner;
	protected $repo;
	protected $connection;

	public function __construct($owner, $repo, $sha, Connection $connection) {
		$this->sha = $sha;
		$this->owner = $owner;
		$this->repo = $repo;
		$this->connection = $connection;
	}

	protected function lazyLoadCommit($force = true) {
		if ($force || is_null($this->commit)) {
			$this->commit = $this->connection->getCommit($this->owner, $this->repo, $this->sha);
		}
		return $this->commit;
	}


	public function getDate() {
		return $this->lazyLoadCommit()->getDate();
	}

	public function getMessage() {
		return $this->lazyLoadCommit()->getMessage();
	}

	public function getAuthorName() {
		return $this->lazyLoadCommit()->getAuthorName();
	}

	public function getAuthorEmail() {
		return $this->lazyLoadCommit()->getAuthorEmail();
	}

	public function getCommitterEmail() {
		return $this->lazyLoadCommit()->getCommitterEmail();
	}

	public function getCommitterName() {
		return $this->lazyLoadCommit()->getCommitterName();
	}

	public function getCommentCount() {
		return $this->lazyLoadCommit()->getCommentCount();
	}

}