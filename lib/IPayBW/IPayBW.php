<?php
/**
 * The IPayBW client API basic class file
 * @since     v1.0
 */
namespace IPayBW;

/**
 * All interactions with the API can be done with an instance of this class.
 * @package IPayBW
 */
class IPayBW
{
    /**
     * @var Communicator The object for the communication wrapper.
     */
    protected $communicator;

    /**
     * Generates an API object to use for the whole interaction with IPayBW.
     *
     * @param string $instance             The name of the IPayBW instance.
     * @param string $apiSecret            The API secret which can be found in the IPayBW administration.
     * @param string $communicationHandler The preferred communication handler. Default is cURL.
     * @param string $apiBaseDomain        The base domain of the API URL.
     *
     * @throws IPayBWException
     */
    public function __construct($instance, $apiSecret, $communicationHandler = '', $apiBaseDomain = Communicator::API_URL_BASE_DOMAIN)
    {
        $this->communicator = new Communicator(
            $instance,
            $apiSecret,
            $communicationHandler ?: Communicator::DEFAULT_COMMUNICATION_HANDLER,
            $apiBaseDomain
        );
    }

    /**
     * This method returns the version of the API communicator which is the API version used for this
     * application.
     *
     * @return string The version of the API communicator
     */
    public function getVersion()
    {
        return $this->communicator->getVersion();
    }

    /**
     * This magic method is used to call any method available in communication object.
     *
     * @param string $method The name of the method called.
     * @param array  $args   The arguments passed to the method call. There can only be one argument which is the model.
     *
     * @return \IPayBW\Models\Response\Base[]|\IPayBW\Models\Response\Base
     * @throws \IPayBW\IPayBWException The model argument is missing or the method is not implemented
     */
    public function __call($method, $args)
    {
        if (!$this->communicator->methodAvailable($method)) {
            throw new \IPayBW\IPayBWException('Method ' . $method . ' not implemented');
        }
        if (empty($args)) {
            throw new \IPayBW\IPayBWException('Argument model is missing');
        }
        $model = current($args);
        return $this->communicator->performApiRequest($method, $model);
    }
}
