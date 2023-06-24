<?php

function hide_ns_and_routes( $response ) {
    $data = $response->get_data();
    $data['namespaces'] = [];
    $data['routes'] = [];
    $response->set_data( $data );

    return $response;
}
add_filter( 'rest_index', 'hide_ns_and_routes' );

add_filter('rest_endpoints', function( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
});
