<?php

namespace GithubV3\Objects;

use GithubV3\Connection;


class UserGhost extends \GithubV3\Objects\User {

	protected $connection;
	protected $user = null;

	public function __construct($login, Connection $connection, $id = null, $avatarUrl = null, $gravatarId = null, $type = null, $siteAdmin = null) {
		$this->login = $login;
		$this->connection = $connection;

		$this->id = $id;
		$this->avatarUrl = $avatarUrl;
		$this->gravatarId = $gravatarId;
		$this->type = $type;
		$this->siteAdmin = $siteAdmin;
	}

	protected function lazyLoadUser($force = false) {
		if ($force || is_null($this->user)) {
			$this->user = $this->connection->getUserFromLogin($this->getLogin());
		}
		return $this->user;
	}

	public function getId() {
		if (! is_null($this->id)) {
			return $this->id;
		}
		return $this->lazyLoadUser()->getId();
	}

	public function getAvatarUrl() {
		if (! is_null($this->avatarUrl)) {
			return $this->avatarUrl;
		}
		return $this->lazyLoadUser()->getAvatarUrl();
	}

	public function getGravatarId() {
		if (! is_null($this->gravatarId)) {
			return $this->gravatarId;
		}
		return $this->lazyLoadUser()->getGravatarId();
	}

	public function getType() {
		if (! is_null($this->type)) {
			return $this->type;
		}
		return $this->lazyLoadUser()->getType();
	}

	public function getSiteAdmin() {
		if (! is_null($this->siteAdmin)) {
			return $this->siteAdmin;
		}
		return $this->lazyLoadUser()->getSiteAdmin();
	}

	public function getName() {
		return $this->lazyLoadUser()->getName();
	}

	public function getCompany() {
		return $this->lazyLoadUser()->getCompany();
	}

	public function getBlog() {
		return $this->lazyLoadUser()->getBlog();
	}

	public function getLocation() {
		return $this->lazyLoadUser()->getLocation();
	}

	public function getEmail() {
		return $this->lazyLoadUser()->getEmail();
	}

	public function getHireable() {
		return $this->lazyLoadUser()->getHireable();
	}

	public function getBio() {
		return $this->lazyLoadUser()->getBio();
	}

	public function getPublicRepos() {
		return $this->lazyLoadUser()->getPublicRepos();
	}

	public function getPublicGists() {
		return $this->lazyLoadUser()->getPublicGists();
	}

	public function getFollowers() {
		return $this->lazyLoadUser()->getFollowers();
	}

	public function getFollowing() {
		return $this->lazyLoadUser()->getFollowing();
	}

	public function getCreatedAt() {
		return $this->lazyLoadUser()->getCreatedAt();
	}

	public function getUpdatedAt() {
		return $this->lazyLoadUser()->getUpdatedAt();
	}

}