<?php

function custom_display_color_filters_for_category($output, $taxonomy, $query_vars) {
    // Check if the current product category is the one you want to target
    $target_category = 'your_target_category_slug'; // Replace with your actual category slug

    if (is_product_category($target_category) && $taxonomy === 'pa_color') {
        // Return the original output if the current category matches the target
        return $output;
    }

    // If not the target category, filter out color attributes
    $output = preg_replace('/(<li data-filter-term="pa_color[^>]+>)([^<]+)/', '', $output);

    return $output;
}

add_filter('woocommerce_widget_layered_nav_list', 'custom_display_color_filters_for_category', 10, 3);
