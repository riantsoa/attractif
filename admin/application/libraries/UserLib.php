<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Riantsoa
 * 
 * Classe pour gerer les connexions et gerer les sessions des utilisateurs
 */
class UserLib {
    public static $CLIENT = 1;
    public static $ADMIN = 2;

    public static function verifier_si_connecté(){
        self::verify();
    }

    /**
     * Verifie si un utilisateur est connecté
     * sinon il fait une redirection vers la page de login
     */
    protected static function verify() {
        if (empty($_SESSION))
            session_start();
        if (!isset($_SESSION['user'])) {
            redirect('user_ctrl/login', 'refresh');
        }
        return true;
    }

    /**
     * Redirige vers la une page donné si le profil ne correspond pas
     */
    protected static function redirectToProfilMismatchPage() {
        redirect('user_ctrl/not_permited', 'refresh');
    }

    /**
     * Verifie si le profil fourni correspond à celui se l'utilisateur en cours
     * Et le redirige vers une page definie sinon
     * @param integer $profil profil à comparer avec le profil en cours
     */
    public static function profilMatch($tab_profil) {
        self::verify();
        $bMatch = false;
        foreach($tab_profil as $profil) {
            if ($profil == self::getProfil()) $bMatch = true;
        }

        if(!$bMatch) self::redirectToProfilMismatchPage();
    }

    //Verifie si au moins uns des profils est connecté
    public static function forAllProfil(){
        self::verify();
        if(self::getProfil() == self::$CLIENT |
            self::getProfil() == self::$ADMIN) {

        }
        else self::redirectToProfilMismatchPage();

    }

    /**
     * 
     * @param integer $profil profil à comparer avec le profil en cours
     * @return boolean true si le profil correspond
     */
    public static  function profilIs($profil) {
        self::verify();
        if ($profil == self::getProfil())
            return true;
        return false;
    }

    /**
     * Retourne le nom de l'utilisateur stocké dans la session
     */
    public static function getUserName() {
        self::verify();
        return (isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '');
    }

    public static function setUserName($userName) {
        if (!isset($_SESSION))
            session_start();
        $_SESSION['user']['username'] = $userName;
    }
    
    /**
     * Retourne le nom de l'utilisateur stocké dans la session
     */
    public static function getId() {
        self::verify();
        return (isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '');
    }

    public static function setId($id) {
        if (!isset($_SESSION))
            session_start();
        $_SESSION['user']['id'] = $id;
    }

    /**
     * Retourne le profil de l'utilisateur stocké dans la session
     */
    public static function getProfil() {
        self::verify();
        return (isset($_SESSION['user']['profil']) ? $_SESSION['user']['profil'] : '');
    }

    public static function setProfil($profil) {
        if (!isset($_SESSION)) session_start();
        $_SESSION['user']['profil'] = $profil;
    }

    public static function disconnect(){
        if (!isset($_SESSION)) session_start();
        unset($_SESSION['user']);
    }
}
