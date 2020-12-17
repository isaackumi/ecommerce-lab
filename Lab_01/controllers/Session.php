<?php
require 'cart_controller.php';


class Session{

    public static function init(){
        session_start();
    }


    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }


    public static function put(string $key, array $data){


          return $_SESSION[$key] = $data;



    }


    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }


    public static function checkSession(){
        self::init();
        if(self::get("adminlogin") == false){
            self::destroy();
            header("Location:login.php");
        }
    }


    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }

    public static function destroy1(){
        session_destroy();
        header("Location:pages/login.php");
    }


    public static function checklogin(){
        self::init();
        if(self::get("adminlogin") == true){
            header("Location:dashboard.php");
        }
    }


    public static function hasLogin(){

        if(!isset($_SESSION['auth'])){

          return false;
            // header("Location: ../Login/login.php");

        }
    }




    public static function getCartCount(){
      self::set('cart_count',getTotalItemsInCart());
      return getTotalItemsInCart();
    }

    public static function getCartTotalAmount(){
      self::set('cart_total',getTotalItemAmountInCart());
      return getTotalItemAmountInCart();
    }
}
