<?php

namespace Blog\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('', name: 'homepage', methods: ['HEAD', 'GET'])]
    public function homepage(): Response
    {

    	return $this->render('homepage/homepage.html.twig');
    }
}
