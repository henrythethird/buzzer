<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Buzz;
use AppBundle\Entity\Firefighter;
use AppBundle\Entity\Status;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default_index")
     * @Template("default/index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository(Buzz::class)->findAllFrontQB(),
            $request->query->getInt('page', 1),
            $this->getParameter('page_range')
        );

        return [
            'pagination' => $pagination,
        ];
    }

    /**
     * @Route("/details/{buzz}", name="default_details")
     * @Template("default/details.html.twig")
     */
    public function detailsAction(Buzz $buzz)
    {
        return [
            'buzz' => $buzz
        ];
    }

    /**
     * @Route("/buzz", name="default_buzz")
     */
    public function dispatchBuzzAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $buzz = new Buzz();
        $manager->persist($buzz);
        $manager->flush();

        $this->get('app.dispatcher')->dispatchBuzz($buzz);

        return $this->redirectToRoute('default_details', [
            'buzz' => $buzz->getId()
        ]);
    }

    /**
     * @Route("/firefighter", name="default_firefighter")
     * @Template("default/firefighter.html.twig")
     */
    public function firefighterAction()
    {
        $firefighterRepository = $this->getDoctrine()->getRepository(Firefighter::class);

        $firefighter = $firefighterRepository->findActive();

        $nextFirefighter = $firefighterRepository->findNextActive($firefighter);

        $totalCount = $this->getDoctrine()
            ->getRepository(Buzz::class)
            ->findCountByFirefighter($firefighter);

        $confirmedCount = $this->getDoctrine()
            ->getRepository(Buzz::class)
            ->findCountByFirefighter($firefighter, [
                Status::UNCONFIRMED,
                Status::INVALID
            ]);

        return [
            'firefighter' => $firefighter,
            'nextFirefighter' => $nextFirefighter,
            'buzzCount' => $totalCount,
            'confirmedCount' => $confirmedCount
        ];
    }
}
