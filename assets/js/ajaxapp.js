var url_web = "http://localhost/pengaduan-bpbd";

$(".tambahpeninjauan").on("click", function () {
  var id = $(this).data("id");
  var id_wilayah = $(this).data("idwilayah");

  $("#id_pelaporan").val(id);
  $("#id_wilayah").val(id_wilayah);
});

// $("#search_distribusi").on("change", function(){
//   var search = document.getElementById("search_distribusi").value;

//   alert(search);

//   $('#result_search').html(search);
// });


$("#search_distribusi").keyup(function () {
  var search = document.getElementById("search_distribusi").value;
  $.ajax({
    type: "POST",
    url: "http://localhost/pengaduan-bpbd/?distribusi=ajax_search",
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

