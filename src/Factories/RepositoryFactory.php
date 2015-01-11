<?php

namespace GithubV3\Factories;


use GithubV3\Connection;
use GithubV3\Objects\Repository;
use GithubV3\Objects\UserGhost;

class RepositoryFactory {

	protected $userFactory;

	public function __construct(UserFactory $userFactory) {
		$this->userFactory = $userFactory;
	}

	public function makeFromData($data, Connection $connection) {
		return new Repository(
			$data['name'],
			$this->userFactory->makeFromPartialData($data['owner'], $connection),
			$data['id'],
			$data['full_name'],
			$data['private'],
			$data['html_url'],
			$data['description'],
			$data['fork'],
			$data['homepage'],
			$data['size'],
			$data['stargazers_count'],
			$data['watchers_count'],
			$data['language'],
			$data['has_issues'],
			$data['has_downloads'],
			$data['has_wiki'],
			$data['has_pages'],
			$data['forks_count'],
			$data['mirror_url'],
			$data['open_issues_count'],
			$data['forks'],
			$data['open_issues'],
			$data['watchers'],
			$data['default_branch']
		);
	}

}