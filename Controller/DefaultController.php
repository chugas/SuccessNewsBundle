<?php
namespace Success\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function indexAction()
    {
        return $this->render('SuccessNewsBundle:Default:index.html.twig');
    }
}
