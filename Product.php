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
        public $size;
        public $weight;
		public $height;
		public $width;
		public $length;

    function __construct()  
    {  
        $con=mysqli_connect($this->host, $this->username, $this->password,$this->db) or die(mysql_error("database"));  
        $this->db_connect=$con;
    } 
		public function insert($post){
			$sku = $_POST['sku'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$type = $_POST['type'];
			// $size = $_POST['size'];
			// $weight = $_POST['weight'];
			// $height = $_POST['height'];
			// $width = $_POST['width'];
			// $length = $_POST['length'];

			$sql = "INSERT INTO products(sku,name,price,type) VALUES (
				'$sku', '$name', '$price', '$type')";
			// $sql = "INSERT INTO products(sku,name,price,type,size,weight,height,width,length) VALUES (
			// 	'$sku', '$name', '$price', '$type', '$size', '$weight', '$height', '$width', '$length')";
			$res = mysqli_query($this->db_connect, $sql);
			if($res){
				header('Location: index.php');    
			}else{
				echo 'fail';
			}
		}

		public function fetchAll(){
			$data=mysqli_query($this->db_connect,"select * from products");
        	$rows = mysqli_fetch_all($data,MYSQLI_ASSOC);
        	return $rows;
		}

		public function delete($id){
			$sql = "DELETE FROM products WHERE id='$id'";
			$res = mysqli_query($this->db_connect, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}

 ?>