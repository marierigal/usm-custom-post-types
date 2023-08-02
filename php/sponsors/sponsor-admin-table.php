<?php
global $pagenow;

// Add the custom columns to the usmp_sponsor post type:
function usmp_sponsor_manage_columns( $columns )
{
    // save date to the variable
    $date = $columns['date'];
    // unset the 'date' column
    unset( $columns['date'] );
    // unset any column when necessary
    unset( $columns['stats'] );

    // add your column as new array element and give it table header text
    $columns['usmp_sponsor_engagement_level'] = __('Niveau d\'engagement', 'usm-plugin');

    $columns['date'] = $date; // set the 'date' column again, after the custom column

    return $columns;
}

function usmp_sponsor_set_sortable_columns( $columns )
{
    $columns['usmp_sponsor_engagement_level'] = 'usmp_sponsor_engagement_level';
    return $columns;
}

function usmp_sponsor_populate_custom_columns( $column, $post_id )
{
    switch ( $column ) {
        case 'usmp_sponsor_engagement_level':
            $position = get_post_meta($post_id, 'usmp_sponsor_engagement_level', true);
            echo USM_SPONSOR_ENGAGEMENT_LEVELS[$position];
            break;
        default:
            break;
    }
}

function usmp_sponsor_sort_custom_columns_query( $query )
{
    $orderby = $query->get( 'orderby' );

    if ( 'usmp_sponsor_engagement_level' == $orderby ) {

        $meta_query = array(
            'relation' => 'OR',
            array(
                'key' => 'usmp_sponsor_engagement_level',
                'compare' => 'NOT EXISTS',
            ),
            array(
                'key' => 'usmp_sponsor_engagement_level',
            ),
        );

        $query->set( 'meta_query', $meta_query );
        $query->set( 'orderby', 'meta_value' );
    }
}

if ( is_admin() && 'edit.php' == $pagenow && 'usmp_sponsor' == ($_GET['post_type'] ?? '') ) {

    // manage colunms
    add_filter( 'manage_usmp_sponsor_posts_columns', 'usmp_sponsor_manage_columns' );

    // make columns sortable
    add_filter( 'manage_edit-usmp_sponsor_sortable_columns', 'usmp_sponsor_set_sortable_columns' );

    // populate column cells
    add_action( 'manage_usmp_sponsor_posts_custom_column', 'usmp_sponsor_populate_custom_columns', 10, 2 );

    // set query to sort
    add_action( 'pre_get_posts', 'usmp_sponsor_sort_custom_columns_query' );
}
