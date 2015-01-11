<?php

namespace GithubV3\Factories;

use GithubV3\Connection;
use GithubV3\Objects\User;
use GithubV3\Objects\UserGhost;


class UserFactory {

	public function makeFromData($data) {

		return new User(
			$data['login'],
			(int)$data['id'],
			$data['avatar_url'],
			$data['gravatar_id'],
			$data['type'],
			$data['site_admin'],
			$data['name'],
			$data['company'],
			$data['blog'],
			$data['location'],
			$data['email'],
			$data['hireable'],
			$data['bio'],
			(int)$data['public_repos'],
			(int)$data['public_gists'],
			(int)$data['followers'],
			(int)$data['following'],
			new \DateTime($data['created_at']),
			new \DateTime($data['updated_at'])
		);
	}

	public function makeFromPartialData($data, Connection $connection) {

		return new UserGhost(
			$data['login'],
			$connection,
			$data['id'],
			$data['avatar_url'],
			$data['gravatar_id'],
			$data['type'],
			$data['site_admin']
		);
	}

}
