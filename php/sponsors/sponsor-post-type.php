<?php
/**
 * @package  USMPlugin
 *
 * Custom Post Type    Sponsor
 * Slug                usmp_sponsor
 *
 * Fields
 *   - name
 *   - description
 *   - website
 *   - engagement_level
 *   - thumbnail
 */

function usmp_sponsor() {
  register_post_type('usmp_sponsor',
    array(
      'labels' => array(
        'name'          => __('Sponsors', 'usm-plugin'),
        'singular_name' => __('Sponsor',  'usm-plugin'),
      ),
      'menu_icon'   => 'dashicons-businessman',
      'public'      => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'rewrite'     => array('slug' => 'sponsors'),
      'supports'    => array('title', 'editor', 'thumbnail'),
      'capability_type' => array('usmp_sponsor', 'usmp_sponsors'),
    )
  );
}
add_action('init', 'usmp_sponsor');

function usmp_sponsor_html($post) {
  $meta_value = get_post_meta($post->ID);
  $engagement_levels = USM_SPONSOR_ENGAGEMENT_LEVELS;
  include('sponsor-meta-box.php');
}

function usmp_sponsor_meta_box() {
  add_meta_box(
    'usmp_sponsor_meta_box',        // Unique ID
    __('Sponsor details', 'usm-plugin'),  // Box title
    'usmp_sponsor_html',            // Content callback, must be of type callable
    'usmp_sponsor'                      // Post type
  );
}
add_action( 'add_meta_boxes', 'usmp_sponsor_meta_box' );

function usmp_sponsor_meta_save($post_id) {
  if ($post_id == null || empty($_POST)) {
    return;
  }

  // Check post type
  if (!isset($_POST['post_type']) || $_POST['post_type'] != 'usmp_sponsor') {
    return;
  }

  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['usmp_sponsor_nonce']) && wp_verify_nonce($_POST['usmp_sponsor_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['usmp_sponsor_website'])) {
    update_post_meta($post_id, 'usmp_sponsor_website', sanitize_text_field($_POST['usmp_sponsor_website']));
  }

  if (isset($_POST['usmp_sponsor_engagement_level'])) {
    update_post_meta($post_id, 'usmp_sponsor_engagement_level', $_POST['usmp_sponsor_engagement_level']);
  }
}
add_action('save_post', 'usmp_sponsor_meta_save');

include('sponsor-admin-table.php');
