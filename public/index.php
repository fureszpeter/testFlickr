<?php

/** @var Furesz\App $app */
$app = require_once __DIR__ . "/../src/bootstrap.php";
$app->setDebug(1);

use Furesz\Flickr\ApiResponseDTO;
use Furesz\Flickr\FlickrRepository;

header('Content-type: application/json');

$repository = new FlickrRepository();
$response = $repository->searchTags(["chamonix"], ["ski"], ["snow"]);
$entries = $response->getEntries();

$apiResponse = [];
foreach ($entries as $entry) {
    $apiResponse[] = new ApiResponseDTO(
        $entry->getTitle(),
        $entry->getAuthor()->getName(),
        $entry->getLink(),
        $entry->getSrc()
    );
}

echo json_encode($apiResponse);
