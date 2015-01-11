<?php

namespace GithubV3;

use \GithubV3\Factories\PullRequestFactory;
use \GithubV3\Factories\RepositoryFactory;
use \Request\Curl\Request;

class Connection {

	protected $token;
	protected $baseUrl;

	protected $prFactory;

	public function __construct($baseUrl, RepositoryFactory $repoFactory, PullRequestFactory $prFactory) {

		$this->baseUrl = $baseUrl;
		$this->repoFactory = $repoFactory;
		$this->prFactory = $prFactory;
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

		$out = [];
		foreach ($data as $requestData) {
			$out[] = $this->repoFactory->makeFromData($requestData, $this);
		}
		return $out;
	}

	public function listUserRepositories($username, $type=null, $sort=null, $direction=null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/users/$username/repos", [
			'type'      => $type,
			'sort'      => $sort,
			'direction' => $direction,
			'page'      => $page,
			'per_page'  => $perPage
		]);
	}

	public function listOrganizationRepositories($org, $type=null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/orgs/$org/repos", [
			'type'     => $type,
			'page'     => $page,
			'per_page' => $perPage
		]);
	}

	public function listAllPublicRepositories($since = null, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repositories", [
			'since'    => $since,
			'page'     => $page,
			'per_page' => $perPage
		]);
	}

	public function getRepository($owner, $repo) {
		$data = $this->requestUrl("/repos/$owner/$repo");
	}

	public function listContributors($owner, $repo, $anon = null, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/contributors", [
			'anon' => $anon,
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function listLanguages($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/languages", [
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function listTeams($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/teams", [
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function listTags($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/tags", [
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function listBranches($owner, $repo, $page = null, $perPage = null) {
		$data = $this->requestUrl("/repos/$owner/$repo/branches", [
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function getBranch($owner, $repo, $branchName) {
		$data = $this->requestUrl("/repos/$owner/$repo/branches/$branchName");
	}

	### Comments
	public function listCommentsForRepository($owner, $repo, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repos/$owner/$repo/comments", [
			'page' => $page,
			'per_page' => $perPage
		]);
	}

	public function listCommentsForCommit($owner, $repo, $ref, $page = null, $perPage = null) {

		$data = $this->requestUrl("/repos/$owner/$repo/commits/$ref/comments", [
			'page' => $page,
			'per_page' => $perPage
		]);
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
			$headers = $response->getHeaders();
			$limit = $headers['X-RateLimit-Limit'];
			$remaining = $headers['X-RateLimit-Remaining'];
			$reset = $headers['X-RateLimit-Reset'] - time();
			$minutes = floor($reset / 60);
			$seconds = $reset % 60;

			echo "$remaining / $limit requests available. Resets in $minutes:$seconds\n";
		}

		if ($response->getStatus() != 200) {
			if ($jsonData && isset($jsonData['message'])) {
				throw new \Exception("Api Response: " .$jsonData['message']);
			} else {
				throw new \Exception("Recieved status ".$response->getStatus()." from github\n". $response->getRaw());
			}
		}

		if (! $jsonData) {
			throw new \Exception("Bad data");
		}

		return $jsonData;
	}

	public function authenticate(Token $token) {
		$this->token = $token;
	}
}