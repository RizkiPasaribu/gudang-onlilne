<?php

namespace GudangOnline\V1\Hydrator\Strategy;

use GudangOnline\Entity\ProductCategory;
use Zend\Hydrator\Strategy\StrategyInterface;

/**
 * Class ProductCategorStrategy
 *
 * @package User\Stdlib\Hydrator\Strategy
 */
class ProductCategoryStrategy implements StrategyInterface
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param  mixed $value The original value.
     * @param  object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     * @throws \RuntimeException If object os not a User
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    // masih bellum tw fungsi nya apa
    public function extract($value, $object = null)
    {
        if ($value instanceof ProductCategory && !is_null($value)) {
            $values = $value->getName();
            return $values;
        }
        return null;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param  mixed $value The original value.
     * @param  array $data (optional) The original data for context.
     * @return mixed Returns the value that should be hydrated.
     * @throws \InvalidArgumentException
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function hydrate($value, array $data = null)
    {
        return $value;
    }
}
