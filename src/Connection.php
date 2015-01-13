<?php

namespace GithubV3;

use \GithubV3\Factories\PullRequestFactory;
use \GithubV3\Factories\RepositoryFactory;
use \GithubV3\Factories\UserFactory;
use \GithubV3\Factories\BranchFactory;
use \GithubV3\Factories\CommitFactory;
use \GithubV3\Factories\ContentsFactory;

use \Request\Curl\Request;

class Connection {

	protected $token;
	protected $baseUrl;

	//protected $verbose = true;

	protected $repoFactory;
	protected $userFactory;
	protected $commitFactory;
	protected $branchFactory;
	protected $contentsFactory;
	protected $prFactory;

	public function __construct($baseUrl, RepositoryFactory $repoFactory, PullRequestFactory $prFactory, UserFactory $userFactory, BranchFactory $branchFactory, CommitFactory $commitFactory, ContentsFactory $contentsFactory) {

		$this->baseUrl = $baseUrl;

		$this->repoFactory   = $repoFactory;
		$this->prFactory     = $prFactory;
		$this->userFactory   = $userFactory;
		$this->commitFactory = $commitFactory;
		$this->branchFactory = $branchFactory;
		$this->contentsFactory = $contentsFactory;
	}


	### Repositories
	public function listMyRepositories($type=null, $sort=null, $direction=null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/user/repos", [
			'type'      => $type,
			'sort'      => $sort,
			'direction' => $direction,
			'page'      => $page,
			'per_page'  => $perPage
		]);

		return array_map(function($d) {
			return $this->repoFactory->makeFromData($d, $this);
		}, $data);
	}

	public function listUserRepositories($username, $type=null, $sort=null, $direction=null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/users/$username/repos", [
			'type'      => $type,
			'sort'      => $sort,
			'direction' => $direction,
			'page'      => $page,
			'per_page'  => $perPage
		]);

		return array_map(function($d) {
			return $this->repoFactory->makeFromData($d, $this);
		}, $data);
	}

	public function listOrganizationRepositories($org, $type=null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/orgs/$org/repos", [
			'type'     => $type,
			'page'     => $page,
			'per_page' => $perPage
		]);

		return array_map(function($d) {
			return $this->repoFactory->makeFromData($d, $this);
		}, $data);
	}

	public function listAllPublicRepositories($since = null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repositories", [
			'since'    => $since,
			'page'     => $page,
			'per_page' => $perPage
		]);

		return array_map(function($d) {
			return $this->repoFactory->makeFromData($d, $this);
		}, $data);
	}

	public function getRepository($owner, $repo) {
		$data = $this->requestUrl("/repos/$owner/$repo");

		return $this->repoFactory->makeFromData($data, $this);
	}

	public function listContributors($owner, $repo, $anon = null, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/contributors", [
			'anon' => $anon,
			'page' => $page,
			'per_page' => $perPage
		]);

		return array_map(function($d) {
			return $this->userFactory->makeFromPartialData($d, $this);
		}, $data);
	}

	public function listLanguages($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/languages", [
			'page' => $page,
			'per_page' => $perPage
		]);

		return $data;
	}

	public function listTeams($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/teams", [
			'page' => $page,
			'per_page' => $perPage
		]);

		return $data;
	}

	public function listTags($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/tags", [
			'page' => $page,
			'per_page' => $perPage
		]);

		return $data;
	}

	public function listBranches($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/branches", [
			'page' => $page,
			'per_page' => $perPage
		]);

		return array_map(function($d) use ($owner, $repo) {
			return $this->branchFactory->makeFromData($owner, $repo, $d, $this);
		}, $data);
	}

	public function getBranch($owner, $repo, $branchName) {
		$data = $this->requestUrl("/repos/$owner/$repo/branches/$branchName");

		return $this->branchFactory->makeFromData($owner, $repo, $data, $this);
	}


	### Comments
	public function listCommentsForRepository($owner, $repo, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repos/$owner/$repo/comments", [
			'page' => $page,
			'per_page' => $perPage
		]);

		return $data;
	}

	public function listCommentsForCommit($owner, $repo, $ref, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repos/$owner/$repo/commits/$ref/comments", [
			'page' => $page,
			'per_page' => $perPage
		]);



		return $data;
	}


	### Commits
	public function listCommits($owner, $repo, $startSha = null, $filePath = null, $author=null, $since = null, $until = null, $page= null, $perPage = null) {

		$data = $this->requestUrl("/repos/$owner/$repo/commits", [
			"sha" => $startSha,
			"path" => $filePath,
			"author" => $author,
			"since" => $since,
			"until" => $until,
			"page" => $page,
			"per_page" => $perPage
		]);

		return array_map(function($c) use ($owner, $repo) {
			return $this->commitFactory->makeFromData($c, $this);
		}, $data);
	}

	public function getCommit($owner, $repo, $sha, $page=null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/commits/$sha", [
			"page" => $page,
			"per_page" => $perPage]);

		return $this->commitFactory->makeFromData($data, $this);
	}

	public function getReadme($owner, $repo, $ref = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/readme", [
			"ref" => $ref]);

 		return $this->contentsFactory->makeFromData($owner, $repo, $data['path'], $ref, $data, $this);
	}

	public function getContents($owner, $repo, $path, $ref = null, $page=null, $pageSize=null) {
		$data = $this->requestUrl("/repos/$owner/$repo/contents/$path", [
			"ref" => $ref,
			"page" => $page,
			"page_size" => $pageSize]);

		return $this->contentsFactory->makeFromData($owner, $repo, $path, $ref, $data, $this);

	}

	public function listPullRequests($owner, $repo, $state = null, $head = null, $base = null, $sort = null, $direction = null, $page = null, $pageSize = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/pulls", [
			'state' => $state,
			'head' => $head,
			'base' => $base,
			'sort' => $sort,
			'direction' => $direction,
			'page' => $page,
			'page_size' => $pageSize
			]);

		return array_map(function($d) use ($owner, $repo) {
			return $this->prFactory->makeFromData($owner, $repo, $d, $this);
		}, $data);
	}
	protected function requestUrl($path, array $parameters = array(), $method="GET") {
		$url = $this->baseUrl.$path;

		$parameters = array_filter($parameters, function($p) { return ! is_null($p); });

		$request = new Request();
		$request->setMethod($method);
		$request->setUrl($url, $parameters);

		if (! is_null($this->token)) {
			$request->httpHeader('Authorization', 'token '. $this->token->getTokenValue());
		}



		$response = $request->exec();
		$jsonData = @json_decode($response->getBody(), true);

		if ($this->verbose) {
			echo "Requesting $url\n";
			$headers = $response->getHeaders();
			$limit = $headers['X-RateLimit-Limit'];
			$remaining = $headers['X-RateLimit-Remaining'];
			$reset = $headers['X-RateLimit-Reset'] - time();
			$minutes = floor($reset / 60);
			$seconds = $reset % 60;

			printf("%d / %d requests available. Resets in %d:%02d\n", $remaining, $limit, $minutes, $seconds);
		}

		if ($response->getStatus() != 200) {
			if ($jsonData && isset($jsonData['message'])) {
				throw new \Exception("Api Response: " .$jsonData['message']);
			} else {
				throw new \Exception("Recieved status ".$response->getStatus()." from github\n". $response->getRaw());
			}
		}

		if (! is_array($jsonData)) {
			throw new \Exception("Bad data");
		}

		return $jsonData;
	}

	public function authenticate(Token $token) {
		$this->token = $token;
	}
}