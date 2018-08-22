<?php

/*
 *	Created: 	22.12.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellAccountCheckAccountCheckResult extends OrwellAbstractResult{
	
	public function __construct($oacWSresult){
		
		$elem = new OrwellAccountCheckAccountCheckResultElement();
		
		$elem->setBankCodeDeletion($oacWSresult->bankCodeDeletion);
		$elem->setChangeCode($oacWSresult->changeCode);
		$elem->setBankCodeOwner($oacWSresult->bankCodeOwner);
		$elem->setBankNameShort($oacWSresult->bankNameShort);
		$elem->setBankPostCode($oacWSresult->bankPostCode);
		$elem->setPan($oacWSresult->pan);
		$elem->setBankName($oacWSresult->bankName);
		$elem->setBankCode($oacWSresult->bankCode);
		$elem->setBankCity($oacWSresult->bankCity);
		$elem->setBic($oacWSresult->bic);
		$elem->setBankCodeNext($oacWSresult->bankCodeNext);
		$elem->setRuleNumber($oacWSresult->ruleNumber);
		$elem->setDataSetNumber($oacWSresult->dataSetNumber);
		$elem->setAccountNumber($oacWSresult->accountNumber);
		
		$this->elements[] = $elem;
		$this->status = $oacWSresult->status;
	}
}
?>