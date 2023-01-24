<?php
/**
 * @package  USMPlugin
 *
 * Custom Post Type    Player
 * Slug                usmp_player
 *
 * Fields
 *   - last_name
 *   - first_name
 *   - position
 *   - height
 *   - weight
 *   - age
 *   - history
 *   - thumbnail
 */

function usmp_player() {
  register_post_type('usmp_player',
    array(
      'labels' => array(
        'name'          => __('Players', 'usm-plugin'),
        'singular_name' => __('Player',  'usm-plugin'),
      ),
      'menu_icon'   => 'dashicons-groups',
      'public'      => true,
      'has_archive' => true,
      'rewrite'     => array('slug' => 'players'),
      'supports'    => array('thumbnail'),
      'capability_type' => array('usmp_player', 'usmp_players'),
    )
  );
}
add_action('init', 'usmp_player');

function usmp_player_html($post) {
  $meta_value = get_post_meta($post->ID);
  $players_positions = USMP_PLAYER_POSITIONS;
  $staff_positions = USMP_STAFF_POSITIONS;
  include('player-meta-box.php');
}

function usmp_player_meta_box() {
  add_meta_box(
    'usmp_player_meta_box',       // Unique ID
    __('Player information', 'usm-plugin'), // Box title
    'usmp_player_html',              // Content callback, must be of type callable
    'usmp_player'                         // Post type
  );
}
add_action( 'add_meta_boxes', 'usmp_player_meta_box' );

function usmp_player_meta_save($post_id) {
  if ($post_id == null || empty($_POST)) {
    return;
  }

  // Check post type
  if (!isset($_POST['post_type']) || $_POST['post_type'] != 'usmp_player') {
    return;
  }

  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['usmp_player_nonce']) && wp_verify_nonce($_POST['usmp_player_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['usmp_player_last_name'])) {
    $last_name = sanitize_text_field($_POST['usmp_player_last_name']);
    update_post_meta($post_id, 'usmp_player_last_name', $last_name);
  }

  if (isset($_POST['usmp_player_first_name'])) {
    $first_name = sanitize_text_field($_POST['usmp_player_first_name']);
    update_post_meta($post_id, 'usmp_player_first_name', $first_name);
  }

  if (isset($_POST['usmp_player_position'])) {
    update_post_meta($post_id, 'usmp_player_position', $_POST['usmp_player_position']);
  }

  if (isset($_POST['usmp_player_height'])) {
    update_post_meta($post_id, 'usmp_player_height', $_POST['usmp_player_height']);
  }

  if (isset($_POST['usmp_player_weight'])) {
    update_post_meta($post_id, 'usmp_player_weight', $_POST['usmp_player_weight']);
  }

  if (isset($_POST['usmp_player_age'])) {
    update_post_meta($post_id, 'usmp_player_age', $_POST['usmp_player_age']);
  }

  if (isset($_POST['usmp_player_history'])) {
    update_post_meta($post_id, 'usmp_player_history', sanitize_text_field($_POST['usmp_player_history']));
  }

  if (isset($_POST['usmp_player_thumbnail'])) {
    update_post_meta($post_id, 'usmp_player_thumbnail', $_POST['usmp_player_thumbnail']);
  }

  // Update post title
  global $post;
  if (empty($post)) $post = get_post($post_id);
  if (isset($last_name) && isset($first_name)) {
    global $wpdb;
    $title = $last_name . ' ' . $first_name;
    $where = array('ID' => $post_id);
    $wpdb->update(
      $wpdb->posts,
      array('post_title' => $title),
      $where,
    );
  }
}
add_action('save_post', 'usmp_player_meta_save');

include('player-admin-table.php');
