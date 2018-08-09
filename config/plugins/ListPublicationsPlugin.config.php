<?php

return array(
    'plugins' => array(
        'publications' => array(
            'plugins' => array(
                'ListPublicationsPlugin' => array(
                    'front' => array(
                        'template_path' => array('Publications/listpublications'),
                        'id' => 'listpublications',

                        // Site id of News
                        'site_id' => null,

                        // Detail news landing page
//                        'pageIdPublication' => null,

                        // Optional, if found will add a pagination object
                        'pagination' => array(
                            'current' => 1,
                            'nbPerPage' => 9,
                            'nbPageBeforeAfter' => 0
                        ),

                        // optional, filtering
                        'filter' => array(
                            'column' => 'publication_date',
                            'order' => 'DESC',
                            'date_min' => null,
                            'date_max' => null,
                            'search' => '',
                        ),
                        // List the files to be automatically included for the correct display of the plugin
                        // To overide a key, just add it again in your site module
                        // To delete an entry, use the keyword "disable" instead of the file path for the same key
                        'files' => array(
                        ),
                        'js_initialization' => array(),
                    ),
                    'melis' => array(
                        'name' => 'tr_PublicationsListPublicationsPlugin_Name',
                        'thumbnail' => '/Publications/plugins/images/PublicationsListPublicationsPlugin_thumb.jpg',
                        'description' => 'tr_PublicationsListPublicationsPlugin_Description',
                        // List the files to be automatically included for the correct display of the plugin
                        // To overide a key, just add it again in your site module
                        // To delete an entry, use the keyword "disable" instead of the file path for the same key
                        'files' => array(
                            'css' => array(
                                '/Publications/plugins/css/ListPublications.css',
                                '/Publications/plugins/plugins/bootstrap-datetimepick/css/bootstrap-datetimepicker.min.css',
                            ),
                            'js' => array(
                                '/Publications/plugins/plugins/moment/moment.js',
                                '/Publications/plugins/plugins/bootstrap-datetimepick/js/bootstrap-datetimepicker.min.js',
                                '/Publications/plugins/js/plugin.publicationList.init.js',
                            ),
                        ),
                        'js_initialization' => array(),
                        'modal_form' => array(
                            'publications_list_plugin_template_form' => array(
                                'tab_title' => 'tr_publications_plugin_tab_properties',
                                'tab_icon'  => 'fa fa-cog',
                                'tab_form_layout' => 'Publications/plugin/modal/modal-template-form',
                                'attributes' => array(
                                    'name' => 'publications_list_plugin_template_form',
                                    'id' => 'publications_list_plugin_template_form',
                                    'method' => '',
                                    'action' => '',
                                ),
                                'elements' => array(
                                    array(
                                        'spec' => array(
                                            'name' => 'template_path',
                                            'type' => 'MelisEnginePluginTemplateSelect',
                                            'options' => array(
                                                'label' => 'tr_melis_Plugins_Template',
                                                'tooltip' => 'tr_melis_Plugins_Template tooltip',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                            ),
                                            'attributes' => array(
                                                'id' => 'id_page_tpl_id',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'spec' => array(
                                            'name' => 'site_id',
                                            'type' => 'MelisCmsPluginSiteSelect',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_site',
                                                'tooltip' => 'tr_publications_plugin_filter_site tooltip',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                            ),
                                            'attributes' => array(
                                                'id' => 'site_id',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                            ),
                                        ),
                                    ),
//                                    array(
//                                        'spec' => array(
//                                            'name' => 'pageIdPublication',
//                                            'type' => 'MelisText',
//                                            'options' => array(
//                                                'label' => 'tr_publications_plugin_detail_publication_page_id',
//                                                'tooltip' => 'tr_publications_plugin_detail_publication_page_id tooltip',
//                                            ),
//                                            'attributes' => array(
//                                                'id' => 'pageIdPublication',
//                                                'class' => 'melis-input-group-button',
//                                                'data-button-icon' => 'fa fa-sitemap',
//                                                'data-button-id' => 'meliscms-site-selector',
//                                                'placeholder' => 'tr_publications_plugin_detail_publication_page_id',
//                                                'required' => 'required',
//                                            ),
//                                        ),
//                                    ),
                                ),
                                'input_filter' => array(
                                    'template_path' => array(
                                        'name'     => 'template_path',
                                        'required' => true,
                                        'validators' => array(
                                            array(
                                                'name' => 'NotEmpty',
                                                'options' => array(
                                                    'messages' => array(
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_front_template_path_empty',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'filters'  => array(
                                        ),
                                    ),
                                    'site_id' => array(
                                        'name'     => 'site_id',
                                        'required' => true,
                                        'validators' => array(
                                            array(
                                                'name' => 'NotEmpty',
                                                'options' => array(
                                                    'messages' => array(
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_front_common_input_empty',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'filters'  => array(
                                        ),
                                    ),
//                                    'pageIdPublication' => array(
//                                        'name'     => 'pageIdPublication',
//                                        'required' => true,
//                                        'validators' => array(
//                                            array(
//                                                'name'    => 'Digits',
//                                                'options' => array(
//                                                    'messages' => array(
//                                                        \Zend\Validator\Digits::NOT_DIGITS => 'tr_front_common_input_not_digit',
//                                                        \Zend\Validator\Digits::STRING_EMPTY => 'tr_front_common_input_empty',
//                                                    ),
//                                                ),
//                                            ),
//                                        ),
//                                        'filters'  => array(
//                                        ),
//                                    ),
                                )
                            ),
                            'publications_list_plugin_filter_form' => array(
                                'tab_title' => 'tr_publications_plugin_tab_filters',
                                'tab_icon'  => 'fa fa-filter',
                                'tab_form_layout' => 'Publications/plugin/modal/modal-filter-form',
                                'attributes' => array(
                                    'name' => 'publications_list_plugin_filter_form',
                                    'id' => 'publications_list_plugin_filter_form',
                                    'method' => '',
                                    'action' => '',
                                ),
                                'elements' => array(
                                    array(
                                        'spec' => array(
                                            'name' => 'column',
                                            'type' => 'Select',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_by',
                                                'tooltip' => 'tr_publications_plugin_filter_by tooltip',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                                'value_options' => array(
                                                    'publication_id'  => 'tr_publications_plugin_filter_order_id',
                                                    'publication_title'  => 'tr_publications_plugin_filter_order_column_title',
                                                    'publication_date' => 'tr_publications_plugin_filter_order_column_publish_date',
                                                    'publication_creation_date'  => 'tr_publications_plugin_filter_order_creation_date',
                                                ),
                                            ),
                                            'attributes' => array(
                                                'id' => 'column',
                                                'class' => 'form-control',
                                                'placeholder' => 'tr_publications_plugin_filter_col_name',
                                                'required' => 'required',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'spec' => array(
                                            'name' => 'order',
                                            'type' => 'Select',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_order',
                                                'tooltip' => 'tr_publications_plugin_filter_order tooltip',
                                                'value_options' => array(
                                                    'DESC' => 'tr_publications_plugin_filter_desc',
                                                    'ASC'  => 'tr_publications_plugin_filter_asc'
                                                ),
                                            ),
                                            'attributes' => array(
                                                'id' => 'order',
                                                'class' => 'form-control',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'spec' => array(
                                            'name' => 'date_min',
                                            'type' => 'MelisText',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_date_range_from',
                                                'tooltip' => 'tr_publications_plugin_filter_date_range_from tooltip',
                                            ),
                                            'attributes' => array(
                                                'id' => 'date_min',
                                                'class' => 'melis-input-group-button',
                                                'data-button-icon' => 'fa fa-eraser',
                                                'data-button-class' => 'meliscore-clear-input',
                                                'data-button-title' => 'tr_meliscore_common_clear',
                                                'placeholder' => 'tr_publications_plugin_filter_date_range_from',
                                                'readonly' => 'readonly'
                                            ),
                                        ),
                                    ),
                                    array(
                                        'spec' => array(
                                            'name' => 'date_max',
                                            'type' => 'MelisText',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_date_range_to',
                                                'tooltip' => 'tr_publications_plugin_filter_date_range_to tooltip',
                                            ),
                                            'attributes' => array(
                                                'id' => 'date_max',
                                                'class' => 'melis-input-group-button',
                                                'data-button-icon' => 'fa fa-eraser',
                                                'data-button-class' => 'meliscore-clear-input',
                                                'data-button-title' => 'tr_meliscore_common_clear',
                                                'placeholder' => 'tr_publications_plugin_filter_date_range_to',
                                                'readonly' => 'readonly'
                                            ),
                                        ),
                                    ),
                                    array(
                                        'spec' => array(
                                            'name' => 'search',
                                            'type' => 'MelisText',
                                            'options' => array(
                                                'label' => 'tr_publications_plugin_filter_search_by_default',
                                                'tooltip' => 'tr_publications_plugin_filter_search_by_default tooltip',
                                            ),
                                            'attributes' => array(
                                                'id' => 'search',
                                                'class' => 'form-control',
                                                'placeholder' => 'tr_publications_plugin_filter_search',
                                            ),
                                        ),
                                    ),
                                ),
                                'input_filter' => array(
                                    'column' => array(
                                        'name'     => 'column',
                                        'required' => true,
                                        'validators' => array(
                                            array(
                                                'name' => 'NotEmpty',
                                                'options' => array(
                                                    'messages' => array(
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_front_common_input_empty',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'filters'  => array(
                                        ),
                                    ),
                                )
                            )
                        )
                    ),
                ),
            ),
        ),
    ),
);