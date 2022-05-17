<?php 
 include_once ("product.php"); 
 require_once("validator.php");
 $product= new Product(); 

 if(isset($_POST['submit'])) {
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();
     // set product property values
    $product->sku = $_POST['sku'];
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->type = $_POST['type'];

    if (!$errors) {
        $product->insert($_POST);
        // $product->insert($data,'form'); 
        if($product) { 
        echo 'insert successfully'; 
        header('location:index.php'); 
        } 
        else { echo 'try again' ; }                  
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="nav">
                        <h1>Add Product</h1>
                        <div class="nav-right">
                            <input type="submit" name="submit" value="Save" class="btn-add btn btn-warning"></input>
                            <a href="/" class="btn-delete btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                    <hr class="solid">
                    <!-- sku -->
                    <div class="product-form" style="width: 50%";>
                        <div class="form-group row">
                            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sku" name="sku">
                                <div class="error">
                                    <?php echo $errors['sku'] ?? '' ?>
                                </div>
                            </div>
                        </div>
                        <!-- name -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price($)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <!-- switcher -->
                        <div class="form-group row">
                            <label for="productType" class="col-sm-2 col-form-label">Switcher</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="productType" name="type">
                                    <option>select</option>
                                    <option>dvd</option>
                                    <option>book</option>
                                    <option>furniture</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group row" id="dvd">
                                <label for="DVD" class="col-sm-2 col-form-label">Size(MB)</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="size">
                                </div>
                                <small class="form-text text-muted">Please provide size in MB</small>
                            </div>  
                            <div class="form-group row" id="book">
                                <label for="Book" class="col-sm-2 col-form-label">Weight(KG)</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="weight">
                                </div>
                                <small class="form-text text-muted">Please provide weight in KG</small>
                            </div>  
                            <div class="form-group row" id="furniture">
                                <label for="furniture" class="col-sm-2 col-form-label">Height(CM)</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="height">
                                </div>
                                <label for="furniture" class="col-sm-2 col-form-label">Width(CM)</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="width">
                                </div>
                                <label for="furniture" class="col-sm-2 col-form-label">Length(CM)</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="length">
                                </div>
                                <small class="form-text text-muted">Please provide dimensions in HxWxL format.</small>
                            </div>  
                        </div>
                    </form>  
            </div>  
        </main>
        <script src="add.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>