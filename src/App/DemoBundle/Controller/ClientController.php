<?php

namespace App\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    public function indexAction()
    {
        $client = new \GuzzleHttp\Client(array(
            'base_url' => $this->generateUrl('homepage', array(), true),
        ));
        $response = $client->get($this->generateUrl('get_users', array('_format' => 'json')));
        echo '<pre>';print_r($response);die;
        return $this->render('AppDemoBundle:Client:index.html.twig', array(
            
        ));
    }

}
