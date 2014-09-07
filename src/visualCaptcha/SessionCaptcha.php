<?php

namespace visualCaptcha;

use Illuminate\Support\Facades\Session;

class SessionCaptcha {
    private $namespace = '';

    public function __construct( $namespace = 'visualcaptcha' ) {
        $this->namespace = $namespace;  
    }

    public function clear() {
        Session::put($this->namespace, Array());
    }

    public function get( $key ) {
        if ( !Session::has($this->namespace) ) {
            $this->clear();
        }

        if ( Session::has($this->namespace . '.' . $key) ) {
            return Session::get( $this->namespace . '.' . $key );
        }

        return null;
    }

    public function set( $key, $value ) {
        if ( !Session::has($this->namespace) ) {
            $this->clear();
        }
        Session::put( $this->namespace . '.' . $key, $value );
    }
};

?>