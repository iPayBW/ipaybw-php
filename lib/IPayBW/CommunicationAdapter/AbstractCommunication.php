<?php
/**
 * This class is a template for all communication handler classes.
 * @since     v1.0
 */
namespace IPayBW\CommunicationAdapter;

/**
 * Class AbstractCommunication
 * @package IPayBW\CommunicationAdapter
 */
abstract class AbstractCommunication
{
    /**
     * Perform an API request
     *
     * @param string $apiUrl
     * @param array  $params
     * @param string $method
     *
     * @return mixed
     */
    abstract public function requestApi($apiUrl, $params = array(), $method = 'POST');
}
