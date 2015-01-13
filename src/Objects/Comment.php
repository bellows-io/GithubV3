<?php

namespace GithubV3\Objects;

class Comment {

	protected $owner;
	protected $repo;
	protected $issue;
	protected $id;
	protected $user;
	protected $created;
	protected $updated;
	protected $body;

	public function __construct($owner, $repo, $issue, $id, User $user, \DateTime $created, \DateTime $updated, $body) {
		$this->owner   = $owner;
		$this->repo    = $repo;
		$this->issue   = $issue;
		$this->id      = $id;
		$this->user    = $user;
		$this->created = $created;
		$this->updated = $updated;
		$this->body    = $body;
	}

	public function getOwner() {
		return $this->owner;
	}

	public function getRepo() {
		return $this->repo;
	}

	public function getIssue() {
		return $this->issue;
	}

	public function getId() {
		return $this->id;
	}

	public function getUser() {
		return $this->user;
	}

	public function getCreated() {
		return $this->created;
	}

	public function getUpdated() {
		return $this->updated;
	}

	public function getBody() {
		return $this->body;
	}

}