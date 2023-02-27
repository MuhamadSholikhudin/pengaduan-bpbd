<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        .cobacss{
            color:wheat;
            background-color: blue;
        }
        #cobacss{
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="cobacss">
        Contoh css berdasarkan class html        
    </div>
    <div id="cobacss">
        Contoh css berdasarkan id html
    </div>
    <div style="color:blue; background-color: yellow;" >
        Contoh css berdasarkan inner TAG html
    </div>
    <?php 
        echo "Menampilkan text";

        $_GET; //mengampil data berdasarkan paramameter
        $_POST; //Mengirim data berdasarkan inputan form

        /*
        include 'index.php';  // menyisipkan file php  
        
        function (){}; // membuat fungsi yang dapat di panggil oleh script php lain

        Page("Isi halamanna"); // Menampilkan tampilan page berdasarkan tampilan html php
        TemplateAdmin($page) //Menampilkan tampilan page admin website berdasarkan tampilan html php pada folder config
        TemplatePages($page) //Menampilkan tampilan pages user website berdasarkan tampilan html php pada folder config
        
        
        Querysatudata(""); // fungsi script menampilkan data sql 1 saja yang di isi berdasarkan query sql 
        Querybanyak(""); // fungsi script menampilkan data sql banyak yang di isi berdasarkan query sql 
        NumRows(""); // fungsi script menghitung data sql yang di isi berdasarkan query sql 
        Execute($sql); // fungsi di gunakan untuk INSERT, UPDATE, DELETE data pada tabel

        Redirect("$link", "$notif"); // fungsi script untuk mengalihkan ke halaman link dan menambahkan notifnya 
        */
    ?>
    <br>
    <?php 
        if(isset($_POST['btn_simpan'])){
            echo $_POST['mahasiswa'];
            echo "<br>";
            echo $_POST['mata_kuliah'];
            echo "<br>";
            var_dump($_POST);
        }else{
            echo "Tidak ada inputan";
        }
    ?>
    <form action="" method="POST">
        <input type="text" name="mahasiswa">
        <input type="text" name="mata_kuliah">
        <button type="submit" name="btn_simpan" value="kirim">KIRIM</button>
    </form>


</body>
</html>