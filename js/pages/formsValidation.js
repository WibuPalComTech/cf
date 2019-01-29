/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

 var FormsValidation = function() {

 	return {
 		init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

             /* Initialize Form Validation */
             $('#form-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation
                errorElement: 'div',
                errorPlacement: function(error, e) {
                	e.parents('.form-group').append(error);
                },
                highlight: function(e) {
                	$(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                	$(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                  },
                  rules: {
                  	nama: {
                  		required: true,
                  		minlength: 3,
                  		maxlength: 26
                  	},
                  	email: {
                  		required: true,
                  		email : true
                  	},
                  	telepon: {
                  		required: true,
                  		digits : true,
                  		minlength : 12,
                  		maxlength : 16
                  	},
                  	isi_pesan: {
                  		required: true,
                  		minlength: 20
                  	},
                  	nama_pasien: {
                  		required: true,
                  		minlength:3,
                  		maxlength:64
                  	},
                  	tgl_lahir: {
                  		required: true,
                  		date:true
                  	},
                  	umur: {
                  		required: true
                  	},
                  	alamat: {
                  		required: true,
                  		minlength: 20
                  	},
                  	jk: {
                  		required: true
                  	}
                  },
                  messages: {
                  	nama: {
                  		required: 'Mohon Diisi Nama',
                  		minlength: 'Nama Minimal 3 Karakter',
                  		maxlength: 'Nama Maksimum 26 Karakter'
                  	},
                  	email: {
                  		required: 'Mohon Diisi Email',
                  		email: 'Mohon Diisi Email Dengan Benar'
                  	},
                  	telepon: {
                  		required: 'Mohon Diisi Nomor Telepon',
                  		digits: 'Mohon Diisi Nomor Telepon Dengan Benar',
                  		minlength: 'Nomor Telepon Minimal 12 Karakter',
                  		maxlength: 'Nomor Telepon Maksimum 12 Karakter'
                  	},
                  	isi_pesan: {
                  		required: 'Mohon Diisi Pesan',
                  		minlength: 'Isi Pesan Minimal 20 Karakter'
                  	},
                  	nama_pasien: {
                  		required: 'Mohon Diisi Nama Lengkap Anda',
                  		minlength: 'Nama Lengkap Minimal 3 Karakter',
                  		maxlength: 'Nama Lengkap Maximal 64 Karakter'
                  	},
                  	tgl_lahir: {
                  		required: 'Mohon Diisi Tanggal Lahir',
                  		date: 'Tanggal Tidak Sesuai'
                  	},
                  	umur: {
                  		required: 'Mohon Diisi Tanggal Lahir Yang Sebenarnya'
                  	},
                  	jk: {
                  		required: 'Mohon Pilih Jenis Kelamin'
                  	},
                  	alamat: {
                  		required: 'Mohon Diisi Alamat Anda',
                  		minlength: 'Alamat Minimal 20 Karakter'
                  	}
                  }
                });
$('#tgl_lahir').on('input', function() {
	var dob = new Date(this.value);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	$('#umur').val(age);
});
}
};
}();