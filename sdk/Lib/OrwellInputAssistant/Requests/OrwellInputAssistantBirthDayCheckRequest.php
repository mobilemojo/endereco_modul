<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellInputAssistantBirthDayCheckRequest extends OrwellInputAssistantRequest {
	
	/*
	 * 
	 * 		MEMBER DEFINITION
	 * 
	 */
	
	/**
	 * @var string		the birthday to check
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
     * @see OrwellInputAssistantBirthDayCheckRequest::$birthDay
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
     * @see OrwellInputAssistantBirthDayCheckRequest::$birthDay
     */
    public function setBirthDay($birthDay) {
        $this->birthDay = $birthDay;
    }
}
?>