<?php

namespace GithubV3\Objects;

class User {

	protected $login;
	protected $id;
	protected $avatarUrl;
	protected $gravatarId;
	protected $type;
	protected $siteAdmin;
	protected $name;
	protected $company;
	protected $blog;
	protected $location;
	protected $email;
	protected $hireable;
	protected $bio;
	protected $publicRepos;
	protected $publicGists;
	protected $followers;
	protected $following;
	protected $createdAt;
	protected $updatedAt;

	public function __construct($login, $id, $avatarUrl, $gravatarId, $type, $siteAdmin, $name, $company, $blog, $location, $email, $hireable, $bio, $publicRepos, $publicGists, $followers, $following, $createdAt, $updatedAt) {

		$this->login = $login;
		$this->id = $id;
		$this->avatarUrl = $avatarUrl;
		$this->gravatarId = $gravatarId;
		$this->type = $type;
		$this->siteAdmin = $siteAdmin;
		$this->name = $name;
		$this->company = $company;
		$this->blog = $blog;
		$this->location = $location;
		$this->email = $email;
		$this->hireable = $hireable;
		$this->bio = $bio;
		$this->publicRepos = $publicRepos;
		$this->publicGists = $publicGists;
		$this->followers = $followers;
		$this->following = $following;
		$this->createdAt = $createdAt;
		$this->updatedAt = $updatedAt;

	}

	public function getLogin() {
		return $this->login;
	}

	public function getId() {
		return $this->id;
	}

	public function getAvatarUrl() {
		return $this->avatarUrl;
	}

	public function getGravatarId() {
		return $this->gravatarId;
	}

	public function getType() {
		return $this->type;
	}

	public function getSiteAdmin() {
		return $this->siteAdmin;
	}

	public function getName() {
		return $this->name;
	}

	public function getCompany() {
		return $this->company;
	}

	public function getBlog() {
		return $this->blog;
	}

	public function getLocation() {
		return $this->location;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getHireable() {
		return $this->hireable;
	}

	public function getBio() {
		return $this->bio;
	}

	public function getPublicRepos() {
		return $this->publicRepos;
	}

	public function getPublicGists() {
		return $this->publicGists;
	}

	public function getFollowers() {
		return $this->followers;
	}

	public function getFollowing() {
		return $this->following;
	}

	public function getCreatedAt() {
		return $this->createdAt;
	}

	public function getUpdatedAt() {
		return $this->updatedAt;
	}




}