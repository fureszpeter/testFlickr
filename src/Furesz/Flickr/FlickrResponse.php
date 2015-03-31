<?php

namespace Furesz\Flickr;


class FlickrResponse
{
    /** @var  \SimpleXMLElement */
    private $xml;

    /** @var  string */
    private $title;

    /** @var  string */
    private $id;

    /** @var  \DateTime */
    private $updated;

    /**
     * @param string $response
     */
    public function __construct($response)
    {
        $this->xml = new \SimpleXMLElement($response);
        $this->title = (string)$this->xml->title;
        $this->id = (string)$this->xml->id;
        $this->updated = new \DateTime((string)$this->xml->updated);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return FlickrEntry[]
     */
    public function getEntries()
    {
        /** @var \SimpleXMLElement $xmlNode */
        /** @var \SimpleXMLElement $entry */
        foreach ($this->xml->entry as $entry) {
            $entryDTO = $this->convertXmlEntryToDTO($entry);
            $authorDTO = self::convertXmlAuthorToDTO($entry);

            yield new FlickrEntry($entryDTO, new FlickrAuthor($authorDTO));
        }
    }

    /**
     * @param \SimpleXMLElement $entry
     * @return array
     */
    public static function convertXmlEntryToDTO(\SimpleXMLElement $entry)
    {
        $entryDTO=[];

        $entryDTO[FlickrEntry::FIELD_TITLE] = (string)$entry->title;
        foreach ($entry->link as $link) {
            if ($link->attributes()["rel"] == "alternate") {
                $entryDTO[FlickrEntry::FIELD_LINK] = (string)$link["href"];
            } elseif ($link->attributes()["rel"] == "enclosure") {
                $entryDTO[FlickrEntry::FIELD_SRC] = (string)$link["href"];
            }
        }
        $entryDTO[FlickrEntry::FIELD_ID] = (string)$entry->id;
        $entryDTO[FlickrEntry::FIELD_PUBLISHED] = (string)$entry->published;
        $entryDTO[FlickrEntry::FIELD_UPDATED] = (string)$entry->updated;
        $entryDTO[FlickrEntry::FIELD_HTML] = (string)$entry->content;

        return $entryDTO;
    }

    /**
     * @param \SimpleXMLElement $entry
     *
     * @return array
     */
    public static function convertXmlAuthorToDTO(\SimpleXMLElement $entry)
    {
        $authorDTO = [];

        $authorDTO[FlickrAuthor::FIELD_NAME] = (string)$entry->author->name;
        $authorDTO[FlickrAuthor::FIELD_URI] = (string)$entry->author->uri;
        $authorDTO[FlickrAuthor::FIELD_NSID] = (string)$entry->author->nsid;
        $authorDTO[FlickrAuthor::FIELD_ICON] = (string)$entry->author->buddyicon;

        return $authorDTO;
    }
}