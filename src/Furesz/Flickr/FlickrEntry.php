<?php
namespace Furesz\Flickr;

class FlickrEntry
{
    const FIELD_TITLE = "title";
    const FIELD_LINK = "link";
    const FIELD_SRC = "src";
    const FIELD_ID = "id";
    const FIELD_PUBLISHED = "published";
    const FIELD_UPDATED = "updated";
    const FIELD_HTML = "html";

    /** @var  string */
    private $title;

    /** @var  string */
    private $link;

    /** @var  string */
    private $id;

    /** @var  \DateTime */
    private $published;

    /** @var  \DateTime */
    private $updated;

    /** @var  string */
    private $HTMLContent;

    /** @var  FlickrAuthor */
    private $author;

    /** @var  string */
    private $src;

    function __construct(array $entryDTO, FlickrAuthor $author)
    {
        $this->setTitle($entryDTO[self::FIELD_TITLE]);
        $this->setLink($entryDTO[self::FIELD_LINK]);
        $this->setSrc($entryDTO[self::FIELD_SRC]);
        $this->setId($entryDTO[self::FIELD_ID]);
        $this->setPublished($entryDTO[self::FIELD_PUBLISHED]);
        $this->setUpdated($entryDTO[self::FIELD_UPDATED]);
        $this->setHTMLContent($entryDTO[self::FIELD_HTML]);

        $this->author = $author;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        if ($title == "") {
            throw new \InvalidArgumentException("Title invalid");
        }

        $this->title = $title;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        if ($link == "") {
            throw new \InvalidArgumentException("Link invalid: " . var_export($link, 1));
        }

        $this->link = $link;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        if ($id == "") {
            throw new \InvalidArgumentException("ID invalid");
        }

        $this->id = $id;
    }

    /**
     * @param \DateTime $published
     */
    public function setPublished($published)
    {
        if ($published == "") {
            throw new \InvalidArgumentException("Date published is blank, invalid");
        }
        $this->published = new \DateTime($published);
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        if ($updated == "") {
            throw new \InvalidArgumentException("Date updated is blank, invalid");
        }
        $this->updated = new \DateTime($updated);
    }

    /**
     * @param string $HTMLContent
     */
    public function setHTMLContent($HTMLContent)
    {
        if ($HTMLContent == "") {
            throw new \InvalidArgumentException("HTML invalid");
        }

        $this->HTMLContent = $HTMLContent;
    }

    /**
     * @param FlickrAuthor $author
     */
    public function setAuthor(FlickrAuthor $author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function getHTMLContent()
    {
        return $this->HTMLContent;
    }

    /**
     * @return FlickrAuthor
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $link
     */
    private function setSrc($link)
    {
        if ($link == "") {
            throw new \InvalidArgumentException("Source is blank, invalid");
        }
        $this->src = $link;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }
}
