OOPCrude is a PHP Library that do CRUDE (Create, Update, Delete) procedure with a more simple way

Project Start	: 20 Januari 2013<br>
Author			: Ahmad Zuhdi<br>
Latest Version	: v0.1f<br>

.: How to Use :.

1. Create Connection

		include "class.sql.php";

		$Con = new Connection;
		$Con->Host = "locahost";
		$Con->User = "root"; //Change to your User
		$Con->Password = "" //Change to Your Password
		$Con->dbName = "database_name"; //insert your Database name

		$Con->Connect(); //Connecting to database

2. Insert Procedure<BR>
	a. Use Default Delimiter

		<?PHP

			include "class.sql.php"; //include the library file

			$i = new sql_insert;
			$i->Table = "Table_Name" //insert your table name
			$i->Field = "Field_No1;Field_No2;Field_No3"; //insert the name of each field you want to insert
			$i->Value = "Value_No1;Value_No2;Value_No3"; //insert the value for each field you want to insert
			$i->Insert() //Inserting Data to database_name

			Check($i->Status,"index.php","") // if the insert success, it will redirect to index.php
			
		?>

	b. User Custom Delimiter

		<?PHP

			include "class.sql.php"; //include the library file

			$i = new sql_insert;
			$i->Delimiter = "~";
			$i->Table = "Table_Name" //insert your table name
			$i->Field = "Field_No1~Field_No2~Field_No3"; //insert the name of each field you want to insert
			$i->Value = "Value_No1~Value_No2~Value_No3"; //insert the value for each field you want to insert
			$i->Insert() //Inserting Data to database_name

			Check($i->Status,"index.php",""); // if the insert process success, it will redirect to index.php
			
		?>

3. Update Procedure<BR>
	a. Use Default Delimiter
		
		<?PHP

			include "class.sql.php"; // include the library file

			$u = new sql_update; //Declaration class sql_update
			$u->Table = "Table_Name"; // insert your table name
			$u->Field = "Field_No1;Field_No2;Field_No3"; // insert the name of each field you want to update
			$u->Value = "Value_No1;Value_No2;Value_No3"; // insert the value for each field you want to update
			$u->ptField = "id"; // insert the name of field for 'Where Clause'
			$u->ptValue = "1"; // insert the value of field for 'Where Clause'
			$u->Update(); // update the data

			Check($u->Status,"Index.php",""); // if the update process success, it wll redirect to index.php

		?>

	b. Use Custom Delimiter

		<?PHP

			include "class.sql.php"; // include the library file

			$u = new sql_update; //Declaration class sql_update
			$u->Delimiter = "*";
			$u->Table = "Table_Name"; // insert your table name
			$u->Field = "Field_No1*Field_No2*Field_No3"; // insert the name of each field you want to update
			$u->Value = "Value_No1*Value_No2*Value_No3"; // insert the value for each field you want to update
			$u->ptField = "id"; // insert the name of field for 'Where Clause'
			$u->ptValue = "1"; // insert the value of field for 'Where Clause'
			$u->Update(); // update the data

			Check($u->Status,"Index.php",""); // if the update process success, it wll redirect to index.php

		?>

	c. Use 2 Field or More for 'Where Clause'

		<?PHP

			include "class.sql.php"; // include the library file

			$u = new sql_update; //Declaration class sql_update
			$u->Table = "Table_Name"; // insert your table name
			$u->Field = "Field_No1;Field_No2;Field_No3"; // insert the name of each field you want to update
			$u->Value = "Value_No1;Value_No2;Value_No3"; // insert the value for each field you want to update
			$u->ptField = "id;id2"; // insert the name of field for 'Where Clause'
			$u->ptValue = "1;2"; // insert the value of field for 'Where Clause'
			$u->Update(); // update the data

			Check($u->Status,"Index.php",""); // if the update process success, it wll redirect to index.php

		?>

4. Delete Procedure<BR>
	a. Use Default Delimiter

		<?PHP
	
			include "class.sql.php"; // include the library file
			
			$d = new sql_delete; //Declaration Class sql_delete
			$d->Table = "Table_Name"; // insert your table name you want to delete
			$d->Field = "id"; // insert the field name for the 'Where Clause'
			$d->Value = "1"; // insert the value for the 'Where Clause'
			$d->Delete(); // Deleting Data

			Check($d->Status,"Index.php","") // if the Delete process success, it will redirec to index.php

		?>

	b. Use 2 Field or more for the 'Where Clause'

		<?PHP
	
			include "class.sql.php"; // include the library file
			
			$d = new sql_delete; //Declaration Class sql_delete
			$d->Table = "Table_Name"; // insert your table name you want to delete
			$d->Field = "id;id2"; // insert the field name for the 'Where Clause'
			$d->Value = "1;2"; // insert the value for the 'Where Clause'
			$d->Delete(); // Deleting Data

			Check($d->Status,"Index.php","") // if the Delete process success, it will redirec to index.php

		?>


	c. Use Custom Delimiter

		<?PHP
	
			include "class.sql.php"; // include the library file
			
			$d = new sql_delete; //Declaration Class sql_delete
			$d->Delimiter = "@";
			$d->Table = "Table_Name"; // insert your table name you want to delete
			$d->Field = "id@id2"; // insert the field name for the 'Where Clause'
			$d->Value = "1@2"; // insert the value for the 'Where Clause'
			$d->Delete(); // Deleting Data

			Check($d->Status,"Index.php","") // if the Delete process success, it will redirec to index.php

		?>