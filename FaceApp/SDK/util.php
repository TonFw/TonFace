<?php

    function count_dimension($Array, $count = 0) {
        if(is_array($Array)) return count_dimension(current($Array), ++$count);
        else return $count;
    }
    
    function render($url_html) {
        require_once $url_html;
        die();
    }

?>
