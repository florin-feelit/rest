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
<<<<<<< HEAD
     * @return App\DemoBundle\Form\UserType
=======
     * @return array
>>>>>>> 8337af1a2aa1222ebc8cd71c0c11be9541d4a01b
     * @View()
     */
    public function newUsersAction()
    {
<<<<<<< HEAD
        return $this->createForm(new UserType());
=======
        
>>>>>>> 8337af1a2aa1222ebc8cd71c0c11be9541d4a01b
    }
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
     * @View(statusCode=201)
     */
    public function postUsersAction(Request $request)
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
    }
    
    /**
     * 
     * @param User $user
     * @param Request $request
     * @View()
     * @ParamConverter("user", class="AppDemoBundle:User")
     */
    public function putUserAction(User $user, Request $request)
    {
        $user = $this->getDoctrine()->getRepository('AppDemoBundle:User')->find($user);
        $form = $this->createForm(new UserType(), $user, array(
            'method' => 'PUT',
        ));
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        return array(
            'user' => $user,
        );
    }
    
    /**
     * 
     * @param User $user
     * @View()
     */
    public function deleteUserAction(User $user)
    {
        $user = $this->getDoctrine()->getRepository('AppDemoBundle:User')->find($user);
        if($user)
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }
    }
}