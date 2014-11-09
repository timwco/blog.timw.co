<?php

function custom_excerpt() {
    remove_filter('the_excerpt','wpautop');
    return the_excerpt();
}


