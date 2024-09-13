<?php
/*
Plugin Name: Weather Report
Plugin URI: https://google.com
Description: A simple plugin to display weather reports using an external weather API.
Version: 1.0
Author: Your Name
Author URI: https://google.com
License: MIT
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Hook the function that registers the shortcode
add_action('init', 'wr_register_shortcodes');

function wr_register_shortcodes() {
    add_shortcode('weather_report', 'wr_weather_report_shortcode');
}

// Shortcode function to display the weather report
function wr_weather_report_shortcode($atts) {
    // API key and city (you can also get these from shortcode attributes)
    $api_key = 'bf560f2e67334db76f32be64f86f2231'; // Get your API key from OpenWeatherMap or similar services
    //$city = isset($atts['city']) ? $atts['city'] : 'New York';
    $lon = 73.712479;
    $lat = 24.585445;
    // Fetch the weather data
    $weather_data = wr_get_weather_data($lon, $lat, $api_key);

    if ($weather_data) {
        // Display the weather data
        return wr_display_weather($weather_data);
    } else {
        return '<p>Unable to fetch weather data. Please try again later.</p>';
    }
}

// Function to get weather data from the API
function wr_get_weather_data($lon,$lat, $api_key) {
    $api_url = "http://api.openweathermap.org/data/2.5/weather?lon={$lon}&lat={$lat}&appid={$api_key}&units=metric";

    $response = wp_remote_get($api_url);
    //print_r($response);
    if (is_wp_error($response)) {
        return false; // Handle errors
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data;
}

// Function to format and display weather data
function wr_display_weather($data) {
    $output = '<div class="card text-white bg-light mb-3 weather-report" style="max-width: 18rem;">';
    $output .= '<div class="card-header text-center bg-success"><h3>Weather in ' . $data['name'] . '</h3></div>';
    $output .= '<div class="card-body text-dark">';
    $output .= '<h5 class="card-title text-center">' . ucfirst($data['weather'][0]['description']) . '</h5>';
    $output .= '<p class="card-text"><strong>Temperature:</strong> ' . $data['main']['temp'] . '°C</p>';
    $output .= '<p class="card-text"><strong>Humidity:</strong> ' . $data['main']['humidity'] . '%</p>';
    $output .= '<p class="card-text"><strong>Wind Speed:</strong> ' . $data['wind']['speed'] . ' m/s</p>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_action('wp_enqueue_scripts', 'wr_enqueue_styles');
function wr_enqueue_styles() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('cwr-weather-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('wp_enqueue_scripts', 'wr_enqueue_scripts');
function wr_enqueue_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
}
