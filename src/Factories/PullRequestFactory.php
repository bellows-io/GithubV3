<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\PullRequest;
use GithubV3\Objects\Branch;
use GithubV3\Objects\UserGhost;
use DateTime;

class PullRequestFactory {

	protected $userFactory;
	protected $branchFactory;

	public function __construct(UserFactory $userFactory, BranchFactory $branchFactory) {
		$this->userFactory = $userFactory;
		$this->branchFactory = $branchFactory;
	}

	public function makeFromData($owner, $repo, $data, Connection $connection) {
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
			$this->branchFactory->makeFromData($owner, $repo, $data['head'], $connection),//new Branch(), // from ['head']
			$this->branchFactory->makeFromData($owner, $repo, $data['base'], $connection)//new Branch() // form ['base']
		);
	}
}