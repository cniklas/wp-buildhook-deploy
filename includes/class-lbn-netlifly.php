<?php
/**
 * LittleBot Netlifly
 *
 * A class for all plugin metaboxs.
 *
 * @version   0.9
 * @category  Class
 * @author    Justin W Hall
 */
class LBN_Netlifly {

	/**
	 * Plugin settings.
	 *
	 * @var string
	 */
	protected $settings = '';

	/**
	 * Netlifly build hook.
	 *
	 * @var string
	 */
	protected $build_hook_url = '';

	/**
	 * Kick it off
	 *
	 * @param string $env The environment we are going to deplo to.
	 */
	function __construct( $env ) {
		$this->settings = get_option( 'lb_netlifly' );
		$this->build_hook_url = $this->get_build_hook( $env );
	}

	/**
	 * Detirmine which env build hook to call.
	 *
	 * @param string $env The environment we want to call the buildhook.
	 *
	 * @return string
	 */
	public function get_build_hook( $env ) {
		return $this->settings[ $env . '_buildhook' ];
	}

	/**
	 * Call Netlifly buildhook.
	 *
	 * @return void
	 */
	function call_build_hook() {

		$response = Requests::post( $this->build_hook_url );

		// further processing ....
		// if ($server_output == "OK") { ... } else { ... }
	}
}
