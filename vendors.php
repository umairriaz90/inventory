<?php
    session_start();
    require_once 'connection.php';
    if($_POST['submit']) {
        $name   = $_POST['name'];
        $product_id  = $_POST['product_id'];

        $insert = "INSERT INTO vendors (name, product_id) VALUES ('" . $name . "', $product_id)";

        if (mysqli_query($con, $insert)) {
            $session['msg'] = 'Vendor Added Successfully';
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
                <h1>vendors dashboard</h1>
            </section>
            <section>
                <p>add new Vendor</p>
                <p><?=$session['msg']?></p>
                <form action="" method="POST">
                    <fieldset>
                        <label>
                            Name
                        </label>
                        <input type="text" name='name' value="<?=$name?>" />
                    </fieldset>
                    <fieldset>
                        <label>
                            Product
                        </label>
                        <select name="product_id">
                            <?php
                                $product_query = mysqli_query($con, "SELECT * FROM Products");
                                while($product = mysqli_fetch_array($product_query,MYSQLI_ASSOC)) {

                                    echo "<option value=".$product['id']."> ".$product['name']."</option>";
                            }
                            ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <input type="submit" name='submit' value="submit" />
                    </fieldset>
                </form>
            </section>
            <section>
                <p>list all Vendors</p>
                <div class="head">
                    <div>
                        Name
                    </div>
                    <div>
                        Product
                    </div>
                    <div>
                        Purchased Quantity
                    </div>
                    <div>
                        Actions
                    </div>
                </div>
                <?php
                    $vendor_query = mysqli_query($con, "SELECT * FROM vendors");
                    while($vendor = mysqli_fetch_array($vendor_query,MYSQLI_ASSOC)) {

                ?>
                <div class="data">
                    <div>
                        <?= $vendor['name'] ?>
                    </div>
                    <div>
                        <?php
                        $product_name_query = mysqli_query($con,"SELECT name FROM products WHERE id=".$vendor['product_id']." LIMIT 1");
                        if($product_name = mysqli_fetch_row($product_name_query)) {
                            echo $product_name[0];
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                            $product_stock_query = mysqli_query($con,"SELECT stock FROM products WHERE id=".$vendor['product_id']." LIMIT 1");
                            if($product_stock = mysqli_fetch_row($product_stock_query)) {
                                echo $product_stock[0];
                            }
                        ?>
                    </div>
                    <div>
                        <a href="vendoredit.php?id=<?= $vendor["id"] ?>&action=edit">Edit</a>
                        <a href="vendordelete.php?id=<?= $vendor["id"] ?>&action=delete">Delete</a>
                    </div>
                </div>
            </section>
        </main>
        <?php
            }

            mysqli_free_result($vendor_query);
            mysqli_close($con);
        ?>
    </body>
</html>