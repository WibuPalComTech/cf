var LoadModal = (function () {
    var LoadModalDiv = $('<div id="loading-modal" class="modal custom" role="dialog" aria-hidden="true"><div class="modal-dialog"><i class="fa fa-spinner fa-4x fa-spin"></i></div></div>');
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
	$(document).on('click','.sidebar-nav a',function(e) {
		// berfungsi mencegah terjadinya event bawaan dari sebuah DOM, misalnya tag "a href" jika kita klik, maka halaman browser akan melakukan reload, atau sebuah form jika kita klik tombol submit maka akan melakukan reload pula.
		// e.preventDefault();
		var link = $(this);
		$(".sidebar-nav a").removeClass("active");
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
		$('#detailModal').modal('hide');
		return false;
	});	
	
	//modal biasa
	$(document).on('click','a[data-target="#detailModal"]',function(e) {
        e.preventDefault();
        var myModal = $('#detailModal');
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