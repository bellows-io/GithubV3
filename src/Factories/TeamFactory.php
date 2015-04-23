<?php

namespace GithubV3\Factories;

class TeamFactory {

	public function makeFromData($data) {
		return new \GithubV3\Objects\Team(
			$data['name'],
			$data['id'],
			$data['slug'],
			$data['description'],
			$data['permission']
		);
	}

}