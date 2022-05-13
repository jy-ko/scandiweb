<?php 
 include_once ("product.php"); 
 $product= new Product(); 

 if(isset($_POST['submit'])) 
 { 
    $data= array( 
    
        "sku"  => $product->escape_string($_POST['sku']),            
                "name"  => $product->escape_string($_POST['name']), 
                                        "price"  => $product>escape_string($_POST['product']) 
    
    );  
    $product->insert($data,'form'); 
    
    if($data) 
    { 
    echo 'insert successfully'; 
    header('location:index.php'); 
    } 
    
else 
    { 
    echo 'try again' ; 
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
    </head>
    <body>
        <main>
            <div class="container">
                <div class="nav">
                    <h1>Add Product</h1>
                    <div class="nav-right">
                        <a href="" class="btn-add btn btn-warning">Save</a>
                        <a href="" class="btn-delete btn btn-secondary">Cancel</a>
                    </div>
                </div>
                <form class="product-form">
                    <!-- sku -->
                    <div class="form-group row">
                        <label for="sku" class="col-sm-2 col-form-label">SKU
                        </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" >
                        </div>
                    </div>
                    <!-- name -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <!-- price -->
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price($)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="price">
                        </div>
                    </div>
                    <!-- switcher -->
                    <div class="form-group row">
                            <label for="productType" class="col-sm-2 col-form-label">Switcher</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="productType">
                                    <option>select</option>
                                    <option>dvd</option>
                                    <option>book</option>
                                    <option>furniture</option>
                                </select>
                            </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="form-group row" id="dvd">
                            <label for="price" class="col-sm-2 col-form-label">dvd</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="price">
                            </div>
                        </div>  
                        <div class="form-group row" id="book">
                            <label for="price" class="col-sm-2 col-form-label">book</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="price">
                            </div>
                        </div>  
                        <div class="form-group row" id="furniture">
                            <label for="price" class="col-sm-2 col-form-label">furniture</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="price">
                            </div>
                        </div>  
                    </div>

                    <!-- dvd form -->
       
                    </form>  
            </div>  
        </main>
        <script src="main.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>