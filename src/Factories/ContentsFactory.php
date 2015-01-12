<?php

namespace GithubV3\Factories;

use GithubV3\Connection;

use GithubV3\Objects\Contents\File;
use GithubV3\Objects\Contents\Folder;
use GithubV3\Objects\Contents\FileGhost;
use GithubV3\Objects\Contents\FolderGhost;

class ContentsFactory {

	public function makeFromData($owner, $repo, $path, $ref, $data, Connection $connection) {

		if ($data['type'] == 'file') {
			return $this->makeFileFromData($data);
		}
		if (isset($data[0]) && isset($data[0]['type']) && $data[0]['type'] == 'file') {
			return $this->makeFolderFromData($owner, $repo, $path, $ref, $data, $connection);
		}
		if ($data['type'] == 'dir') {
			return $this->makeFolderProxyFromData($owner, $repo, $path, $ref, $data, $connection);
		}
		//print_r($data);
	}

	protected function makeFileFromData($data) {
		return new File(
			$data['name'],
			$data['path'],
			$data['sha'],
			base64_decode($data['content']));
	}

	protected function makeFolderFromData($owner, $repo, $path, $ref, $data, Connection $connection) {
		$paths = explode("/", $path);

		$contents = [];
		foreach ($data as $subData) {
			$contents[] = $this->makeFromData($owner, $repo, $subData['path'], $ref, $subData, $connection);
		}

		return new Folder(reset($paths), $path, $contents);

	}

	protected function makeFolderProxyFromData($owner, $repo, $path, $ref, $data, Connection $connection) {
		$paths = explode("/", $path);

		return new FolderGhost($owner, $repo, $data['path'], $ref, $connection);

	}

}