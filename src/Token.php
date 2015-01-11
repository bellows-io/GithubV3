<?php

namespace GithubV3;

class Token {

	protected $value;

	public function __construct($value) {
		$this->value = $value;
	}

	public function getTokenValue() {
		return $this->value;
	}

}