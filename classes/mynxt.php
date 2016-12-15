<?php

/* Class that customize NXT API request */

class MyCNxt extends CNxtApi {

	function getSecret(){
		if(empty($this->_secret)) {
			echo "\n".'ENTER Secret Phrase: ';
			$this->_secret = trim(fgets(STDIN));
		}
		return $this->_secret;
	}

	function setSecret($sSecret){
		$this->_secret = $sSecret;
	}

	function getAccountId() {
		if(!empty($this->accountId))
			return $this->accountId;
		$this->aInput =  array(	'requestType'=>'getAccountId',
								'secretPhrase'=>$this->getSecret());
		return $this->getResponse('accountRS');
	}

	function getAccount($accountId) {
			$this->aInput =  array(	'requestType'=>'getAccount',
									'account'=>$accountId); 
			return $this->getResponse();
		}

	function getAliasList($accountId) {
			$this->aInput =  array(	'requestType'=>'getAliases',
									'account'=>$accountId);
			return $this->getResponse();
		}

	function getTransaction($transactionId) {
			$this->aInput =  array(	'requestType'=>'getTransaction',
									'transaction'=>$transactionId); 
			return $this->getResponse();
		}

	function getBlock($blockId) {
			$this->aInput =  array(	'requestType'=>'getBlock',
									'block'=>$blockId);
			return $this->getResponse();
		}

	function getTime() {
			$this->aInput =  array('requestType'=>'getTime'); 
			return $this->getResponse('time');
		}

	function sendMoney($amount, $recipient, $deadline=1440,$fee=1,$reference) {
			$this->aInput =  array(	'requestType'=>'sendMoney',
									'secretPhrase'=>$this->getSecret(),
									'amount'=>$amount,
									'recipient'=>$recipient,
									'deadline'=>$deadline,
									'referencedTransaction'=>$reference);
			return $this->getResponse('transaction');
		}

	function unlock(){
			$this->aInput =  array(	'user'=>rand(),
									'requestType'=>'startForging',
									'secretPhrase'=>$this->getSecret()); 
			return $this->getResponse();
	}
	function lock(){
			$this->aInput =  array(	'user'=>rand(),
									'requestType'=>'stopForging',
									'secretPhrase'=>$this->getSecret()); 
			return $this->getResponse();
	}
	function islocked(){
			$this->aInput =  array(	'user'=>rand(),
									'requestType'=>'getForging',
									'secretPhrase'=>$this->getSecret()); 
			return $this->getResponse();
	}
}





