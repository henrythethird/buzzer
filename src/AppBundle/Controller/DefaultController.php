<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Buzz;
use AppBundle\Entity\Firefighter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("default/index.html.twig")
     */
    public function indexAction()
    {
        $buzzes = $this->getDoctrine()
            ->getRepository(Buzz::class)
            ->findAll();

        $firefighter = $this->getDoctrine()
            ->getRepository(Firefighter::class)
            ->findActive();

        return [
            'buzzes' => $buzzes,
            'firefighter' => $firefighter
        ];
    }
}
