<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
	
    public function index() {
        $this->call->view('login');
    }

    public function register() {
        $this->call->view('register');
    }

    public function admin(){
        $this->call->view('index');
    }
}
?>
