var url_web = "http://localhost/pengaduan-bpbd";

$(".tambahpeninjauan").on("click", function () {
  var id = $(this).data("id");
  var id_wilayah = $(this).data("idwilayah");
  var id_bencana = $(this).data("idbencana");

  $("#id_pelaporan").val(id);
  $("#id_wilayah").val(id_wilayah);
  $("#id_bencana").val(id_bencana);
});


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

$(".addpeninjauan").on("click", function(){
  var id_peninjauan = $(this).data('id');
  document.getElementById('id_peninjauan').value = id_peninjauan;
});

$("#table_result_ul").on('click', '#removebant', function() {
    $(this).closest('li').remove();
});

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

