<div class="wrap">
  <div id="icon-edit" class="icon32 icon32-posts-quote"><br></div><h2>Display Options</h2>
  <?php if ($message): ?>
    <div class="<?php echo $message['class']; ?>">
      <p><?php echo $message['msg']; ?></p>
    </div>
  <?php if (isset($message['cookie'])) setcookie('yinstagram_response', null, time()-1, '/'); endif; ?>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="update_display_options" value="Y" />
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row">
            <label for="scroll">Scroll</label>
          </th>
          <td>
            <select id="scroll" name="ydo[scroll]">
              <option value="auto" <?php echo (($data['scroll'] == 'auto') || !isset($data['scroll'])) ? 'selected="selected"' : null; ?>>Auto&nbsp;</option>
              <option value="infinite" <?php echo ($data['scroll'] == 'infinite') ? 'selected="selected"' : null; ?>>Infinite&nbsp;</option>
            </select>
          </td>
        </tr>
        <tr valign="top" style="<?php echo ( $data['scroll'] == 'infinite' ) ? 'display: none;' : ''; ?>">
          <th scope="row">
            <label for="height">Height</label>
          </th>
          <td>
            <input type="text" name="ydo[height]" id="height" class="regular-text" value="<?php echo (isset($data['height'])) ? $data['height'] : '300'; ?>"/>
            <p class="description">In pixel.</p>
          </td>
        </tr>
        <tr valign="top" style="<?php echo ( $data['scroll'] == 'infinite' ) ? 'display: none;' : ''; ?>">
          <th scope="row">
            <label for="frame_rate">Frame Rate</label>
          </th>
          <td>
            <input type="text" name="ydo[frame_rate]" id="frame_rate" class="regular-text" value="<?php echo (isset($data['frame_rate'])) ? $data['frame_rate'] : '24'; ?>"/>
            <p class="description">Number of movements/frames per second. Default is 24.</p>
          </td>
        </tr>
        <tr valign="top" style="<?php echo ( $data['scroll'] == 'infinite' ) ? 'display: none;' : ''; ?>">
          <th scope="row">
            <label for="speed">Speed</label>
          </th>
          <td>
            <input type="text" name="ydo[speed]" id="speed" class="regular-text" value="<?php echo (isset($data['speed'])) ? $data['speed'] : '1'; ?>"/>
            <p class="description">Number of pixels moved per frame, must be divisible by total height of scroller.  Default is 1.</p>
          </td>
        </tr>
        <tr valign="top" style="<?php echo ( $data['scroll'] == 'infinite' ) ? 'display: none;' : ''; ?>">
          <th scope="row">
            <label for="direction">Direction</label>
          </th>
          <td>
            <select id="direction" name="ydo[direction]">
              <option value="forwards" <?php echo (($data['direction'] == 'forwards') || !isset($data['direction'])) ? 'selected="selected"' : null; ?>>Up&nbsp;</option>
              <option value="backwards" <?php echo ($data['direction'] == 'backwards') ? 'selected="selected"' : null; ?>>Down&nbsp;</option>
            </select>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Colorbox</th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><span>Colorbox</span></legend>
              <label for="colorbox">
                <input type="checkbox" value="1" id="colorbox" name="ydo[colorbox]" <?php echo empty($data['colorbox']) ? null : 'checked'; ?>>Enable
              </label>
            </fieldset>
            <p class="description">Enable for images widget and infinite scroll.</p>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="theme">Theme</label>
          </th>
          <td>
            <select id="theme" name="ydo[theme]" <?php echo empty($data['colorbox']) ? 'disabled' : null; ?>>
              <option value="1" <?php echo (($data['theme'] == '1') || !isset($data['theme'])) ? 'selected="selected"' : null; ?>>1&nbsp;</option>
              <option value="2" <?php echo ($data['theme'] == '2') ? 'selected="selected"' : null; ?>>2&nbsp;</option>
              <option value="3" <?php echo ($data['theme'] == '3') ? 'selected="selected"' : null; ?>>3&nbsp;</option>
              <option value="4" <?php echo ($data['theme'] == '4') ? 'selected="selected"' : null; ?>>4&nbsp;</option>
              <option value="5" <?php echo ($data['theme'] == '5') ? 'selected="selected"' : null; ?>>5&nbsp;</option>
            </select>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="effect">Effect</label>
          </th>
          <td>
            <select id="effect" name="ydo[effect]" <?php echo empty($data['colorbox']) ? 'disabled' : null; ?>>
              <option value="elastic" <?php echo (($data['effect'] == 'elastic') || !isset($data['effect'])) ? 'selected="selected"' : null; ?>>Elastic&nbsp;</option>
              <option value="fade" <?php echo ($data['effect'] == 'fade') ? 'selected="selected"' : null; ?>>Fade&nbsp;</option>
              <option value="slideshow" <?php echo ($data['effect'] == 'slideshow') ? 'selected="selected"' : null; ?>>Slideshow&nbsp;</option>
            </select>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Social Links</th>
          <td>
            <fieldset>
              <legend class="screen-reader-text">
                <span>Social Links</span>
              </legend>
              <label title="Yes">
                <input type="radio" value="1" name="ydo[display_social_links]" <?php echo ($data['display_social_links']) ? 'checked="checked"' : null; ?>>
                <span>Yes</span>
              </label>
              <br>
              <label title="No">
                <input type="radio" value="0" name="ydo[display_social_links]" <?php echo ($data['display_social_links']) ? null : 'checked="checked"'; ?>>
                <span>No</span>
              </label>
            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input id="submit" class="button-primary" type="submit" value="<?php echo ($data) ? 'Save Changes' : 'Save'; ?>" name="submit">&nbsp;
      <a id="yinstagram-restore-display-options" href="#" class="button-primary">Reset</a>
    </p>
  </form>
</div>
