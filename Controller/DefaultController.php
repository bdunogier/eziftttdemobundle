<?php

namespace BD\Bundle\EzIFTTTDemoBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function homeAction( $locationId, $viewType, $layout = false )
    {
        $variables = array();

        $repository = $this->getRepository();
        $user = $repository->getCurrentUser();

        $locationService = $repository->getLocationService();
        $variables['homeContent'] = $repository->getContentService()->loadContent(
            $locationService->loadLocation( $locationId )->contentId
        );

        $variables['locationChildren'] = array();
        foreach ( $locationService->loadLocations( $user->contentInfo ) as $location )
        {
            $variables['locationChildren'] = array_merge(
                $variables['locationChildren'],
                $locationService->loadLocationChildren( $location )->locations
            );
        }

        $variables['user'] = $user;
        $variables['layout'] = $layout;

        return $this->render('BDEzIFTTTDemoBundle:full:home.html.twig', $variables );
    }
}
