<?php 
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Feedback {

  public function __construct() {
    add_action( 'admin_footer', [$this, 'render_feedback_form'] );
  }

  public function render_feedback_form() {
		if ( ! get_current_screen() ) {
			return;
		}

    if ( get_current_screen() && get_current_screen()->base !== 'plugins' ) {
      return;
    }
    ?>
    <div id="hf-feedback-form-wrapper" style="display: none">
      <div id="hf-feedback-form-inner">
        <h2 class="hf-title"><?php esc_html_e( 'Quick Feedback', 'happyfiles' ); ?></h2>

        <p class="hf-description"><?php esc_html_e( 'Before you deactivate HappyFiles could you let us know why? So we can incorporate your feedback. Thank you!', 'happyfiles' ); ?></p>

        <?php 
        $reasons = [
          'no_longer_needed' => [
            'label' => esc_html__( 'I no longer need this plugin', 'happyfiles' ),
          ],
          
          'found_better_plugin' => [
            'label' => esc_html__( 'I found a better plugin', 'happyfiles' ),
            'input' => esc_html__( 'What is the name of this plugin?', 'happyfiles' ),
          ],

          'how_to_use' => [
            'label' => esc_html__( 'I don\'t know how to use this plugin', 'happyfiles' ),
            'text'  => sprintf( esc_html__( 'Did you watch the official %s?', 'happyfiles' ), '<a href="https://www.youtube.com/watch?v=pqs7X5gO1NM" target="_blank">' . esc_html__( 'video walkthrough', 'happyfiles' ) . '</a>' ),
          ],

          'temporary' => [
            'label' => esc_html__( 'It\'s just a temporary deactivation', 'happyfiles' ),
          ],

          'got_pro' => [
            'label' => esc_html__( 'I upgraded to HappyFiles Pro for unlimited media categories :)', 'happyfiles' ),
          ],

          'other' => [
            'label' => esc_html__( 'Other', 'happyfiles' ),
            'input' => esc_html__( 'Please share the reason.', 'happyfiles' ),
          ],
        ];
        ?>

        <form id="hf-feedback-form" method="post">
          <?php foreach ( $reasons as $key => $value ) { ?>
          <fieldset>
            <div class="reason">
              <input type="radio" name="hf_reason" id="hf_reason_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>">
              <label for="hf_reason_<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $value['label'] ); ?></label>
            </div>
            
            <?php if ( isset( $value['input'] ) ) { ?>
            <input class="hf_reason_<?php echo esc_attr( $key ); ?>" type="text" name="hf_reason_<?php echo esc_attr( $key ); ?>" placeholder="<?php echo esc_attr( $value['input'] ); ?>">
            <?php } ?>

            <?php if ( isset( $value['text'] ) ) { ?>
            <p class="hf_reason_<?php echo esc_attr( $key ); ?>"><?php echo ( $value['text'] ); ?></p>
            <?php } ?>
          </fieldset>
          <?php } ?>

          <div id="hf-feedback-form-sumbit-wrapper">
            <button class="button button-primary" id="hf-feedback-submit"><?php esc_html_e( 'Submit &amp; Deactivate', 'happyfiles' ); ?></button>
            <button class="button button-secondary" id="hf-feedback-skip"><?php esc_html_e( 'Skip &amp; Deactivate', 'happyfiles' ); ?></button>
          </div>
        </form>

        <script>
        jQuery(document).ready(function() {

          var deactivationUrl

          // Show feedback form on plugin deactivation
          jQuery(document).click(function(e) {
            var deactivateButton = jQuery(e.target).closest('span')
            var deactivatePlugin = jQuery(e.target).closest('tr').data('slug')

            if (!deactivateButton.hasClass('deactivate') || deactivatePlugin !== 'happyfiles') {
              return
            }

            deactivationUrl = e.target.href

            if (deactivationUrl) {
              e.preventDefault()
              jQuery('#hf-feedback-form-wrapper').addClass('show')
            }
          })

          // Toggle deactivation reasons
          jQuery(document).on('click', '#hf-feedback-form input[type=radio]', function(e) {
            switch (this.value) {
              case 'found_better_plugin':
                jQuery('.hf_reason_found_better_plugin').addClass('show')
                jQuery('.hf_reason_how_to_use').removeClass('show')
                jQuery('.hf_reason_other').removeClass('show')
                break;

              case 'how_to_use':
                jQuery('.hf_reason_found_better_plugin').removeClass('show')
                jQuery('.hf_reason_how_to_use').addClass('show')  
                jQuery('.hf_reason_other').removeClass('show')
                break;

              case 'other':
                jQuery('.hf_reason_how_to_use').removeClass('show')
                jQuery('.hf_reason_found_better_plugin').removeClass('show')
                jQuery('.hf_reason_other').addClass('show')
                break;
            }
          })

          // Submit feedback form
          jQuery(document).on('submit', '#hf-feedback-form', function(e) {
            e.preventDefault()
            
            var formData = jQuery(this).serializeArray()
            var reason = ''
            var description = ''

            formData.forEach(function(dataObj) {
              if (reason && description) {
                return
              }

              if (!reason && dataObj.value) {
                reason = dataObj.value
              }

              if (reason && dataObj.name === 'hf_reason_' + reason) {
                description = dataObj.value
              }
            })

            // Hide feedback form
            jQuery('#hf-feedback-form-wrapper').removeClass('show')

            // Skip feedback (no reason selected)
            if (reason) {
              jQuery.ajax({
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                url: 'https://happyfiles.io/api/happyfiles/feedback',
                data: JSON.stringify({
                  reason: reason,
                  description: description
                }),
                success: function(res) {
                  if (deactivationUrl) {
                    window.location.href = deactivationUrl
                  } else {
                    location.reload()
                  }
                }, 
                error: function(res) {
                  if (deactivationUrl) {
                    window.location.href = deactivationUrl
                  } else {
                    location.reload()
                  }
                }
              })
            } else {
              // Skip feedback
              if (deactivationUrl) {
                window.location.href = deactivationUrl
              } else {
                location.reload()
              }
            }

          })
        })
        </script>
      </div>
    </div>
    <?php 
  }

}