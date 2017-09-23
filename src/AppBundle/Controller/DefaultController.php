<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     *
     * @ParamConverter("")
     * @param Request $request
     *
     * @return Response
     */
    public function widgetAction(string $uuid, Request $request)
    {


        return $this->render('default/widget.twig', [
            'content' => $this->render('default/_widget-content.twig', ['uuid' => $uuid])->getContent(),
        ]);
    }

    public function indexAction()
    {
        var_dump($_SERVER);
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
