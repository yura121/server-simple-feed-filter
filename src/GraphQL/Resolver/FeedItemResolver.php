<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Entity;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

class FeedItemResolver implements QueryInterface, AliasedInterface
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args): ?Entity\Feed
    {
        return $this->em->getRepository(Entity\Feed::class)->find($args['id']);
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'FeedItem',
        ];
    }
}
