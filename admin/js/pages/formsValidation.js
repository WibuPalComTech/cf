/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function(a) {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $(a).validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    //e.closest('.form-group').removeClass('has-success has-error'); 
					e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
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
					pertanyaan: {
						required: true,
						minlength: 10
					},
					jawaban: {
						required: true,
						minlength: 10
					},
					username: {
						required: true,
						minlength:6,
						maxlength:12
					},
					level: {
						required: true
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
					penghuni_tidak_tetap: {
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
					dipasang_oleh: {
						required: true,
						minlength: 3,
						maxlength: 18
					},
					tanggal_pemasangan: {
						required: true,
						maxlength: 18
					},
					status_permohonan: {
						required: true
					},
					pesan_konfirmasi: {
						required: true,
						minlength: 3
					},
					password_lama: {
						required: true,
						minlength: 6
					},
					password_baru: {
						required: true,
						minlength: 6
					},
					ulang_password_baru: {
						required: true,
						equalTo: '#password_baru',
						minlength: 6
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
					pertanyaan: {
						required: 'Mohon Diisi Pertanyaan',
						minlength: 'Pertanyaan Minimal 10 Karakter'
					},
					jawaban: {
						required: 'Mohon Diisi Jawaban',
						minlength: 'Jawaban Minimal 10 Karakter'
					},
					username: {
						required: 'Mohon Diisi Username',
						minlength: 'Username Minimal 6 Karakter'
					},
					level: {
						required: 'Mohon Pilih Hak Akses'
					},
					password: {
						minlength: 'Password Minimal 6 Karakter'
					},
					ulangi_password: {
						minlength: 'Alamat Minimal 6 Karakter',
						equalTo: 'Ulangi Password Harus Sama Dengan Password!'
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
					penghuni_tidak_tetap: {
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
					dipasang_oleh: {
						required: 'Mohon Diisi Nama Pemasang Kran Air',
						minlength: 'Nama Pemasang Minimal 3 Karakter',
						maxlength: 'Nama Pemasang Maksimum 18 Karakter'
					},
					tanggal_pemasangan: {
						required: 'Mohon Diisi Tanggal Pemasangan Kran',
						maxlength: 'Tanggal Pemasangan Maksimum 18 Karakter'
					},
					status_permohonan: {
						required: 'Mohon Diisi Status Permohonan'
					},
					pesan_konfirmasi: {
						required: 'Mohon Diisi Pesan Konfirmasi',
						minlength: 'Pesan Konfirmasi Minimal 3 Karakter'
					},
					password_lama: {
						required: 'Mohon Diisi Password Lama',
						minlength: 'Password Lama Minimal 6 Karakter'
					},
					password_baru: {
						required: 'Mohon Diisi Password Baru',
						minlength: 'Password Baru Minimal 6 Karakter'
					},
					ulang_password_baru: {
						required: 'Mohon Diisi Ulangi Password Baru',
						minlength: 'Ulangi Password Baru Minimal 6 Karakter',
						equalTo: 'Ulangi Password Baru Harus Sama Dengan Password Baru'
					}
                }
            });
        }
    };
}();