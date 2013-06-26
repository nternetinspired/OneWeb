#Oneweb - A fat-free CSS framework

Oneweb is a lightweight CSS framework, built with OOCSS principles in mind and an eye to maintainability, scalability and ease of customisation. It's the starting point for each of my own projects and enables me to build sites faster than with any other framework I've tried (which is a lot).

Oneweb is authored in SCSS and ticks most of the other popular buzzwords of the moment by being; mobile-first, content-driven, responsive, object-orientated, hrml5, css3, etc.

##Joomla flavoured
As a Joomla specialist I build most of my sites in Joomla. Oneweb will install in Joomla 2.5 - 3.x by default.

However, Oneweb was built to be platform agnostic so it can also be used to build static sites (I also do this myself) or to form the CSS framework of any other CMS or app. 

To de-joomlify Oneweb you'd need only to modify index.php to remove the calls to Joomla's module positions and insert your own additonal head tag html. You can then just delete (if you want) the following Joomla-specific files:

* templateDetails.xml
* logic.php (you might want to refer to this for your own head tag html)
* the /language and /html folders

##Is Oneweb right for you?

Possibly not. Oneweb is intended to be used by people who:

1. Understand html and css at a fairly high level.
2. Are familiar with the basics of Sass/Scss.
3. Know how to use Google to answer their questions about either of the above.
4. Have no expectation of any kind of free support from me.

##Todo
* Add a template preview image.
* Update touch icons.
* Expand mixins with my most used.
* Check compiled output, again.
