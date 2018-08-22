<?php

/*
 *	Created: 	30.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellBankSearchResult extends OrwellAbstractResult{
	
	public function __construct($obsresult){
		
		if(count($obsresult->bank->bank) == 1){
			
			$elem = new OrwellBankSearchResultElement();
			
			$elem->setPan($obsresult->pan->pan);
			$elem->setCity($obsresult->city->city);
			$elem->setBankCode($obsresult->bankCode->bankCode);
			$elem->setBic($obsresult->bic->bic);
			$elem->setPostCode($obsresult->postCode->postCode);
			$elem->setFuzzyValue($obsresult->fuzzyValue->fuzzyValue);
			$elem->setBankShort($obsresult->bankShort->bankShort);
			$elem->setBank($obsresult->bank->bank);
			
			$this->elements[] = $elem;
		}
		else
		{
			for($i=0; $i < count($obsresult->bank->bank); $i++){
				$elem = new OrwellBankSearchResultElement();
				
				$elem->setPan($obsresult->pan->pan[$i]);
				$elem->setCity($obsresult->city->city[$i]);
				$elem->setBankCode($obsresult->bankCode->bankCode[$i]);
				$elem->setBic($obsresult->bic->bic[$i]);
				$elem->setPostCode($obsresult->postCode->postCode[$i]);
				$elem->setFuzzyValue($obsresult->fuzzyValue->fuzzyValue[$i]);
				$elem->setBankShort($obsresult->bankShort->bankShort[$i]);
				$elem->setBank($obsresult->bank->bank[$i]);
				
				$this->elements[] = $elem;
			}
		}
		
		$this->status = $obsresult->status->status;
	}
}
?>