var url_web = "http://localhost/pengaduan-bpbd";

// PENINJAUAN MODAL FORM PEMINJAUAN
$(".tambahpeninjauan").on("click", function () {
  var id = $(this).data("id");
  var id_wilayah = $(this).data("idwilayah");
  var id_bencana = $(this).data("idbencana");

  $("#id_pelaporan").val(id);
  $("#id_wilayah").val(id_wilayah);
  $("#id_bencana").val(id_bencana);
});

// 
$(".addpeninjauan").on("click", function(){
  var id_peninjauan = $(this).data('id');
  document.getElementById('id_peninjauan').value = id_peninjauan;
});


// DISTRIBUSI => SEARCH INSERT BANTUAN
$("#search_distribusi").keyup(function () {
  var search = document.getElementById("search_distribusi").value;
  $.ajax({
    type: "POST",
    url: url_web+"/?distribusi=ajax_search",
    dataType: "json",
    data: {
        search:search
    },
    success: function (data) {
        $("#result_search").html(data);
    },
    error() {
      console.error();
    },
  });
});

//DISTRIBUSI => KLIK TAMBAH DARI HASIL SEARCH BANTUAN
$("#result_search").on('click', '#addbantuan', function() {
  var id_bantuan = $(this).data('id_bantuan');
  $.ajax({
    type: "POST",
    url: url_web+"/?distribusi=ajax_add_bant",
    dataType: "json",
    data: {
      id_bantuan:id_bantuan
    },
    success: function (data) {
      $("#table_result_ul").append(data);
    },
    error() {
      console.log("Error");
    },
  });
});

// DISTRIBUSI => HAPUS DATA PENAMBAHAN BANTUAN 
$("#table_result_ul").on('click', '#removebant', function() {
  $(this).closest('li').remove();
});

// DISTRIBUSI =>  INSERT DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI 
function ProcessInsertLogistik() {
  var id_user = document.getElementById('id_user').value;
  var tanggal_distribusi = document.getElementById('tanggal_distribusi').value;
  var id_peninjauan = document.getElementById('id_peninjauan').value;
  var keterangan_distribusi = document.getElementById('keterangan_distribusi').value;
  var bantuan_id = document.getElementsByName('bantuan_id[]');
  var jumlah_bantuan = document.getElementsByName('jumlah_bantuan[]');
  var gabbantuan = {};
  for (var i = 0; i < bantuan_id.length; i++) {
    gabbantuan[bantuan_id[i].value] = jumlah_bantuan[i].value;
  }
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_insert",
    dataType: "json",
    data: {
      id_peninjauan: id_peninjauan,
      id_user: id_user,
      tanggal_distribusi: tanggal_distribusi,
      keterangan_distribusi: keterangan_distribusi,
      data: gabbantuan
    },
    success: function(success) {
      alert(success);
      window.location.href = "http://localhost/pengaduan-bpbd/?distribusi=distribusi";
    },
    error() {
      console.error();
    },
  });                                    
}

// EDIT DISTRIBUSI =>  SEARCH EDIT BANTUAN 
$("#search_edit_distribusi").keyup(function () {
  var search = document.getElementById("search_edit_distribusi").value;
  $.ajax({
    type: "POST",
    url: url_web+"/?distribusi=ajax_search_edit",
    dataType: "json",
    data: {
        search:search
    },
    success: function (data) {
        $("#result_search").html(data);
    },
    error() {
      console.error();
    },
  });
});

// EDIT DISTRIBUSI => KLIK TAMBAH DARI HASIL EDIT SEARCH BANTUAN
$("#result_search").on('click', '#addeditbantuan', function() {
  var id_bantuan = $(this).data('id_bantuan');
  $.ajax({
    type: "POST",
    url: url_web+"/?distribusi=ajax_add_edit_bant",
    dataType: "json",
    data: {
      id_bantuan:id_bantuan
    },
    success: function (data) {
      $("#editbodydistribusi").append(data);
    },
    error() {
      console.log("Error");
    },
  });
});

// DISTRIBUSI =>  INSERT DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI 
function ProcessUpdateLogistik() {
  var id_user = document.getElementById('id_user').value;
  var tanggal_distribusi = document.getElementById('tanggal_distribusi').value;
  var id_peninjauan = document.getElementById('id_peninjauan').value;
  var keterangan_distribusi = document.getElementById('keterangan_distribusi').value;
  var bantuan_id = document.getElementsByName('bantuan_id[]');
  var jumlah_bantuan = document.getElementsByName('jumlah_bantuan[]');
  var gabbantuan = {};
  for (var i = 0; i < bantuan_id.length; i++) {
    gabbantuan[bantuan_id[i].value] = jumlah_bantuan[i].value;
  }
  console.log(gabbantuan);
  // $.ajax({
  //   type: "POST",
  //   url: url_web + "/?distribusi=ajax_insert",
  //   dataType: "json",
  //   data: {
  //     id_peninjauan: id_peninjauan,
  //     id_user: id_user,
  //     tanggal_distribusi: tanggal_distribusi,
  //     keterangan_distribusi: keterangan_distribusi,
  //     data: gabbantuan
  //   },
  //   success: function(success) {
  //     alert(success);
  //     window.location.href = "http://localhost/pengaduan-bpbd/?distribusi=distribusi";
  //   },
  //   error() {
  //     console.error();
  //   },
  // });                                    
}