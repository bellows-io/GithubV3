<?php

namespace GithubV3\Objects;

use GithubV3\Connection;

class RepositoryGhost {

	protected $name;
	protected $owner;
	protected $connection;
	protected $repository;

	public function __construct($name, User $owner, Connection $connection) {

		$this->name = $name;
		$this->owner = $owner;
		$this->connection = $connection;
	}

	protected funtion lazyLoadRepo($force = false) {
		if ($force || $this->repository == null) {
			$this->connection->getRepositoryFromFullName($fullName);
		}
	}

	public function getId() {
		return $this->lazyLoadRepo()->getId();
	}

	public function getFullName() {
		return $this->lazyLoadRepo()->getFullName();
	}

	public function getPrivate() {
		return $this->lazyLoadRepo()->getPrivate();
	}

	public function getHtmlUrl() {
		return $this->lazyLoadRepo()->getHtmlUrl();
	}

	public function getDescription() {
		return $this->lazyLoadRepo()->getDescription();
	}

	public function getFork() {
		return $this->lazyLoadRepo()->getFork();
	}

	public function getUrl() {
		return $this->lazyLoadRepo()->getUrl();
	}

	public function getForksUrl() {
		return $this->lazyLoadRepo()->getForksUrl();
	}

	public function getKeysUrl() {
		return $this->lazyLoadRepo()->getKeysUrl();
	}

	public function getCollaboratorsUrl() {
		return $this->lazyLoadRepo()->getCollaboratorsUrl();
	}

	public function getTeamsUrl() {
		return $this->lazyLoadRepo()->getTeamsUrl();
	}

	public function getHooksUrl() {
		return $this->lazyLoadRepo()->getHooksUrl();
	}

	public function getIssueEventsUrl() {
		return $this->lazyLoadRepo()->getIssueEventsUrl();
	}

	public function getEventsUrl() {
		return $this->lazyLoadRepo()->getEventsUrl();
	}

	public function getAssigneesUrl() {
		return $this->lazyLoadRepo()->getAssigneesUrl();
	}

	public function getBranchesUrl() {
		return $this->lazyLoadRepo()->getBranchesUrl();
	}

	public function getTagsUrl() {
		return $this->lazyLoadRepo()->getTagsUrl();
	}

	public function getBlobsUrl() {
		return $this->lazyLoadRepo()->getBlobsUrl();
	}

	public function getGitTagsUrl() {
		return $this->lazyLoadRepo()->getGitTagsUrl();
	}

	public function getGitRefsUrl() {
		return $this->lazyLoadRepo()->getGitRefsUrl();
	}

	public function getTreesUrl() {
		return $this->lazyLoadRepo()->getTreesUrl();
	}

	public function getStatusesUrl() {
		return $this->lazyLoadRepo()->getStatusesUrl();
	}

	public function getLanguagesUrl() {
		return $this->lazyLoadRepo()->getLanguagesUrl();
	}

	public function getStargazersUrl() {
		return $this->lazyLoadRepo()->getStargazersUrl();
	}

	public function getContributorsUrl() {
		return $this->lazyLoadRepo()->getContributorsUrl();
	}

	public function getSubscribersUrl() {
		return $this->lazyLoadRepo()->getSubscribersUrl();
	}

	public function getSubscriptionUrl() {
		return $this->lazyLoadRepo()->getSubscriptionUrl();
	}

	public function getCommitsUrl() {
		return $this->lazyLoadRepo()->getCommitsUrl();
	}

	public function getGitCommitsUrl() {
		return $this->lazyLoadRepo()->getGitCommitsUrl();
	}

	public function getCommentsUrl() {
		return $this->lazyLoadRepo()->getCommentsUrl();
	}

	public function getIssueCommentUrl() {
		return $this->lazyLoadRepo()->getIssueCommentUrl();
	}

	public function getContentsUrl() {
		return $this->lazyLoadRepo()->getContentsUrl();
	}

	public function getCompareUrl() {
		return $this->lazyLoadRepo()->getCompareUrl();
	}

	public function getMergesUrl() {
		return $this->lazyLoadRepo()->getMergesUrl();
	}

	public function getArchiveUrl() {
		return $this->lazyLoadRepo()->getArchiveUrl();
	}

	public function getDownloadsUrl() {
		return $this->lazyLoadRepo()->getDownloadsUrl();
	}

	public function getIssuesUrl() {
		return $this->lazyLoadRepo()->getIssuesUrl();
	}

	public function getPullsUrl() {
		return $this->lazyLoadRepo()->getPullsUrl();
	}

	public function getMilestonesUrl() {
		return $this->lazyLoadRepo()->getMilestonesUrl();
	}

	public function getNotificationsUrl() {
		return $this->lazyLoadRepo()->getNotificationsUrl();
	}

	public function getLabelsUrl() {
		return $this->lazyLoadRepo()->getLabelsUrl();
	}

	public function getReleasesUrl() {
		return $this->lazyLoadRepo()->getReleasesUrl();
	}

	public function getCreatedAt() {
		return $this->lazyLoadRepo()->getCreatedAt();
	}

	public function getUpdatedAt() {
		return $this->lazyLoadRepo()->getUpdatedAt();
	}

	public function getPushedAt() {
		return $this->lazyLoadRepo()->getPushedAt();
	}

	public function getGitUrl() {
		return $this->lazyLoadRepo()->getGitUrl();
	}

	public function getSshUrl() {
		return $this->lazyLoadRepo()->getSshUrl();
	}

	public function getCloneUrl() {
		return $this->lazyLoadRepo()->getCloneUrl();
	}

	public function getSvnUrl() {
		return $this->lazyLoadRepo()->getSvnUrl();
	}

	public function getHomepage() {
		return $this->lazyLoadRepo()->getHomepage();
	}

	public function getSize() {
		return $this->lazyLoadRepo()->getSize();
	}

	public function getStargazersCount() {
		return $this->lazyLoadRepo()->getStargazersCount();
	}

	public function getWatchersCount() {
		return $this->lazyLoadRepo()->getWatchersCount();
	}

	public function getLanguage() {
		return $this->lazyLoadRepo()->getLanguage();
	}

	public function getHasIssues() {
		return $this->lazyLoadRepo()->getHasIssues();
	}

	public function getHasDownloads() {
		return $this->lazyLoadRepo()->getHasDownloads();
	}

	public function getHasWiki() {
		return $this->lazyLoadRepo()->getHasWiki();
	}

	public function getHasPages() {
		return $this->lazyLoadRepo()->getHasPages();
	}

	public function getForksCount() {
		return $this->lazyLoadRepo()->getForksCount();
	}

	public function getMirrorUrl() {
		return $this->lazyLoadRepo()->getMirrorUrl();
	}

	public function getOpenIssuesCount() {
		return $this->lazyLoadRepo()->getOpenIssuesCount();
	}

	public function getForks() {
		return $this->lazyLoadRepo()->getForks();
	}

	public function getOpenIssues() {
		return $this->lazyLoadRepo()->getOpenIssues();
	}

	public function getWatchers() {
		return $this->lazyLoadRepo()->getWatchers();
	}

	public function getDefaultBranch() {
		return $this->lazyLoadRepo()->getDefaultBranch();
	}

}