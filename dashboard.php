<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido!</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<?php
    include_once("templates/header.php");
    include_once("process/orders.php");
?>    
 <div id="main-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Gerenciar pedidos:</h2>
        </div>
        <div class="col-md-12 table-container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col"><span>Pedido</span> #</th>
                <th scope="col">Borda</th>
                <th scope="col">Massa</th>
                <th scope="col">Sabores</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($pizzas as $pizza): ?>
                <tr>
                  <td><?= $pizza["id"] ?></td>
                  <td><?= $pizza["borda"] ?></td>
                  <td><?= $pizza["massa"] ?></td>
                  <td>
                    <ul>
                      <?php foreach($pizza["sabores"] as $sabor): ?>
                        <li><?= $sabor ;?></li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                  <td>
                    <form action="process/orders.php" method="POST" class="form-group update-form">
                      <input type="hidden" name="type" value="update">
                      <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                      <select name="status" class="form-control status-input">
                        <?php foreach($status as $s): ?>
                          <option value="<?= $s["id"] ?>" <?php echo ($s["id"] == $pizza["status"]) ? "selected" : ""; ?> ><?= $s["tipo"] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <button type="submit" class="update-btn">
                        <i class="fas fa-sync-alt"></i>
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="process/orders.php" method="POST">
                      <input type="hidden" name="type" value="delete">
                      <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                      <button type="submit" class="delete-btn">
                        <i class="fas fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
  include_once("templates/footer.php");
?>