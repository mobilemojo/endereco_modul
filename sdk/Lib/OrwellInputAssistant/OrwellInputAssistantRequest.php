<?php

/*
 *	Created: 	12.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */
 
abstract class OrwellInputAssistantRequest {
	
	/*
	 * 
	 *		MEMBER DEFINITION 
	 * 
	 */
	
	/**
	 * @var string		transaction id consisting of session_id + form_id + field_id + counter
	 */
	private $tid = null;
	
	/**
	 * @var string		used to configure the maximum number of results to be returned
	 */
	private $maxHits = null;
	
	/**
	 * @var string		used to influence the search algorithm
	 * 					possible values depend on concrete service that is used
	 */
	private $search = null;
	
	/**
	 * @var string		used to configure how the results should be sorted
	 */
	private $sort = null;
	
	/**
	 * @var string		used to configure either the character encoding or the format of the output
	 * 					possible values depend on concrete service that is used
	 */
	private $encoding = null;
	
	/*
	 * 
	 *		GETTERS AND SETTERS 
	 * 
	 */
		
    /**
     * Returns $encoding.
     *
     * @see OrwellInputAssistantRequest::$encoding
     */
    public function getEncoding() {
    	if($this->encoding == null)
			return "";
		else
        	return $this->encoding;
    }
    
    /**
     * Sets $encoding.
     *
     * @param object $encoding
     * @see OrwellInputAssistantRequest::$encoding
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }
    
    /**
     * Returns $maxHits.
     *
     * @see OrwellInputAssistantRequest::$maxHits
     */
    public function getMaxHits() {
    	if($this->maxHits == null)
			return "";
		else
        	return $this->maxHits;
    }
    
    /**
     * Sets $maxHits.
     *
     * @param object $maxHits
     * @see OrwellInputAssistantRequest::$maxHits
     */
    public function setMaxHits($maxHits) {
        $this->maxHits = $maxHits;
    }
    
    /**
     * Returns $search.
     *
     * @see OrwellInputAssistantRequest::$search
     */
    public function getSearch() {
    	if($this->search == null)
			return "";
		else
        	return $this->search;
    }
    
    /**
     * Sets $search.
     *
     * @param object $search
     * @see OrwellInputAssistantRequest::$search
     */
    public function setSearch($search) {
        $this->search = $search;
    }
    
    /**
     * Returns $sort.
     *
     * @see OrwellInputAssistantRequest::$sort
     */
    public function getSort() {
    	if($this->sort == null)
			return "";
		else
        	return $this->sort;
    }
    
    /**
     * Sets $sort.
     *
     * @param object $sort
     * @see OrwellInputAssistantRequest::$sort
     */
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    /**
     * Returns $tid.
     *
     * @see OrwellInputAssistantRequest::$tid
     */
    public function getTid() {
    	return $this->tid;
    }
    
    /**
     * calling this function those not change the value of tid
     *
     * @param object $tid
     * @see OrwellInputAssistantRequest::$tid
     * 
     */
    public function setTid($tid) {
        $this->tid = $tid;
    }
}
?>