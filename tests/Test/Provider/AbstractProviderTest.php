<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace Test\Provider;

use Psr\Http\Client\ClientInterface;
use SocialConnect\Provider\Consumer;
use SocialConnect\Provider\Session\SessionInterface;
use Test\TestCase;

class AbstractProviderTest extends TestCase
{
    /**
     * @param ClientInterface $httpClient
     * @param SessionInterface|null $session
     * @return ProviderMock
     */
    protected function getAbstractProviderMock(ClientInterface $httpClient = null, SessionInterface $session = null)
    {
        if (!$httpClient) {
            $httpClient = $this->getMockBuilder(ClientInterface::class)
                ->disableOriginalConstructor()
                ->disableProxyingToOriginalMethods()
                ->getMock();
        }

        if (!$session) {
            $session = $this->getMockBuilder(\SocialConnect\Provider\Session\Session::class)
                ->disableOriginalConstructor()
                ->disableProxyingToOriginalMethods()
                ->getMock();
        }

        return new ProviderMock(
            $httpClient,
            $session,
            new Consumer(
                'unknown',
                'unkwown'
            ),
            [
                'redirectUri' => 'http://localhost:8000/${provider}/'
            ]
        );
    }

    public function testGetRedirectUrl()
    {
        parent::assertSame('http://localhost:8000/fake/', $this->getAbstractProviderMock()->getRedirectUrl());
    }
}
