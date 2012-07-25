<?php

class cURL {
    protected $opts;
    protected $ch;
    
    public function __construct(){
        # defaul global options
        $this->opts = array(
                CURLOPT_HEADER => FALSE,
                CURLOPT_RETURNTRANSFER => TRUE
        );
        
    }

    public function request($opt){
        # assign global options array
        $opts = $this->opts;
        # assign user's options
        foreach($opt as $k=>$v){
            $opts[$k] = $v;
        }
        curl_setopt_array($this->ch,$opts);
        curl_exec($this->ch);
        $r['code'] = curl_getinfo($this->ch,CURLINFO_HTTP_CODE);
        $r['cr'] = curl_exec($this->ch);
        $r['ce'] = curl_errno($this->ch);
        curl_close($this->ch);
        return $r;
    }

    public function get($url='',$opt=array() ){
        # create cURL resource
        $this->ch = curl_init($url);
        return $this->request($this->ch,$opt);
    }

    public function post($url='', $data=array(), $opt=array() ){
        
        # set POST options
        $opts[CURLOPT_POST] = TRUE;
        $opts[CURLOPT_POSTFIELDS] = $data;

        $this->ch = curl_init($url);
        return $this->request($this->ch,$opt);
    }
}

$cURL = new cURL();
