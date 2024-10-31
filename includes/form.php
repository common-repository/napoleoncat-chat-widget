<section id="napoleoncat-chat-widget">
  <h1><?php echo __('NapoleonCat Chat Widget', 'napoleoncat-chat-widget'); ?></h1>

  <form class="wp-form" method="POST">
    <?php wp_nonce_field('NapoleonCat_Chat_Widget_Page', 'NapoleonCat_Chat_Widget'); ?>

    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="FBURL"><?php echo __('Facebook Page URL', 'napoleoncat-chat-widget'); ?></label>
          </th>
          <td>
            <code>facebook.com/</code>
            <input type="text" name="FBURL" id="FBURL" value="<?php echo esc_attr($page); ?>" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="FBLANG"><?php echo __('Language', 'napoleoncat-chat-widget'); ?></label>
          </th>
          <td>
            <select name="FBLANG" id="FBLANG" class="regular-text">
              <?php foreach ($locales as $localeName => $localeValue) : ?>
              <option value="<?php echo $localeValue; ?>"<?php if ($localeValue == $locale) : ?> selected<?php endif; ?>><?php echo $localeName; ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __('Save', 'napoleoncat-chat-widget'); ?>">
    </p>
  </form>

  <div class="newsletter">
    <h2><?php echo __('Newsletter', 'napoleoncat-chat-widget'); ?></h2>
    <p><?php echo __('Leave us your e-mail address and we will send you our newsletter and product updates. We promise not to spam you', 'napoleoncat-chat-widget'); ?></p>
    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup">
    <form action="//napoleoncat.us8.list-manage.com/subscribe/post?u=0040dba863e287e8a82fb8d89&amp;id=<?php if (get_user_locale() == 'pl_PL') : echo '0461dec3aa'; else : echo 'ded82d8281'; endif; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
      <div class="mc-field-group">
        <div class="input-group">
          <input type="email" value="" name="EMAIL" class="required email regular-text" id="mce-EMAIL" placeholder="<?php echo __('Your email address…', 'napoleoncat-chat-widget'); ?>">

          <span class="input-group-btn">
            <input type="submit" value="<?php echo __('Join', 'napoleoncat-chat-widget'); ?>" name="subscribe" id="mc-embedded-subscribe" class="button button-newsletter">
          </span>
        </div>
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;"><input type="text" name="<?php if (get_user_locale() == 'pl_PL') : echo 'b_0040dba863e287e8a82fb8d89_0461dec3aa'; else : echo 'b_0040dba863e287e8a82fb8d89_ded82d8281'; endif; ?>" tabindex="-1" value=""></div>
    </div>
    </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
    <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';<?php if (get_user_locale() == 'pl_PL') : ?>$.extend($.validator.messages, {required: "To pole jest wymagane.",remote: "Proszę o wypełnienie tego pola.",email: "Proszę o podanie prawidłowego adresu email.",url: "Proszę o podanie prawidłowego URL.",date: "Proszę o podanie prawidłowej daty.",dateISO: "Proszę o podanie prawidłowej daty (ISO).",number: "Proszę o podanie prawidłowej liczby.",digits: "Proszę o podanie samych cyfr.",creditcard: "Proszę o podanie prawidłowej karty kredytowej.",equalTo: "Proszę o podanie tej samej wartości ponownie.",accept: "Proszę o podanie wartości z prawidłowym rozszerzeniem.",maxlength: $.validator.format("Proszę o podanie nie więcej niż {0} znaków."),minlength: $.validator.format("Proszę o podanie przynajmniej {0} znaków."),rangelength: $.validator.format("Proszę o podanie wartości o długości od {0} do {1} znaków."),range: $.validator.format("Proszę o podanie wartości z przedziału od {0} do {1}."),max: $.validator.format("Proszę o podanie wartości mniejszej bądź równej {0}."),min: $.validator.format("Proszę o podanie wartości większej bądź równej {0}.")});<?php endif; ?>}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->
  </div>

  <div class="footer">
    <a class="napoleoncat-chat-powered" href="https://napoleoncat.com?ref=chat-widget&amp;utm_medium=earned&amp;utm_source=chat_widget&amp;utm_campaign=wordpress_settings" target="_blank" rel="noopener">
      <?php echo __('Powered by', 'napoleoncat-chat-widget'); ?> <span class="napoleoncat-chat-powered__logo">NapoleonCat</span>
    </a>
  </div>
</section>
