## KC PHPUG - Weather Service Example Project

## Installation
Works great with PHP's development web server or [Laravel Homestead](http://laravel.com/docs/4.2/homestead)

````bash
git clone git@github.com:kcphpug/WeatherService.git WeatherService
cd WeatherService
composer install
cp .env.example .env
cd public
php -S 127.0.0.1:8800
````

## Credits

### Intro to AngularJS

Meeting on May 13, 2015 | By Lee Brandt from PaigeLabs. AngularJS portions based on what we did at a recent GDGKC meeting:

* http://www.meetup.com/GDG-Kansas-City/events/222165008/
* http://plnkr.co/edit/VcqkgwBnPxnhXQ4hnw8g
* https://github.com/leebrandt/AdvancedAngular

### Introducing Lumen from Laravel

Posted on April 14, 2015 | By Matt Stauffer

https://mattstauffer.co/blog/introducing-lumen-from-laravel

## License
This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Open Lab Time
Looking for ideas of things to add?

## Front-end
* Remove the "Main Temp" and "Min Temp" that appear when the page is loaded
* Enhance the layout eg. add Bootstrap
* Cache the image icons, or better yet--serve up your own!
* Allow pressing Enter to submit form

## Back-end
* Don't cache Errors from proxyed requests
* Add a DB Table (SQLite or even MySQL) to track trends or search stats
* Merge in results from a second API like [PredictTheSky](http://predictthesky.org/developers.html) or [Flickr](https://www.flickr.com/services/api/flickr.places.findByLatLon.html)
* Change [Lumen caching](lumen.laravel.com/docs/cache] to using memcached or Redis
* Add some application logging
* Add some additional metadata to the proxyed request that shows the date pulled or even cache hits
 
