<?php 

require('db_cred.php');

class Connection{

	// db connection
	public $db = null;
	// query result
	public $result = null;


	// method used to connect to the database
	function connection(){

		// connect to the database
		$this->db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

		// if there are errors, return false
		if(mysqli_connect_errno()){
			return false;
		}
		// else return true
		return true;

	}
	function error() {
		return mysqli_error($this->db);
	  }

	// execute database sql statements (insert, update, and delete)
	function query($query){

		// check if the connection was successful
		if($this->connection() == false){
			return false;
		}

		// else execute the query
		$this->result = mysqli_query($this->db, $query);

		// check if result is returning false
		if($this->result !=true){
			return false;
		}

		// else return true
		return true;

	}


	// method to fetch multiple rows from database (select)
	function fetch($query){

		// if query executes successfully
		if($this->query($query)) {
			// return all the rows
			return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
		}
		// else return false
		return false;
		
	}
	// method to fetch multiple rows from database (select)
	function count($query){

		// if query executes successfully
		if($this->query($query)) {
			// return all the rows
			return mysqli_num_rows($this->result);
		}
		// else return false
		return false;
		
	}

	// method to fetch one row from database (select)
	function fetchOne($query){

		// if query executes successfully
		if($this->query($query)) {
			// return one row
			return mysqli_fetch_assoc($this->result);
		}
		// else return false
		return false;
	}function test($query){

		// if query executes successfully
		if($this->query($query)) {
			// return one row
			return mysqli_fetch_array($this->result);
		}
		// else return false
		return false;
	}


}


?>