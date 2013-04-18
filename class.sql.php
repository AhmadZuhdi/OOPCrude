<?PHP

	//==============================================//
	//	Author : Ahmad Zuhdi						//
	//	Release Date : 03 - 03 - 2013				//
	//	@Ahmad_Zuhdi | rccheattest2@gmail.com		//
	//==============================================//

	class Connection{
		var $Host;
		var $User;
		var $Password;
		var $dbName;
	
		function Connect(){
			$host = $this->Host;
			$user = $this->User;
			$password = $this->Password;
			$db = $this->dbName;
			
			$con = mysql_connect($host,$user,$password) or die(mysql_error());
			mysql_select_db($db,$con);
		}
	}	

	class Setting{
		Var $Table;
		Var $Field;
		Var $Value;
		Var $Delimiter = ";";
		Var $Status = 0;
	}

	class sql_insert extends Setting{

		function Insert(){
			
			$Nama_Tabel = $this->Table;
			$List_Field = explode($this->Delimiter,$this->Field);// Pemecahan 1 String menjadi array dengan Pemisah yg di Tentukan menjadi sebuah array(explode)
			$List_Value = explode($this->Delimiter,$this->Value);// Dalam hal ini kita memecah setiap kata yg di selingi dengan , (koma) menjadi sebuah data di array
			
				$Result = "insert into ".$Nama_Tabel."(";
				
				for($i=0;$i<count($List_Field);$i++){
					if($i !== (count($List_Field) - 1)){
						$Result = $Result . $List_Field[$i] .",";
					}else{
						$Result = $Result . $List_Field[$i] .") ";
					}
				}
				
				$Result = $Result . "values(";
				
				for($i=0;$i<count($List_Value);$i++){
					if($i !== (count($List_Field) - 1)){
						if(is_string($List_Value[$i])){// Jika Value itu String, Maka	
							if($List_Value[$i] !== ""){
								$Result = $Result . "'".$List_Value[$i] ."',";
							}else{
								$Result = $Result . "null,";
							}
						}elseif(!is_string($List_Value[$i])){// Jika Value itu Bukan String, Maka (belum berhasil)
							if($List_Value[$i] !== ""){
								$Result = $Result . $List_Value[$i] .",";
							}else{
								$Result = $Result . "null,";
							}
						}
					}else{
						if(is_string($List_Value[$i])){ // Jika Value itu String, Maka
							if($List_Value[$i] !== ""){
								$Result = $Result . "'".$List_Value[$i] ."') ";
							}else{
								$Result = $Result . "null) ";
							}
						}elseif(!is_string($List_Value[$i])){ // Jika Value itu Bukan String, Maka (Belum berhasil)
							if($List_Value[$i] == ""){
								$Result = $Result . $List_Value[$i] .") ";
							}else{
								$Result = $Result ."null) ";
							}
						}
					}
				}
				//echo $Result;
				$sc = mysql_query($Result) or die(msg_error());
				if($sc){
					$this->Status = 1; // Status berhasil
				}else{
					$this->Status = 0; // Status Gagal
				}
			
		}
	}

	class sql_update extends Setting{
		var $ptField;
		var $ptValue;

		function Update(){
			$Nama_tbl = $this->Table;
			$List_fld = explode($this->Delimiter,$this->Field);// mendapatkan value dari $List_Field dan memecahkan nya menjadi array dengan pembatas ,(Koma)
			$Value_fld = explode($this->Delimiter,$this->Value); // mendapatkan value dari $Value dan memecahkan nya menjadi array dengan Pembatas ,(Koma)
			$jml_fld = count($List_fld); // Mendapatkan Jumlah array yg ada di dalam $List_fld
			$jml_val = count($Value_fld); // Mendapatkan Jumlah array yg ada di Dalam $Value_fld
			$Patokan_f = explode($this->Delimiter,$this->ptField);
			$Patokan_v = explode($this->Delimiter,$this->ptValue);
			$Status = $this->Status;
			
			if($jml_fld !== $jml_val){
				echo "Jumlah Field dan Jumlah Value yg akan di update tidak sama <br> Mohon di cek kembali";
			}else{
				
				$result = "update " .$Nama_tbl. " set ";
				
				for($i=0;$i<$jml_fld;$i++){
					if($i !== ($jml_fld - 1)){
						$result = $result . $List_fld[$i] ." = '". $Value_fld[$i] ."' , ";
					}else{
						$result = $result . $List_fld[$i] ." = '". $Value_fld[$i] ."'";
					}
				}
				
				$result = $result ." where ";
				
				if(count($Patokan_f) == count($Patokan_v)){				
					for($i = 0;$i < count($Patokan_f);$i++){
						if($i !== (count($Patokan_f) - 1)){
							if(!is_string($Patokan_v[$i])){
								$result = $result . $Patokan_f[$i] ." = ".$Patokan_v[$i] ." AND ";
							}elseif(is_string($Patokan_v[$i])){
								$result = $result . $Patokan_f[$i] ." = '".$Patokan_v[$i]."' AND ";
							}
						}ELSE{
							if(!is_string($Patokan_v[$i])){
								$result = $result . $Patokan_f[$i] ." = ".$Patokan_v[$i] ."";
							}elseif(is_string($Patokan_v[$i])){
								$result = $result . $Patokan_f[$i] ." = '".$Patokan_v[$i]."'";
							}
						}
					}
					
				}else{
					echo "Jumlah Field dan Jumlah Value yg akan digunakan sebagai where clause tidak sama <br> Mohon di cek kembali";
				}
			}
			
			$sc = mysql_query($result) or die(msg_error());
			if($sc){
				$this->Status = 1;
			}elseif(!$sc){
				$this->Status = 0;
			}
		}
	}

	class sql_delete extends Setting{
		function Delete(){
			$nmTBL = $this->Table;
			$fldNM = explode($this->Delimiter,$this->Field);
			$val = explode($this->Delimiter,$this->Value);
			
			
			if(count($val) == count($fldNM)){
				if(count($val) >= 1){
					$result = "delete from ".$nmTBL. " where ";
					
					for($i=0;$i<count($val);$i++){
						if($i !== (count($val) - 1)){
							$result = $result . $fldNM[$i] ." = '".$val[$i]."' AND ";
						}else{
							$result = $result . $fldNM[$i] ." = '".$val[$i]."'";
						}
					}
				}else{
					if(!is_string($val)){
						$result =  "delete from ". $nmTBL ." where ".$fldNM[0] ." = ".$val[0];
					}elseif(is_string($val)){
						$result =  "delete from ". $nmTBL ." where ".$fldNM[0] ." = '".$val[0]."'";
					}
				}
			}else{
				echo "Jumlah Field yang dimasukkan dan jumlah Value tidak Sama<BR>Mohon di cek kembali";
			}
			
			$sc = mysql_query($result) or die(msg_error());
			if($sc){
				$this->Status=1;
			}elseif(!$sc){
				$this->Status=0;
			}
			
		}
	}

	function Check($st,$Target,$Msg){
		if($st == 1){
			if($Msg !== ""){
				?>
					<script>
						var msg = '<?PHP echo $Msg; ?>';
						var Target = '<?PHP echo $Target; ?>';
						alert(msg);
						window.location=Target;
					</script>
				<?PHP
			}else{
				header("location:$Target");
			}
		}else{
			?>
				<script>
					alert('<?PHP echo mysql_error(); ?>');
				</script>
			<?PHP
		}
	}	

	function msg_error(){
		$MSG = 'Terjadi Kesalahan :\n'.mysql_error();
		?>
			<script>
				alert("<?PHP echo $MSG; ?>");
				window.history.back();
			</script>
		<?PHP
	}

?>