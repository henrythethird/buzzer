<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends Controller
{
    /**
     * @Route("/statistics/", name="statistics_index")
     * @Template("statistics/index.html.twig")
     */
    public function indexAction()
    {
        return [];
    }
}