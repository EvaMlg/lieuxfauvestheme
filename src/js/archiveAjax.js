jQuery(document).ready(function(){
    initAjaxList("explorations");
    initAjaxList("projets");
})


function initAjaxList(type="explorations"){
    jQuery('.'+type+'Container .categoryHeader .catWrapper').each(function(){
        let currentTaxonomy = jQuery(this);
        currentTaxonomy.find('.catName').click(function(){
            currentTaxonomy.find('.div-to-toggle').toggle('slow');
            currentTaxonomy.find('.subCatName > span:first-child').addClass('active');
            currentTaxonomy.find('.subCatName > span:not(:first-child)').removeClass('active');
            updatePublicationList(type);
        });
        currentTaxonomy.find('.subCatName > span').each(function(index){
            let currentChildTaxonomy = jQuery(this);
            currentChildTaxonomy.click(function(){
                if(index !== 0 ){
                    currentChildTaxonomy.toggleClass("active");
                    currentTaxonomy.find('.subCatName > span:first-child').removeClass('active');
                }else{
                    currentChildTaxonomy.addClass("active");
                    currentTaxonomy.find('.subCatName > span:not(:first-child)').removeClass('active');
                }
                let allIsChecked = currentTaxonomy.find('.subCatName > span:not(.unclickable).active').length===currentTaxonomy.find('.subCatName > span:not(.unclickable)').length-1;
                let nothingIsChecked = currentTaxonomy.find('.subCatName > span:not(.unclickable).active').length===0
                if(/*(allIsChecked && currentTaxonomy.find('.subCatName > span:not(.unclickable)').length>2) ||*/ nothingIsChecked ){
                    currentTaxonomy.find('.subCatName > span').removeClass('active');
                    currentTaxonomy.find('.subCatName > span:first-child').addClass('active');
                }
                updatePublicationList(type);
            })
        })
    })
}

function updatePublicationList(type="explorations"){

    let taxonomy = {};

    jQuery("."+type+"Container .categoryHeader .catWrapper").each(function(){
        let currentTaxonomy = jQuery(this);
        let subTaxonomyContainer = currentTaxonomy.find('>div>div');
        if(taxonomyName = subTaxonomyContainer.data('id')){
            if(!taxonomy[taxonomyName]) taxonomy[taxonomyName] = [];
            subTaxonomyContainer.find('>span.active').each(function(){
                if(jQuery(this).data('id')!=='tous') taxonomy[taxonomyName].push(jQuery(this).data('id'));
            })
        }
    })

    jQuery.ajax({
        url: ajaxurl,
        type: 'GET',
        data: {
            'action': 'ajax_archive_list',
            'taxonomy': taxonomy,
            'type': type
        },
        success: function (data) {
            jQuery("#"+type+"-list").html(data);
        },
        error: function (data) {
            jQuery("#"+type+"-list").html("");
            jQuery("#"+type+"-list").append(
                jQuery("<p/>").text("Une erreur est survenue")
            );
        }
    });

    jQuery.ajax({
        url: ajaxurl,
        type: 'GET',
        data: {
            'action': 'ajax_term_list',
            'taxonomy': taxonomy,
            'type': type
        },
        success: function (data) {
            if(data.hasOwnProperty('childs_active_terms')){
                jQuery('.'+type+'Container span').each(function(){
                    if(jQuery(this).data('id')!=="tous") jQuery(this).addClass('unclickable');
                })
                data.childs_active_terms.forEach((item)=>{
                    jQuery('.'+type+'Container span[data-id="'+item.slug+'"]').removeClass('unclickable');
                })
            }
        },
        error: function (data) {
            jQuery("#"+type+"-list").html("");
            jQuery("#"+type+"-list").append(
                jQuery("<p/>").text("Une erreur est survenue")
            );
        }
    });
}