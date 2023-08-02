<?php
global $pagenow;

// Add the custom columns to the usmp_player post type:
function usmp_player_manage_columns( $columns )
{
    // save date to the variable
    $date = $columns['date'];
    // unset the 'date' column
    unset( $columns['date'] );
    // unset any column when necessary
    unset( $columns['stats'] );

    // add your column as new array element and give it table header text
    $columns['usmp_player_position'] = __('Position', 'usm-plugin');

    $columns['date'] = $date; // set the 'date' column again, after the custom column

    return $columns;
}

function usmp_player_set_sortable_columns( $columns )
{
    $columns['usmp_player_position'] = 'usmp_player_position';
    return $columns;
}

function usmp_player_populate_custom_columns( $column, $post_id )
{
    switch ( $column ) {
        case 'usmp_player_position':
            $position = get_post_meta($post_id, 'usmp_player_position', true);
            echo USM_PLAYER_POSITIONS[$position] ?? USM_STAFF_POSITIONS[$position] ?? '-';
            break;
        default:
            break;
    }
}

function usmp_player_sort_custom_columns_query( $query )
{
    $orderby = $query->get( 'orderby' );

    if ( 'usmp_player_position' == $orderby ) {

        $meta_query = array(
            'relation' => 'OR',
            array(
                'key' => 'usmp_player_position',
                'compare' => 'NOT EXISTS',
            ),
            array(
                'key' => 'usmp_player_position',
            ),
        );

        $query->set( 'meta_query', $meta_query );
        $query->set( 'orderby', 'meta_value' );
    }
}

if ( is_admin() && 'edit.php' == $pagenow && 'usmp_player' == ($_GET['post_type'] ?? '') ) {

    // manage colunms
    add_filter( 'manage_usmp_player_posts_columns', 'usmp_player_manage_columns' );

    // make columns sortable
    add_filter( 'manage_edit-usmp_player_sortable_columns', 'usmp_player_set_sortable_columns' );

    // populate column cells
    add_action( 'manage_usmp_player_posts_custom_column', 'usmp_player_populate_custom_columns', 10, 2 );

    // set query to sort
    add_action( 'pre_get_posts', 'usmp_player_sort_custom_columns_query' );
}
