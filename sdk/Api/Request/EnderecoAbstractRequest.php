<?php
/**
 * Created by IntelliJ IDEA.
 * User: mitch
 * Date: 27.11.16
 * Time: 12:26
 */

abstract class EnderecoAbstractRequest {
    /**
     * Name of the service
     * @var string
     */
    private $service;
    /**
     * This parameter has been deprecated but is still part of the API.
     * @var string
     */
    private $fieldId = 'noLongerUsed';

    /**
     * @var string
     */
    private $transaction;
    private $search = "0";
    private $sort = "0";
    private $callNo = 0;

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return EnderecoAbstractRequest
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * @param string $fieldId
     * @return EnderecoAbstractRequest
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param string $transaction
     * @return EnderecoAbstractRequest
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param string $search
     * @return EnderecoAbstractRequest
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return EnderecoAbstractRequest
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getCallNo()
    {
        return $this->callNo;
    }

    /**
     * @param int $callNo
     * @return EnderecoAbstractRequest
     */
    public function setCallNo($callNo)
    {
        $this->callNo = $callNo;
        return $this;
    }


}