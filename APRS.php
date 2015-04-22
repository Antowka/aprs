<?php

/**
 * Created by Anton Nikanorov on 4/20/15.
 * Email: 662307@gmail.com
 * CallSign: UC6KFQ
 */

Class APRS {

	private $server;
	private $callsign;
	private $port;
	private $pass;
	private $ico;
    private $auth;

	function __construct($params){

		$this->server	= $params['server'];
		$this->callsign	= $params['callsign'];
		$this->port		= $params['port'];
		$this->pass		= $params['pass'];
		$this->ico		= $params['ico'];
        $this->auth = 'user '.$params['callsign'].' pass '.$params['pass'];
	}

	/**
	 * Send any aprs message 
	 *
     * @param $msg
	 */
	private function send($msg) {
		$fp = fsockopen($this->server, $this->port);
		fwrite($fp, $this->auth . "\n");
		$received = fread($fp, 512);
		echo $received;
		
		//sleep - before sending msg after auth
		sleep(10);

		fwrite($fp, $msg."\n");
		echo "\n";
		$received = fread($fp, 512);
		echo $received;
		fclose($fp);
	}

	/**
	 * Send position
	 * @param $lat
	 * @param $long
	 * @param $comment
	 */
	  public function sendPosition($lat, $long, $comment) {
	  		$msg = $this->callsign.'>APPS:!'.$lat.'/0'.$long .$this->ico.''.$comment;
	  		$this->send($msg);
	  }

    /**
     *
     * @param $recipient - Callsign
     * @param $msg - message
     */
	  public function sendMsgToCallSign($recipient, $msg) {
	  	//todo - need write implementation
	  }
}