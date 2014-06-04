LocationSearch
==============

This is my recruitment task for [AeriaGames](http://www.aeriagames.com/)

Installation
------------

Clone this repository and run `install.sh` script

**IMPORTANT!**

Script will create `google.key` file inside `config` directory. **Make sure** you put a valid GoogleAPI key inside this file.

Usage
-----

After you set up your vhost, you can run:

    http://localhost/places/search/<your query>

Test vector
-----------

I've tested the following queries:

    http://localhost/places/search/burritos in Berlin
    http://localhost/places/search/burritos Berlin
    http://localhost/places/search/ramen in Tokyo
    http://localhost/places/search/kebab Szczecin
    http://localhost/places/search/aeria+games+berlin
    http://localhost/places/search/pizza słupsk
    http://localhost/places/search/trattoria
    http://localhost/places/search/tastiest food in moscow

The following queries return `No results` error response:

    http://localhost/places/search/tasty+food_szczecin
    http://localhost/places/search/kjfdhgkjsdfghsakdlfhsdaflkjhsdafasd
    http://localhost/places/search/vegetarian_should_see_no_results

If `google.key` file doesn't exist, `Unexpected error: File "google.key" not found in "/config" dir.` error response is returned

If `google.key` file exists, but has no content, `Unexpected error: You should place your GoogleAPI key in "google.key" file.` error response is returned

If `google.key` file exists, has some content, but `API` key in invalid, `Request denied. Check your API key` error response is returned

