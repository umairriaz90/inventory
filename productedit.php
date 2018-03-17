<?php
    session_start();
    require_once 'connection.php';
    if($_GET['action']=='edit') {
        $id = $_GET['id'];
        $fetch_product = mysqli_query($con, "SELECT * FROM products WHERE id=".$id." LIMIT 1");
        $result_product = mysqli_fetch_row($fetch_product);
        $id = $result_product[0];
        $name = $result_product[1];
        $price = $result_product[2];
        $stock = $result_product[3];
    }
    if($_GET['action']=='update') {
        $id = $_GET['id'];
        $name=$_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $update_query = "UPDATE products SET name='".$name."', "." price=".$price.", stock=".$stock." WHERE id=".$id;

        $update = mysqli_query($con,$update_query);
        if($update) {
         echo "<script>window.location='products.php';</script>";
        }

    }

?>
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Simple Shop</title>
        <meta name="description" content="Simple Shop">
        <meta name="author" content="Umair Khan">

        <link rel="stylesheet" href="css/styles.css?v=1.0">

        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href='/'>Home</a></li>
                    <li><a href='customers.php'>customers</a></li>
                    <li><a href='products.php'>products</a></li>
                    <li><a href='vendors.php'>vendors</a></li>
                    <li><a href='reports.php'>Generate reports</a></li>
                    <li><a href='accounting.php'>Accounting</a></li>
                </ul>
        </header>
        <main>
            <section>
                <h1>products dashboard</h1>
            </section>
            <section>
                <p>add new Product</p>
                <p><?=$session['msg']?></p>
                <form action="productedit.php?id=<?=$id?>&action=update" method="POST">
                    <fieldset>
                        <label>
                            Name
                        </label>
                        <input type="text" name='name' value="<?=$name?>" />
                    </fieldset>
                    <fieldset>
                        <label>
                            Price
                        </label>
                        <input type="text" name='price' value="<?=$price?>" />
                    </fieldset>
                    <fieldset>
                        <label>
                            stock
                        </label>
                        <input type="text" name='stock' value="<?=$stock?>" />
                    </fieldset>
                    <fieldset>
                        <input type="submit" name='submit' value="Update" />

                    </fieldset>
                </form>
            </section>

        </main>

    </body>
</html>