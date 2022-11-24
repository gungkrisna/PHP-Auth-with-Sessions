<?php 
class LoginUser{
	// class properties
	private $account;
	private $password;
	public $error;
	public $success;
	private $storage = "../assets/json/data.json";
	private $stored_accounts;

	// class methods
	public function __construct($account, $password){
		$this->account = $account;
		$this->password = $password;
		$this->stored_accounts = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}


	private function updateLastLogin(){
		foreach($this->stored_accounts as $key => $entry) {
			if ($entry['email'] == $this->account || $entry['username'] == str_replace('@', '', $this->account)) {
				$this->stored_accounts[$key]['last_login'] = time();
				file_put_contents($this->storage, json_encode($this->stored_accounts, JSON_PRETTY_PRINT));
			}
		}
	}

	private function login(){
		foreach ($this->stored_accounts as $account) {
			if($account['email'] == $this->account || $account['username'] == str_replace('@', '', $this->account)){
				if(password_verify($this->password, $account['password'])){
					session_start();
					$this->updateLastLogin();
					$_SESSION['username'] = $account['username'];
					header("location: ../"); exit();
				}
			}
		}
		return $this->error = "Akun atau kata sandi salah";
	}

}