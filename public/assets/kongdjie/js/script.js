$(function(){
    //membuat ajax untuk modal
    $('.tombolTambahData').on('click',function(){
        $('#judulModal').html('Tambah Data');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#npm').val('');
        $('#email').val('');
        
    });
    $('.tampilModalUbah').on('click',function(){
        $('#judulModal').html('Ubah Data');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action','http://localhost:8080/mvcsistemujian/public/Mahasiswa/ubahData');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/mvcsistemujian/public/Mahasiswa/ubah',
            data:{id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });
    });
});