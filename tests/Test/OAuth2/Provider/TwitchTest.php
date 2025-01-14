<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace Test\OAuth2\Provider;

use Psr\Http\Message\ResponseInterface;

class TwitchTest extends AbstractProviderTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getProviderClassName()
    {
        return \SocialConnect\OAuth2\Provider\Twitch::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getTestResponseForGetIdentity(): ResponseInterface
    {
        return $this->createResponse(
            json_encode([
                'data' => [
                    [
                        'id' => 12345,
                    ]
                ],
            ])
        );
    }
}
