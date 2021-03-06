<div class="row">
  <div class="col-3">
    <h2 class="text-center">Filtros</h2>
      <hr class="mb-5">
      <h4>Destacados</h4>
      <li>
        <a href="index.php?section=products&dest=1">Nuestra selección</a>
      </li>
      <hr>
      <h4>Ordenamiento</h4>
      <li>
        <?php
          $orden = isset($_GET['orden']) ? $_GET['orden'] : '';
          $_SESSION['orden'] = $orden;
          $marca = isset($_GET['marca']) ? $_GET['marca'] : '';
          $categoria = isset($_GET['cat']) ? $_GET['cat'] : '';
        ?>
          <a href="index.php?section=products&cat=<?=$categoria?>&marca=<?=$marca?>&orden=asc">A - Z</a>
      </li>
      <li>
        <a href="index.php?section=products&cat=<?=$categoria?>&marca=<?=$marca?>&orden=desc">Z - A</a>
      </li>
      <hr>
      <h4>Cartegorías</h4>
      <?php require_once("section/categories.php"); ?>
      <hr>
      <h4>Marcas</h4>
      <?php require_once("section/brands.php"); ?>
  </div>

  <div class="col-9">
    <h2 class="text-center">Productos</h2>
    <hr class="mb-5">
    <div class="row">

    <?php
      
      if (empty($_GET['marca']) && empty($_GET['cat']) && empty($_GET['dest'])) {

        $product = new Product($con);
        echo printProduct($product->getProduct());               

      }elseif (!empty($_GET['dest'])){

        $product = new Product($con);
        echo printProduct($product->getProductImportant());

      } elseif (!empty($_GET['cat']) && empty($_GET['marca'])) {
        
        $product = new Product($con);
        echo printProduct($product->getProductByCategory($_GET['cat']));

      } elseif (!empty($_GET['marca']) && empty($_GET['cat'])) {
        
        $product = new Product($con);
        echo printProduct($product->getProductByBrand($_GET['marca']));

      } else { 
        
        $product = new Product($con);
        echo printProduct($product->getProductByCategoryAndBrand($_GET['cat'],$_GET['marca']));
              
      }

      ?>
    </div>
  </div>
</div>