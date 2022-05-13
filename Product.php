<?php 
	Class Product{

		private $host = "localhost"; // your host name  
        private $username = "root"; // your user name  
        private $password = "root"; // your password  
        private $db = "products"; // your database name 

    function __construct()  
    {  
        $con=mysqli_connect($this->host, $this->username, $this->password,$this->db) or die(mysql_error("database"));  

        $this->db_connect=$con;
        
    } 

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['address'])) {
					if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address']) ) {
						
						$name = $_POST['name'];
						$mobile = $_POST['mobile'];
						$email = $_POST['email'];
						$address = $_POST['address'];

						$query = "INSERT INTO records (name,email,mobile,address) VALUES ('$name','$email','$mobile','$address')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
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