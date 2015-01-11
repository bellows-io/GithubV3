<?php

namespace GithubV3\Objects;

class Commit {

	protected $sha;
	protected $message;
	protected $date;
	protected $authorName;
	protected $authorEmail;
	protected $committerName;
	protected $committerEmail;

	public function __construct($sha, $message, $date, $authorEmail, $authorName, $committerEmail, $committerName, /** $tree, **/ $commentCount) {

		$this->sha = $sha;
		$this->date = $date;
		$this->message = $message;
		$this->authorEmail = $authorEmail;
		$this->authorName = $authorName;
		$this->committerEmail = $committerEmail;
		$this->committerName = $committerName;
		$this->commentCount = $commentCount;

	}

	public function getSha() {
		return $this->sha;
	}

	public function getDate() {
		return $this->date;
	}

	public function getMessage() {
		return $this->message;
	}

	public function getAuthorName() {
		return $this->authorName;
	}

	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	public function getCommitterEmail() {
		return $this->committerEmail;
	}

	public function getCommitterName() {
		return $this->committerName;
	}

	public function getCommentCount() {
		return $this->commentCount;
	}

}