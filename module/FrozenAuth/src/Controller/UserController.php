<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 4-4-17
 * Time: 17:04
 */

namespace FrozenAuth\Controller;


use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function indexAction()
    {
        if ($this->identity()!=null) {
            // User is logged in

            // Retrieve user identity
            $userEmail = $this->identity();

        }
        return new ViewModel();

    }

}