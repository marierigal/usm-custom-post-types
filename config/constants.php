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
  'left-prop'    => __('Left Prop', 'usm-plugin'),     // Pilier gauche
  'hooker'       => __('Hooker', 'usm-plugin'),        // Talonneur
  'right-prop'   => __('Right Prop', 'usm-plugin'),    // Pilier droit
  'second-rower' => __('Second Rower', 'usm-plugin'),  // Deuxième ligne
  'flanker'      => __('Flanker', 'usm-plugin'),       // Troisième ligne
  'number-8'     => __('Number 8', 'usm-plugin'),      // Numéro huit
  'scrum-half'   => __('Scrum Half', 'usm-plugin'),    // Demi de mêlée
  'fly-half'     => __('Fly Half', 'usm-plugin'),      // Demi d'ouverture
  'centre'       => __('Centre', 'usm-plugin'),        // Centre
  'winger'       => __('Winger', 'usm-plugin'),        // Ailier
  'full-back'    => __('Full Back', 'usm-plugin'),     // Arrière
));
