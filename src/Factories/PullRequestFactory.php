<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\PullRequest;
use GithubV3\Objects\Branch;
use GithubV3\Objects\UserGhost;
use DateTime;

class PullRequestFactory {

	protected $userFactory;
	protected $repoFactory;

	public function __construct(UserFactory $userFactory) {
		$this->userFactory = $userFactory;
	}

	public function makeFromData($data, Connection $connection) {
		$user = $this->userFactory->makeFromPartialData($data['user'], $connection);
		$assignee = null;
		if ($data['assignee']) {
			$assignee = $this->userFactory->makeFromPartialData($data['assignee'], $connection);
		}
		return new PullRequest(
			$data['url'],
			$data['id'],
			$data['number'],
			$data['state'],
			$data['locked'],
			$data['title'],
			$user,
			$data['body'],
			new DateTime($data['created_at']),
			new DateTime($data['updated_at']),
			$data['closed_at'] ? new DateTime($data['closed_at']) : null,
			$data['merged_at'] ? new DateTime($data['merged_at']) : null,
			$data['merge_commit_sha'],
			$assignee,
			$data['milestone'],
			$data['statuses_url'],
			$data['head'],//new Branch(), // from ['head']
			$data['base']//new Branch() // form ['base']
		);
	}
}