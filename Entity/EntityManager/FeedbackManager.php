<?php

namespace Grossum\FeedbackBundle\Entity\EntityManager;

use Doctrine\Common\Persistence\ObjectManager;
use Grossum\CoreBundle\Entity\EntityTrait\SaveUpdateInManagerTrait;

class FeedbackManager
{
    use SaveUpdateInManagerTrait;

    private $repository;

    /** @var  ObjectManager */
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->repository    = $objectManager->getRepository('GrossumFeedbackBundle:Feedback');
    }
}
