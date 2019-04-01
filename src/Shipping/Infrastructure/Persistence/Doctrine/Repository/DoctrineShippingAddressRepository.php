<?php
/**
 * Created by PhpStorm.
 * User: alexander.demchenko
 * Date: 02/04/2019
 * Time: 02:18
 */

namespace F4u\Shipping\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use F4u\Shipping\Domain\Model\ShippingAddress\ShippingAddress;
use F4u\Shipping\Domain\Model\ShippingAddress\ShippingAddressId;
use F4u\Shipping\Domain\Model\ShippingAddress\ShippingAddressRepository;

class DoctrineShippingAddressRepository extends EntityRepository implements ShippingAddressRepository
{
    public function save(ShippingAddress $shippingAddress)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($shippingAddress);
        $entityManager->flush();
    }

    public function saveSet($shippingAddresses)
    {
        $entityManager = $this->getEntityManager();
        foreach ($shippingAddresses as $shippingAddresse) {
            $entityManager->persist($shippingAddresse);
        }
        $entityManager->flush();
    }

    public function byId(ShippingAddressId $shippingAddressId)
    {
        return $this->find($shippingAddressId);
    }
}