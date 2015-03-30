<?php

namespace Furesz\Flickr;

class ApiResponseDTO {
    const FIELD_TITLE = "title";
    const FIELD_AUTHOR_NAME = "author";
    const FIELD_IMG_LINK = "link";
    const FIELD_IMG_SRC = "link";

    /** @var  string */
    public $title;
    /** @var  string */
    public $author;
    /** @var  string */
    public $link;
    /** @var  string */
    public $src;

    function __construct($title, $author, $link, $src)
    {
        $this->title = $title;
        $this->author = $author;
        $this->link = $link;
        $this->src = $src;
    }
}
