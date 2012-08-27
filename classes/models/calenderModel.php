<?php

class calender{
    public $daysOTW;
    public $daysIM;
    public $months;
    public $time;
    
    public $spaces;
    
    public $calender;
    public $week;
    public $count;
    
    function __construct($time){
        $this->time = $time;
        $this->count = 0;
                
        $this->daysOTW = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        $this->months = array('January' => '31',
            'February' => '28', /*, 29 in leap years*/
            'March' => '31', 
            'April' => '30', 
            'May' => '31', 
            'June' => '30', 
            'July' => '31', 
            'August' => '31',
            'September' => '30',
            'October' => '31', 
            'November' => '30',
            'December' => '31', 
        );
        
        $this->calender = array();
        $week = array();
        
        foreach($this->daysOTW as $d){
            $week[]= array('class' => 'tdTitle', 'id' => '', 'value' => $d);
        }
        $this->calender[] = $week;
    }
    
    function build(){
        $daysInMonth = $this->months[$this->time['month']];
        $this->spaces();
        $endspaces = $this->endspaces($daysInMonth);
        // array(class, id , value)
        for($i = 0;$i < $this->spaces; $i++ ){
            $this->addTocalender(array('class' => 'space', 'id' => 'space', 'value' => '') );
        }
        for($i = 1;$i <= $daysInMonth; $i++ ){
            if($i == $this->time['mday']){
                $this->addTocalender(array('class' => 'td','id' =>  $i, 'value' => 'Today!') );
            }else{
                $this->addTocalender(array( 'class' => 'td', 'id' => $i, 'value' => $i) );
            }
        }
        for($i = 0;$i < $endspaces; $i++ ){
            $this->addTocalender(array( 'class' => 'space',  'id' => 'space', 'value' => '') );
        }
    }
    
    function addTocalender($thing){
        if($this->count >= 7){
            $this->calender[] = $this->week;
            $this->week = array();
            $this->count = 1;
        }else{
            $this->count++;
        }
        $this->week[] = $thing;
    }
    
    
    function spaces(){
        $wday = $this->time['wday'];
        $mday = $this->time['mday'];
        while($mday > 7){
            $mday -= 7; 
        }//mday is now on the same day of the week but in the first 7 days of the month
        $s = $wday - $mday;
        $spaces = 0;
        if($s < 0){
            for($i = 0; $i >= $s; $i--){
                $spaces++;
            }
            $this->spaces = $spaces;
        }else{
            $this->spaces = $s;
        }
    }
    
    function endspaces($daysInMonth){
        $sum = $this->spaces + $daysInMonth;
        while(($sum % 7) != 0){
            $sum++;
        }
        $endspaces = $sum - ($daysInMonth + $this->spaces);
        return $endspaces;
    }
    
    function getArray(){
        $t = $this->calender;
        $t[] = $this->week;
        print_r($t);
        return $t;
    }
}
?>