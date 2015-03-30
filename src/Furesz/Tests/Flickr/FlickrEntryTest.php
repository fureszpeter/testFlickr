<?php

use Furesz\Flickr\FlickrAuthor;
use Furesz\Flickr\FlickrEntry;
use Furesz\Tests\Flickr\Mock\MockFlickrResponse;

class FlickrEntryTest extends \PHPUnit_Framework_TestCase
{

    public function testWithValidData()
    {
        $responseString = MockFlickrResponse::getExpectedResponse();
        $XMLResponse = simplexml_load_string($responseString);

        foreach ($XMLResponse->entry as $entry) {
            $entryDTO[FlickrEntry::FIELD_TITLE] = (string)$entry->title;
            $entryDTO[FlickrEntry::FIELD_LINK] = (string)$entry->link["href"];
            foreach ($entry->link as $link){
                if ($link->attributes()["rel"]=="alternate"){
                    $entryDTO[FlickrEntry::FIELD_LINK] = (string)$link["href"];
                }elseif($link->attributes()["rel"]=="enclosure"){
                    $entryDTO[FlickrEntry::FIELD_SRC] = (string)$link["href"];
                }
            }            $entryDTO[FlickrEntry::FIELD_ID] = (string)$entry->id;
            $entryDTO[FlickrEntry::FIELD_PUBLISHED] = (string)$entry->published;
            $entryDTO[FlickrEntry::FIELD_UPDATED] = (string)$entry->updated;
            $entryDTO[FlickrEntry::FIELD_HTML] = (string)$entry->content;

            $authorDTO[FlickrAuthor::FIELD_NAME] = (string)$entry->author->name;
            $authorDTO[FlickrAuthor::FIELD_URI] = (string)$entry->author->uri;
            $authorDTO[FlickrAuthor::FIELD_NSID] = (string)$entry->author->nsid;
            $authorDTO[FlickrAuthor::FIELD_ICON] = (string)$entry->author->buddyicon;

            $FlickrEntry = new FlickrEntry($entryDTO, new FlickrAuthor($authorDTO));
            $this->assertInstanceOf(FlickrEntry::class, $FlickrEntry);

        }

    }

    /**
     * @param array $entryDTO
     * @param FlickrAuthor $author
     * @param $expectedExceptionName
     * @param $exceptionMessage
     *
     * @dataProvider invalidDTOProvider
     */
    public function testWithInValidData(array $entryDTO, FlickrAuthor $author, $expectedExceptionName, $exceptionMessage)
    {
        $this->setExpectedException($expectedExceptionName, $exceptionMessage);

        new FlickrEntry($entryDTO, $author);
    }

    /**
     * @return array
     */
    public function invalidDTOProvider()
    {
        $authorDTO[FlickrAuthor::FIELD_NAME] = "Mock Author";
        $authorDTO[FlickrAuthor::FIELD_URI] = "URI";
        $authorDTO[FlickrAuthor::FIELD_NSID] = "NSID";
        $authorDTO[FlickrAuthor::FIELD_ICON] = "ICON";

        $Author = new FlickrAuthor($authorDTO);

        return [
            [$this->invalidateDTO(FlickrEntry::FIELD_TITLE, ""), $Author, \InvalidArgumentException::class, "Title"],
            [$this->invalidateDTO(FlickrEntry::FIELD_LINK, ""), $Author, \InvalidArgumentException::class, "Link"],
            [$this->invalidateDTO(FlickrEntry::FIELD_SRC, ""), $Author, \InvalidArgumentException::class, "Source"],
            [$this->invalidateDTO(FlickrEntry::FIELD_ID, ""), $Author, \InvalidArgumentException::class, "ID"],
            [$this->invalidateDTO(FlickrEntry::FIELD_PUBLISHED, ""), $Author, \InvalidArgumentException::class, "Date"],
            [$this->invalidateDTO(FlickrEntry::FIELD_PUBLISHED, "esdfsdf"), $Author, \Exception::class, "Date"],
            [$this->invalidateDTO(FlickrEntry::FIELD_UPDATED, ""), $Author, \InvalidArgumentException::class, "Date"],
            [$this->invalidateDTO(FlickrEntry::FIELD_UPDATED, "sdfsdf"), $Author, \Exception::class, "Date"],
            [$this->invalidateDTO(FlickrEntry::FIELD_HTML, ""), $Author, \InvalidArgumentException::class, "HTML"],
        ];
    }

    /**
     * @return array
     *      */
    private function getMockEntryDTO()
    {
        $entryDTO = [];

        $entryDTO[FlickrEntry::FIELD_TITLE] = "Title";
        $entryDTO[FlickrEntry::FIELD_LINK] = "HREF";
        $entryDTO[FlickrEntry::FIELD_SRC] = "HREF";
        $entryDTO[FlickrEntry::FIELD_ID] = "id";
        $entryDTO[FlickrEntry::FIELD_PUBLISHED] = "2015-03-22T16:10:41Z";
        $entryDTO[FlickrEntry::FIELD_UPDATED] = "2015-03-22T16:10:41Z";
        $entryDTO[FlickrEntry::FIELD_HTML] = "<div></div>";

        return $entryDTO;
    }

    /**
     * @param $array
     * @param $key
     * @param $newValue
     *
     * @return array
     */
    private static function arrayHelper($array, $key, $newValue)
    {
        $array[$key] = $newValue;

        return $array;
    }

    /**
     * @return array
     */
    private function invalidateDTO($key, $value)
    {
        return self::arrayHelper($this->getMockEntryDTO(), $key, $value);
    }
}