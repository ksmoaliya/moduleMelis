$(document).ready(function(){
	var body = $("body");

	body.on("click", '.addPublication', function(){
		var publicationId = 0;
		var name = translations.tr_publications_list_header_title_new;
		toolPublications.tabOpen(name, publicationId);
	});

	body.on("click", '.publicationEdit', function(){
		var publicationId = $(this).closest('tr').attr('id');
		var name = $(this).closest('tr').find("td:nth-child(3)").text();
		toolPublications.tabOpen(name, publicationId);
	});

	body.on("click", '.publicationsListRefresh', function(){
		toolPublications.refreshTable();
	});

	body.on("click", ".publicationDelete", function(){
		var publicationId   = $(this).closest('tr').attr('id');
		var ajaxUrl = '/melis/Publications/PublicationsList/deletePublication';
		var dataString = [];
		dataString.push({
			name : 'publicationId',
			value: publicationId,
		});
		melisCoreTool.pending(".publicationDelete");

		melisCoreTool.confirm(
			translations.tr_publications_common_label_yes,
			translations.tr_publications_common_label_no,
			translations.tr_publications_common_label_delete_publication,
			translations.tr_publications_common_label_delete_confirm,
			function(){
				$.ajax({
			        type        : 'POST',
			        url         : ajaxUrl,
			        data		: dataString,
			        dataType    : 'json',
			        encode		: true,
			     }).success(function(data){
			    	if(data.success){
							melisHelper.melisOkNotification( data.textTitle, data.textMessage );
							toolPublications.tabClose(publicationId);
							melisHelper.zoneReload("id_publications_list_content_table", "publications_list_content_table", {});
					}else{
						melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors);
					}
					melisCore.flashMessenger();
			     }).error(function(){
			    	 console.log('failed');
			     });
		});

		melisCoreTool.done(".publicationDelete");
	});


	body.on("change", "select[name=publication_site_id]", function(){
		var tableId = $(this).parents().eq(6).find('table').attr('id');
		$("#"+tableId).DataTable().ajax.reload();
	});

    body.on("click", ".savePublication", function(){
        melisCoreTool.pending(".savePublication");
        var ajaxUrl = '/melis/Publications/Publication/save';
        var publicationPage = $(this).closest('.container-level-a');
        var dataString = publicationPage.find('form#publicationForm').serializeArray();
        var publicationId = publicationPage.data('publicationid');
        var selectedSite = publicationPage.find('select[name=publication_site_id]').val();

        //newsSiteTitleSubtitleForm
        var forms = $('#' + publicationId + '_id_publications_content_tabs_properties_details_right_paragraphs form#publicationSiteTitleSubtitleForm');

        ctr = 0
        len = 1;
        forms.each(function(){
            dataString.push({ name : 'publication_title['+ctr+']', value : $('#'+publicationId+'_id_publications_content_tabs_properties_details_right_paragraphs #publication_'+len+' '+'#publication_title').val() });
            dataString.push({ name : 'publication_subtitle['+ctr+']', value : $('#'+publicationId+'_id_publications_content_tabs_properties_details_right_paragraphs #publication_'+len+' '+'#publication_subtitle').val() });
            dataString.push({ name : 'publication_lang_id' +"["+ctr+"]", value : $('#'+publicationId+'_id_publications_content_tabs_properties_details_right_paragraphs .product-text-tab #publication_lang_'+len).attr("data-lang-id")});

            for (var i = 1; i <= 4; i++) {
                dataString.push({ name : 'publication_paragraph'+i +"["+ctr+"]", value : $('#'+publicationId+'_id_publications_content_tabs_properties_details_right_paragraphs #publication_'+len+' '+'#publication_paragraph'+i).val()});
            }
            ctr++;
            len++;
        });

        dataString.push({ name : 'formCount', value : forms.length});
        dataString.push({name: 'publication_site_id', value: selectedSite});
        //end

        publicationPage.find('.make-switch div').each(function(){
            var field = $(this).find('input').attr('name');
            var status = $(this).hasClass('switch-on');
            var saveStatus = (status) ? 1 : 0;
            dataString.push({ name : field, value : saveStatus});
        });


        $.ajax({
            type        : 'POST',
            url         : ajaxUrl,
            data		: dataString,
            dataType    : 'json',
            encode		: true,
        }).success(function(data){
            if (data.success) {
                toolPublications.tabClose(publicationId);
                melisHelper.melisOkNotification( data.textTitle, data.textMessage );
                toolPublications.tabOpen(data.chunk.publication_title, data.chunk.publication_id);
                toolPublications.refreshTable();
            } else {
                melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors);
                melisCoreTool.highlightErrors(data.success, data.errors, activeTabId + " form");
            }
            melisCore.flashMessenger();
        }).error(function() {
            console.log('failed');
        });

        melisCoreTool.done(".savePublication");
    });


    // Attachements.

    body.on("click", ".removeAttachFile", function () {
        var publicationId = $(this).data('publicationid');
        var column = $(this).data('column');
        var type = $(this).data('type');
        var ajaxUrl = '/melis/Publications/Publication/removeAttachFile';
        var dataString = [];
        dataString.push({
            name: 'publicationId',
            value: publicationId,
        });
        dataString.push({
            name: 'column',
            value: column,
        });
        dataString.push({
            name: 'type',
            value: type,
        });

        melisCoreTool.pending(".removeAttachFile");

        melisCoreTool.confirm(
            translations.tr_publications_common_label_yes,
            translations.tr_publications_common_label_no,
            melisHelper.melisTranslator("tr_publications_delete_" + type + "_title"),
            melisHelper.melisTranslator("tr_publications_delete_" + type + "_confirm_msg"),
            function () {
                $.ajax({
                    type: 'POST',
                    url: ajaxUrl,
                    data: dataString,
                    dataType: 'json',
                    encode: true,
                }).success(function (data) {
                    if (data.success) {
                        melisHelper.melisOkNotification(data.textTitle, data.textMessage);
                        melisHelper.zoneReload(publicationId + "_id_publication_content_tabs_properties_details_left_images", "publication_content_tabs_properties_details_left_images", {'publicationId': publicationId});
                        melisHelper.zoneReload(publicationId + "_id_publication_content_tabs_properties_details_left_documents", "publication_content_tabs_properties_details_left_documents", {'publicationId': publicationId});
                    } else {
                        melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors);
                    }
                    melisCore.flashMessenger();
                }).error(function () {
                    console.log('failed');
                });
            });

        melisCoreTool.done(".removeAttachFile");
    });
    
    body.on("click", '.publicationAttachFile', function () {
        melisCoreTool.pending('.publicationAttachFile');
        var publicationId = $(this).data('publicationid');
        var type = $(this).data('filetype');
        // initialation of local variable
        zoneId = 'id_publication_modal_documents_form';
        melisKey = 'publication_modal_documents_form';
        modalUrl = '/melis/Publications/Publication/renderModal';
        // requesitng to create modal and display after
        melisHelper.createModal(zoneId, melisKey, false, {
            'publicationId': publicationId,
            'type': type,
            'isNew': 1
        }, modalUrl, function () {
            melisCoreTool.done('.publicationAttachFile');
        });
    });

    body.on("click", '.publicationAttachImage', function () {
        melisCoreTool.pending('.publicationAttachImage');
        var publicationId = $(this).data('publicationid');
        var type = $(this).data('filetype');
        // initialation of local variable
        zoneId = 'id_publication_modal_documents_form_image';
        melisKey = 'publication_modal_documents_form_image';
        modalUrl = '/melis/Publications/Publication/renderModal';
        // requesitng to create modal and display after
        melisHelper.createModal(zoneId, melisKey, false, {
            'publicationId': publicationId,
            'type': type,
            'isNew': 1
        }, modalUrl, function () {
            melisCoreTool.done('.publicationAttachImage');
        });
    });

    body.on("click", '.publicationEditImage', function () {
        melisCoreTool.pending('.publicationAttachImage');
        var publicationId = $(this).data('publicationid');
        var type = $(this).data('filetype');
        var column = $(this).data('column');
        // initialation of local variable
        zoneId = 'id_publication_modal_documents_form_image';
        melisKey = 'publication_modal_documents_form_image';
        modalUrl = '/melis/Publications/Publication/renderModal';
        // requesitng to create modal and display after
        melisHelper.createModal(zoneId, melisKey, false, {
            'publicationId': publicationId,
            'type': type,
            'isNew': 0,
            'column': column
        }, modalUrl, function () {
            melisCoreTool.done('.publicationAttachImage');
        });
    });

    body.on("click", "#publicationAttachment", function () {
        var saveBtn = $(this);
        melisCoreTool.pending(saveBtn);

        var ajaxUrl = '/melis/Publications/Publication/saveFileForm';
        var publicationId = $('form#publicationFileForm input[name=publication_id]').val();
        var tmpForm = $('#publicationFileForm').get(0);
        var sliderData = new FormData(tmpForm);

        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            data: sliderData,
            dataType: 'json',
            processData: false,
            cache: false,
            contentType: false,
            encode: true,
            xhr: function () {
                var fileXhr = $.ajaxSettings.xhr();
                if (fileXhr.upload) {
                    fileXhr.upload.addEventListener('progress', toolPublications.progress, false);
                }
                return fileXhr;
            },
        }).success(function (data) {
            if (data.success) {
                if (data.chunk.type == 'image') {
                    toolPublications.imageModal(data.chunk);
                } else {
                    toolPublications.fileModal(data.chunk);
                }

                melisHelper.melisOkNotification(data.textTitle, data.textMessage, '#72af46');
                melisCore.flashMessenger();
            } else {
                melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors, 'closeByButtonOnly');
            }
            $("div.progressContent").addClass("hidden");
            melisCoreTool.done(saveBtn);
        }).error(function (event, xhr, options, exc) {
            console.log('failed', JSON.parse(xhr.responseText));
            melisCoreTool.done(saveBtn);
        });
    });

    body.on("change", "select[name=publication_site_id]", function () {
        var tableId = $(this).parents().eq(6).find('table').attr('id');
        $("#" + tableId).DataTable().ajax.reload();
    });

});


var toolPublications = {

		refreshTable: function(){
			melisHelper.zoneReload("id_publications_list_content_table", "publications_list_content_table", {});
		},

		tabOpen: function(name, id){
			melisHelper.tabOpen(name, 'fa fa-list-alt', id+'_id_publication_page', 'publication_page', { publicationId : id}, 'id_publications_left_menu');
		},

		tabClose: function(id){
			melisHelper.tabClose(id+'_id_publication_page');
		},

        imageModal: function (data) {
            $("#id_publication_modal_documents_form_image_container").modal("hide");
            melisHelper.zoneReload(data.publication_id + "_id_publication_content_tabs_properties_details_left_images", "publication_content_tabs_properties_details_left_images", {'publicationId': data.publication_id});
        },

        fileModal: function (data) {
            $("#id_publication_modal_documents_form_image_container").modal("hide");
            $("#id_publication_modal_documents_form_container").modal("hide");
            melisHelper.zoneReload(data.publication_id + "_id_publication_content_tabs_properties_details_left_documents", "publication_content_tabs_properties_details_left_documents", {'publicationId': data.publication_id});
        },


        progress: function progress(e) {
            $("div.progressContent").removeClass("hidden");
            $("div.progressContent > div.progress > div.progress-bar").attr("aria-valuenow", 0);
            $("div.progressContent > div.progress > div.progress-bar").css("width", '0%');
            $("div.progressContent > div.progress > span.status").html("");
            if (e.lengthComputable) {
                var max = e.total;
                var current = e.loaded;
                var percentage = (current * 100) / max;
                $("div.progressContent > div.progress > div.progress-bar").attr("aria-valuenow", percentage);
                $("div.progressContent > div.progress > div.progress-bar").css("width", percentage + "%");

                if (percentage > 100) {
                    $("div.progressContent").addClass("hidden");
                }
                else {
                    $("div.progressContent > div.progress > span.status").html(Math.round(percentage) + "%");
                }
            }
        },

		trimLength : function (text){
			var maxLength = 15;
			var ellipsis = "...";
		    text = $.trim(text);

		    if (text.length > maxLength)
		    {
		        text = text.substring(0, maxLength - ellipsis.length)
		        return text.substring(0, text.lastIndexOf(" ")) + ellipsis;
		    }
		    else
		        return text;
		},

		progress : function progress(e) {
			$("div.progressContent").removeClass("hidden");
			$("div.progressContent > div.progress > div.progress-bar").attr("aria-valuenow", 0);
			$("div.progressContent > div.progress > div.progress-bar").css("width", '0%');
			$("div.progressContent > div.progress > span.status").html("");
			if(e.lengthComputable){
				var max = e.total;
				var current = e.loaded;
				var percentage = (current * 100)/max;
				$("div.progressContent > div.progress > div.progress-bar").attr("aria-valuenow", percentage);
				$("div.progressContent > div.progress > div.progress-bar").css("width", percentage+"%");

				if(percentage > 100)
				{
					$("div.progressContent").addClass("hidden");
				}
				else {
					$("div.progressContent > div.progress > span.status").html(Math.round(percentage)+"%");
				}
			}
		}

}

window.publicationImagePreview = function (id, fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
window.initPublicationsList = function(data, tblSettings){
	if($('#publicationSiteSelect').length){
		data.publication_site_id = $('#publicationSiteSelect').val();
	}

}
