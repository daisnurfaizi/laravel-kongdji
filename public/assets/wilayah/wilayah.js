var baseurl = window.location.origin;
 $(document).ready(function() {
    // sembunyikan form kabupaten, kecamatan dan desa
    $("#form_kab").hide();
    $("#form_kec").hide();
    $("#form_des").hide();
    $("#kabupaten").hide();
    $("#kecamatan").hide();
    $("#desa").hide();

    // ambil data kabupaten ketika data memilih provinsi
    $('body').on("change", "#form_prov", function() {
      // $('#form_prov').change(function() {
      var id = $(this).val();
      var text = $("#form_prov option:selected").text()
      var daerah = id.split("/")
      console.log(text)
      // $("#form_kab").show();

      // var data = id;
      $.ajax({
        type: 'GET',
        url: baseurl+"/District/"+text,
        dataType: 'json',
        data: {
          code: daerah[0]
        },
        success: function(hasil) {
          // console.log(daerah)
          $("#form_kab").html(hasil);
          $("#kabupaten").show();
          $("#form_kab").show();
          $('#form_kab').append(`<option selected="selected">--Pilih Kabupaten--</option>`);
          $.each(hasil, function(i, item) {
            // console.log(item.nama)

            $('#form_kab').append('<option value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
          $("#form_kec").hide();
          $("#form_des").hide();
        }
      });
    });

    // ambil data kecamatan/kota ketika data memilih kabupaten
    $('body').on("change", "#form_kab", function() {
      var id = $(this).val();
      var text = $("#form_kab option:selected").text()
      var daerahkecamatan = id.split("/")
      $("#hidenkab").val(text)
      console.log(text)
      // console.log(id)
      $.ajax({
        type: 'GET',
        url: baseurl+"/Subdistrict/"+text,
        dataType: 'json',
        data: {
          code: daerahkecamatan[0]
        },
        success: function(kecamatan) {
          // console.log(id)
          $("#form_kec").html(kecamatan);
          $("#kecamatan").show();
          $("#form_kec").show();
          $('#form_kec').append(`<option selected="selected">--Pilih Kecamatan--</option>`);
          $.each(kecamatan, function(i, item) {
            // console.log(item.nama)
            $('#form_kec').append('<option value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
          $("#form_des").hide();
        }
      });
    });

    // ambil data desa ketika data memilih kecamatan/kota
    $('body').on("change", "#form_kec", function() {
      var id = $(this).val();
      var text = $("#form_kec option:selected").text()
      var daerah = id.split("/")
      // $("#hidenkab").val(text)
      var village = daerah[0].split(".")
      // console.log(id)
      var join = village[0]+"."+village[1]
      $.ajax({
        type: 'GET',
        url: baseurl+"/Village/"+text,
        dataType: 'json',
        data: {
          code: join
        },
        success: function(desa) {
          $("#form_des").html(desa);
          // console.log(item)
          $("#desa").show();

          $("#form_des").show();
          $('#form_des').append(`<option selected="selected">--Pilih Desa--</option>`);

          $.each(desa, function(i, item) {
            // console.log(item)
            $('#form_des').append('<option value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
        }
      });
    });


  });
