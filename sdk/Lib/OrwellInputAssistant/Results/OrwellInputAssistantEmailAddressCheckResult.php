<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantEmailAddressCheckResult extends OrwellInputAssistantResult {
	
	public function __construct($oiaWSresult){
		$this->status = $oiaWSresult->status;
		$this->setTid($oiaWSresult->tid);
	}

}
?>