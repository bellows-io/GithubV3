<?php

namespace GithubV3\Factories;

use GithubV3\Objects\Label;

class LabelFactory {

	public function makeFromData($data) {
		return new Label($data['name'], $data['color']);
	}
}