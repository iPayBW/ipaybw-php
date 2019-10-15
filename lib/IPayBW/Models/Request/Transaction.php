<?php

/**
 * Transaction request model
 */
namespace IPayBW\Models\Request;

/**
 * Transaction class
 *
 * @package IPayBW\Models\Request
 */
class Transaction extends \IPayBW\Models\Base
{
    /** @var int $amount */
    protected $amount;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \IPayBW\Models\Response\Transaction();
    }
}
