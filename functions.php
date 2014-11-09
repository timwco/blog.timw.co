<?php

function custom_excerpt() {
    remove_filter('the_excerpt','wpautop');
    return the_excerpt();
}

add_filter('wp_headers','jt_add_origin');

function jt_add_origin($headers) {
    if( !empty( $_SERVER['HTTP_REFERER'] ) ) {
          $ref = $_SERVER['HTTP_REFERER'];

              $jt_acao = get_option('jt_cross_domain_settings');

              if ( $jt_acao != false ) {
                      $sites = explode(",", $jt_acao);

                            foreach ($sites as $site) {
                                      $pos = strpos($ref, trim($site) );
                                              if ( $pos !== false ) {
                                                          $headers['Access-Control-Allow-Origin'] = trim($site);
                                                                    return $headers;
                                                                  }
                            }
                          }
                }
      return $headers;
}

function cross_domain_settings_api_init() {
    add_settings_section('jt_cross_domain_setting_section',
        'Cross Domain Settings',
          'jt_cross_domain_output',
            'general');

      add_settings_field('jt_cross_domain_settings',
          'Allowed Domains',
            'jt_cross_domain_callback',
              'general',
                'jt_cross_domain_setting_section');

      register_setting('general','jt_cross_domain_settings');
}

add_action('admin_init', 'cross_domain_settings_api_init');

function jt_cross_domain_output() {
    echo "<p>Enter a comma-separated list of the domains you'd like to allow to access files/pages managed by WordPress<br><br> Or enter an asterisk ( * ) to allow any site to make cross-domain AJAX requests to this site.</p>";
}

function jt_cross_domain_callback() {
    echo '<input name="jt_cross_domain_settings" class="regular-text" id="jt_cross_domain_settings" type="text" value="' . get_option('jt_cross_domain_settings') . '" class="code" /> <p class="description">(eg. http://example.com, http://store.example.com, http://foo.bar.com)</p>';
}

