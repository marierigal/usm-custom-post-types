<?php
// Define global constants
function usm_set_constant($constant_name, $value) {
  $constant_name_prefix = 'USM_';
  $constant_name = $constant_name_prefix . $constant_name;
  if (!defined($constant_name)) {
    define($constant_name, $value);
  }
}

usm_set_constant('PLAYER_POSITIONS', array(
  'prop'         => __('Prop', 'usm-plugin'),          // Pilier
  'hooker'       => __('Hooker', 'usm-plugin'),        // Talonneur
  'second-rower' => __('Second Rower', 'usm-plugin'),  // Deuxième ligne
  'flanker'      => __('Flanker', 'usm-plugin'),       // Troisième ligne
  'scrum-half'   => __('Scrum Half', 'usm-plugin'),    // Demi de mêlée
  'fly-half'     => __('Fly Half', 'usm-plugin'),      // Demi d'ouverture
  'centre'       => __('Centre', 'usm-plugin'),        // Centre
  'winger'       => __('Winger', 'usm-plugin'),        // Ailier
  'full-back'    => __('Full Back', 'usm-plugin'),     // Arrière
));

usm_set_constant('STAFF_POSITIONS', array(
  'manager'         => __('Manager', 'usm-plugin'),          // Manager
  'forwards-coach'  => __('Forwards Coach', 'usm-plugin'),   // Entraîneur des avants
  'backs-coach'     => __('Backs Coach', 'usm-plugin'),      // Entraîneur des arrières
  'fitness-trainer' => __('Fitness Trainer', 'usm-plugin'),  // Préparateur physique
  'healer'          => __('Healer', 'usm-plugin'),           // Soigneur
));

usm_set_constant('PLAYER_CATEGORIES', array(
  'first-row'  => __('First row', 'usm-plugin'),
  'second-row' => __('Second row', 'usm-plugin'),
  'third-row'  => __('Third row', 'usm-plugin'),
  'scrum-half' => __('Scrum half', 'usm-plugin'),
  'fly-half'   => __('Fly half', 'usm-plugin'),
  'centre'     => __('Centre', 'usm-plugin'),
  'winger'     => __('Winger', 'usm-plugin'),
  'full-back'  => __('Full back', 'usm-plugin'),
  'staff'      => __('Staff', 'usm-plugin'),
));

usm_set_constant('PLAYER_CATEGORY_POSITION_MAP', array(
  'first-row' => array('prop', 'hooker'),
  'second-row' => array('second-rower'),
  'third-row' => array('flanker'),
  'scrum-half' => array('scrum-half'),
  'fly-half' => array('fly-half'),
  'centre' => array('centre'),
  'winger' => array('winger'),
  'full-back' => array('full-back'),
  'staff' => array('manager','forwards-coach','backs-coach','fitness-trainer','healer'),
));

usm_set_constant('SPONSOR_ENGAGEMENT_LEVELS', array(
  'privilege'        => __('Privilege', 'usm-plugin'),      // Privilège
  'first-rower'      => __('First Rower', 'usm-plugin'),    // 1ère Ligne
  'second-rower'     => __('Second Rower', 'usm-plugin'),   // 2ème Ligne
  'third-rower'      => __('Third Rower', 'usm-plugin'),    // 3ème Ligne
  'centre'           => __('Centre', 'usm-plugin'),         // 3/4 Centre
  'green-and-black'  => __('Green & Black', 'usm-plugin'),  // Vert & Noir
));
