<?php
namespace HappyFiles;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Init {

	public $helpers;
  public $setup;
	public $admin;
	public $gallery;
	public $import;
	public $feedback;

  public static $instance = null;

  public function __construct() {
		require_once HAPPYFILES_PATH . 'includes/helpers.php';
    require_once HAPPYFILES_PATH . 'includes/setup.php';
		require_once HAPPYFILES_PATH . 'includes/admin.php';
		require_once HAPPYFILES_PATH . 'includes/gallery.php';
		require_once HAPPYFILES_PATH . 'includes/import.php';
		require_once HAPPYFILES_PATH . 'includes/feedback.php';

		$this->helpers = new Helpers();
    $this->setup = new Setup();
		$this->admin = new Admin();
		$this->gallery = new Gallery();

    if ( is_admin() ) {
			$this->import = new Import();
			$this->feedback = new Feedback();
    }
  }

  public static function run() {
    if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Init ) ) {
      self::$instance = new self();
    }

    return self::$instance;
  }

}

Init::run();
