<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Shop | Crie um produto</title>
</head>
<body>
    <a href="<?= APP_HOST ?>" class="text-primary text-decoration-none fw-medium" style="position: absolute; top: 16px; left: 16px;">Voltar a início</a>
    <section class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <article class="container">
            <h1 class="text-center mb-5">CRIE UM PRODUTO</h1>
            <form enctype="multipart/form-data" class="mx-auto" action="#" method="POST" style="max-width: 400px;">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">NOME DO PRODUTO</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="float" name="price" class="form-control" id="floatingInput" required>
                    <label for="floatingInput">PREÇO DO PRODUTO</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">IMAGEM DO PRODUTO</label>
                    <input name="photo" class="form-control" type="file" id="formFile" accept=".png, .jpg" required>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto px-4 py-2">CRIAR</button>
            </form>
        </article>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>