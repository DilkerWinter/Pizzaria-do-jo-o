
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
    include_once("process/pizza.php");
?>    
<div id="main-banner">
    <h1>Faça seu pedido</h1>
</div>
<div id="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Monte a pizza como desejar</h2>
                <form action="process/pizza.php" method="POST" id="pizza-form">
                    <div class="form-group">
                        <label for="borda">Borda:</label>
                        <select name="borda" id="borda" class="form-control">
                            <option value="">Selecione a Borda</option>
                            <?php foreach($bordas as $borda): ?>
                                 <option value="<?= $borda["id"] ?>"><?= $borda["tipo"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="massa">Massa:</label>
                        <select name="massa" id="massa" class="form-control">
                            <option value="">Selecione a Massa</option>
                            <?php foreach($massas as $massa): ?>
                                 <option value="<?= $massa["id"] ?>"><?= $massa["tipo"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sabores">Sabor: (Maximo 3)</label>
                        <select multiple name="sabores[]" id="sabores" class="form-control">
                        <?php foreach($sabores as $sabor): ?>
                                 <option value="<?= $sabor["id"] ?>"><?= $sabor["nome"] ?></option>
                            <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary value="Fazer pedido">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("templates/footer.php");
?>