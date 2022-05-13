var paged = 1;
var itemByPagination = 20;
jQuery(document).ready(function(){
    initAjaxList("explorations");
    initAjaxList("projets");
    initAjaxList("post");
})


function initAjaxList(type="explorations"){
    jQuery('.'+type+'Container .categoryHeader .catWrapper').each(function(){
        let currentTaxonomy = jQuery(this);
        currentTaxonomy.find('.catName').click(function(){
            currentTaxonomy.find('.catName').toggleClass('active');
            currentTaxonomy.find('.div-to-toggle').toggle('slow');
            currentTaxonomy.find('.subCatName > span:first-child').addClass('active');
            currentTaxonomy.find('.subCatName > span:not(:first-child)').removeClass('active');
            currentTaxonomy.toggleClass('opened');
            updatePublicationList(type);
        });
        if(currentTaxonomy.hasClass("opened")){
            currentTaxonomy.find('.div-to-toggle').toggle('slow');
            updatePublicationList(type);
        }
        currentTaxonomy.find('.subCatName > span').each(function(index){
            let currentChildTaxonomy = jQuery(this);
            currentChildTaxonomy.click(function(){
                currentTaxonomy.find('.subCatName > span.active').removeClass('active');
                currentChildTaxonomy.addClass("active")
                if(currentChildTaxonomy.next().hasClass('subCatDescription')) currentChildTaxonomy.next().toggleClass('active');
                /*if(index !== 0 ){
                    currentChildTaxonomy.toggleClass("active");
                    currentTaxonomy.find('.subCatName > span:first-child').removeClass('active');
                }else{
                    currentChildTaxonomy.addClass("active");
                    currentTaxonomy.find('.subCatName > span:not(:first-child), .subCatName .subCatDescription.active').removeClass('active');
                }
                let allIsChecked = currentTaxonomy.find('.subCatName > span:not(.unclickable).active').length===currentTaxonomy.find('.subCatName > span:not(.unclickable)').length-1;
                let nothingIsChecked = currentTaxonomy.find('.subCatName > span:not(.unclickable).active').length===0
                if(/*(allIsChecked && currentTaxonomy.find('.subCatName > span:not(.unclickable)').length>2) || nothingIsChecked ){
                    currentTaxonomy.find('.subCatName > span, .subCatName .subCatDescription').removeClass('active');
                    currentTaxonomy.find('.subCatName > span:first-child').addClass('active');
                }*/
                updatePublicationList(type, true);
            })
        })
    })
    let loadMore = jQuery("#load-more-"+type);
    loadMore.click(function(){
        paged += 1;
        updatePublicationList(
            type,
            false,
            function(){
                loadMore.addClass('inactive')
            },
            function(){
                loadMore.removeClass('inactive')
            }
        );
        loadMore.attr('data-paged', paged);
    })
    if(
        jQuery(".cardProjet").length === itemByPagination*paged ||
        jQuery(".preExplorationWrapper").length === itemByPagination*paged ||
        jQuery(".archive-actu-container").length === itemByPagination*paged ) jQuery("#load-more-"+type).removeClass('no-more');
    else jQuery("#load-more-"+type).addClass('no-more');
}

function updatePublicationList(type="explorations",reset=true, beforeSend=()=>{}, success=()=>{}){

    if(reset){
        jQuery("#"+type+"-list").html('');
        paged = 1;
    }
    let taxonomy = {};

    jQuery("."+type+"Container .categoryHeader .catWrapper").each(function(){
        let currentTaxonomy = jQuery(this);
        let subTaxonomyContainer = currentTaxonomy.find('>div>div');
        if(taxonomyName = subTaxonomyContainer.data('id')){
            if(currentTaxonomy.hasClass('opened') && subTaxonomyContainer.find('>span:first-child').hasClass('active')){
                //L'accordéon est ouvert et "toutes" les options sont cochées.
                if(!taxonomy[taxonomyName+'==OR']) taxonomy[taxonomyName+'==OR'] = [];
                subTaxonomyContainer.find('>span:not(:first-child):not(.unclickable)').each(function(){
                    taxonomy[taxonomyName+'==OR'].push(jQuery(this).data('id'));
                })
            }else{
                if(!taxonomy[taxonomyName]) taxonomy[taxonomyName] = [];
                subTaxonomyContainer.find('>span.active').each(function(){
                    if(jQuery(this).data('id')!=='tous') taxonomy[taxonomyName].push(jQuery(this).data('id'));
                })
            }
        }
    })

    jQuery.ajax({
        url: ajaxurl,
        type: 'GET',
        data: {
            'action': 'ajax_archive_list',
            'taxonomy': taxonomy,
            'type': type,
            'paged': paged,
            'posts_per_page': itemByPagination
        },
        beforeSend: function(){
            beforeSend();
        }, 
        success: function (data) {
            jQuery("#"+type+"-list").append(data);
            if(
                jQuery(".cardProjet").length === itemByPagination*paged ||
                jQuery(".preExplorationWrapper").length === itemByPagination*paged ||
                jQuery(".archive-actu-container").length === itemByPagination*paged ) jQuery("#load-more-"+type).removeClass('no-more');
            else jQuery("#load-more-"+type).addClass('no-more');
            success();
        },
        error: function (data) {
            jQuery("#"+type+"-list").html("");
            jQuery("#"+type+"-list").append(
                jQuery("<p/>").text("Une erreur est survenue")
            );
        }
    });

    /*jQuery.ajax({
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
    });*/
}