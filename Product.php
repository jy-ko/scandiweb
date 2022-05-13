<?php 
	Class Product{
		private $host = "localhost"; // your host name  
        private $username = "root"; // your user name  
        private $password = "root"; // your password  
        private $db = "products"; // your database name 

		public $sku;
        public $name;
        public $price;
        public $type;
        public $attributes;

    function __construct()  
    {  
		$this->sku = $inputs['sku'];
        $this->name = $inputs['name'];
        $this->price = $inputs['price'];
        $this->type = $inputs['type'];

		// database connection
        $con=mysqli_connect($this->host, $this->username, $this->password,$this->db) or die(mysql_error("database"));  

        $this->db_connect=$con;
        
    } 

		public function insert($post){
			$sku = $_POST['sku'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$type = $_POST['type'];
			// $sku = $this->con->real_escape_string($_POST['sku']);
            // $name = $this->con->real_escape_string($_POST['name']);
            // $price = $this->con->real_escape_string($_POST['price']);
            // $type = $this->con->real_escape_string(($_POST['type']));
            $query="INSERT INTO products(sku,name,price,type) VALUES('$sku','$name','$price','$type')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg1=insert");
            }else{
                echo "Save failed try again!";
            }
		}

		public function fetchAll(){
			$data=mysqli_query($this->db_connect,"select * from products");
        	$rows = mysqli_fetch_all($data,MYSQLI_ASSOC);
        	return $rows;
		}

		public function delete($id){

			$query = "DELETE FROM products where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		// public function fetch_single($id){

		// 	$data = null;

		// 	$query = "SELECT * FROM records WHERE id = '$id'";
		// 	if ($sql = $this->conn->query($query)) {
		// 		while ($row = $sql->fetch_assoc()) {
		// 			$data = $row;
		// 		}
		// 	}
		// 	return $data;
		// }

		// public function edit($id){

		// 	$data = null;

		// 	$query = "SELECT * FROM records WHERE id = '$id'";
		// 	if ($sql = $this->conn->query($query)) {
		// 		while($row = $sql->fetch_assoc()){
		// 			$data = $row;
		// 		}
		// 	}
		// 	return $data;
		// }

		// public function update($data){

		// 	$query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

		// 	if ($sql = $this->conn->query($query)) {
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }
	}

 ?>