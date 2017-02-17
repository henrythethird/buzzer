<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Buzz;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @Route("/api/buzz", name="api_buzz")
     */
    public function buzzAction()
    {
        $buzz = new Buzz();

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($buzz);
        $manager->flush();

        $this->get('app.dispatcher')
            ->dispatchBuzz($buzz);

        return new JsonResponse([
            'date' => $buzz->getDate()
        ]);
    }
}