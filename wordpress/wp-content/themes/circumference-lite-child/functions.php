<?php
function sayHello() {
    echo "hello world";
}

add_shortcode("sayHello", "sayHello");
//add_shortcode(shortCodeName, functionName);

function outputMessage($message) {
    echo "here is your message $message[0]";
}
add_shortcode("message", outputMessage);

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>
