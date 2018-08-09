<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Publications\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MelisCore\Form\Factory\MelisSelectFactory;
use Zend\Session\Container;

/**
 * Publication site  select factory
 */
class MelisCmsSitePublicationSelectFactory extends MelisSelectFactory
{
    protected function loadValueOptions(ServiceLocatorInterface $formElementManager)
    {
        $publicationData= array();
        $serviceManager = $formElementManager->getServiceLocator();
        $siteTbl        = $serviceManager->get('MelisEngineTableSite');
        $publicationsSrv        = $serviceManager->get('PublicationsService');
        
        $container = new Container('melisplugins');
        $langId = $container['melis-plugins-lang-id'];
        
        foreach ($siteTbl->fetchAll() As $val)
        {
            $newsRes = $publicationsSrv->getPublicationsList(1, $langId, null, null, null, null, 1, null, null, 'publication_title', 'ASC', $val->site_id);
            
            foreach ($newsRes As $publication)
            {
                $publicationData[$publication->publication_id] = $val->site_name.' - '.$publication->publication_title;
            }
        }
        
        return $publicationData;
    }
}