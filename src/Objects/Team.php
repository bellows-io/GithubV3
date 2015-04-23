<?php

namespace GithubV3\Objects;

class Team {

	protected $name;
	protected $id;
	protected $slug;
	protected $description;
	protected $permission;

	public function __construct($name, $id, $slug, $description, $permission) {

		$this->name = $name;
		$this->id = $id;
		$this->slug = $slug;
		$this->description = $description;
		$this->permission = $permission;

	}

	public function getName() {
		return $this->name;
	}

	public function getId() {
		return $this->id;
	}

	public function getSlug() {
		return $this->slug;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getPermission() {
		return $this->permission;
	}


}