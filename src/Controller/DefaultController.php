<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * @throws \Exception
     */
    public function homepage(): Response
    {
        
return $this->render('default/base.html.twig');
    }



public function index(): Response
{
    
return $this->render('index.html.twig');
}


public function product(): Response
{
    
return $this->render('product.html.twig');
}

}