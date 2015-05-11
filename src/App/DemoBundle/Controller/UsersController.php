<?php

namespace App\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use App\DemoBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use App\DemoBundle\Form\UserType;

class UsersController extends Controller
{
    /**
     * 
     * @return array
     * @View()
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('AppDemoBundle:User')->findAll();
        return array(
            'users' => $users,
        );
    }
    
    /**
     * 
     * @param User $user
     * @return array
     * @View()
     * @ParamConverter("user", class="AppDemoBundle:User")
     */
    public function getUserAction(User $user)
    {
        return array(
            'user' => $user,
        );
    }
    
    /**
     * 
     * @param Request $request
     * @return array
     * @View()
     */
    public function postUserAction(Request $request)
    {
        try
        {
            $user = new User();
            $form = $this->createForm(new UserType(), $user, array(
                'method' => 'POST',
            ));
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }
}