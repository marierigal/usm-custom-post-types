<div class="usmp-form">
  <div class="usmp-form__control">
    <label for="usmp_player_last_name"><?= __('Last name', 'usm-plugin') ?></label>
    <input
      name="usmp_player_last_name"
      id="usmp_player_last_name"
      type="text"
      value="<?php if (isset($meta_value['usmp_player_last_name'])) echo $meta_value['usmp_player_last_name'][0]; ?>"
      required
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_first_name"><?= __('First name', 'usm-plugin') ?></label>
    <input
      name="usmp_player_first_name"
      id="usmp_player_first_name"
      type="text"
      value="<?php if (isset($meta_value['usmp_player_first_name'])) echo $meta_value['usmp_player_first_name'][0]; ?>"
      required
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_position"><?= __('Position', 'usm-plugin') ?></label>
    <select
      name="usmp_player_position"
      id="usmp_player_position"
      class="usmp-form__control__input"
      required
    >
      <option value=""><?= __('Select position', 'usm-plugin') ?></option>

      <optgroup label="<?= __('Player', 'usm-plugin') ?>">
        <?php foreach ($player_positions as $position_key => $position_name) : ?>
          <option
            value="<?= $position_key ?>"
            <?php if (isset($meta_value['usmp_player_position']) && $meta_value['usmp_player_position'][0] === $position_key) echo 'selected' ?>
          >
            <?= $position_name ?>
          </option>
        <?php endforeach; ?>
      </optgroup>

      <optgroup label="<?= __('Staff', 'usm-plugin') ?>">
        <?php foreach ($staff_positions as $position_key => $position_name) : ?>
          <option
            value="<?= $position_key ?>"
            <?php if (isset($meta_value['usmp_player_position']) && $meta_value['usmp_player_position'][0] === $position_key) echo 'selected' ?>
          >
            <?= $position_name ?>
          </option>
        <?php endforeach; ?>
      </optgroup>
    </select>
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_height"><?= __('Height (cm)', 'usm-plugin') ?></label>
    <input
      name="usmp_player_height"
      id="usmp_player_height"
      type="number"
      min="0"
      step="1"
      value="<?php if (isset($meta_value['usmp_player_height'])) echo $meta_value['usmp_player_height'][0]; ?>"
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_weight"><?= __('Weight (kg)', 'usm-plugin') ?></label>
    <input
      name="usmp_player_weight"
      id="usmp_player_weight"
      type="number"
      min="0"
      step="1"
      value="<?php if (isset($meta_value['usmp_player_weight'])) echo $meta_value['usmp_player_weight'][0]; ?>"
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_birth_year"><?= __('Birth year', 'usm-plugin') ?></label>
    <input
      name="usmp_player_birth_year"
      id="usmp_player_birth_year"
      type="number"
      min="1900"
      max="<?= date('Y') ?>"
      step="1"
      value="<?php if (isset($meta_value['usmp_player_birth_year'])) echo $meta_value['usmp_player_birth_year'][0]; ?>"
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_player_history"><?= __('History', 'usm-plugin') ?></label>
    <textarea
      name="usmp_player_history"
      id="usmp_player_history"
    ><?php if (isset($meta_value['usmp_player_history'])) echo $meta_value['usmp_player_history'][0]; ?></textarea>
  </div>
</div>
