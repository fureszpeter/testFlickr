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
        $this->setXml($response);
        $this->parseXml();
    }

    /**
     * @param $xmlString
     */
    public function setXml($xmlString)
    {
        $this->xml = new \SimpleXMLElement($xmlString);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    private function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
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

    private function parseXml()
    {
        $this->setTitle((string)$this->xml->title);
        $this->setId((string)$this->xml->id);
        $this->setUpdated(new \DateTime((string)$this->xml->updated));
    }

    /**
     * @param string $title
     */
    private function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return FlickrEntry[]
     */
    public function getEntries()
    {
        /** @var \SimpleXMLElement $xmlNode */
        /** @var \SimpleXMLElement $entry */
        foreach ($this->xml->entry as $entry) {
            $entryDTO[FlickrEntry::FIELD_TITLE] = (string)$entry->title;
            foreach ($entry->link as $link){
                if ($link->attributes()["rel"]=="alternate"){
                    $entryDTO[FlickrEntry::FIELD_LINK] = (string)$link["href"];
                }elseif($link->attributes()["rel"]=="enclosure"){
                    $entryDTO[FlickrEntry::FIELD_SRC] = (string)$link["href"];
                }
            }
            $entryDTO[FlickrEntry::FIELD_ID] = (string)$entry->id;
            $entryDTO[FlickrEntry::FIELD_PUBLISHED] = (string)$entry->published;
            $entryDTO[FlickrEntry::FIELD_UPDATED] = (string)$entry->updated;
            $entryDTO[FlickrEntry::FIELD_HTML] = (string)$entry->content;

            $authorDTO[FlickrAuthor::FIELD_NAME] = (string)$entry->author->name;
            $authorDTO[FlickrAuthor::FIELD_URI] = (string)$entry->author->uri;
            $authorDTO[FlickrAuthor::FIELD_NSID] = (string)$entry->author->nsid;
            $authorDTO[FlickrAuthor::FIELD_ICON] = (string)$entry->author->buddyicon;

            yield new FlickrEntry($entryDTO, new FlickrAuthor($authorDTO));
        }
    }
}