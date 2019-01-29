/*
 *  Document   : PendaftaranOnline.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Checkout page
 */

 var PendaftaranOnline = function() {

 	return {
 		init: function() {
            /*
             *  Jquery Wizard, Check out more examples and documentation at http://www.thecodemine.org
             */

             /* Initialize Checkout Wizard */
             var checkoutWizard  = $('#form-validation');

             checkoutWizard
             .formwizard({
             	disableUIStyles: true,
             	validationEnabled: true,
             	validationOptions: {
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
							username: {
								required: true,
								minlength:6,
								maxlength:12
							},
							password: {
								minlength: 6
							},
							ulangi_password: {
								minlength: 6,
								equalTo: '#password'
							},
							no_reg: {
								required: true,
								digits: true,
								maxlength: 8
							},
							alamat_sambungan: {
								required: true,
								minlength: 3
							},
							nm_lengkap: {
								required: true,
								minlength: 3,
								maxlength: 32
							},
							pekerjaan: {
								required: true,
								minlength: 3,
								maxlength: 32
							},
							alamat_rumah: {
								required: true,
								minlength:15
							},
							penghuni_tetap: {
								required: true,
								range: [1, 99]
							},
							penghuni_tdk_tetap: {
								required: true,
								range: [1, 99]
							},
							dipakai_untuk: {
								required: true,
								minlength:3,
								maxlength:21
							},
							siap_persil: {
								required: true
							},
							bnyk_kran: {
								required: true,
								range: [1, 99]
							},
							bayar_tambahan: {
								required: true
							},
							menjual_keorang: {
								required: true
							},
							setujui: {
								required: true
							}
						},
						messages: {
							username: {
								required: 'Mohon Diisi Username',
								minlength: 'Username Minimal 6 Karakter'
							},
							password: {
								minlength: 'Password Minimal 6 Karakter'
							},
							ulangi_password: {
								minlength: 'Alamat Minimal 6 Karakter',
								equalTo: 'Konfirmasi Password Tidak Sama Dengan Password!'
							},
							no_reg: {
								required: 'Mohon Diisi Nomor Registrasi Dengan Angka',
								digits: 'Nomor Register Hanya Angka !',
								maxlength: 'Nomor Registrasi Maksimum 8 Karakter'
							},
							alamat_sambungan: {
								required: 'Mohon Diisi Alamat Sambungan',
								minlength: 'Alamat Sambungan Minimal 3 Karakter'
							},
							nm_lengkap: {
								required: 'Mohon Diisi Nama Lengkap',
								minlength: 'Nama Lengkap Minimal 3 Karakter',
								maxlength: 'Nama Lengkap Maksimum 32 Karakter'
							},
							pekerjaan: {
								required: 'Mohon Diisi Pekerjaan',
								minlength: 'Pekerjaan Minimal 3 Karakter',
								maxlength: 'Pekerjaan Maksimum 32 Karakter'
							},
							alamat_rumah: {
								required: 'Mohon Diisi Alamat Rumah',
								minlength: 'Alamat Rumah Minimal 15 Karakter'
							},
							penghuni_tetap: {
								required: 'Mohon Diisi Jumlah Penghuni Rumah Tetap',
								range: 'Hanya Dapat Diisi Dengan Angka 1..99 !'
							},
							penghuni_tdk_tetap: {
								required: 'Mohon Diisi Jumlah Penghuni Rumah Tidak Tetap',
								range: 'Hanya Dapat Diisi Dengan Angka 1..99 !'
							},
							dipakai_untuk: {
								required: 'Mohon Diisi Rumah Dipakai Untuk ...',
								minlength: 'Rumah Dipakai Untuk ... Minimal 3 Karakter',
								maxlength: 'Rumah Dipakai Untuk ... Maksimum 21 Karakter'
							},
							siap_persil: {
								required: 'Mohon Dipilih Sudah Siap Instalasi Persil Atau Belum ...'
							},
							bnyk_kran: {
								required: 'Mohon Diisi Jumlah Kran Yang Akan Dipasang',
								range: 'Hanya Dapat Diisi Dengan Angka 1..99 !'
							},
							bayar_tambahan: {
								required: 'Mohon Dipilih Setuju Dengan Bayaran Tambahan'
							},
							menjual_keorang: {
								required: 'Mohon Dipilih Tidak Menjual Air Kepada Orang Lain'
							},
							setujui: 'Mohon Diklik Setujui Untuk Melanjutkan Pendaftaran!'
						}
					},
					inDuration: 0,
					outDuration: 0,
					textBack: 'Formulir Sebelumnya',
					textNext: 'Formulir Selanjutnya',
					textSubmit: 'Kirim Formulir Pendaftaran'
				});

$('.checkout-steps a').on('click', function(){
	var gotostep    = $(this).data('gotostep');

	checkoutWizard
	.formwizard('show', gotostep);
});

			// Toggle animation class when an element appears with Jquery Appear plugin
			$('[data-toggle="animation-appear"]').each(function(){
				var $this       = $(this);
				var $animClass  = $this.data('animation-class');
				var $elemOff    = $this.data('element-offset');

				$this.appear(function() {
					$this.removeClass('visibility-none').addClass($animClass);
				},{accY: $elemOff});
			});
		}
	};
}();

$('#tgl_lahir').on('input', function() {
	var dob = new Date(this.value);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	$('#umur').val(age);
});