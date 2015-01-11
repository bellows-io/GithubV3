<?php

namespace GithubV3\Objects;

class Repository {

	protected $name;
	protected $owner;

	protected $id;
	protected $fullName;
	protected $private;
	protected $description;
	protected $fork;
	protected $releasesUrl;
	protected $createdAt;
	protected $updatedAt;
	protected $pushedAt;
	protected $homepage;
	protected $size;
	protected $stargazersCount;
	protected $watchersCount;
	protected $language;
	protected $hasIssues;
	protected $hasDownloads;
	protected $hasWiki;
	protected $hasPages;
	protected $forksCount;
	protected $mirrorUrl;
	protected $openIssuesCount;
	protected $forks;
	protected $openIssues;
	protected $watchers;
	protected $defaultBranch;

	public function __construct($name, User $owner, $id, $fullName, $private, $htmlUrl, $description, $fork, $homepage, $size, $stargazersCount, $watchersCount, $language, $hasIssues, $hasDownloads, $hasWiki, $hasPages, $forksCount, $mirrorUrl, $openIssuesCount, $forks, $openIssues, $watchers, $defaultBranch) {

		$this->name = $name;
		$this->owner = $owner;
		$this->id = $id;
		$this->fullName = $fullName;
		$this->private = $private;
		$this->description = $description;
		$this->fork = $fork;
		$this->homepage = $homepage;
		$this->size = $size;
		$this->stargazersCount = $stargazersCount;
		$this->watchersCount = $watchersCount;
		$this->language = $language;
		$this->hasIssues = $hasIssues;
		$this->hasDownloads = $hasDownloads;
		$this->hasWiki = $hasWiki;
		$this->hasPages = $hasPages;
		$this->forksCount = $forksCount;
		$this->mirrorUrl = $mirrorUrl;
		$this->openIssuesCount = $openIssuesCount;
		$this->forks = $forks;
		$this->openIssues = $openIssues;
		$this->watchers = $watchers;
		$this->defaultBranch = $defaultBranch;
	}

	public function getName() {
		return $this->name;
	}

	public function getOwner() {
		return $this->owner;
	}

	public function getId() {
		return $this->id;
	}

	public function getFullName() {
		return $this->fullName;
	}

	public function getPrivate() {
		return $this->private;
	}

	public function getHtmlUrl() {
		return $this->htmlUrl;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getFork() {
		return $this->fork;
	}

	public function getHomepage() {
		return $this->homepage;
	}

	public function getSize() {
		return $this->size;
	}

	public function getStargazersCount() {
		return $this->stargazersCount;
	}

	public function getWatchersCount() {
		return $this->watchersCount;
	}

	public function getLanguage() {
		return $this->language;
	}

	public function getHasIssues() {
		return $this->hasIssues;
	}

	public function getHasDownloads() {
		return $this->hasDownloads;
	}

	public function getHasWiki() {
		return $this->hasWiki;
	}

	public function getHasPages() {
		return $this->hasPages;
	}

	public function getForksCount() {
		return $this->forksCount;
	}

	public function getMirrorUrl() {
		return $this->mirrorUrl;
	}

	public function getOpenIssuesCount() {
		return $this->openIssuesCount;
	}

	public function getForks() {
		return $this->forks;
	}

	public function getOpenIssues() {
		return $this->openIssues;
	}

	public function getWatchers() {
		return $this->watchers;
	}

	public function getDefaultBranch() {
		return $this->defaultBranch;
	}

}