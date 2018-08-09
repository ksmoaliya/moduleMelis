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
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;
use Zend\Validator\File\Upload;
use Zend\File\Transfer\Adapter\Http;
use Zend\Session\Container;

class PublicationController extends AbstractActionController
{
    /**
     * renders the page container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderPageAction()
    {

        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $this->setTableVariables($publicationId);
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderHeaderAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page header left container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderHeaderLeftAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page header right container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderHeaderRightAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content header add button
     * @return \Zend\View\Model\ViewModel
     */
    public function renderHeaderRightSaveAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page header title
     * @return \Zend\View\Model\ViewModel
     */
    public function renderHeaderTitleAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $publicationName = '';

        // if(!empty($this->layout()->publication)){
        //     $publicationName = ' - '.$this->layout()->publication->publication_title;
        // }

        $view->publicationName = $publicationName;
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page content container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderPageContentAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the page main content container
     * @return \Zend\View\Model\ViewModel render-coupon-page-tab-main
     */
    public function renderPageTabsMainAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content header container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsContentHeaderAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content header left container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsContentHeaderLeftAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content header status
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsContentHeaderStatusAction()
    {
        $status = '';
        if(!empty($this->layout()->publication)){
            if($this->layout()->publication->publication_status){
                $status = 'checked';
            }
        }

        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->status = $status;
        return $view;
    }

    /**
     * renders the tabs content header title
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsContentHeaderTitleAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content details container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsContentDetailsAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tabs content details main content
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsMainAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tab left content container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsLeftAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tab right content container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsRightAction()
    {
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        return $view;
    }

    /**
     * renders the tab left content properties
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsLeftPropertiesAction()
    {
        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
        $tool = $this->getServiceLocator()->get('MelisCoreTool');
        $appConfigForm = $melisCoreConfig->getFormMergedAndOrdered('Publications/forms/publication_properties_form','publication_properties_form');
        $factory = new \Zend\Form\Factory();
        $formElements = $this->serviceLocator->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $form = $factory->createForm($appConfigForm);

        if(!empty($this->layout()->publication)){
            $publicationData = (array)$this->layout()->publication;
            $publicationData['publication_date'] = $tool->dateFormatLocale($publicationData['publication_date']);
            $publicationData['publication_publish_date'] = $tool->dateFormatLocale($publicationData['publication_publish_date']);
            $publicationData['publication_unpublish_date'] = $tool->dateFormatLocale($publicationData['publication_unpublish_date']);
            $form->setData($publicationData);
        }

        $datePickerInit = $tool->datePickerInit('publicationDate');
        $datePickerInit .= $tool->datePickerInit('publicationPublishDate');
        $datePickerInit .= $tool->datePickerInit('publicationUnpublishDate');

        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->form = $form;
        $view->datePickerInit = $datePickerInit;

        return $view;
    }

    /**
     * renders the tab left content site select
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsLeftSitesAction()
    {
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $this->setTableVariables($publicationId);

        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');

        $appConfigForm = $melisCoreConfig->getFormMergedAndOrdered('Publications/forms/publication_site_select_form','publication_site_select_form');
        $factory = new \Zend\Form\Factory();
        $formElements = $this->serviceLocator->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $form = $factory->createForm($appConfigForm);

        if(!empty($this->layout()->publication)){
            $form->setData((array)$this->layout()->publication);
        }

        $view = new ViewModel();
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->form = $form;
        return $view;
    }

    /**
     * renders the tab right content paragraphs
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsRightParagraphsAction()
    {
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');

        $form = $this->getFormData($melisCoreConfig, 'Publications/forms/publications_paragraph_form','publications_paragraph_form');

        // paragraph config in interface
        $parConf = $melisCoreConfig->getItem('publication/conf/paragraphs_conf/');

        $limit = $parConf['max'];
        $name = $parConf['name'];
        $forms = array();

        $formsTitleSubtitle = $this->getFormData($melisCoreConfig, 'Publications/forms/publication_site_title_subtitle_form','publication_site_title_subtitle_form');
        $publicationTextsTable = $this->getServiceLocator()->get('PublicationTextsTable');

        $data  = ($publicationId) ? (array)$publicationTextsTable->getPublicationDataByCnd(['publication_id' => $publicationId])->toArray() : '';
        $lang_id = $this->getLangId();
        $melisEngineLangTable = $this->getServiceLocator()->get('MelisEngineTableCmsLang');
        $melisEngineLang = $melisEngineLangTable->fetchAll();//langOrderByName(); dunno why victor used langOrderByName despite the method does not exists. maybe he ran out of time? i dunno
        $languages = $melisEngineLang->toArray();

        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');

        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->forms = $forms;
        $view->languages = $languages;
        $view->lang_id = $lang_id;
        $view->data = $data;
        $view->formsTitleSubtitle = $formsTitleSubtitle;

        return $view;
    }

    /**
     * Get Language
     * @return int
     */
    private function getLangId()
    {
        $locale = 'en_EN';
        $container = new Container('meliscore');
        $currentLang = '';

        if ($container) {
            $melisEngineLangTable = $this->getServiceLocator()->get('MelisEngineTableCmsLang');
            $locale = $container['melis-lang-locale'];
            $currentLangData = $melisEngineLangTable->getEntryByField('lang_cms_locale', $locale);

            $currentLang = $currentLangData->current();
        }

        return !empty($currentLang) ? $currentLang->lang_cms_id : 1;
    }

    public function saveAction()
    {
        $this->getEventManager()->trigger('publication_save_start', $this, array());
        $melisTool = $this->getServiceLocator()->get('MelisCoreTool');
        $response = array();
        $id = null;
        $success = 0;
        $errors  = array();
        $dateErrors = array();
        $data = array();
        $textMessage = 'tr_publications_save_fail';
        $textTitle = 'tr_publications_list_header_title';
        $logTypeCode = '';

        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');
        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
        $tool = $this->getServiceLocator()->get('MelisCoreTool');

        if ($this->getRequest()->isPost()) {
            $postValues = get_object_vars($this->getRequest()->getPost());
            //$postValues = $melisTool->sanitizePost($postValues);

            $logTypeCode = !empty($postValues['publication_id']) ? 'PUBLICATION_UPDATE' : 'PUBLICATION_ADD';

            $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
            $form = $this->getFormData($melisCoreConfig, 'Publications/forms/publication_properties_form','publication_properties_form');

            $formsTitleSubtitle = $this->getFormData($melisCoreConfig, 'Publications/forms/publication_site_title_subtitle_form','publication_site_title_subtitle_form');

            if (!empty($postValues['publication_publish_date']) && !empty($postValues['publication_unpublish_date'])) {
                // convert date to generic for date comparison
                $pubDate = $tool->localeDateToSql($postValues['publication_publish_date'], '', 'en_EN');
                $unpubDate = $tool->localeDateToSql($postValues['publication_unpublish_date'], '', 'en_EN');

                if (strtotime($pubDate) > strtotime($unpubDate)) {
                    $dateErrors['publication_unpublish_date'] = array(
                        'isGreaterThan' => $this->getTool()->getTranslation('tr_publications_form_unpublish_error'),
                        'label' => $this->getTool()->getTranslation('tr_publications_form_unpublish'),
                    );
                }
            }

            if (empty($postValues['publication_id'])) {
                $postValues['publication_creation_date'] = date("Y-m-d H:i:s");
            }

            if (empty($postValues['publication_publish_date'])) {
                $postValues['publication_publish_date'] = date("Y-m-d H:i:s");

                $pubDate = $tool->localeDateToSql($postValues['publication_publish_date'], '', 'en_EN');
                $unpubDate = $tool->localeDateToSql($postValues['publication_unpublish_date'], '', 'en_EN');

                if (!empty($postValues['publication_publish_date']) && !empty($postValues['publication_unpublish_date'])) {
                    if(strtotime($pubDate) > strtotime($unpubDate)){
                        $dateErrors['publication_unpublish_date'] = array(
                            'isGreaterThan' => $this->getTool()->getTranslation('tr_publications_form_unpublish_error_date_today'),
                            'label' => $this->getTool()->getTranslation('tr_publications_form_unpublish'),
                        );
                    }
                }
            }

            $form->setData($postValues);
            $data['publication_id'] = '';

            // check if any title exists
            $titleExist = false;
            for ($i = 0; $i < (int)$postValues['formCount']; $i++) {
                if (!empty($postValues['publication_title'][$i])) {
                    $titleExist = true;
                }
            }
            $titleErr = '';
            if (!$titleExist) {
                $titleErr = $this->getTool()->getTranslation('tr_publications_form_error_empty');
            }

            if ($form->isValid() && $titleExist) {
                $publicationTbl = $form->getData();

                $publication_id = $publicationTbl['publication_id'];
                $publicationTbl['publication_publish_date'] = $tool->localeDateToSql($publicationTbl['publication_publish_date']);
                $publicationTbl['publication_unpublish_date'] = $tool->localeDateToSql($publicationTbl['publication_unpublish_date']);

                $publicationTbl['publication_status'] = $postValues['publication_status'];
                $publicationTbl['publication_site_id'] = empty($postValues['publication_site_id'])? NULL : $postValues['publication_site_id'];
                unset($publicationTbl['publication_id']);
                $publicationTbl['publication_date'] = $tool->localeDateToSql($publicationTbl['publication_date']);

                $data['publication_id'] = $publicationSvc->savePublication($publicationTbl, $publication_id);

                $lang_id = $this->getLangId();
                $data['publication_title'] = '';
                $data['publication_subtitle'] = '';

                if ($data['publication_id']) {
                    for ($i = 0; $i < (int)$postValues['formCount']; $i++) {
                        $formsTitleSubtitle->setData($postValues);

                        if ($postValues['publication_lang_id'][$i] == $lang_id) {
                            $data['publication_title'] = $postValues['publication_title'][$i];
                            $data['publication_subtitle'] = $postValues['publication_subtitle'][$i];
                        }

                        $publicationTxt['publication_title'] = $postValues['publication_title'][$i];
                        $publicationTxt['publication_subtitle'] = $postValues['publication_subtitle'][$i];
                        $publicationTxt['publication_lang_id'] = $postValues['publication_lang_id'][$i];

                        // get all paragraph values
                        for ($c = 1; $c <= 4; $c++) {
                            $publicationTxt['publication_paragraph'.$c] = $postValues['publication_paragraph'.$c][$i];
                        }

                        // get publication title to be displayed on new tab
                        if (empty($data['publication_title'])) {
                            $data['publication_title'] = !empty($postValues['publication_title'][0]) ? $postValues['publication_title'][0] : $postValues['publication_title'][1];
                        }

                        $publicationTable = $this->getServiceLocator()->get('PublicationTable');
                        $publicationTextsTable = $this->getServiceLocator()->get('PublicationTextsTable');

                        $lastPublication = $publicationTable->getLastPublication()->current();

                        if (empty($postValues['publication_id'])) {
                            $lastPublication = (array)$lastPublication;
                            $publicationTxt['publication_id'] = $lastPublication['publication_id'];

                            $publicationTextsTable->save($publicationTxt);
                        } else {
                            $publicationTextsTable->updatePublicationText(
                                $publicationTxt, [
                                    'publication_id'      => $postValues['publication_id'],
                                    'publication_lang_id' => $publicationTxt['publication_lang_id']
                                ]
                            );
                        }
                    }
                }

                if ($data['publication_id']) {
                    $id = $data['publication_id'];
                    $textMessage = 'tr_publications_save_success';
                    $success = 1;
                }

            } else {
                $errors = $form->getMessages();

                foreach ($errors as $keyError => $valueError) {
                    foreach ($appConfigForm['elements'] as $keyForm => $valueForm) {
                        if ($valueForm['spec']['name'] == $keyError && !empty($valueForm['spec']['options']['label'])) {
                            $errors[$keyError]['label'] = $valueForm['spec']['options']['label'];
                        }
                    }
                }
                $errors[$this->getTool()->getTranslation('tr_publications_plugin_filter_order_column_title')]['tr_publications_list_col_title'] = $titleErr;
                $errors = array_merge($errors, $dateErrors);
            }
        }

        $response = array(
            'success' => $success,
            'textTitle' => $textTitle,
            'textMessage' => $textMessage,
            'errors' => $errors,
            'chunk' => $data,
        );

        $this->getEventManager()->trigger('publication_save_end',
            $this, array_merge($response, array('typeCode' => $logTypeCode, 'itemId' => $id)));

        return new JsonModel($response);

    }

    /**
     * renders the tab left content documents
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsLeftImagesAction()
    {
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $this->setTableVariables($publicationId);

        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
        $parConf = $melisCoreConfig->getItem('publication/conf/images_conf/');
        $limit = $parConf['max'];
        $name = $parConf['name'];
        $images = array();

        if(!empty($this->layout()->publication)){
            for($c = 1; $c <= $limit; $c++){
                $tmp = $name.$c;
                if($this->layout()->publication->$tmp){
                    $i = array(
                        'publication_id' => $this->layout()->publication->publication_id,
                        'image' => $this->layout()->publication->$tmp,
                        'column' => $tmp,
                    );
                    $images[] = $i;
                }
            }
        }

        $view = new ViewModel();
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->images = $images;
        $view->limit  = $limit;
        return $view;
    }

    /**
     * renders the tab left content documents
     * @return \Zend\View\Model\ViewModel
     */
    public function renderTabsPropertiesDetailsLeftDocumentsAction()
    {
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $this->setTableVariables($publicationId);

        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
        $parConf = $melisCoreConfig->getItem('publication/conf/documents_conf/');
        $limit = $parConf['max'];
        $name = $parConf['name'];
        $documents = array();

        if(!empty($this->layout()->publication)){
            for($c = 1; $c <= $limit; $c++){
                $tmp = $name.$c;
                if($this->layout()->publication->$tmp){
                    $i = array(
                        'publication_id' => $this->layout()->publication->publication_id,
                        'documents' => $this->layout()->publication->$tmp,
                        'column' => $tmp,
                    );
                    $documents[] = $i;
                }
            }
        }

        $view = new ViewModel();
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->documents = $documents;
        $view->limit = $limit;
        return $view;
    }

    /**
     * renders the modal container
     * @return \Zend\View\Model\ViewModel
     */
    public function renderModalAction()
    {
        $id = $this->params()->fromQuery('id');
        $view = new ViewModel();
        $melisKey = $this->params()->fromRoute('melisKey', '');
        $view->melisKey = $melisKey;
        $view->id = $id;
        $view->setTerminal(true);
        return $view;
    }

    /**
     * renders the order list modal for updating order status
     * @return \Zend\View\Model\ViewModel
     */
    public function renderModalFormAction()
    {
        $melisCoreConfig = $this->serviceLocator->get('MelisCoreConfig');
        $appConfigForm = $melisCoreConfig->getFormMergedAndOrdered('Publications/forms/publication_file_form','publication_file_form');
        $factory = new \Zend\Form\Factory();
        $formElements = $this->serviceLocator->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $form = $factory->createForm($appConfigForm);

        $file = '';
        $default = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAPAAA/+EDLWh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMTQgNzkuMTUxNDgxLCAyMDEzLzAzLzEzLTEyOjA5OjE1ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozRkNFMzU3RDg2QUYxMUU1OEM4OENCQkI2QTc0MTkwRSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozRkNFMzU3Qzg2QUYxMUU1OEM4OENCQkI2QTc0MTkwRSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDEwNzlDODNCQThDMTFFMjg5NTlFMDAzODgzMjZDMkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDEwNzlDODRCQThDMTFFMjg5NTlFMDAzODgzMjZDMkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoL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mhNky5fTkBYwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP/9k=';

        $melisKey = $this->params()->fromRoute('melisKey', '');
        $publicationId = (int) $this->params()->fromQuery('publicationId', '');
        $isNew = $this->params()->fromQuery('isNew', '');
        $type = $this->params()->fromQuery('type', '');

        $column = $this->params()->fromQuery('column');

        if(!$isNew){
            $this->setTableVariables($publicationId);
            $file = $this->layout()->publication->$column;
        }

        $data = array(
            'publication_id' => $publicationId,
            'type' => $type,
            'publication_document' => $file,
            'column' => $column,

        );

        $form->setData($data);

        $view = new ViewModel();
        $view->melisKey = $melisKey;
        $view->publicationId = $publicationId;
        $view->form = $form;
        $view->file = $file;
        $view->type = $type;
        $view->default = $default;
        return $view;

    }

    public function saveFileFormAction()
    {
        $this->getEventManager()->trigger('publication_save_publication_file_start', $this, array());
        $melisTool = $this->getServiceLocator()->get('MelisCoreTool');
        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');

        $id = null;
        $response = array();
        $success = 0;
        $errors  = array();
        $data = array();
        $textMessage = 'tr_publications_save_file_fail';
        $textTitle = 'tr_publications_list_header_title';
        $logTypeCode = '';
        $postValues = [];
        if($this->getRequest()->isPost()) {
            $postValues = get_object_vars($this->getRequest()->getPost());
            $file = $this->attachmentValidator();

            if ($file['type'] == 'image'){
                $logTypeCode = 'CMS_PUBLICATION_UPLOAD_IMG';
            }else{
                $logTypeCode = 'CMS_PUBLICATION_UPLOAD_FILE';
            }

            if(empty($file['errors'])){
                $id = $postValues['publication_id'];
                $publication = $publicationSvc->getPublicationById($postValues['publication_id']);


                //check for image or file type
                if($file['type'] == 'file'){
                    $string = 'publication_documents';
                }else{
                    $string = 'publication_image';
                }

                //file/image limit
                //used if insert
                $limit = 1;
                if(empty($postValues['column'])){
                    for($c = 1; $c <= $limit; $c++){
                        $tmp = $string . $c;
                        if(empty($publication->$tmp)){
                            $data = array(
                                $tmp => $file['fileName']
                            );
                            if($publicationSvc->savePublication($data, $postValues['publication_id'])){
                                $success = 1;
                                $textMessage = 'tr_publications_save_file_success';
                            }
                            break;
                        }
                    }
                } else {
                    $data = [
                        $postValues['column'] => $file['fileName']
                    ];
                    if ($publicationSvc->savePublication($data, $postValues['publication_id'])) {
                        $publication = (array) $publication;
                        if (!empty($publication[$postValues['column']])) {
                            // if the file exists, delete the file after update
                            if (file_exists('public'.$publication[$postValues['column']])) {
                                unlink('public'.$publication[$postValues['column']]);
                            }
                        }

                        $success = 1;
                        $textMessage = 'tr_publications_save_file_success';
                    }
                }

            }else{
                $textMessage = $file['errors'];
            }
        }

        $response = array(
            'success' => $success,
            'textTitle' => $textTitle,
            'textMessage' => $textMessage,
            'errors' => $errors,
            'chunk' => $postValues,
        );

        $this->getEventManager()->trigger('publication_save_publication_file_end',
            $this, array_merge($response, array('typeCode' => $logTypeCode, 'itemId' => $id)));

        return new JsonModel($response);
    }

    private function getFormData($config, $formPath, $formName)
    {
        $appConfigForm = $config->getFormMergedAndOrdered($formPath, $formName);

        $factory = new \Zend\Form\Factory();
        $formElements = $this->serviceLocator->get('FormElementManager');
        $factory->setFormElementManager($formElements);

        return $factory->createForm($appConfigForm);
    }

    private function attachmentValidator()
    {
        $melisCoreConfig = $this->getServiceLocator()->get('MelisCoreConfig');
        $confUpload = $melisCoreConfig->getItem('publication/conf/files');

        $minSize = $confUpload['minUploadSize'];
        $maxSize = $confUpload['maxUploadSize'];
        $conPath = $confUpload['imagesPath'];
        $upload  = false;
        $textMessage = '';
        $newFileName = '';
        $type = 'file';

        //prepare validators
        $size = new Size(array(
            'min'=> $minSize,
            'max' => $maxSize,
            'messages' => array(
                'fileSizeTooBig' => $this->getTool()->getTranslation('tr_publications_save_upload_too_big', array($this->formatBytes($maxSize))),
                'fileSizeTooSmall' => $this->getTool()->getTranslation('tr_publications_save_upload_too_small', array($this->formatBytes($minSize))),
                'fileSizeNotFound' => $this->getTool()->getTranslation('tr_publications_save_upload_file_does_not_exists'),
            ),
        ));

        $imageValidator = new IsImage(array(
            'messages' => array(
                'fileIsImageFalseType' => $this->getTool()->getTranslation('tr_publications_save_upload_image_fileIsImageFalseType'),
                'fileIsImageNotDetected' => $this->getTool()->getTranslation('tr_publications_save_upload_image_fileIsImageNotDetected'),
                'fileIsImageNotReadable' => $this->getTool()->getTranslation('tr_publications_save_upload_image_fileIsImageNotReadable'),
            ),
        ));

        $postValues = get_object_vars($this->getRequest()->getPost());
        $uploadedFile = $this->getRequest()->getFiles()->toArray()['publication_document'];

        //set validators for file only or image only
        if($postValues['type'] == 'image'){
            $type = 'image';
            $validator = array($size, $imageValidator);
        }else{
            $validator = array($size);
        }

        if(!empty($uploadedFile['name'])){
            //format name
            $fileName = $uploadedFile['name'];
            $formattedFileName = $this->getFormattedFileName($fileName);

            //create folder based on news id
            if($this->createFolder($postValues['publication_id'])) {
                $adapter = new Http();

                // do saving
                $adapter->setValidators($validator, $fileName);

                if($adapter->isValid()){
                    $adapter->setDestination('public' . $conPath . $postValues['publication_id'] . '/');
                    $newFileName = $this->renameIfDuplicateFile($conPath . $postValues['publication_id'] . '/' . $fileName);
                    $savedDocFileName =  'public' . $newFileName;
                    $adapter->addFilter('File\Rename', array(
                        'target' => $savedDocFileName,
                        'overwrite' => true,
                    ));

                    // if uploaded successfully
                    if($adapter->receive()) {
                        $upload = true;
                    }else{
                        $textMessage = 'error upload';
                    }
                }else{
                    foreach($adapter->getMessages() as $message) {
                        $textMessage = $message;
                    }
                }
            }else{
                $textMessage = $this->getTool()->getTranslation('tr_publications_save_upload_file_path_rights_error');
            }
        }else{
            $textMessage = $this->getTool()->getTranslation('tr_publications_save_upload_empty_file');
        }

        $file = array(
            'upload' => $upload,
            'type' => $type,
            'fileName' => $newFileName,
            'errors' => $textMessage,
        );
        return $file;
    }

    /**
     * Creates a folder inside "public/media/commerce" with full permission (for now)
     * @param String $folderType, enum: category, product, variant
     * @param int $folderId
     * @return bool
     */
    private function createFolder($id)
    {
        $status = false;
        $path = 'public/media/publications/'.$id.'/';
        if(file_exists($path)) {
            chmod ( $path , 0777 );
            $status = true;
        }
        else {
            $status = mkdir($path, 0777, true);
            $this->createFolder($id);
        }

        return $status;
    }

    public function getFormattedFileName($fileName)
    {
        $file = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = $file;

        return $newFileName;
    }

    public function renameIfDuplicateFile($filePath)
    {
        $publicationTable = $this->getServiceLocator()->get('PublicationTable');
        $docData = $publicationTable->checkForDuplicates(pathinfo($filePath, PATHINFO_DIRNAME).'/'.pathinfo($filePath, PATHINFO_FILENAME));
//         echo count($docData);die();
        $totalFile = count($docData) ? '_' .count($docData) : null;
        $fileDir = pathinfo($filePath, PATHINFO_DIRNAME);
        $fileName = pathinfo($filePath, PATHINFO_FILENAME) . $totalFile;
        // replace space with underscores
        $fileName = str_replace(' ', '_', $fileName);
        $fileExt  = pathinfo($filePath, PATHINFO_EXTENSION) ? '.' . pathinfo($filePath, PATHINFO_EXTENSION) : '';
        $newFilePathAndName = $fileDir . '/'. $fileName . $fileExt;

        return $newFilePathAndName;

    }

    public function removeAttachFileAction()
    {
        $this->getEventManager()->trigger('publication_delete_publication_file_start', $this, array());
        $melisTool = $this->getServiceLocator()->get('MelisCoreTool');
        $response = array();
        $id = null;
        $success = 0;
        $errors  = array();
        $data = array();
        $textTitle = 'tr_publications_common_label_remove_file';
        $textMessage = 'tr_meliscore_error_message';
        $logTypeCode = '';
        $type = null;

        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');

        if($this->getRequest()->isPost()){
            $postValues = get_object_vars($this->getRequest()->getPost());
            $id = $postValues['publicationId'];
            $type = $postValues['type'];

            if (in_array($type, array('file', 'image'))){
                $logTypeCode = 'CMS_PUBLICATION_'.strtoupper($type).'_DELETE';
                $textTitle = 'tr_publications_delete_'.$type.'_title';
            }

            $tmp = $publicationSvc->getPublicationById($postValues['publicationId']);
            $data = array(
                $postValues['column'] => ''
            );

            if($publicationSvc->savePublication($data, $postValues['publicationId'])){
                $success = 1;

                if (in_array($type, array('file', 'image'))){
                    $textMessage = 'tr_publications_delete_'.$type.'_success';
                }

                $col = $postValues['column'];
                $fileUploadPath = 'public'.$tmp->$col;
                $this->deleteFileFromDirectory($fileUploadPath);
            }
        }

        if ($success == 0){
            if (in_array($type, array('file', 'image'))){
                $textMessage = 'tr_publications_delete_'.$type.'_unable';
            }
        }

        $response = array(
            'success' => $success,
            'textTitle' => $textTitle,
            'textMessage' => $textMessage,
            'errors' => $errors,
            'chunk' => $data,
        );

        $this->getEventManager()->trigger('publication_delete_publication_file_end',
            $this, array_merge($response, array('typeCode' => $logTypeCode, 'itemId' => $id)));

        return new JsonModel($response);

    }

    private function formatBytes($bytes) {
        $size = $bytes;
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return round(number_format($size / pow(1024, $power), 2, '.', ',')) . ' ' . $units[$power];
    }


    /**
     * sets the publication letter data to the layout
     * @param unknown $couponId
     */
    private function setTableVariables($publicationId)
    {
        $layoutVar = array();
        /** @var PublicationsService $publicationSvc */
        $publicationSvc = $this->getServiceLocator()->get('PublicationsService');
        if($publicationId){
            $resultData = $publicationSvc->getPublicationById($publicationId);
            $layoutVar['publication'] = $resultData;
        }
        $this->layout()->setVariables( array_merge( array(
            'publicationId' => $publicationId,
        ), $layoutVar));

    }

    /**
     * Returns the Tool Service Class
     * @return MelisCoreTool
     */
    private function getTool()
    {
        $melisTool = $this->getServiceLocator()->get('MelisCoreTool');

        return $melisTool;

    }

    private function deleteFileFromDirectory($fileUploadPath)
    {
        if(file_exists($fileUploadPath)) {

            if(is_readable($fileUploadPath) && is_writable($fileUploadPath)) {

                unlink($fileUploadPath);
            }
        }
    }

}
