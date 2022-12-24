var url_web = "http://localhost/pengaduan-bpbd";

$(".tambahpeninjauan").on("click", function () {
  var id = $(this).data("id");
  var id_wilayah = $(this).data("idwilayah");
  $("#id_pelaporan").val(id);
  $("#id_wilayah").val(id_wilayah);
});

var table_ul = '<li><span style="width:300px;">Promina</span>&nbsp;&nbsp;&nbsp;<span><input type="number" class="form-control" min="1" name="" id="" style="width: 100px;"></span>&nbsp;&nbsp;&nbsp;<span style="width: 100px;"><a href="" id="trash_bantuan"><i class="ti-trash" ></i></a></span></li>';

function Klink(){
  $("#table_result_ul").append(table_ul);
  $("#result_search").html("");
}

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

