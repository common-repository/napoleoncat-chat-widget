<?php

/*
Plugin Name: NapoleonCat Chat Widget for Facebook
Plugin URI: https://napoleoncat.com/widget
Description: Support your customers with a free live chat. Unlock the potential of Facebook Messenger to boost your sales and user satisfaction.
Version: 1.0.0
Author: NapoleonCat
Author URI: https://napoleoncat.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: napoleoncat-chat-widget
Domain Path: /lang/
*/

$description = __('Support your customers with a free live chat. Unlock the potential of Facebook Messenger to boost your sales and user satisfaction.', 'napoleoncat-chat-widget');

function NapoleonCat_Chat_Widget_Create()
{
  add_submenu_page(
    'options-general.php',
    'NapoleonCat Chat Widget',
    'NapoleonCat Chat Widget',
    'manage_options',
    'napoleoncat-chat-widget',
    'NapoleonCat_Chat_Widget_Page'
  );
}

function NapoleonCat_Chat_Widget_Page()
{
  $locales = array(
    'English (US)' => 'en_US',
    'Polish' => 'pl_PL',
    'Catalan' => 'ca_ES',
    'Czech' => 'cs_CZ',
    'Cebuano' => 'cx_PH',
    'Welsh' => 'cy_GB',
    'Danish' => 'da_DK',
    'German' => 'de_DE',
    'Basque' => 'eu_ES',
    'English (Upside Down)' => 'en_UD',
    'Spanish' => 'es_LA',
    'Spanish (Spain)' => 'es_ES',
    'Guarani' => 'gn_PY',
    'Finnish' => 'fi_FI',
    'French' => 'fr_FR',
    'Galician' => 'gl_ES',
    'Hungarian' => 'hu_HU',
    'Italian' => 'it_IT',
    'Japanese' => 'ja_JP',
    'Korean' => 'ko_KR',
    'Norwegian (Bokmal)' => 'nb_NO',
    'Norwegian (Nynorsk)' => 'nn_NO',
    'Dutch' => 'nl_NL',
    'Frisian' => 'fy_NL',
    'Portuguese (Brazilian)' => 'pt_BR',
    'Portuguese' => 'pt_PT',
    'Romanian' => 'ro_RO',
    'Russian' => 'ru_RU',
    'Slovak' => 'sk_SK',
    'Slovenian' => 'sl_SI',
    'Swedish' => 'sv_SE',
    'Thai' => 'th_TH',
    'Turkish' => 'tr_TR',
    'Kurdish (Kurmanji)' => 'ku_TR',
    'Simplified Chinese (China)' => 'zh_CN',
    'Traditional Chinese (Hong Kong)' => 'zh_HK',
    'Traditional Chinese (Taiwan)' => 'zh_TW',
    'Afrikaans' => 'af_ZA',
    'Albanian' => 'sq_AL',
    'Armenian' => 'hy_AM',
    'Azerbaijani' => 'az_AZ',
    'Belarusian' => 'be_BY',
    'Bengali' => 'bn_IN',
    'Bosnian' => 'bs_BA',
    'Bulgarian' => 'bg_BG',
    'Croatian' => 'hr_HR',
    'Dutch (België)' => 'nl_BE',
    'English (UK)' => 'en_GB',
    'Estonian' => 'et_EE',
    'Faroese' => 'fo_FO',
    'French (Canada)' => 'fr_CA',
    'Georgian' => 'ka_GE',
    'Greek' => 'el_GR',
    'Gujarati' => 'gu_IN',
    'Hindi' => 'hi_IN',
    'Icelandic' => 'is_IS',
    'Indonesian' => 'id_ID',
    'Irish' => 'ga_IE',
    'Javanese' => 'jv_ID',
    'Kannada' => 'kn_IN',
    'Kazakh' => 'kk_KZ',
    'Latvian' => 'lv_LV',
    'Lithuanian' => 'lt_LT',
    'Macedonian' => 'mk_MK',
    'Malagasy' => 'mg_MG',
    'Malay' => 'ms_MY',
    'Maltese' => 'mt_MT',
    'Marathi' => 'mr_IN',
    'Mongolian' => 'mn_MN',
    'Nepali' => 'ne_NP',
    'Punjabi' => 'pa_IN',
    'Serbian' => 'sr_RS',
    'Somali' => 'so_SO',
    'Swahili' => 'sw_KE',
    'Filipino' => 'tl_PH',
    'Tamil' => 'ta_IN',
    'Telugu' => 'te_IN',
    'Malayalam' => 'ml_IN',
    'Ukrainian' => 'uk_UA',
    'Uzbek' => 'uz_UZ',
    'Vietnamese' => 'vi_VN',
    'Khmer' => 'km_KH',
    'Tajik' => 'tg_TJ',
    'Arabic' => 'ar_AR',
    'Hebrew' => 'he_IL',
    'Urdu' => 'ur_PK',
    'Persian' => 'fa_IR',
    'Pashto' => 'ps_AF',
    'Burmese' => 'my_MM',
    'Burmese (Zawgyi)' => 'qz_MM',
    'Oriya' => 'or_IN',
    'Sinhala' => 'si_LK',
    'Kinyarwanda' => 'rw_RW',
    'Kurdish' => 'cb_IQ',
    'Hausa' => 'ha_NG',
    'Japanese (Kansai)' => 'ja_KS',
    'Breton' => 'br_FR',
    'Tamazight' => 'tz_MA',
    'Corsican' => 'co_FR',
    'Assamese' => 'as_IN',
    'Fulah' => 'ff_NG',
    'Sardinian' => 'sc_IT',
    'Silesian' => 'sz_PL',
  );
  ksort($locales);

  if (!current_user_can('manage_options')) {
    wp_die('Unauthorized user');
  }

  if (isset($_POST['FBURL']) && isset($_POST['FBLANG']))
  {
    if (!isset($_POST['NapoleonCat_Chat_Widget']) || !wp_verify_nonce($_POST['NapoleonCat_Chat_Widget'], 'NapoleonCat_Chat_Widget_Page'))
    {
      print 'Sorry, your nonce did not verify.';
      exit;
    } else {
      if (isset($_POST['FBURL'])) {
        $page = sanitize_text_field($_POST['FBURL']);
        update_option('FBURL', $page);
      }

      if (isset($_POST['FBLANG'])) {
        $locale = $_POST['FBLANG'];

        if (in_array($locale, $locales)) {
          update_option('FBLANG', $locale);
        }
      }
    }
  }

  $id = get_option('FBURL');
  $locale = get_option('FBLANG', get_locale());

  include_once(plugin_dir_path( __FILE__ ) . 'includes/form.php');
}

function NapoleonCat_Chat_Widget_Styles() {
  wp_register_style('napoleoncat-chat-widget', plugins_url('napoleoncat-chat-widget/css/plugin.css'));
  wp_enqueue_style('napoleoncat-chat-widget');
}

function NapoleonCat_Chat_Widget_Init()
{
  if (get_option('FBURL') != false) {
    if (get_option('FBLANG')) {
      $id = '"' . get_option('FBURL') . '", "' . get_option('FBLANG') . '"';
    } else {
      $id = '"' . get_option('FBURL') . '"';
    }
    wp_enqueue_script('napoleoncat', 'https://widget.napoleoncat.com/nap-widget.js', array(), '1.0.0', true);
    wp_add_inline_script('napoleoncat', 'napoleonCatWidget.init(' . $id . ');');
  }
}

function NapoleonCat_Chat_Widget_Translate() {
  load_plugin_textdomain('napoleoncat-chat-widget', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}

function NapoleonCat_Chat_Widget_Install() {
  wp_mail(
    'karol@napoleoncat.com', // Email recipient
    'Nowa instalacja pluginu czatu do WordPressa', // Email subject
    'Adres strony: ' . get_site_url() // Email content
  );
}

function NapoleonCat_Chat_Widget_Uninstall() {
  delete_option('FBURL');
  delete_option('FBLANG');
}

add_action('wp_enqueue_scripts', 'NapoleonCat_Chat_Widget_Init');
add_action('admin_enqueue_scripts', 'NapoleonCat_Chat_Widget_Styles');
add_action('admin_menu', 'NapoleonCat_Chat_Widget_Create');
add_action('plugins_loaded', 'NapoleonCat_Chat_Widget_Translate');
register_activation_hook(__FILE__, 'NapoleonCat_Chat_Widget_Install');
register_deactivation_hook(__FILE__, 'NapoleonCat_Chat_Widget_Uninstall');
