<?php
/**
 * The signatureCheck request model
 * @since     v1.0
 */
namespace IPayBW\Models\Request;

/**
 * Class SignatureCheck
 * @package IPayBW\Models\Request
 */
class SignatureCheck extends \IPayBW\Models\Base
{
    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \IPayBW\Models\Response\SignatureCheck();
    }
}
