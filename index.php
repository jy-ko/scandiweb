<?php 
// if delete, delete with id 
include 'Product.php';
$product = new Product();
$products=$product->fetchAll();

if(isset($_POST['submit'])){
	$checkbox = $_POST['checkedId'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
    $product -> delete($del_id);
    header('location:index.php'); 
    echo ('items successfully deleted');
}
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <main>
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="nav">
                        <h1>Product List</h1>
                        <div class="nav-right">
                            <a href="/add.php" class="btn-add btn btn-primary">Add</a>
                            <input type="submit" name="submit" value="Mass Delete" name="delete" class="btn btn-danger"></input>
                        </div>
                    </div>
                    <hr class="solid">
                    <!-- render products here by id -->
                    <div class="products-list" style="display:grid;grid-template-columns:repeat(4,1fr);">
                        <?php
                            foreach ($products as $product) {
                        ?>
                            <div class="card" style="margin:16px; padding:16px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            <input type="checkbox" name="checkedId[]" value="<?php echo $product['id']??''?>">
                                <div class="card-body" style="text-align:center;">
                                    <p><?php echo $product['sku']; ?></p>
                                    <p><?php echo $product['name']; ?></p>
                                    <p><?php echo $product['price']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>  
                </form>
            </div>
        </main>
        <script src="index.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>