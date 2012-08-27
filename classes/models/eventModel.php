<?php


//{
//  "id": "331218348435", 
//  "owner": {
//    "name": "Julia Lam", 
//    "id": "2503747"
//  }, 
//  "name": "Facebook Developer Garage Austin - SXSW Edition", 
//  "description": "Join the Facebook team and local developers for a deep dive into the latest and most exciting ways developers are building with Facebook technologies.  \n\nCome to learn, stay to make friends!\n\nTentative Agenda:\n2:00 - 2:30 PM - Registration\n2:30 - 3:30 PM - Learn the latest from Facebook and local developers\n3:30 - 5:30 PM - Drink with friends!  Stay and mingle with your developer community.\n\n*Come early!  Drink tickets and t-shirts provided to the first 300 attendees.  Cash bar provided for all attendees.\n\nTopics & Speakers:\n--Multi-Platform Social Games (Gareth Davis, Facebook) \n--Increasing Mobile Engagement with Facebook Connect (Josh Williams, Gowalla)\n--Facebook Integration with Seesmic (or How to Build Community Using Octopus Balls...) (John Yamasaki, Seesmic)\n--Going multi-platform: the brave new world beyond facebook.com (Sebastien de Halleux, Playfish / EA Interactive)\n--Socially Connected Exploding Gems Everywhere...Excellent! (Jon David, PopCap Games)\n\n* Emceed by Austin local: whurley, Chaotic Moon Studios\n* All are welcome to attend, no badge is required.\n* If you can't make it in person, you can join the live stream, beginning at 2:00 PM CST, here: http://ustream.tv/fbplatform  \n\n***DAYLIGHT SAVINGS STARTS SUNDAY AT 2 AM, PLEASE ADJUST YOUR CLOCKS ACCORDINGLY***", 
//  "start_time": "2010-03-14T14:00:00", 
//  "end_time": "2010-03-14T17:30:00", 
//  "location": "The Phoenix", 
//  "venue": {
//    "street": "409 Colorado St.", 
//    "city": "Austin", 
//    "state": "Texas", 
//    "country": "United States", 
//    "latitude": 30.2669, 
//    "longitude": -97.7428
//  }, 
//  "privacy": "OPEN", 
//  "updated_time": "2010-04-13T15:29:40+0000"
//}

class eventModel extends genericModel{
    
    public $event_id;
    public $event_data;
    
    public function __construct(){
        parent::__construct();
        $this->facebook = new Facebook($config->fbconfig);
    }
    
    public function inviteUser($user_id){
        // check user isn't invited
        $ret_val = $facebook->api($this->event_id . '/invited/' . $user_id, 'GET');
        
        if(!$ret_val) {
            // if not invited, invite user
            $ret_val = $facebook->api($this->event_id . "/invited/" . $user_id, 'POST');
        }else{
            //log already invited
        }
    }
    
    //public function createEvent(){
    //    //creates a fb event on the graph api
    //    
    //    
    //    // Create an event
    //    $ret_obj = $facebook->api('/me/events', 'POST', array(
    //                                'name' => $event_name,
    //                                'start_time' => $event_start,
    //                                'privacy_type' => $event_privacy
    //                             ));
    //
    //    if(isset($ret_obj['id'])) {
    //        // Success
    //        $event_id = $ret_obj['id'];
    //        printMsg('Event ID: ' . $event_id);
    //    } else {
    //        printMsg("Couldn't create event.");
    //    }
    //}
    
    public function load($event_id){
        $this->event_data = $facebook->api('/' . $event_id);
        
        if($this->event_data){
            return true;
        }else{
            return false;
        }
    }
    
    public function save(){
        print('Not implemented');
    }
    
    /** function adds event to the apps event database */
    public function add($event_id){
        // does event exist on fb?
        if(!$this->load($event_id)){
            //if no return false
            return false;
        }
        // does event exist in the database?
        if(!$this->_db->exists($event_id,'fbid','events') ){
            // doesn't exist so add
            $this->_db->insert('events',array('fbid' => $event_id) );
        }
        //returning true even if event already exists won't duplicate invites
        // because of later checks but will allow new users to be invited.
        return true;
    }
}

?>