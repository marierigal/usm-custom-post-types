<?php
// Define global constants
function set_constant($constant_name, $value) {
  $constant_name_prefix = 'USMP_';
  $constant_name = $constant_name_prefix . $constant_name;
  if (!defined($constant_name)) {
    define($constant_name, $value);
  }
}

set_constant('PLAYER_POSITIONS', array(
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

set_constant('STAFF_POSITIONS', array(
  'manager'         => __('Manager', 'usm-plugin'),          // Manager
  'forwards-coach'  => __('Forwards Coach', 'usm-plugin'),   // Entraîneur des avants
  'backs-coach'     => __('Backs Coach', 'usm-plugin'),      // Entraîneur des arrières
  'fitness-trainer' => __('Fitness Trainer', 'usm-plugin'),  // Préparateur physique
  'healer'          => __('Healer', 'usm-plugin'),           // Soigneur
));

set_constant('SPONSOR_ENGAGEMENT_LEVELS', array(
  'privilege'        => __('Privilege', 'usm-plugin'),      // Privilège
  'first-rower'      => __('First Rower', 'usm-plugin'),    // 1ère Ligne
  'second-rower'     => __('Second Rower', 'usm-plugin'),   // 2ème Ligne
  'third-rower'      => __('Third Rower', 'usm-plugin'),    // 3ème Ligne
  'centre'           => __('Centre', 'usm-plugin'),         // 3/4 Centre
  'green-and-black'  => __('Green & Black', 'usm-plugin'),  // Vert & Noir
));
