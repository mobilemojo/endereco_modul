<?php
/**
 * Created by IntelliJ IDEA.
 * User: mitch
 * Date: 27.11.16
 * Time: 12:31
 */

class EnderecoFirstNameCheckRequest extends EnderecoAbstractRequest {
    /**
     * @var string
     */
    private $firstName;

    public function __construct()
    {
        $this->setService('firstNameCheck');
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return EnderecoFirstNameCheckRequest
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }



}