<?php
    session_start();
require_once 'connection.php';
if($_POST['submit']) {
    $name   = $_POST['name'];
    $price  = $_POST['price'];
    $stock  = $_POST['stock'];
    $insert = "INSERT INTO products (name, price, stock) VALUES ('" . $name . "', $price, $stock)";

    if (mysqli_query($con, $insert)) {
        $session['msg'] = 'Product Added Successfully';
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
      <form action="" method="POST">
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
          <input type="submit" name='submit' value="submit" />
        </fieldset>
      </form>
    </section>
      <section>
          <p>list all products</p>
          <div class="head">
              <div>
                  Name
              </div>
              <div>
                  Price
              </div>
              <div>
                  Stock
              </div>
              <div>
                  Actions
              </div>
          </div>
          <?php
              $product_query = mysqli_query($con, "SELECT * FROM Products");
              while($product = mysqli_fetch_array($product_query,MYSQLI_ASSOC)) {

          ?>
          <div class="data">
              <div>
                  <?= $product['name'] ?>
              </div>
              <div>
                  <?= $product['price'] ?>
              </div>
              <div>
                  <?= $product['stock'] ?>
              </div>
              <div>
                  <a href="productedit.php?id=<?= $product["id"] ?>&action=edit">Edit</a>
                  <a href="productdelete.php?id=<?= $product["id"] ?>&action=delete">Delete</a>
              </div>
          </div>
      </section>
  </main>
    <?php
            }

        mysqli_free_result($product_query);
    mysqli_close($con);
    ?>
</body>
</html>