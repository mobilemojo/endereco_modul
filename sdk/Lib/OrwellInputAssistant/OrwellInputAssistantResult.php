<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

abstract class OrwellInputAssistantResult extends OrwellAbstractResult{
	
	private $tid = null;
	
    /**
     * Returns $tid.
     *
     * @see OrwellInputAssistantResult::$tid
     */
    public function getTid() {
        return $this->tid;
    }
    
    /**
     * Sets $tid.
     *
     * @param object $tid
     * @see OrwellInputAssistantResult::$tid
     */
    public function setTid($tid) {
		$this->tid = $tid;
    }
}
?>