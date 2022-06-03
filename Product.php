<?php 
	Class Product{
		private $servername = "localhost";
        private $username   = "root";
        private $password   = "root";
        private $database   = "products";

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
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
            if(mysqli_connect_error()) {
             trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            }else{
            return $this->con;
            }
    } 
		public function insert($post){
			$sku = $_POST['sku'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$type = $_POST['type'];
			$size = empty($_POST['size']) ? NULL : $_POST['size'];
			$weight = empty($_POST['weight']) ? NULL : $_POST['weight'];
			$height = empty($_POST['height']) ? NULL : $_POST['height'];
			$width = empty($_POST['width']) ? NULL : $_POST['width'];
			$length = empty($_POST['length']) ? NULL : $_POST['length'];
			$query="INSERT INTO products(sku,name,price,type,size,weight,height,width,length) VALUES (
				'$sku', '$name', '$price', '$type', '$size', '$weight', '$height', '$width', '$length')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }
		}

		public function fetchAll(){
			$query = "SELECT * FROM products";
            $result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}}


		public function delete($id){
			$query = "DELETE FROM products WHERE id = '$id'";
            $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
            }
		}
	}

 ?>