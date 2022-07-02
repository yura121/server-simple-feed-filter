<?php

declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\Entity;
use DateTimeImmutable;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class FeedMutation implements MutationInterface, AliasedInterface
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @throws ORMException
     */
    public function create(array $args): ?Entity\Feed
    {
        return $this->upsert($args);
    }

    /**
     * @throws ORMException
     */
    public function update(array $args): ?Entity\Feed
    {
        return $this->upsert($args);
    }

    /**
     * @throws ORMException
     */
    private function upsert(array $args): ?Entity\Feed
    {
        $data = $args[0]['input'];
        /** @var Entity\Feed|null $entity */
        $entity = $this->em->getRepository(Entity\Feed::class)->find((int)($data['id'] ?? 0));
        if ($entity === null) {
            $entity = new Entity\Feed();
            $entity->setCreatedAt((new DateTimeImmutable())->format('Y-m-d H:i:s'));
            $entity->setIsTrash(0);
        }
        if (!empty($data['dt'])) {
            $entity->setDt($data['dt']);
        }
        if (!empty($data['title'])) {
            $entity->setTitle($data['title']);
        }
        if (!empty($data['link'])) {
            $entity->setLink($data['link']);
        }
        if (!empty($data['is_trash'])) {
            $entity->setIsTrash((int)$data['is_trash']);
        }
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public static function getAliases(): array
    {
        return [
            'create' => 'createFeedItem',
            'update' => 'updateFeedItem',
        ];
    }
}
