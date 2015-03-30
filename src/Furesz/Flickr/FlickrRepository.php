<?php

namespace Furesz\Flickr;


class FlickrRepository {

    const URL = "https://api.flickr.com/services/feeds/photos_public.gne";

    /** @var  \SimpleXMLElement */
    protected $xmlResponse;


    public function searchTags(array $tags)
    {
        $response = file_get_contents(self::URL . "?tags=" . implode(",", $tags));
        if (!$response){
            throw new \Exception("No response");
        }

        return new FlickrResponse($response);
    }

    /**
     * @return array
     */
    public static function convertDTO(\SimpleXMLElement $XMLElement)
    {
        $dto=[];
        foreach ($XMLElement as $k=>$v){
            $dto[(string)$k]=(string)$v;
        }

        return $dto;
    }

}