<?php
    session_start();
    require_once 'connection.php';
    if($_GET['action']=='edit') {
        $id = $_GET['id'];
        $fetch_vendor = mysqli_query($con, "SELECT * FROM vendors WHERE id=".$id." LIMIT 1");
        $result_vendor = mysqli_fetch_row($fetch_vendor);
        $id = $result_vendor[0];
        $name = $result_vendor[2];
        $product_id = $result_vendor[1];
    }
    if($_GET['action']=='update') {
        $id = $_GET['id'];
        $name=$_POST['name'];
        $product_id = $_POST['product_id'];

        $update_query = "UPDATE vendors SET name='".$name."', "." product_id=".$product_id." WHERE id=".$id;

        $update = mysqli_query($con,$update_query);
        if($update) {
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
        <?php include('header.html'); ?>
        <main>

            <section>
                <p>Edit Vendor</p>
                <p><?=$session['msg']?></p>
                <form action="vendoredit.php?id=<?=$id?>&action=update" method="POST">
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
                                $product_query = mysqli_query($con, "SELECT * FROM products");
                                while($product = mysqli_fetch_array($product_query,MYSQLI_ASSOC)) {
                                    if($product['id']==$product_id)
                                        echo "<option value=".$product['id']." selected> ".$product['name']."</option>";
                                    else
                                        echo "<option value=".$product['id']."> ".$product['name']."</option>";
                                }
                            ?>
                        </select>
                    </fieldset>

                    <fieldset>
                        <input type="submit" name='submit' value="Update" />

                    </fieldset>
                </form>
            </section>

        </main>

    </body>
</html>