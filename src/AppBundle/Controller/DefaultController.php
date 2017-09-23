<?php

namespace AppBundle\Controller;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use AppBundle\Service\WidgetContentService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @param string $uuid
     *
     * @return Response
     * @throws NotFoundHttpException
     */
    public function widgetAction(string $uuid): Response
    {
        $contentDTO = $this->getWidgetContentService()->createWidgetContent($uuid);
        if ($contentDTO === null) {
            throw new NotFoundHttpException('Invalid hotel uuid');
        }

        $content = $this->getSerializer()->toArray($contentDTO);
        return $this->render('default/widget.twig', [
            'content' => $this->render('default/_widget-content.twig', $content)->getContent(),
        ]);
    }

    /**
     * @return WidgetContentService
     */
    private function getWidgetContentService()
    {
        return $this->get('widget.content');
    }

    /**
     * @return Serializer
     */
    private function getSerializer()
    {
        return SerializerBuilder::create()->build();
    }
}
