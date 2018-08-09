<?php
return array(
    'plugins' => array(
        'Publications' => array(
            'conf' => array(
                // user rights exclusions
                'rightsDisplay' => 'none',
            ),
            'forms' => array(
                'publication_properties_form' => array(
                    'attributes' => array(
                        'name' => 'publicationForm',
                        'id' => 'publicationForm',
                        'method' => 'POST',
                        'action' => '',
                    ),
                    'hydrator'  => 'Zend\Stdlib\Hydrator\ArraySerializable',
                    'elements' => array(
                        array(
                            'spec' => array(
                                'name' => 'publication_publish_date',
                                'type' => 'DateField',
                                'options' => array(
                                    'label' => 'tr_publications_form_publish',
                                    'tooltip' => 'tr_publications_form_publish tooltip',
                                ),
                                'attributes' => array(
                                    'dateId' => 'publicationPublishDate',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_unpublish_date',
                                'type' => 'DateField',
                                'options' => array(
                                    'label' => 'tr_publications_form_unpublish',
                                    'tooltip' => 'tr_publications_form_unpublish tooltip',
                                ),
                                'attributes' => array(
                                    'dateId' => 'publicationUnpublishDate',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_date',
                                'type' => 'DateField',
                                'options' => array(
                                    'label' => 'tr_publications_form_date',
                                ),
                                'attributes' => array(
                                    'dateId' => 'publicationDate',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_id',
                                'type' => 'hidden',
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_creation_date',
                                'type' => 'hidden',
                            ),
                        ),
                    ),
                    'input_filter' => array(
                    ),
                ),
                'publication_file_form' => array(
                    'attributes' => array(
                        'name' => 'publicationFileForm',
                        'id' => 'publicationFileForm',
                        'enctype' => "multipart/form-data",
                        'method' => 'POST',
                        'action' => '',
                    ),
                    'hydrator'  => 'Zend\Stdlib\Hydrator\ArraySerializable',
                    'elements' => array(
                        array(
                            'spec' => array(
                                'name' => 'publication_document',
                                'type' => 'file',
                                'options' => array(
                                    'label' => 'tr_publications_save_upload_file',
                                ),
                                'attributes' => array(
                                    'id' => 'publication_document',
                                    'value' => '',
                                    'class' => 'filestyle',
                                    'label' => 'Upload',
                                    'required' => 'required',
                                    'onchange' => 'publicationImagePreview(".imgDocThumbnail", this);',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'type',
                                'type' => 'hidden',
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_id',
                                'type' => 'hidden',
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'column',
                                'type' => 'hidden',
                            ),
                        ),
                    ),
                    'input_filter' => array(
                    ),
                ),
                'publication_site_select_form' => array(
                    'attributes' => array(
                        'name' => 'publicationSiteSelectForm',
                        'id' => 'publicationSiteSelectForm',
                        'method' => 'POST',
                        'action' => '',
                    ),
                    'hydrator'  => 'Zend\Stdlib\Hydrator\ArraySerializable',
                    'elements' => array(
                        array(
                            'spec' => array(
                                'name' => 'publication_site_id',
                                'type' => 'MelisCoreSiteSelect',
                                'options' => array(
                                    'label' => 'tr_meliscms_tool_templates_tpl_site_id',
                                    'tooltip' => 'tr_publications_tpl_site_id tooltip',
                                    'empty_option' => 'tr_meliscmsliderdetails_common_label_choose',
                                    'disable_inarray_validator' => true,
                                ),
                                'attributes' => array(
                                    'id' => 'id_publication_site_id',
                                    'value' => '',
                                ),
                            ),
                        ),
                    ),
                    'input_filter' => array(
                        'publication_site_id' => array(
                            'name' => 'publication_site_id',
                            'required' => false,
                            'validators' => array(),
                            'filters' => array(),
                        ),
                    ),
                ),
                'publication_site_title_subtitle_form' => array(
                    'attributes' => array(
                        'name' => 'publicationSiteTitleSubtitleForm',
                        'id' => 'publicationSiteTitleSubtitleForm',
                        'method' => 'POST',
                        'action' => '',
                    ),
                    'hydrator'  => 'Zend\Stdlib\Hydrator\ArraySerializable',
                    'elements' => array(
                        array(
                            'spec' => array(
                                'name' => 'publication_title',
                                'type' => 'MelisText',
                                'options' => array(
                                    'label' => 'tr_publications_list_col_title',
                                    'tooltip' => 'tr_publications_list_col_title tooltip',
                                ),
                                'attributes' => array(
                                    'id' => 'publication_title',
                                    'required' => false,
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_subtitle',
                                'type' => 'MelisText',
                                'options' => array(
                                    'label' => 'tr_publications_list_col_subtitle',
                                ),
                                'attributes' => array(
                                    'id' => 'publication_subtitle',
                                    'required' => false,
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_paragraph1',
                                'type' => 'TextArea',
                                 'options' => array(
                                    'label' => 'tr_publications_paragraph1',
                                    'tooltip' => 'tr_publications_paragraph1 tooltip',
                                ),

                                'attributes' => array(
                                    'id' => 'publication_paragraph1',
                                    'value' => '',
                                    'class' => 'form-control editme',
                                    'style' => 'max-width:100%',
                                    'rows' => '4',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_paragraph2',
                                'type' => 'TextArea',
                                'options' => array(
                                    'label' => 'tr_publications_paragraph2',
                                    'tooltip' => 'tr_publications_paragraph2 tooltip',
                                ),

                                'attributes' => array(
                                    'id' => 'publication_paragraph2',
                                    'value' => '',
                                    'class' => 'form-control editme',
                                    'style' => 'max-width:100%',
                                    'rows' => '4',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_paragraph3',
                                'type' => 'TextArea',
                                'options' => array(
                                    'label' => 'tr_publications_paragraph3',
                                    'tooltip' => 'tr_publications_paragraph3 tooltip',
                                ),

                                'attributes' => array(
                                    'id' => 'publication_paragraph3',
                                    'value' => '',
                                    'class' => 'form-control editme',
                                    'style' => 'max-width:100%',
                                    'rows' => '4',
                                ),
                            ),
                        ),
                        array(
                            'spec' => array(
                                'name' => 'publication_paragraph4',
                                'type' => 'TextArea',
                                'options' => array(
                                    'label' => 'tr_publications_paragraph4',
                                    'tooltip' => 'tr_publications_paragraph4 tooltip',
                                ),

                                'attributes' => array(
                                    'id' => 'publication_paragraph4',
                                    'value' => '',
                                    'class' => 'form-control editme',
                                    'style' => 'max-width:100%',
                                    'rows' => '4',
                                ),
                            ),
                        ),
                    ),
                     'input_filter' => array(
                        'publication_title' => array(
                            'name'     => 'publication_title',
                            'required' => false,
                            'validators' => array(
                                array(
                                    'name'    => 'StringLength',
                                    'options' => array(
                                        'encoding' => 'UTF-8',
                                        'max'      => 255,
                                        'messages' => array(
                                            \Zend\Validator\StringLength::TOO_LONG => 'tr_publications_form_error_long_255',
                                        ),
                                    ),
                                ),
                                array(
                                    'name' => 'NotEmpty',
                                    'options' => array(
                                        'messages' => array(
                                            \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_publications_form_error_empty',
                                        ),
                                    ),
                                ),
                            ),
                            'filters'  => array(
                                array('name' => 'StripTags'),
                                array('name' => 'StringTrim'),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
