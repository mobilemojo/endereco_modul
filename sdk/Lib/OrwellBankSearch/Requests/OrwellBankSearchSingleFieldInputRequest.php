<?php

/*
 *	Created: 	30.11.2009
 *	Copyright:	Endereco UG (Haftungsbeschränkt)  - Gesellschaft für Master Data Quality Management
 */

class OrwellBankSearchSingleFieldInputRequest {
	
	private $tid = null;
	
	private $input = null;
	
	private $bankCodeFuzzy = null;
	
	private $bankFuzzy = null;
	
	private $postCodeFuzzy = null;
	
	private $cityFuzzy = null;
	
	private $bicFuzzy = null;
	
	private $overallFuzzy = null;
	
	private $maxHits = null;
	
	private $search = null;
	
	private $sort = null;
	
	private $encoding = null;
    
    /**
     * Returns $bankCodeFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$bankCodeFuzzy
     */
    public function getBankCodeFuzzy() {
        return $this->bankCodeFuzzy;
    }
    
    /**
     * Sets $bankCodeFuzzy.
     *
     * @param object $bankCodeFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$bankCodeFuzzy
     */
    public function setBankCodeFuzzy($bankCodeFuzzy) {
        $this->bankCodeFuzzy = $bankCodeFuzzy;
    }
    
    /**
     * Returns $bankFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$bankFuzzy
     */
    public function getBankFuzzy() {
        return $this->bankFuzzy;
    }
    
    /**
     * Sets $bankFuzzy.
     *
     * @param object $bankFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$bankFuzzy
     */
    public function setBankFuzzy($bankFuzzy) {
        $this->bankFuzzy = $bankFuzzy;
    }
    
    /**
     * Returns $bicFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$bicFuzzy
     */
    public function getBicFuzzy() {
        return $this->bicFuzzy;
    }
    
    /**
     * Sets $bicFuzzy.
     *
     * @param object $bicFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$bicFuzzy
     */
    public function setBicFuzzy($bicFuzzy) {
        $this->bicFuzzy = $bicFuzzy;
    }
    
    /**
     * Returns $cityFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$cityFuzzy
     */
    public function getCityFuzzy() {
        return $this->cityFuzzy;
    }
    
    /**
     * Sets $cityFuzzy.
     *
     * @param object $cityFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$cityFuzzy
     */
    public function setCityFuzzy($cityFuzzy) {
        $this->cityFuzzy = $cityFuzzy;
    }
    
    /**
     * Returns $encoding.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$encoding
     */
    public function getEncoding() {
        return $this->encoding;
    }
    
    /**
     * Sets $encoding.
     *
     * @param object $encoding
     * @see OrwellBankSearchSingleFieldInputRequest::$encoding
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }
    
    /**
     * Returns $input.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$input
     */
    public function getInput() {
        return $this->input;
    }
    
    /**
     * Sets $input.
     *
     * @param object $input
     * @see OrwellBankSearchSingleFieldInputRequest::$input
     */
    public function setInput($input) {
        $this->input = $input;
    }
    
    /**
     * Returns $maxHits.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$maxHits
     */
    public function getMaxHits() {
    	if($this->maxHits == null)
			return "10";
		else
        	return $this->maxHits;
    }
    
    /**
     * Sets $maxHits.
     *
     * @param object $maxHits
     * @see OrwellBankSearchSingleFieldInputRequest::$maxHits
     */
    public function setMaxHits($maxHits) {
        $this->maxHits = $maxHits;
    }
    
    /**
     * Returns $overallFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$overallFuzzy
     */
    public function getOverallFuzzy() {
        return $this->overallFuzzy;
    }
    
    /**
     * Sets $overallFuzzy.
     *
     * @param object $overallFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$overallFuzzy
     */
    public function setOverallFuzzy($overallFuzzy) {
        $this->overallFuzzy = $overallFuzzy;
    }
    
    /**
     * Returns $search.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$search
     */
    public function getSearch() {
        return $this->search;
    }
    
    /**
     * Sets $search.
     *
     * @param object $search
     * @see OrwellBankSearchSingleFieldInputRequest::$search
     */
    public function setSearch($search) {
        $this->search = $search;
    }
    
    /**
     * Returns $sort.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$sort
     */
    public function getSort() {
        return $this->sort;
    }
    
    /**
     * Sets $sort.
     *
     * @param object $sort
     * @see OrwellBankSearchSingleFieldInputRequest::$sort
     */
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    /**
     * Returns $tid.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$tid
     */
    public function getTid() {
        return $this->tid;
    }
    
    /**
     * Sets $tid.
     *
     * @param object $tid
     * @see OrwellBankSearchSingleFieldInputRequest::$tid
     */
    public function setTid($tid) {
        $this->tid = $tid;
	}
    
    /**
     * Returns $postCodeFuzzy.
     *
     * @see OrwellBankSearchSingleFieldInputRequest::$postCodeFuzzy
     */
    public function getPostCodeFuzzy() {
        return $this->postCodeFuzzy;
    }
    
    /**
     * Sets $postCodeFuzzy.
     *
     * @param object $postCodeFuzzy
     * @see OrwellBankSearchSingleFieldInputRequest::$postCodeFuzzy
     */
    public function setPostCodeFuzzy($postCodeFuzzy) {
        $this->postCodeFuzzy = $postCodeFuzzy;
    }
    }
?>