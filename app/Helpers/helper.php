<?php
if(!function_exists('make_slug')) {
    function make_slug($string) {
        return preg_replace('/\+s/u','-',trim($string));
    }
}
