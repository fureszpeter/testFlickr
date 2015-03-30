<?php
use Furesz\Flickr\FlickrRepository;
use Furesz\Flickr\FlickrResponse;

class FlickrRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSearchTagsWithValidTags()
    {
        $tags = [
            "chamonix",
            "ski",
            "snow"
        ];
        $mockResponse = "<xml></xml>";

        $FlickRRepository = new FlickrRepository();
        $this->simulateFlickRResponse($FlickRRepository, $mockResponse);
        $flickrResponse = $FlickRRepository->searchTags($tags);

        $this->assertInstanceOf(FlickrRepository::class, $FlickRRepository);
        $this->assertInstanceOf(FlickrResponse::class, $flickrResponse);

    }

    public function testSearchTagsWithNoResponse()
    {
        $tags = [
            "chamonix",
            "ski",
            "snow"
        ];


        $FlickRRepository = new FlickrRepository();
        $this->simulateFlickRResponse($FlickRRepository, false);

        $this->setExpectedException(\Exception::class, "No response");

        $FlickRRepository->searchTags($tags);

    }

    /**
     * @param $FlickRRepository
     * @param $mockResponse
     */
    private function simulateFlickRResponse($FlickRRepository, $mockResponse)
    {
        $printer = new PHPUnit_Extensions_MockFunction("file_get_contents", $FlickRRepository);
        $printer->expects($this->once())->willReturn($mockResponse);
    }

}