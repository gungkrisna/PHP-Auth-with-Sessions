<?php 
class RegisterUser{
	// Class properties
	private $name;
	private $username;
	private $email;
	private $raw_password;
	private $encrypted_password;
	public $error;
	public $success;
	private $storage = "../assets/json/data.json";
	private $stored_accounts;
	private $new_user; // array 


	public function __construct($name, $username, $email, $password){
		$this->name = trim($this->name);
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);

		$this->username = trim($this->username);
		$this->username = filter_var(str_replace('@', '', $username), FILTER_SANITIZE_STRING);

		$this->email = trim($this->email);
		$this->email = filter_var($email, FILTER_SANITIZE_STRING);

		$this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
		$this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

		$this->stored_accounts = json_decode(file_get_contents($this->storage), true);

		$this->new_user = [
			"name" => $this->name,
			"username" => $this->username,
			"email" => $this->email,
			"password" => $this->encrypted_password,
			"last_login" => null,
		];

		if($this->checkFieldValues()){
			$this->insertUser();
		}
	}


	private function checkFieldValues(){
		if(empty($this->email) || empty($this->username) || empty($this->raw_password)){
			$this->error = "Seluruh field wajib diisi.";
			return false;
		}else{
			return true;
		}
	}

	private function usernameExists(){
		foreach($this->stored_accounts as $account){
			if($this->username == $account['username']){
				$this->error = "Username sudah digunakan.";
				return true;
			}
		}
		return false;
	}

	private function emailExists(){
		foreach($this->stored_accounts as $account){
			if($this->email == $account['email']){
				$this->error = "Email sudah digunakan.";
				return true;
			}
		}
		return false;
	}


	private function insertUser(){
		if($this->usernameExists() == FALSE && $this->emailExists() == FALSE){
			array_push($this->stored_accounts, $this->new_user);
			if(file_put_contents($this->storage, json_encode($this->stored_accounts, JSON_PRETTY_PRINT))){
				return $this->success = "Akun sukses dibuat.";
			}else{
				return $this->error = "Terjadi kesalahan, coba lagi.";
			}
		}
	}



} // end of class