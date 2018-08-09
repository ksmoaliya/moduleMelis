<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2015 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Publications\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;

class PublicationsListController extends AbstractActionController
{
    /**
     * renders the page container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListPageAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }


    /**
     * renders the header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListHeaderAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the publications list page left header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListHeaderLeftAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the publications list page right header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListHeaderRightAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the publications list page right header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListHeaderRightAddAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the publications list page title
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListHeaderTitleAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the publications list page content container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        return $view;
    }

    /**
     * renders the coupon list content publications filter limit
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentFilterLimitAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list content publications filter site
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentFilterSiteAction()
    {
        $tableSite = $this->getServiceLocator()->get('MelisEngineTableSite');
        $sites = $tableSite->fetchAll();
        $siteId = $this->getRequest()->getPost('publication_site_id');

        $options = '<option  value="">'.$this->getTool()->getTranslation('tr_meliscmsliderdetails_common_label_choose').'</option>';
        foreach($sites as $site){
            $selected  = ($site->site_id == $siteId)? 'selected' : '';
            $options .= '<option value="'.$site->site_id.'" '.$selected.'>'.$site->site_name .'</option>';
        }

        $view =  new ViewModel();
        $view->options = $options;
        return $view;
    }

    /**
     * renders the coupon list content publications filter search
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentFilterSearchAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list content publications filter refresh
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentFilterRefreshAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list content publications action info
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentActionInfoAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list content publications action edit
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentActionEditAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list content publications action edit
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentActionDeleteAction()
    {
        return new ViewModel();
    }

    /**
     * renders the coupon list page publication
     * @return \Zend\View\Model\ViewModel
     */
    public function renderListContentTableAction()
    {
        $columns = $this->getTool()->getColumns();
        $columns['actions'] = array('text' => 'Action');
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        $view->tableColumns = $columns;
        $view->getToolDataTableConfig = $this->getTool()->getDataTableConfiguration('#publicationsList', true, false, array('order' => '[[ 0, "desc" ]]'));
        return $view;
    }

    /**
     * Retrieves the publications data list
     * @return \Zend\View\Model\JsonModel
     */
    public function renderListDataAction()
    {
        $success = 0;
        $colId = array();
        $dataCount = 0;
        $draw = 0;
        $dataFiltered = 0;
        $tableData = array();

        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');

        if($this->getRequest()->isPost()) {

            $publication_site_id = $this->getRequest()->getPost('publication_site_id');
            $publication_site_id = !empty($publication_site_id)? $publication_site_id : null;

            $colId = array_keys($this->getTool()->getColumns());

            $sortOrder = $this->getRequest()->getPost('order');
            $sortOrder = $sortOrder[0]['dir'];

            $selCol = $this->getRequest()->getPost('order');
            $selCol = $colId[$selCol[0]['column']];
            $colOrder = $selCol. ' ' . $sortOrder;

            $draw = (int) $this->getRequest()->getPost('draw');

            $start = (int) $this->getRequest()->getPost('start');
            $length =  (int) $this->getRequest()->getPost('length');

            $search = $this->getRequest()->getPost('search');
            $search = $search['value'];

            $postValues = $this->getRequest()->getPost();

            $locale = 'en_EN';
            $container = new Container('meliscore');
            $lang_id = null;
            if ($container) {
                $melisEngineLangTable = $this->getServiceLocator()->get('MelisEngineTableCmsLang');
                $locale = $container['melis-lang-locale'];
                $currentLangData = $melisEngineLangTable->getEntryByField('lang_cms_locale', $locale);

                $currentLang = $currentLangData->current();

                if (!empty($currentLang)) {
                    $lang_id = $currentLang->lang_cms_id;
                }
            }

            $tmp = $publicationSvc->getPublicationsList(null, null, null, null, null, null, null, null, null, null,  null, $publication_site_id, $search);
            $dataFiltered = count($tmp);

            $publications = $publicationSvc->getPublicationsList(null, null, null, null, null, null, null, $start, $length, $selCol, $sortOrder, $publication_site_id, $search);

            $dataArray = [];
            $idArray = [];

            // get publications with lang_id equals to current lang id of platform
            foreach($publications as $publication) {
                if ($publication['publication_lang_id'] == $lang_id) {
                    $dataArray[] = $publication;
                    $idArray[] = $publication['publication_id'];
                }
            }

            // get publications with lang_id not equals to current lang id of platform but doesnt exist on above id array
            foreach ($publications as $publication) {
                if (!in_array($publication['publication_id'], $idArray)) {
                    if ($publication['publication_lang_id'] !== $lang_id) {
                        $dataArray[] = $publication;
                    }
                }
            }

            // sort by column
            if (!empty($selCol) && empty(!$sortOrder)) {
                $sortOrder = ($sortOrder == 'asc') ? SORT_ASC : SORT_DESC;
                array_multisort(array_column($dataArray, $selCol), $sortOrder, $dataArray);
            } else {
                array_multisort(array_column($dataArray, 'publication_id'), SORT_DESC, $dataArray);
            }

            $dataCount = count($dataArray);
            $c = 0;
            foreach($dataArray as $publication) {
                $status = '<span class="text-success"><i class="fa fa-fw fa-circle"></i></span>';
                if(!$publication['publication_status']){
                    $status = '<span class="text-danger"><i class="fa fa-fw fa-circle"></i></span>';
                }

                $tableData[$c]['DT_RowId'] = $publication['publication_id'];
                $tableData[$c]['publication_id'] = $publication['publication_id'];
                $tableData[$c]['publication_status'] = $status;
                $tableData[$c]['publication_title'] = $this->getTool()->escapeHtml($publication['publication_title']);
                $tableData[$c]['publication_creation_date'] = $this->getTool()->dateFormatLocale($publication['publication_creation_date']);
                $tableData[$c]['publication_date'] = $this->getTool()->dateFormatLocale($publication['publication_date']);
                $tableData[$c]['site_name'] = $publication['site_name'];
                $c++;
            }

        }

        return new JsonModel(array (
            'draw'              => (int) $draw,
            'recordsTotal'      => $dataCount,
            'recordsFiltered'   => $dataFiltered,
            'data'              => $tableData,
        ));
    }

    /**
     * Deletes the publications letter
     * @return \Zend\View\Model\JsonModel
     */
    public function deletePublicationAction()
    {
        $this->getEventManager()->trigger('publications_delete_publication_start', $this, array());
        $response = array();
        $id = null;
        $success = 0;
        $errors  = array();
        $data = array();
        $textMessage = 'tr_publications_publication_delete_fail';
        $textTitle = 'tr_publications_list_header_title';

        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');
        $publicationTextsSvc = $this->getServiceLocator()->get('PublicationTextsTable');

        if($this->getRequest()->isPost()){
            $postValues = get_object_vars($this->getRequest()->getPost());
            $id = $postValues['publicationId'];
            $tmp = $publicationSvc->getPublicationById($postValues['publicationId']);
            //delete db data
            if($publicationSvc->deletePublicationById($postValues['publicationId'])){
                $publicationTextsSvc->deleteByField('publication_id', $id);
                $success = 1;
                $textMessage = 'tr_publications_publication_delete_success';
            }
        }

        $response = array(
            'success' => $success,
            'textTitle' => $textTitle,
            'textMessage' => $textMessage,
            'errors' => $errors,
            'chunk' => $data,
        );

        $this->getEventManager()->trigger('publications_delete_publication_end',
            $this, array_merge($response, array('typeCode' => 'PUBLICATION_DELETE', 'itemId' => $id)));

        return new JsonModel($response);
    }

    /**
     * Returns the Tool Service Class
     * @return MelisCoreTool
     */
    private function getTool()
    {
        $melisTool = $this->getServiceLocator()->get('MelisCoreTool');
        $melisTool->setMelisToolKey('publication', 'publications_list_table');
        return $melisTool;

    }
}
