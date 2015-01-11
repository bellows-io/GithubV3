<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\Commit;
use GithubV3\Objects\CommitGhost;

class CommitFactory {
	protected $userFactory;
	public function __construct(UserFactory $userFactory) {
		$this->userFactory = $userFactory;
	}

	public function makeFromData($data, Connection $connection) {
		return new Commit(
			$data['sha'],
			$data['commit']['message'],
			new \DateTime($data['commit']['author']['date']),
			$data['commit']['author']['email'],
			$data['commit']['author']['name'],
			$data['commit']['committer']['email'],
			$data['commit']['committer']['name'],
			$data['commit']['comment_count']
		);
	}

	public function makeFromPartialData($owner, $repo, $data, Connection $connection) {
		return new CommitGhost($owner, $repo, $data['sha'], $connection);
	}

}