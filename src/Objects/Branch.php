<?php

namespace GithubV3\Objects;

class Branch {

	protected $name;
	protected $commit;

	public function __construct($name, Commit $commit) {
		$this->name = $name;
		$this->commit = $commit;
	}

	public function getName() {
		return $this->name;
	}

	public function getCommit() {
		return $this->commit;
	}

}