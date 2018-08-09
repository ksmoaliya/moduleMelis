<?php

/**
 * Melis Technology (http://www.melistechnology.com)
*
* @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
*
*/

namespace Publications\Service;

use MelisCore\Service\MelisCoreGeneralService;
use Publications\Model\Tables\PublicationTable;

/**
 *
 * This service handles the slider system of Melis.
 *
 */
class PublicationsService extends MelisCoreGeneralService
{
    /**
     * This service retrieves  a list of news
     * 
     * @param int|null $start The mysql start, mainly used for pagination 
     * @param int|null $limit The mysql limit, mainly used for pagination
     * @param varchar|null $order The mysql ordering function, sets the order on how datas are retrieved
     * @param varchar|null $search Searches the table for the provided query, searcheable columns : mcslide_id, mcslide_name
     * 
     * @return array
     */
    
    public function getPublicationsList($status = null, $langId = null, $dateMin = null, $dateMax = null, $publishDateMin = null,
                                $publishDateMax = null, $unpublishFilter = false, $start = null, $limit = null, 
                                $orderColumn = null, $order = null, $siteId = null, $search = null)
    {
        // Event parameters prepare
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $results = array();

        // Sending service start event
        $arrayParameters = $this->sendEvent('publication_get_publication_list_start', $arrayParameters);

        // Service implementation start
        /** @var PublicationTable $publicationTable */
        $publicationTable = $this->getServiceLocator()->get('PublicationTable');

        $publication = $publicationTable->getPublicationsList(
            $arrayParameters['status'], $arrayParameters['langId'], $arrayParameters['dateMin'], $arrayParameters['dateMax'], $arrayParameters['publishDateMin'],
            $arrayParameters['publishDateMax'], $arrayParameters['unpublishFilter'], $arrayParameters['start'], $arrayParameters['limit'],
            $arrayParameters['orderColumn'], $arrayParameters['order'], $arrayParameters['siteId'], $arrayParameters['search']
        )->toArray();

        $results = $publication;
        // Service implementation end

        // Adding results to parameters for events treatment if needed
        $arrayParameters['results'] = $results;
        // Sending service end event
        $arrayParameters = $this->sendEvent('publication_get_publication_list_end', $arrayParameters);

        return $arrayParameters['results'];
    }

    /**
     * This service retrieves a specific slider
     *
     * @param int $publicationId The news id to be fetch
     *
     * @returns Publications[]
     */
    public function getPublicationById($publicationId, $langId = null)
    {
        // Event parameters prepare
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $results = array();

        // Sending service start event
        $arrayParameters = $this->sendEvent('publication_get_publication_by_id_start', $arrayParameters);

        // Service implementation start
        $publicationTable = $this->getServiceLocator()->get('PublicationTable');

        foreach($publicationTable->getPublication($arrayParameters['publicationId'], $arrayParameters['langId']) as $publication){
            $results = $publication;
        }

        // Service implementation end

        // Adding results to parameters for events treatment if needed
        $arrayParameters['results'] = $results;
        // Sending service end event
        $arrayParameters = $this->sendEvent('publication_get_publication_by_id_end', $arrayParameters);

        return $arrayParameters['results'];
    }

    /**
     * This service saves the news, if news id is provided then an update will be performed
     *
     * @param array $publication , the array representing the table melis_cms_news
     * @param int $publicationId the news id
     *
     * @return  int|false  publicationId on successfull save otherwise false
     */
    public function savePublication($publication, $publicationId = null)
    {
        // Event parameters prepare
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $results = false;

        // Sending service start event
        $arrayParameters = $this->sendEvent('publication_save_publication_start', $arrayParameters);

        // Service implementation start
        $publicationTable = $this->getServiceLocator()->get('PublicationTable');
        try{
            $results = $publicationTable->save($arrayParameters['publication'], $arrayParameters['publicationId']);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        // Service implementation end

        // Adding results to parameters for events treatment if needed
        $arrayParameters['results'] = $results;
        // Sending service end event
        $arrayParameters = $this->sendEvent('publication_save_publication_end', $arrayParameters);
         
        return $arrayParameters['results'];
    }
    
    /**
     * This service deletes the news
     *
     * @param int $publicationId The news id to be deleted
     *
     * @return booelan true|false true on success, false on error
     */
    public function deletePublicationById($publicationId)
    {
        // Event parameters prepare
        $arrayParameters = $this->makeArrayFromParameters(__METHOD__, func_get_args());
        $results = false;
    
        // Sending service start event
        $arrayParameters = $this->sendEvent('publication__delete_publication_by_id_start', $arrayParameters);

        // Service implementation start
        $publicationTable = $this->getServiceLocator()->get('PublicationTable');
        try{
            $publicationTable->deleteById($arrayParameters['publicationId']);
            $results = true;
        }catch(\Exception $e){
            echo $e->getMessage();
        }

        // Service implementation end

        // Adding results to parameters for events treatment if needed
        $arrayParameters['results'] = $results;
        // Sending service end event
        $arrayParameters = $this->sendEvent('publication__delete_publication_by_id_end', $arrayParameters);
         
        return $arrayParameters['results'];
    }
  
}