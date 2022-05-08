<?php 

define("API_URL", "http://localhost:8096/api");

define("LOGIN_API", API_URL."login");
/*
 * RewriteCond %{REQUEST_URI} !^/Api         
RewriteRule ^(.*)$   Api/$1 [L]
 * 
 */
?>