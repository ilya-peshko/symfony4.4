<?php

namespace App\Mailer;
use Psr\Log\LoggerInterface;

/**
 * Class Emailer
 * @package App\Mailer
 */
class Emailer
{
    /**
     * @var string
     */
    private $mySweetParam;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Emailer constructor.
     * @param string $mySweetParam
     * @param LoggerInterface $logger
     */
    public function __construct(string $mySweetParam, LoggerInterface $logger)
    {
        $this->mySweetParam = $mySweetParam;
        $this->logger = $logger;

        $logger->alert('BOOM!');
        $logger->debug($mySweetParam);

        dump($mySweetParam);
    }

    public function create(): \Swift_Message
    {

    }
}