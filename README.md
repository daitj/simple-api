simple-api
==========

Simple MVC based api without M and fat C

.htaccess
for RewriteRule to direct all request to index.php

index.php
to parse all the request, include library and load controller accordingly

library/Request.php
Handels all the request GET/POST/PUT
by default all request has been set to json for response, see inside the file for more information

controller/MyController.php 
contains db connection and is default controller
controller/SearchController.php is for demo example

views/ApiView.php
default view for any modication to data like to add data count
views/JsonView.php
demo project's view to return all data in json format
