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
$(".addpeninjauan").on("click", function () {
  var id_peninjauan = $(this).data("id");
  document.getElementById("id_peninjauan").value = id_peninjauan;
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_click_peninjauan",
    dataType: "json",
    data: {
      id_peninjauan: id_peninjauan
    },
    success: function (data) {
      document.getElementById("bencana").value = data[0];
      document.getElementById("keterangan_peninjauan").value = data[1];
    },
    error() {
      alert("error");
    },
  });

});

/*
// DISTRIBUSI => SEARCH INSERT BANTUAN
$("#search_distribusi").keyup(function () {
  var search = document.getElementById("search_distribusi").value;
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_search",
    dataType: "json",
    data: {
      search: search,
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
$("#result_search").on("click", "#addbantuan", function () {
  var id_bantuan = $(this).data("id_bantuan");
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_add_bant",
    dataType: "json",
    data: {
      id_bantuan: id_bantuan,
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
$("#table_result_ul").on("click", "#removebant", function () {
  $(this).closest("li").remove();
});

// DISTRIBUSI =>  INSERT DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI
function ProcessInsertLogistik() {
  var id_user = document.getElementById("id_user").value;
  var tanggal_distribusi = document.getElementById("tanggal_distribusi").value;
  var id_peninjauan = document.getElementById("id_peninjauan").value;
  var keterangan_distribusi = document.getElementById("keterangan_distribusi").value;
  var bantuan_id = document.getElementsByName("bantuan_id[]");
  var jumlah_bantuan = document.getElementsByName("jumlah_bantuan[]");
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
      data: gabbantuan,
    },
    success: function (success) {
      alert(success);
      window.location.href =
        "http://localhost/pengaduan-bpbd/?distribusi=distribusi";
    },
    error() {
      console.error();
    },
  });
}

// EDIT DISTRIBUSI =>  SEARCH EDIT BANTUAN
$("#search_edit_distribusi").keyup(function () {
  var search = document.getElementById("search_edit_distribusi").value;
  var bantuan_id = document.getElementsByName("bantuan_id[]");
  var array_bantuan = [];
  for (var i = 0; i < bantuan_id.length; i++) {
    array_bantuan.push(bantuan_id[i].value);
  }
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_search_edit",
    dataType: "json",
    data: {
      search: search,
      length: bantuan_id.length,
      array_bantuan:array_bantuan
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
$("#result_search").on("click", "#addeditbantuan", function () {
  var id_bantuan = $(this).data("id_bantuan");
  var bantuan_id = document.getElementsByName("bantuan_id[]");
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_add_edit_bant",
    dataType: "json",
    data: {
      id_bantuan: id_bantuan,
      no: bantuan_id.length
    },
    success: function (data) {
      $("#editbodydistribusi").append(data);
    },
    error() {
      console.log("Error");
    },
  });
  
});

// DISTRIBUSI => HAPUS DATA PENAMBAHAN BANTUAN
$("#editbodydistribusi").on("click", "#trash_bantuan_edit", function () {
  $(this).closest("tr").remove();
});

// DISTRIBUSI =>  UPDATE DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI
function ProcessUpdateLogistik() {
  var id_distribusi = document.getElementById("id_distribusi").value;
  var id_user = document.getElementById("id_user").value;
  var tanggal_distribusi = document.getElementById("tanggal_distribusi").value;
  var id_peninjauan = document.getElementById("id_peninjauan").value;
  var keterangan_distribusi = document.getElementById("keterangan_distribusi").value;
  var bantuan_id = document.getElementsByName("bantuan_id[]");
  var jumlah_bantuan = document.getElementsByName("jumlah_bantuan[]");
  var gabbantuan = {};
  for (var i = 0; i < bantuan_id.length; i++) {
    gabbantuan[bantuan_id[i].value] = jumlah_bantuan[i].value;
  }
  var payload = JSON.stringify({
    id_distribusi: id_distribusi,
    id_peninjauan: id_peninjauan,
    id_user: id_user,
    tanggal_distribusi: tanggal_distribusi,
    keterangan_distribusi: keterangan_distribusi,
    data: gabbantuan,
  });
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_update_distribusi",
    dataType: "json",
    data: {
      id_distribusi: id_distribusi,
      id_peninjauan: id_peninjauan,
      id_user: id_user,
      tanggal_distribusi: tanggal_distribusi,
      keterangan_distribusi: keterangan_distribusi,
      data: gabbantuan,
    },
    success: function (success) {
      alert(success);
      window.location.href ="http://localhost/pengaduan-bpbd/?distribusi=distribusi";
    },
    error() {
      console.error();
    },
  });
}
*/
// ========================= Distribusi data bantuan =====================
// DISTRIBUSI => SEARCH INSERT DISTRIBUSI STOK BANTUAN
$("#search_distribusi_stok_bantuan").keyup(function () {
  var search = document.getElementById("search_distribusi_stok_bantuan").value;
  var bantuan_id = document.getElementsByName("bantuan_id[]");
  var array_bantuan = [];
  for (var i = 0; i < bantuan_id.length; i++) {
    array_bantuan.push(bantuan_id[i].value);
  }
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_search_distribusi_bantuan",
    dataType: "json",
    data: {
      search: search,
      length: bantuan_id.length,
      array_bantuan:array_bantuan
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
$("#result_search").on("click", "#addstokbantuan", function () {
  var id_stok_bantuan = $(this).data("id_stok_bantuan");
  var stok_bantuan_id = document.getElementsByName("stok_bantuan_id[]");
  console.log(id_stok_bantuan);
  console.log(stok_bantuan_id.length);
    $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_add_stok_bant",
    dataType: "json",
    data: {
      id_stok_bantuan: id_stok_bantuan,
      no: stok_bantuan_id.length
    },
    success: function (data) {
      $("#tablleresult").append(data);
      document.getElementById("search_distribusi_stok_bantuan").value = "";
      $("#result_search").html("");
    },
    error() {
      console.log("Error");
    },
  });
  
});

// DISTRIBUSI => HAPUS DATA PENAMBAHAN BANTUAN
$("#tablleresult").on("click", "#trash_stok_bantuan_edit", function () {
  $(this).closest("tr").remove();
});



// DISTRIBUSI =>  UPDATE DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI
function ProcessInsertLogistikStok() {
  var id_user = document.getElementById("id_user").value;
  var tanggal_distribusi = document.getElementById("tanggal_distribusi").value;
  var id_peninjauan = document.getElementById("id_peninjauan").value;
  var keterangan_distribusi = document.getElementById("keterangan_distribusi").value;
  var stok_bantuan_id = document.getElementsByName("stok_bantuan_id[]");
  var jumlah_bantuan = document.getElementsByName("jumlah_bantuan[]");
  var gabbantuan = {};
  for (var i = 0; i < stok_bantuan_id.length; i++) {
    gabbantuan[stok_bantuan_id[i].value] = jumlah_bantuan[i].value;
  }
  var payload = JSON.stringify({
    id_peninjauan: id_peninjauan,
    id_user: id_user,
    tanggal_distribusi: tanggal_distribusi,
    keterangan_distribusi: keterangan_distribusi,
    data: gabbantuan,
  });
  
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_insert_distribusi_stok",
    dataType: "json",
    data: {
      id_peninjauan: id_peninjauan,
      id_user: id_user,
      tanggal_distribusi: tanggal_distribusi,
      keterangan_distribusi: keterangan_distribusi,
      data: gabbantuan,
    },
    success: function (success) {
      alert(success);
      window.location.href ="http://localhost/pengaduan-bpbd/?distribusi=distribusi";
    },
    error() {
      console.error();
    },
  });
  
}


// DISTRIBUSI => SEARCH INSERT DISTRIBUSI STOK BANTUAN
$("#search_editdistribusi_stok_bantuan").keyup(function () {
  var search = document.getElementById("search_editdistribusi_stok_bantuan").value;
  var stok_bantuan_id = document.getElementsByName("stok_bantuan_id[]");
  var array_bantuan = [];
  for (var i = 0; i < stok_bantuan_id.length; i++) {
    array_bantuan.push(stok_bantuan_id[i].value);
  }
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_search_editdistribusi_bantuan",
    dataType: "json",
    data: {
      search: search,
      length: stok_bantuan_id.length,
      array_bantuan:array_bantuan
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
$("#result_search").on("click", "#editstokbantuan", function () {
  var id_stok_bantuan = $(this).data("id_stok_bantuan");
  var stok_bantuan_id = document.getElementsByName("stok_bantuan_id[]");
    $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_edit_stok_bant",
    dataType: "json",
    data: {
      id_stok_bantuan: id_stok_bantuan,
      no: stok_bantuan_id.length
    },
    success: function (data) {
      $("#editbodydistribusi").append(data);
      document.getElementById("search_editdistribusi_stok_bantuan").value = "";
      $("#result_search").html("");
    },
    error() {
      console.log("Error");
    },
  });
  
});

// DISTRIBUSI => HAPUS DATA PENAMBAHAN BANTUAN
$("#editbodydistribusi").on("click", "#trash_stok_bantuan_edit", function () {
  $(this).closest("tr").remove();
});


// DISTRIBUSI =>  UPDATE DATA DISTRIBUSI DAN BANTUAN DISTRIBUSI STOK
function ProcessUpdateLogistikStokbantuan() {
  var id_distribusi = document.getElementById("id_distribusi").value;
  var id_user = document.getElementById("id_user").value;
  var tanggal_distribusi = document.getElementById("tanggal_distribusi").value;
  var id_peninjauan = document.getElementById("id_peninjauan").value;
  var keterangan_distribusi = document.getElementById("keterangan_distribusi").value;
  var stok_bantuan_id = document.getElementsByName("stok_bantuan_id[]");
  var jumlah_bantuan = document.getElementsByName("jumlah_bantuan[]");
  var gabbantuan = {};
  for (var i = 0; i < stok_bantuan_id.length; i++) {
    gabbantuan[stok_bantuan_id[i].value] = jumlah_bantuan[i].value;
  }
  var payload = JSON.stringify({
    id_distribusi: id_distribusi,
    id_peninjauan: id_peninjauan,
    id_user: id_user,
    tanggal_distribusi: tanggal_distribusi,
    keterangan_distribusi: keterangan_distribusi,
    data: gabbantuan,
  });
  
  $.ajax({
    type: "POST",
    url: url_web + "/?distribusi=ajax_update_distribusi_stok",
    dataType: "json",
    data: {
      id_distribusi: id_distribusi,
      id_peninjauan: id_peninjauan,
      id_user: id_user,
      tanggal_distribusi: tanggal_distribusi,
      keterangan_distribusi: keterangan_distribusi,
      data: gabbantuan,
    },
    success: function (success) {
      alert(success);
      // window.location.href ="http://localhost/pengaduan-bpbd/?distribusi=distribusi";
      location.replace("http://localhost/pengaduan-bpbd/?distribusi=distribusi");
    },
    error() {
      console.error();
    },
  });
}

/// ================= Status Distribusi ===============
// PENINJAUAN MODAL FORM PEMINJAUAN
$(".status_distribusi").on("click", function () {
  var id = $(this).data("id");
  var status = $(this).data("status");
  if(status == "Sudah sampai" || status == "Selesai"){
    $("#form-distribusi").show();    
  }else{
    $("#form-distribusi").hide();
  }
  
  $("#edit_id_distribusi").val(id);
  $("#status_distribusi").val(status);
});


/// ================= Status peninjauan ===============
// PENINJAUAN MODAL FORM PEMINJAUAN
$(".status_peninjauan").on("click", function () {
  var id = $(this).data("id");
  var status = $(this).data("status");
  $("#edit_id_peninjauan").val(id);
  $("#status_peninjauan").val(status);
});