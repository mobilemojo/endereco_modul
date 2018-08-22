<?php

/*
 *	Created: 	13.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBirthDayCheckResultElement {
	
	/*
	 * 
	 * 		MEMBER DEFINITON
	 * 
	 */
	
	/**
	 * @var string 	the birthday in the format specified in the request
	 */
	private $birthDay = null;
	
	/*
	 * 
	 * 		GETTERS AND SETTERS
	 * 
	 */
	
    /**
     * Returns $birthDay.
     *
     * @see OrwellInputAssistantBirthDayCheckResultElement::$birthDay
     */
    public function getBirthDay() {
    	if($this->birthDay == null)
			return "";
		else
        	return $this->birthDay;
    }
    
    /**
     * Sets $birthDay.
     *
     * @param object $birthDay
     * @see OrwellInputAssistantBirthDayCheckResultElement::$birthDay
     */
    public function setBirthDay($birthDay) {
        $this->birthDay = $birthDay;
    }
    }
?>