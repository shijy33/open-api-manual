<?php

namespace Dashboard;

class Profile {
	
	function __construct() {
		$session_id = session_id();
		if (empty($session_id)) session_start();
		
		if (!isset($_SESSION['user'])) $_SESSION['user'] = NULL;
	}
	
	function __destruct() {
	}
	
	public function login($_username, $_password) {
		$_result = FALSE;
		$_sql = 'SELECT `UID` AS `id`, `password_hash`, `password_salt`, `update_time` FROM `sas_users` WHERE `user_name` = ? LIMIT 1;';
		\DB::query($_sql,$_username);
		if (\DB::num_rows() > 0) {
			$_retval = \DB::row_array();
			
			$password_hash = $this->_encrypt($_password.$_username, $_retval['password_salt']);
			$_sql = 'SELECT `UID` AS `id`, `user_name`, `password_hash`, `name`, `nick_name`, `avatar`, `user_type`, `update_time` FROM `sas_users` WHERE `password_hash` = ? LIMIT 1;';
			\DB::query($_sql,$password_hash);
			if (\DB::num_rows() > 0) {
				$_SESSION['user'] = \DB::row_array();
				$_result = TRUE;
			}
		}
		
		return $_result;
	}
	
	public function check_login() {
		return (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']));
	}
	
	public function register() {
		
	}
	
	public function change_password() {
		
	}
	
	private function _encrypt ($_seed = NULL, $_salt = '') {
		return hash('sha256', $_salt.$_seed);
	}
}

?>