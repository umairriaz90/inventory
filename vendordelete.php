<?php
    session_start();
    require_once 'connection.php';
    if($_GET['action']=='delete') {
        $id = $_GET['id'];
        $fetch_vendor = mysqli_query($con, "SELECT * FROM vendors WHERE id=".$id." LIMIT 1");
        $result_vendor = mysqli_fetch_row($fetch_vendor);
        $id = $result_vendor[0];
        $name = $result_vendor[2];
        $product_id = $result_vendor[1];
    }
    if($_GET['action']=='delete_confirm') {
        $id = $_GET['id'];

        $delete_query = "DELETE FROM vendors WHERE id=".$id;

        $delete = mysqli_query($con,$delete_query);
        if($delete) {
            echo "<script>window.location='vendors.php';</script>";
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
                <h1>Vendor dashboard</h1>
            </section>
            <section>
                <p>Confirm Delete</p>
                <p><?=$session['msg']?></p>
                <form action="vendordelete.php?id=<?=$id?>&action=delete_confirm" method="POST">
                    <fieldset>
                        <label>
                            Name
                        </label>
                        <p><?=$name?></p>
                    </fieldset>
                    <fieldset>
                        <label>
                            Product
                        </label>
                        <p> <?php
                                $product_name_query = mysqli_query($con,"SELECT name FROM products WHERE id=".$product_id." LIMIT 1");
                                if($product_name = mysqli_fetch_row($product_name_query)) {
                                    echo $product_name[0];
                                }
                            ?></p>
                    </fieldset>
                    <fieldset>
                        <label>
                            stock
                        </label>
                        <p> <?php
                                $product_stock_query = mysqli_query($con,"SELECT stock FROM products WHERE id=".$product_id." LIMIT 1");
                                if($product_stock = mysqli_fetch_row($product_stock_query)) {
                                    echo $product_stock[0];
                                }
                            ?></p>
                    </fieldset>
                    <fieldset>
                        <input type="submit" name='submit' value="Delete" />

                    </fieldset>
                </form>
            </section>

        </main>

    </body>
</html>