<?php

namespace Furesz\Tests\Flickr\Mock;

class MockFlickrResponse {

    /**
     * @return string
     */
    public static function getExpectedResponse(){
        $expectedResponse = <<<EORESPONSE
<feed xmlns="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:flickr="urn:flickr:user" xmlns:media="http://search.yahoo.com/mrss/">
<title>Recent Uploads tagged chamonix, ski and snow</title>
<link rel="self" href="http://api.flickr.com/services/feeds/photos_public.gne?tags=chamonix,ski,snow"/>
<link rel="alternate" type="text/html" href="https://www.flickr.com/photos/"/>
<id>tag:flickr.com,2005:/photos/public/tagged/all/chamonix-ski-snow</id>
<icon>https://s.yimg.com/pw/images/buddyicon.gif</icon>
<subtitle/>
<updated>2015-03-22T16:10:41Z</updated>
<generator uri="https://www.flickr.com/">Flickr</generator>
<entry>
<title>20150318-0042</title>
<link rel="alternate" type="text/html" href="https://www.flickr.com/photos/kermitz/16894058141/"/>
<id>tag:flickr.com,2005:/photo/16894058141</id>
<published>2015-03-22T16:10:41Z</published>
<updated>2015-03-22T16:10:41Z</updated>
<flickr:date_taken>2015-03-18T11:48:26-08:00</flickr:date_taken>
<dc:date.Taken>2015-03-18T11:48:26-08:00</dc:date.Taken>
<content type="html">			&lt;p>&lt;a href="https://www.flickr.com/people/kermitz/">Kermitz1&lt;/a> posted a photo:&lt;/p>	&lt;p>&lt;a href="https://www.flickr.com/photos/kermitz/16894058141/" title="20150318-0042">&lt;img src="https://farm9.staticflickr.com/8735/16894058141_d582ed1c82_m.jpg" width="240" height="135" alt="20150318-0042" />&lt;/a>&lt;/p></content>
<author>
<name>Kermitz1</name>
<uri>https://www.flickr.com/people/kermitz/</uri>
<flickr:nsid>27845935@N04</flickr:nsid>
<flickr:buddyicon>https://farm6.staticflickr.com/5323/buddyicons/27845935@N04.jpg?1371164686#27845935@N04</flickr:buddyicon>
</author>
<link rel="enclosure" type="image/jpeg" href="https://farm9.staticflickr.com/8735/16894058141_d582ed1c82_b.jpg"/>
<category term="travel" scheme="https://www.flickr.com/photos/tags/"/>
<category term="mountain" scheme="https://www.flickr.com/photos/tags/"/>
<category term="snow" scheme="https://www.flickr.com/photos/tags/"/>
<category term="ski" scheme="https://www.flickr.com/photos/tags/"/>
<category term="france" scheme="https://www.flickr.com/photos/tags/"/>
<category term="landscape" scheme="https://www.flickr.com/photos/tags/"/>
<category term="chamonix" scheme="https://www.flickr.com/photos/tags/"/>
<category term="aiguillesrouges" scheme="https://www.flickr.com/photos/tags/"/>
<displaycategories></displaycategories>
</entry>
<entry>
<title>Chamonix #1</title>
<link rel="alternate" type="text/html" href="https://www.flickr.com/photos/antoine_r/16638709509/"/>
<id>tag:flickr.com,2005:/photo/16638709509</id>
<published>2015-03-15T18:23:35Z</published>
<updated>2015-03-15T18:23:35Z</updated>
<flickr:date_taken>2015-03-07T12:25:21-08:00</flickr:date_taken>
<dc:date.Taken>2015-03-07T12:25:21-08:00</dc:date.Taken>
<content type="html">			&lt;p>&lt;a href="https://www.flickr.com/people/antoine_r/">ric_anto&lt;/a> posted a photo:&lt;/p>	&lt;p>&lt;a href="https://www.flickr.com/photos/antoine_r/16638709509/" title="Chamonix #1">&lt;img src="https://farm9.staticflickr.com/8668/16638709509_0468685f96_m.jpg" width="240" height="90" alt="Chamonix #1" />&lt;/a>&lt;/p></content>
<author>
<name>ric_anto</name>
<uri>https://www.flickr.com/people/antoine_r/</uri>
<flickr:nsid>26092009@N08</flickr:nsid>
<flickr:buddyicon>https://farm8.staticflickr.com/7569/buddyicons/26092009@N08.jpg?1416953056#26092009@N08</flickr:buddyicon>
</author>
<link rel="enclosure" type="image/jpeg" href="https://farm9.staticflickr.com/8668/16638709509_0468685f96_b.jpg"/>
<category term="mountain" scheme="https://www.flickr.com/photos/tags/"/>
<category term="snow" scheme="https://www.flickr.com/photos/tags/"/>
<category term="ski" scheme="https://www.flickr.com/photos/tags/"/>
<category term="montagne" scheme="https://www.flickr.com/photos/tags/"/>
<category term="alpes" scheme="https://www.flickr.com/photos/tags/"/>
<category term="neige" scheme="https://www.flickr.com/photos/tags/"/>
<category term="chamonix" scheme="https://www.flickr.com/photos/tags/"/>
<displaycategories></displaycategories>
</entry>
<entry>
<title>Chamonix #2</title>
<link rel="alternate" type="text/html" href="https://www.flickr.com/photos/antoine_r/16637260318/"/>
<id>tag:flickr.com,2005:/photo/16637260318</id>
<published>2015-03-15T18:23:36Z</published>
<updated>2015-03-15T18:23:36Z</updated>
<flickr:date_taken>2015-03-07T13:03:31-08:00</flickr:date_taken>
<dc:date.Taken>2015-03-07T13:03:31-08:00</dc:date.Taken>
<content type="html">			&lt;p>&lt;a href="https://www.flickr.com/people/antoine_r/">ric_anto&lt;/a> posted a photo:&lt;/p>	&lt;p>&lt;a href="https://www.flickr.com/photos/antoine_r/16637260318/" title="Chamonix #2">&lt;img src="https://farm8.staticflickr.com/7636/16637260318_65d6fc0bda_m.jpg" width="240" height="141" alt="Chamonix #2" />&lt;/a>&lt;/p></content>
<author>
<name>ric_anto</name>
<uri>https://www.flickr.com/people/antoine_r/</uri>
<flickr:nsid>26092009@N08</flickr:nsid>
<flickr:buddyicon>https://farm8.staticflickr.com/7569/buddyicons/26092009@N08.jpg?1416953056#26092009@N08</flickr:buddyicon>
</author>
<link rel="enclosure" type="image/jpeg" href="https://farm8.staticflickr.com/7636/16637260318_65d6fc0bda_b.jpg"/>
<category term="mountain" scheme="https://www.flickr.com/photos/tags/"/>
<category term="snow" scheme="https://www.flickr.com/photos/tags/"/>
<category term="ski" scheme="https://www.flickr.com/photos/tags/"/>
<category term="montagne" scheme="https://www.flickr.com/photos/tags/"/>
<category term="alpes" scheme="https://www.flickr.com/photos/tags/"/>
<category term="neige" scheme="https://www.flickr.com/photos/tags/"/>
<category term="chamonix" scheme="https://www.flickr.com/photos/tags/"/>
<displaycategories></displaycategories>
</entry>
</feed>
EORESPONSE;

        return trim($expectedResponse);
    }
}