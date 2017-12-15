<?php
declare(strict_types=1);

namespace ScriptFUSION\Steam250\SiteGenerator\Toplist;

use Doctrine\DBAL\Query\QueryBuilder;

final class CustomToplist extends Toplist
{
    private $toplist;

    public function __construct(Toplist $parent, Algorithm $algorithm = null, float $weight = null)
    {
        parent::__construct(
            $parent->getId(),
            $parent->getLimit(),
            $algorithm ?: $parent->getAlgorithm(),
            $weight ?: $parent->getWeight()
        );

        $this->setTemplate($parent->getTemplate());

        $this->toplist = $parent;
    }

    public function customizeQuery(QueryBuilder $builder): void
    {
        $this->toplist->customizeQuery($builder);
    }

    public function getParentToplist(): Toplist
    {
        return $this->toplist;
    }
}