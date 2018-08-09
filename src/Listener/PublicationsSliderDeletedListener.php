<?php 

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Publications\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

use MelisCore\Listener\MelisCoreGeneralListener;

class PublicationsSliderDeletedListener extends MelisCoreGeneralListener implements ListenerAggregateInterface
{
    public function attach(EventManagerInterface $events)
    {
        $sharedEvents      = $events->getSharedManager();
        
        $callBackHandler = $sharedEvents->attach(
            'PublicationsSlider',
            array(
                'meliscmsslider_delete_slider_end'
            ),
        	function($e){
        	    
        		$sm = $e->getTarget()->getServiceLocator();   	
        		$params = $e->getParams();
        		$paramData = array();
        		if(isset($params['data'])) {
        		    $paramData = $params['data'];
        		}

        		$melisCoreDispatchService = $sm->get('MelisCoreDispatch');
        		
        		list($success, $errors, $datas) = $melisCoreDispatchService->dispatchPluginAction(
        		    $e,
        		    'publication',
        		    'slider-deleted-data',
        		    'Publications\Controller\Publications',
        		    array('action' => 'publicationSliderDeleted')
        		    );
        		       		
        		    
        	},
        100);
        
        $this->listeners[] = $callBackHandler;
    }
}