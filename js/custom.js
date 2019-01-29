var LoadModal = (function () {
    var LoadModalDiv = $('<div id="loading-modal" class="modal custom" role="dialog" aria-hidden="true" style="top:40%; left:40%; color:#fff;"><div class="modal-dialog"><i class="fa fa-spinner fa-4x fa-spin"></i></div></div>');
    return {
        showLoadModal: function() {
            LoadModalDiv.modal({
				backdrop:'static',
				keyboard:false,
				show:true
			});
        },
        hideLoadModal: function () {
            LoadModalDiv.modal('hide');
        },

    };
})();

$(function(){
	$(document).bind("contextmenu",function(e){  
		e.preventDefault();
		return false;  
	});  
	
	// fungsi js untuk dinamis page
	$(document).on('click','[data-remote]',function(e) {
		e.preventDefault();
		LoadModal.showLoadModal();
		$('li.dropdown').removeClass("open");
		var link = $(this);
		var divTujuan = link.attr('href');
		var remoteNyo = link.data('remote');
		var targetNyo = link.data('target');
		if(targetNyo){
			$(targetNyo).load(remoteNyo,function(e){LoadModal.hideLoadModal()});
			$('#page-container').removeClass('sidebar-visible-xs');
		}else{
			$(divTujuan).load(remoteNyo,function(e){LoadModal.hideLoadModal()});
		}
		//LoadModal.hideLoadModal();
		return false;
	});
	
	// fungsi automatic active class pada menu sidebar
	$(document).on('click','.site-nav a',function(e) {
		e.preventDefault();
		var link = $(this);
		$(".site-nav a").removeClass("active");
		link.addClass("active");
	});
	
	// untuk form yang tidak menggunakan modal
	$(document).on('submit','form.ajaxform',function(e){
		e.preventDefault();
		LoadModal.showLoadModal();
		var link = $(this);
		var dataNyo = link.serializeArray();
		var targetNyo = link.data('target');
		var remoteNyo = link.attr('action');
		type: link.attr('method');
		link.find(":input").attr("disabled", true);
		$(targetNyo).load(remoteNyo,dataNyo,function(e){LoadModal.hideLoadModal()});
		//LoadModal.hideLoadModal();
		return false;
	});
	
	//modal form target div lain dan langsung tutup modal
	$(document).on('submit','form.ajaxformModal',function(e){
		e.preventDefault();
		LoadModal.showLoadModal();
		var link = $(this);
		var dataNyo = link.serializeArray();
		var targetNyo = link.data('target');
		var remoteNyo = link.attr('action');
		type: link.attr('method');
		link.find(":input").attr("disabled", true);
		$(targetNyo).load(remoteNyo,dataNyo,function(e){LoadModal.hideLoadModal()});
		//LoadModal.hideLoadModal();
		$('#modal-terms').modal('hide');
		return false;
	});	
	
	//modal biasa
	$(document).on('click','a[data-target="#modal-terms"]',function(e) {
        e.preventDefault();
        var myModal = $('#modal-terms');
		var url = $(this).attr('href');
		myModal.empty();
        myModal.load(url);
        myModal.modal('show');
    });

	$(document).on('click','[data-toggle="tabs"] a, .enable-tabs a',function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
});