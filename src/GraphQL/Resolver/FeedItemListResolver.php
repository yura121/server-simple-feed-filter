<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Entity;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

class FeedItemListResolver implements QueryInterface, AliasedInterface
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args): array
    {
        $cond = [];
        if (isset($args['isTrash'])) {
            $cond = array_merge($cond, ['isTrash' => $args['isTrash']]);
        }
        $feedItems = $this->em->getRepository(Entity\Feed::class)
            ->findBy(
                $cond,
                ['id' => 'desc'],
                $args['limit'],
                0
            );

        return ['feedItems' => $feedItems];
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'FeedItemList',
        ];
    }
}
