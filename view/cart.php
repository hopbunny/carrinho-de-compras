<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Shop | Seu carrinho</title>
</head>
<body>
    <a href="<?= APP_HOST ?>" class="text-primary text-decoration-none fw-medium" style="position: absolute; top: 16px; left: 16px;">Voltar a início</a>
    <section class="container">
        <div class="row">
            <article class="col-9 d-flex flex-wrap gap-3 mt-5 py-4">
                <?php foreach($products as $product): ?>
                    <section class="card" style="width: 18rem; height: fit-content;">
                        <img src="<?= $product->image_url; ?>" class="card-img-top" alt="Imagem do produto">
                        <article class="card-body">
                            <h5 class="card-title"><?= $product->name; ?></h5>
                            <section class="d-flex align-items-center justify-content-between">
                                <p class="card-text text-muted fw-bold fs-5 mb-0">R$ <?= str_replace('.', ',', $product->price); ?> </p>
                                <a href="#" class="btn btn-danger" data-product-id="<?= $product->id; ?>" js-remove-from-card-button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
                                        <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </a>
                            </section>
                        </article>
                    </section>
                <?php endforeach; ?>
                <?php if(empty($products)): ?>
                    <h1 style="height: 100%; width: 100%;" class="text-center d-flex align-items-center justify-content-center">Nada por aqui</h1>
                <?php endif; ?>
            </article>

            <article class="col-3 border-start" style="min-height: 90vh;">
                <div class="sticky-top">
                    <h1 class="h3 my-3">Seu carrinho:</h1>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td><?= $product->name; ?></td>
                                    <td>R$ <?= str_replace('.', ',', $product->price); ?></td>
                                </tr>
                                <tr>
                            <?php endforeach; ?>
                                
                            <?php $total = array_sum(array_map(fn(Model\ProductModel $product) => $product->price, $products)); ?>

                            <tr>
                                <th scope="row">Total:</th>
                                <td>R$ <?= str_replace('.', ',', $total) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if(!empty($products)): ?>
                        <section class="d-flex align-items-center justify-content-between mt-3">
                            <button class="btn btn-primary">Finalizar compra</button>
                            <button class="btn btn-outline-danger" js-clean-cart-button>Limpar carrinho</button>
                            </section>
                    <?php endif; ?>
                </div>
            </article>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        async function handleAddOnCardButtonClick(productId) {
            const formData = new FormData;
            formData.append('product-id', productId);
            formData.append('_method', 'delete');
            
            await fetch('<?= APP_HOST ?>/cart', {
                method: 'POST',
                body: formData
            });

            window.location.href = window.location.href;
        }

        const productButtons = document.querySelectorAll('[js-remove-from-card-button]');
        for(const productButton of productButtons) {
            productButton.addEventListener('click', (ev) => {
                ev.preventDefault();
                handleAddOnCardButtonClick(productButton.getAttribute('data-product-id'));
            })
        }

        document.querySelector('[js-clean-cart-button]').addEventListener('click', (ev) => {
            ev.preventDefault();
            const formData = new FormData;
            formData.append('_method', 'put');
            fetch('<?= APP_HOST ?>/cart', {
                method: 'post',
                body: formData
            });
            
            window.location.href = window.location.href;
        });
    </script>
</body>
</html>