<div class="usmp-form">
  <div class="usmp-form__control">
    <label for="usmp_sponsor_website"><?= __('Website', 'usm-plugin') ?></label>
    <input
      name="usmp_sponsor_website"
      id="usmp_sponsor_website"
      type="url"
      value="<?php if (isset($meta_value['usmp_sponsor_website'])) echo $meta_value['usmp_sponsor_website'][0]; ?>"
    />
  </div>

  <div class="usmp-form__control">
    <label for="usmp_sponsor_engagement_level"><?= __('Engagement level', 'usm-plugin') ?></label>
    <select
      name="usmp_sponsor_engagement_level"
      id="usmp_sponsor_engagement_level"
      class="usmp-form__control__input"
      required
    >
      <option value=""><?= __('Select engagement level', 'usm-plugin') ?></option>

      <?php foreach ($engagement_levels as $engagement_level_key => $engagement_level_name) : ?>
        <option
          value="<?= $engagement_level_key ?>"
          <?php if (isset($meta_value['usmp_sponsor_engagement_level']) && $meta_value['usmp_sponsor_engagement_level'][0] === $engagement_level_key) echo 'selected' ?>
        >
          <?= $engagement_level_name ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
