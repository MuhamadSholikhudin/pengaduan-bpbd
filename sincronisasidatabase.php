<?php

$dbhost = "localhost"; 
 $dbuser = "root"; 
 $dbpass = ""; 
 $dbname = "pengaduan-bpbd";
 $connection= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
 if (!$connection)
 {
 	die ("Could not connect:" . mysqli_error());
 }

 // Pelaporan
 mysqli_query($connection, "ALTER TABLE pelaporan DROP FOREIGN KEY pelaporan_ibfk_1");
 mysqli_query($connection, "ALTER TABLE pelaporan DROP FOREIGN KEY pelaporan_ibfk_2");
 mysqli_query($connection, "ALTER TABLE pelaporan DROP FOREIGN KEY pelaporan_ibfk_4");

// peninjauan 
mysqli_query($connection, "ALTER TABLE peninjauan DROP FOREIGN KEY peninjauan_ibfk_1");
mysqli_query($connection, "ALTER TABLE peninjauan DROP FOREIGN KEY peninjauan_ibfk_2");
mysqli_query($connection, "ALTER TABLE peninjauan DROP FOREIGN KEY peninjauan_ibfk_4");

// distribusi 
mysqli_query($connection, "ALTER TABLE distribusi DROP FOREIGN KEY distribusi_ibfk_1");
mysqli_query($connection, "ALTER TABLE distribusi DROP FOREIGN KEY distribusi_ibfk_2");

// bantuan_distribusi 
mysqli_query($connection, "ALTER TABLE bantuan_distribusi DROP FOREIGN KEY bantuan_distribusi_ibfk_1");
mysqli_query($connection, "ALTER TABLE bantuan_distribusi DROP FOREIGN KEY bantuan_distribusi_ibfk_2");

// stok_bantuan 
mysqli_query($connection, "ALTER TABLE stok_bantuan DROP FOREIGN KEY stok_bantuan_ibfk_1");

$showtables= mysqli_query($connection, "SHOW TABLES ");
 while($table = mysqli_fetch_array($showtables)) { 
    mysqli_query($connection, "DROP TABLE ".$table[0]);
}

$query = '';
$sqlScript = file('pengaduan-bpbd.sql');
foreach ($sqlScript as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
		
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		$query= '';		
	}
}
echo $output = "<script>alert('Database Berhasil di sincronisasi')</script><meta http-equiv='refresh' content='0; url=http://localhost/pengaduan-bpbd/?pages=home'>";

