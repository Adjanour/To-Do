<?php

class Authentication {
    private $session;
    private $userRepository;

    public function __construct(UserRepository $userRepository, Session $session) {
        $this->userRepository = $userRepository;
        $this->session = $session;
    }

    public function login($username, $password) {
        
        $user = $this->userRepository->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set('user_id', $user['usrIdpk']);
            $this->session->set('user_isActive', $user['usrIsActive']);
            return true;
        }
        
        return false;
    }

    public function logout() {
        $this->session->clear();
    }

    public function isLoggedIn() {
        return $this->session->has('user_id');
    }

    public function getUser(){
        if($this->isLoggedIn()){
            $user =  $this->userRepository->getUserById($this->session->get('user_id'));
            return new User($user['usrName'],$user['usrFirstName'],$user['usrLastName'],$user['usrOtherName'],$user['usrEmailAddress']);
        }
    }
}