<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\Branch;

class BranchFactory {

	protected $commitFactory;

	public function __construct(CommitFactory $commitFactory) {
		$this->commitFactory = $commitFactory;
	}

	public function makeFromData($owner , $repo, $data, Connection $connection) {
		return new Branch(
			$data['name'],
			$this->commitFactory->makeFromPartialData($owner, $repo, $data['commit'], $connection)
		);
	}
}