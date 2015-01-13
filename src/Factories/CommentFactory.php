<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\Comment;

class CommentFactory {
	protected $userFactory;

	public function __construct(UserFactory $userFactory) {
		$this->userFactory = $userFactory;
	}

	public function makeFromData($owner, $repo, $issue, $data, Connection $connection) {
		return new Comment(
			$owner,
			$repo,
			$issue,
			$data['id'],
			$this->userFactory->makeFromPartialData($data['user'], $connection),
			new \DateTime($data['created_at']),
			new \DateTime($data['updated_at']),
			$data['body']
		);
	}
}