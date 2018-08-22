<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantPostCodeCityExpansionResult extends OrwellInputAssistantResult {
	
	/**
	 * @constructor
	 * @param object $oiaWSResult object returned by the webservice
	 */
	public function __construct($oiaWSResult){
		$this->elements = array();
		
		for($i=0; $i<count($oiaWSResult->city); $i++){
			$elem = new OrwellInputAssistantPostCodeCityExpansionResultElement();
			
			$elem->setCity($oiaWSResult->city[$i]);
			$elem->setPostCode($oiaWSResult->postCode[$i]);
			
			$this->elements[] = $elem;
		}
		
		$this->status = $oiaWSResult->status;
		
		$tid = $oiaWSResult->tid;
		$this->setTid($tid);
	}

	/**
	 * @return OrwellInputAssistantPostCodeCityExpansionResultElement[]
	 */
	public function getElements(){
		return parent::getElements();
	}
}
?>