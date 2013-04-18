<html>
	<head>
		<title>OOPCrude Manual</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	    <link rel="stylesheet" type="text/css" href="css/global.css" media="screen">
	    <script src="js/jquery-1.9.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<?php
			if(!Isset($_GET['M'])){
				header("location:?M=Main");
				$M = $_GET['M'];
			}

		?>
	</head>

	<body>
		<div class="container-fluid" id="wrapper">
		  	<div class="row-fluid">
		    	<div class="span2 img-rounded" id="Nav">
		      		<div class="dropdown">
					  	<ul class="nav nav-list">
					  		<li class="nav-header">SQL Procedure With OOP</li>
						    <li><a tabindex="-1" href="?M=Main">Introduction</a></li>
						    
						    <li class="nav-header">Procedure</li>
							<li><a tabindex="-1" href="?M=Connection">Membuat Koneksi</a></li>
						    <li><a tabindex="-1" href="?M=Insert">Prosedur Insert</a></li>
						    <li><a tabindex="-1" href="?M=Update">Prosedur Update</a></li>
						    <li><a tabindex="-1" href="?M=Delete">Prosedur Delete</a></li>
							
							<li class="nav-header">Misc Tutorial</li>
							<li><a tabindex="-1" href="?M=Delimiter">Delimiter</a></li>

					  	</ul>
					</div>
		    	</div>

		    	<div class="span10" id="Konten">
		      		<?php
		      			$M = $_GET['M'];
		      			if($M == "Main"){
		      				?>
		      					<h1>Introduction</h1>
		      					<hr>
		      					<p>
		      						OOPCrude adalah sebuah Library yang berfungsi melakukan Query SQL Crude (Create, Update, Delete) Secara Dinamik dan Lebih Simple
		      					</p>
		      					<dl class="dl-horizontal">
									<dt>Author</dt>
								  	<dd>Ahmad Zuhdi Z.</dd>
								
								  	<dt>Project Start</dt>
								  	<dd>20 Januari 2013</dd>

								  	<dt>Latest Version</dt>
								  	<dd>v0.1f</dd>
									
									<dt>Latest Stable Version</dt>
									<dd>v0.1e</dd>
								</dl>
		      				<?PHP
		      			}else if( $M == "Connection" ){
		      				// &lt; -> "<"
		      				// &gt; -> ">"
		      				?>
		      					<h1>Membuat Koneksi</h1>
		      					<hr>
		      					<pre>	
&lt;?<font class="text-error">PHP</font>
	include "class.sql.php";

	<font class="text-success">$Con</font> = <font class="text-info">new</font> Connection;
	<font class="text-success">$Con</font>->Host = "locahost";
	<font class="text-success">$Con</font>->User = "root"; <font class="muted">//Ganti sesuai dengan username di host</font>
	<font class="text-success">$Con</font>->Password = "" <font class="muted">//Ganti sesuai denga password di host</font>
	<font class="text-success">$Con</font>->dbName = ""; <font class="muted">//Masukkan Nama database yang akan di akses</font>

	<font class="text-success">$Con</font>-><font class="text-success">Connect</font>(); <font class="muted">//Melakukan Koneksi ke database</font>

?&gt;
		      					</pre>
		      				<?PHP
		      			}else if($M == "Insert"){
		      				?>
		      					<h1>Membuat Prosedur Insert</h1>
		      					<hr>
		      					1. Menggunakan Default Delimiter
<pre>
&lt;?<font class="text-error">PHP</font>

	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>

	<font class="text-success">$i</font> = <font class="text-info">new</font> sql_insert;
	<font class="text-success">$i</font>->Table = "Nama_Tabel" <font class="muted">//Sesuaikan dengan Nama Table yang akan di insert</font>
	<font class="text-success">$i</font>->Field = "Field_No1;Field_No2;Field_No3"; <font class="muted">//Sesuaikan dengan Nama Field yang ada di dalam Table</font>
	<font class="text-success">$i</font>->Value = "Value_No1;Value_No2;Value_No3"; <font class="muted">//Sesuaikan dengan jumlah Field dan urutannya</font>
	<font class="text-success">$i</font>-><font class="text-success">Insert</font>() <font class="muted">//Lakukan Proses Insert</font>
	
?&gt;
</pre>
								2. Menggunakan Custom Delimiter
<pre>
&lt;?<font class="text-error">PHP</font>

	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>

	<font class="text-success">$i</font> = <font class="text-info">new</font> sql_insert;
	<font class="text-success">$i</font>->Delimiter = "~";
	<font class="text-success">$i</font>->Table = "Nama_Tabel" <font class="muted">//Sesuaikan dengan Nama Table yang akan di insert</font>
	<font class="text-success">$i</font>->Field = "Field_No1~Field_No2~Field_No3"; <font class="muted">//Sesuaikan dengan Nama Field yang ada di dalam Table</font>
	<font class="text-success">$i</font>->Value = "Value_No1~Value_No2~Value_No3"; <font class="muted">//Sesuaikan dengan jumlah Field dan urutannya</font>
	<font class="text-success">$i</font>-><font class="text-success">Insert</font>() <font class="muted">//Lakukan Proses Insert</font>
	
?&gt;
</pre>
		      				<?PHP
		      			}else if($M == "Update"){
		      				?>
		      					<h1>Membuat Prosedur Update</h1>
		      					<hr>
		      					1. Menggunakan Default Delimiter

<pre>
&lt;?<font class="text-error">PHP</font>

	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>

	<font class="text-success">$u</font> = <font class="text-info">new</font> sql_update; <font class="muted">//Deklarasi class sql_update</font>
	<font class="text-success">$u</font>->Table = "Nama_Table"; <font class="muted">//Sesuaikan Dengan nama table yang akan di update</font>
	<font class="text-success">$u</font>->Field = "Field_No1;Field_No2;Field_No3"; <font class="muted">//Masukkan Nama Field yang akan di Update</font>
	<font class="text-success">$u</font>->Value = "Value_No1;Value_No2;Value_No3"; <font class="muted">//Msaukkan Value Baru untuk Field yang akan di Update</font>
	<font class="text-success">$u</font>->ptField = "id"; <font class="muted">//Masukkan Nama Field Sebagai Patokan Where Clause</font>
	<font class="text-success">$u</font>->ptValue = "1"; <font class="muted">//Masukkan Value Dari Field Patokan Where Clause</font>
	<font class="text-success">$u</font>-><font class="text-success">Update</font>(); <font class="muted">//Lakukan Proses Update</font>

?&gt;
</pre>
								2. Menggunakan Custom Delimiter
<pre>
&lt;?<font class="text-error">PHP</font>

	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>

	<font class="text-success">$u</font> = <font class="text-info">new</font> sql_update; <font class="muted">//Deklarasi class sql_update</font>
	<font class="text-success">$u</font>->Delimiter = "@"; <font class="muted">//Masukkan Karakter Baru sebagai Delimiter / Pemisah</font>
	<font class="text-success">$u</font>->Table = "Nama_Table"; <font class="muted">//Sesuaikan Dengan nama table yang akan di update</font>
	<font class="text-success">$u</font>->Field = "Field_No1@Field_No2@Field_No3"; <font class="muted">//Masukkan Nama Field yang akan di Update</font>
	<font class="text-success">$u</font>->Value = "Value_No1@Value_No2@Value_No3"; <font class="muted">//Msaukkan Value Baru untuk Field yang akan di Update</font>
	<font class="text-success">$u</font>->ptField = "id"; <font class="muted">//Masukkan Nama Field Sebagai Patokan Where Clause</font>
	<font class="text-success">$u</font>->ptValue = "1"; <font class="muted">//Masukkan Value Dari Field Patokan Where Clause</font>
	<font class="text-success">$u</font>-><font class="text-success">Update</font>(); <font class="muted">//Lakukan Proses Update</font>

?&gt;
</pre>
								3. Menggunakan 2 Field atau Lebih sebagai Patokan Where Clause
<pre>
&lt;?<font class="text-error">PHP</font>

	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>

	<font class="text-success">$u</font> = <font class="text-info">new</font> sql_update; <font class="muted">//Deklarasi class sql_update</font>
	<font class="text-success">$u</font>->Table = "Nama_Table"; <font class="muted">//Sesuaikan Dengan nama table yang akan di update</font>
	<font class="text-success">$u</font>->Field = "Field_No1;Field_No2;Field_No3"; <font class="muted">//Masukkan Nama Field yang akan di Update</font>
	<font class="text-success">$u</font>->Value = "Value_No1;Value_No2;Value_No3"; <font class="muted">//Msaukkan Value Baru untuk Field yang akan di Update</font>
	<font class="text-success">$u</font>->ptField = "id;id2"; <font class="muted">//Masukkan Nama Field Sebagai Patokan Where Clause</font>
	<font class="text-success">$u</font>->ptValue = "1;2"; <font class="muted">//Masukkan Value Dari Field Patokan Where Clause</font>
	<font class="text-success">$u</font>-><font class="text-success">Update</font>(); <font class="muted">//Lakukan Proses Update</font>

?&gt;
</pre>
		      				<?PHP
		      			}else if($M == "Delete"){
		      				?>
		      					<h1>Membuat Prosedur Delete</h1>
		      					<hr>
		      					1. Menggunakan Default Delimiter
<pre>
&lt;?<font class="text-error">PHP</font>
	
	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>
	
	<font class="text-success">$d</font> = <font class="text-info">new</font> sql_delete; <font class="muted">//Deklarasi Class sql_delete</font>
	<font class="text-success">$d</font>->Table = "Nama_Table"; <font class="muted">//Masukkan Nama Table yang akan di delete</font>
	<font class="text-success">$d</font>->Field = "Nama_Field"; <font class="muted">//Masukkan Field sebagai patokan Where Clause</font>
	<font class="text-success">$d</font>->Value = "Value"; <font class="muted">//Masukkan Value dari field patokan Where Clause</font>
	<font class="text-success">$d</font>-><font class="text-success">Delete</font>(); <font class="muted">//Lakukan Proses Delete</font>

?&gt;
</pre>
								2. Menggunakan 2 Field atau lebih sebagai Patokan Where Clause
<pre>
&lt;?<font class="text-error">PHP</font>
	
	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>
	
	<font class="text-success">$d</font> = <font class="text-info">new</font> sql_delete; <font class="muted">//Deklarasi Class sql_delete</font>
	<font class="text-success">$d</font>->Table = "Nama_Table"; <font class="muted">//Masukkan Nama Table yang akan di delete</font>
	<font class="text-success">$d</font>->Field = "Field_No1;Field_No2"; <font class="muted">//Masukkan Field sebagai patokan Where Clause</font>
	<font class="text-success">$d</font>->Value = "Value_No1;Value_No2"; <font class="muted">//Masukkan Value dari field patokan Where Clause</font>
	<font class="text-success">$d</font>-><font class="text-success">Delete</font>(); <font class="muted">//Lakukan Proses Delete</font>

?&gt;
</pre>
								3. Menggunakan Custom Delimiter
<pre>
&lt;?<font class="text-error">PHP</font>
	
	include "class.sql.php"; <font class="muted">//Jika sudah di include, tidak perlu di include lagi</font>
	
	<font class="text-success">$d</font> = <font class="text-info">new</font> sql_delete; <font class="muted">//Deklarasi Class sql_delete</font>
	<font class="text-success">$d</font>->Delimiter = "$"; <font class="muted">//Ganti Delimiter dengan Karakter Baru</font>
	<font class="text-success">$d</font>->Table = "Nama_Table"; <font class="muted">//Masukkan Nama Table yang akan di delete</font>
	<font class="text-success">$d</font>->Field = "Field_No1$Field_No2"; <font class="muted">//Masukkan Field sebagai patokan Where Clause</font>
	<font class="text-success">$d</font>->Value = "Value_No1$Value_No2"; <font class="muted">//Masukkan Value dari field patokan Where Clause</font>
	<font class="text-success">$d</font>-><font class="text-success">Delete</font>(); <font class="muted">//Lakukan Proses Delete</font>

?&gt;
</pre>
		      				<?PHP
		      			}else if($M == "Delimiter"){
							?>
								<h1>Delimiter</h1>
								<hr>
								<P>
									<font class="text-info">Delimiter</font> adalah sebuah karakter yang digunakan untuk Fungsi <code>explode()</code><br>
									Default untuk Delimiter ini adalah <code>;</code>, anda bisa mengganti defaultnya dan tak perlu mengganti secara manual disetiap deklarasi class dengan cara sebagai berikut :
									
<pre>
&lt;?<font class="text-error">PHP</font>
	
	include "class.sql.php";
	
	<font class="text-success">$Setting</font> = <font class="text-info">new</font> Setting;
	<font class="text-success">$Setting</font>->Delimiter = "^"; <font class="muted">// Karakter Delimiter Baru</font>
	
?&gt;
</pre>
									Dengan Begitu, setiap anda akan mendefenisikan Field atau Value, maka Delimiternya menggunakan Karakter <code>^</code>
								</p>
								
							<?PHP
						}
		      		?>
		    	</div>
		  	</div>
		</div>
	</body>

</html>