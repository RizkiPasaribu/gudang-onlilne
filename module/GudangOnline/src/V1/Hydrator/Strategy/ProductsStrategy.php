<?php

namespace GudangOnline\V1\Hydrator\Strategy;

use Doctrine\Common\Collections\Collection;
use GudangOnline\Entity\Product;
use GudangOnline\Entity\ProductCategory;
use Zend\Hydrator\Strategy\StrategyInterface;
use DoctrineModule\Stdlib\Hydrator\Strategy\AbstractCollectionStrategy;

/**
 * Class KelasStrategy
 *
 * @package User\Stdlib\Hydrator\Strategy
 */
class ProductsStrategy extends AbstractCollectionStrategy implements StrategyInterface
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
    public function extract($values, $object = null)
    {
        $result = [];
        if ($values instanceof Collection) {

            foreach ($values as $value) {
                if (!is_null($value) && $value instanceof Product) {
                    $result[] = [
                        'uuid'                  => $value->getUuid(),
                        'name'                 => $value->getName(),
                        'price'             => $value->getPrice(),
                    ];
                }
            }
        }

        return $result;
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
