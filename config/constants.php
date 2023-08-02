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
  'prop'         => __('Pilier', 'usm-plugin'),
  'hooker'       => __('Talonneur', 'usm-plugin'),
  'second-rower' => __('Deuxième ligne', 'usm-plugin'),
  'flanker'      => __('Troisième ligne', 'usm-plugin'),
  'scrum-half'   => __('Demi de mêlée', 'usm-plugin'),
  'fly-half'     => __('Demi d\'ouverture', 'usm-plugin'),
  'centre'       => __('Centre', 'usm-plugin'),
  'winger'       => __('Ailier', 'usm-plugin'),
  'full-back'    => __('Arrière', 'usm-plugin'),
));

usm_set_constant('STAFF_POSITIONS', array(
  'manager'         => __('Manager', 'usm-plugin'),
  'forwards-coach'  => __('Entraîneur des avants', 'usm-plugin'),
  'backs-coach'     => __('Entraîneur des arrières', 'usm-plugin'),
  'fitness-trainer' => __('Préparateur physique', 'usm-plugin'),
  'healer'          => __('Soigneur', 'usm-plugin')
));

usm_set_constant('PLAYER_CATEGORIES', array(
  'first-row'  => __('Première ligne', 'usm-plugin'),
  'second-row' => __('Deuxième ligne', 'usm-plugin'),
  'third-row'  => __('Troisième ligne', 'usm-plugin'),
  'scrum-half' => __('Demi de mêlée', 'usm-plugin'),
  'fly-half'   => __('Demi d\'ouverture', 'usm-plugin'),
  'centre'     => __('Centre', 'usm-plugin'),
  'winger'     => __('Ailier', 'usm-plugin'),
  'full-back'  => __('Arrière', 'usm-plugin'),
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
  'privilege'        => __('Privilège', 'usm-plugin'),
  'first-rower'      => __('Première ligne', 'usm-plugin'),
  'second-rower'     => __('Deuxième ligne', 'usm-plugin'),
  'third-rower'      => __('Troisième ligne', 'usm-plugin'),
  'centre'           => __('3/4 Centre', 'usm-plugin'),
  'green-and-black'  => __('Vert & Noir', 'usm-plugin'),
));
