<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */
declare(strict_types=1);

namespace SocialConnect\Common\Http\Client\Curl;

use Psr\Http\Message\RequestInterface;

class RequestException extends \RuntimeException implements \Psr\Http\Client\NetworkExceptionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    public function __construct(RequestInterface $request, string $message = '', int $code = 0, \Throwable $previous = null)
    {
        $this->request = $request;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
