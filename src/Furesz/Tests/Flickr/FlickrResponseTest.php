<?php

use Furesz\Flickr\FlickrEntry;
use Furesz\Flickr\FlickrResponse;
use Furesz\Tests\Flickr\Mock\MockFlickrResponse;

class FlickrResponseTest extends PHPUnit_Framework_TestCase
{

    public function testCreatWithValidData()
    {
        $equals = [
            "title"   => "Recent Uploads tagged chamonix, ski and snow",
            "id"      => "tag:flickr.com,2005:/photos/public/tagged/all/chamonix-ski-snow",
            "updated" => new \DateTime("2015-03-22T16:10:41Z"),
        ];

        $expectedResponse = MockFlickrResponse::getExpectedResponse() ;
        $flickrResponse = new FlickrResponse($expectedResponse);
        $this->assertInstanceOf(FlickrResponse::class, $flickrResponse);

        $title = $flickrResponse->getTitle();
        $id = $flickrResponse->getId();
        $updated = $flickrResponse->getUpdated();

        $this->assertEquals($equals["title"], $title);
        $this->assertEquals($equals["id"], $id);
        $this->assertEquals($equals["updated"], $updated);
    }

    public function testCreatWithInValidData()
    {
        $expectedResponse = MockFlickrResponse::getExpectedResponse() . "INVALIDATE RESPONSE";
        $this->setExpectedException(\Exception::class, "could not be parsed");

        new FlickrResponse($expectedResponse);
    }

    public function testGetEntries()
    {
        $expectedResponse = MockFlickrResponse::getExpectedResponse() ;
        $flickrResponse = new FlickrResponse($expectedResponse);

        $entries = $flickrResponse->getEntries();

        foreach ($entries as $entry){
            $this->assertInstanceOf(FlickrEntry::class, $entry);
        }


    }
}
