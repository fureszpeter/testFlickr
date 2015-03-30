<?php

namespace Furesz\Flickr;


class FlickrAuthor {

    const FIELD_NAME = "name";
    const FIELD_URI = "uri";
    const FIELD_NSID = "nsid";
    const FIELD_ICON = "icon";


    /** @var  string */
    private $name;

    /** @var  string */
    private $uri;

    /** @var  string */
    private $nsid;

    /** @var  string */
    private $icon;


    function __construct(array $authorDTO)
    {
        $this->setName($authorDTO[self::FIELD_NAME]);
        $this->setIcon($authorDTO[self::FIELD_ICON]);
        $this->setNsid($authorDTO[self::FIELD_NSID]);
        $this->setUri($authorDTO[self::FIELD_URI]);
    }

    /**
     * @param FlickrAuthor $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @param string $nsid
     */
    public function setNsid($nsid)
    {
        $this->nsid = $nsid;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getNsid()
    {
        return $this->nsid;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
