<?php

namespace GithubV3\Objects;

use \DateTime;

class PullRequest {

	protected $url;
	protected $id;
	protected $number;
	protected $state;
	protected $locked;
	protected $title;
	protected $user;
	protected $body;
	protected $createdAt;
	protected $updatedAt;
	protected $closedAt;
	protected $mergedAt;
	protected $mergeCommitSha;
	protected $assignee;
	protected $milestone;
	protected $statusesUrl;
	protected $head;
	protected $base;

	public function __construct($url, $id, $number, $state, $locked, $title, User $user, $body, DateTime $createdAt, DateTime $updatedAt, $closedAt, $mergedAt, $mergeCommitSha, $assignee, $milestone, $statusesUrl,  $head, $base) {

		$this->url = $url;
		$this->id = $id;
		$this->number = $number;
		$this->state = $state;
		$this->locked = $locked;
		$this->title = $title;
		$this->user = $user;
		$this->body = $body;
		$this->createdAt = $createdAt;
		$this->updatedAt = $updatedAt;
		$this->closedAt = $closedAt;
		$this->mergedAt = $mergedAt;
		$this->mergeCommitSha = $mergeCommitSha;
		$this->assignee = $assignee;
		$this->milestone = $milestone;
		$this->statusesUrl = $statusesUrl;
		$this->head = $head;
		$this->base = $base;
	}

	public function getUrl() {
		return $this->url;
	}

	public function getId() {
		return $this->id;
	}

	public function getHtmlUrl() {
		return $this->htmlUrl;
	}

	public function getDiffUrl() {
		return $this->diffUrl;
	}

	public function getPatchUrl() {
		return $this->patchUrl;
	}

	public function getIssueUrl() {
		return $this->issueUrl;
	}

	public function getNumber() {
		return $this->number;
	}

	public function getState() {
		return $this->state;
	}

	public function getLocked() {
		return $this->locked;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getUser() {
		return $this->user;
	}

	public function getBody() {
		return $this->body;
	}

	public function getCreatedAt() {
		return $this->createdAt;
	}

	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	public function getClosedAt() {
		return $this->closedAt;
	}

	public function getMergedAt() {
		return $this->mergedAt;
	}

	public function getMergeCommitSha() {
		return $this->mergeCommitSha;
	}

	public function getAssignee() {
		return $this->assignee;
	}

	public function getMilestone() {
		return $this->milestone;
	}

	public function getCommitsUrl() {
		return $this->commitsUrl;
	}

	public function getReviewCommentsUrl() {
		return $this->reviewCommentsUrl;
	}

	public function getReviewCommentUrl($number) {
		return str_replace('{number}', $number, $this->reviewCommentUrl);
	}

	public function getCommentsUrl() {
		return $this->commentsUrl;
	}

	public function getStatusesUrl() {
		return $this->statusesUrl;
	}

	public function getHead() {
		return $this->head;
	}

	public function getBase() {
		return $this->base;
	}
}


 /*   [url] => https://api.github.com/repos/capdig/capsis/pulls/281
    [id] => 27126619
    [html_url] => https://github.com/capdig/capsis/pull/281
    [diff_url] => https://github.com/capdig/capsis/pull/281.diff
    [patch_url] => https://github.com/capdig/capsis/pull/281.patch
    [issue_url] => https://api.github.com/repos/capdig/capsis/issues/281
    [number] => 281
    [state] => open
    [locked] =>
    [title] => Fixing query on removing user building links
    [user] =>
    [body] => Query needed to use a left join to be able to detect null (removed) user values
    [created_at] => 2015-01-09T20:25:21Z
    [updated_at] => 2015-01-09T21:27:25Z
    [closed_at] =>
    [merged_at] =>
    [merge_commit_sha] => 66369895377d303d6f6cad3b34b497f3e862068c
    [assignee] =>
    [milestone] =>
    [commits_url] => https://api.github.com/repos/capdig/capsis/pulls/281/commits
    [review_comments_url] => https://api.github.com/repos/capdig/capsis/pulls/281/comments
    [review_comment_url] => https://api.github.com/repos/capdig/capsis/pulls/comments/{number}
    [comments_url] => https://api.github.com/repos/capdig/capsis/issues/281/comments
    [statuses_url] => https://api.github.com/repos/capdig/capsis/statuses/7aefe53243dee382430763438a5dac5a9a53a88e
    [head] => ##COMMIT##
    [base] => ##COMMIT##

    [_links] => Array
        (
            [self] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/pulls/281
                )

            [html] => Array
                (
                    [href] => https://github.com/capdig/capsis/pull/281
                )

            [issue] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/issues/281
                )

            [comments] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/issues/281/comments
                )

            [review_comments] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/pulls/281/comments
                )

            [review_comment] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/pulls/comments/{number}
                )

            [commits] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/pulls/281/commits
                )

            [statuses] => Array
                (
                    [href] => https://api.github.com/repos/capdig/capsis/statuses/7aefe53243dee382430763438a5dac5a9a53a88e
                )

        )

)
*/