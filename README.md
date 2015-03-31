#Images Of Chamonix: A Mini Project

The purpose of this exercise is simply to find out *how you approach projects* and *how you structure your code*.  
The exercise tests your skills in both backend, and frontend, development.

This should be quite fun.  We're not in any way trying to catch you out. 
The Project

We'd like you to build a little application that displays photographs, fetched from the public Flickr
API, of snowy Chamonix, the home of our French office.  

Bonus points will be awarded for showing initiative - by architecting things to support future enhancements, or by improving the user's experience, for example. 

#The Application

In general, the application should comprise *at least* two parts:

- A PHP script that, when requested, transforms the data in Flickr's most-recent feed - URL provided below - into JSON  and then emits it;
- An HTML5 document that requests the data from the PHP script using AJAX and then displays the photographs as shown in   the screenshot.

#The PHP

We'd like to see object-oriented PHP (5.3 - 5.4).  You'll get bonus points for demonstrating any knowledge of design patterns, best practice, etc etc.

Do *not* use a framework or any third-party libraries.

Fetch image data from

https://api.flickr.com/services/feeds/photos_public.gne?tags=chamonix,ski,snow

#The HTML and JavaScript

In the HTML, we'd like to see semantic markup and evidence that you're aware of progressive enhancement.  The same applies to any HTML created by the JavaScript.

You can use jQuery, but *no* plugins.  You'll get bonus points for showing us more besides.

The image captions, as seen in the screenshot, comprise the title of the photograph and the author's name.  The format is "[title] by [author]".

The image should link to the photograph's page on Flickr (e.g. https://www.flickr.com/photos/emanuelabonardi/16669033879/).

#The CSS

CSS3 is mandatory, given the visual effects we're looking for.
Please do *not* use any third-party frameworks, libraries, or whatever.

What you can't see from the screenshot are some transitions we'd like you to implement.


- On hover, the image should *smoothly* fade from an opacity of 0.8 - the default state - to an opacity of 1.
- On hover, a dark circle, containing a Font Awesome icon of your choice, should be displayed above the centre of the   image.  Take a look at the second image at the top left of the screenshot.
