$(document).ready(function(){$(".duallistbox").bootstrapDualListbox({infoText:false});let pageUrl=window.location.href;$('.m-link').each(function(){if($(this).attr('href')==pageUrl){$(this).addClass('active')}});$('.sub-menu a').each(function(){if($(this).attr('href')==pageUrl){$(this).addClass('active');$(this).parent().parent().addClass('show')}});$('.sidebar-mini-btn').on('click',function(){$('.sub-menu').removeClass('show')})});
 
const hideActionbtn = () => {
    if($("#updateActionType").val()=="No"){
        $(".edit-allow-b").addClass("disabled");
    }
    if($("#deleteActionType").val()=="No"){
        $(".delete-allow-b").addClass("disabled");
    }
    if($("#updateActionType").val()=="No"){
        $(".status-allow-b").addClass("disabled");
    }
}