<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Shop | Início</title>
</head>
<body>
    <header class="p-2">
        <nav class="container d-flex justify-content-end">
            <ul class="d-flex align-items-center gap-5" style="list-style-type: none;">
                <li>
                    <a href="<?= APP_HOST ?>/createProduct" class="text-decoration-none text-dark">Criar um novo produto</a>
                </li>
                <li>
                    <a href="<?= APP_HOST ?>/cart" class="d-block text-decoration-none p-2" style="position: relative;">
                        <svg class="text-dark" xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <?php if($totalOnCart > 0): ?>
                            <p class="badge bg-danger rounded-pill d-flex justify-content-center align-items-center my-0 mx-0" style="position: absolute; top: 0px; right: 0px; width: 25px; height: 25px; border-radius: 50%;">
                                <?= $totalOnCart >= 9 ? '9+' : $totalOnCart; ?>
                            </p>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <section class="container d-flex flex-wrap justify-content-around mt-3 gap-3">
        <?php foreach($products as $product): ?>
            <section class="card" style="width: 18rem;">
                <img src="<?= $product->image_url; ?>" class="card-img-top" alt="Image do produto">
                <article class="card-body">
                    <h5 class="card-title"><?= $product->name; ?></h5>
                    <section class="d-flex align-items-center justify-content-between">
                        <p class="card-text text-muted fw-bold fs-5 mb-0">R$ <?= str_replace('.', ',', $product->price); ?></p>
                        <a href="#" class="btn btn-primary" data-product-id="<?= $product->id ?>" js-add-on-card-button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </a>
                    </section>
                </article>
            </section>
        <?php endforeach; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        async function handleAddOnCardButtonClick(productId) {
            const formData = new FormData;
            formData.append('product-id', productId);
            await fetch('<?= APP_HOST ?>/cart', {
                method: 'POST',
                body: formData
            });

            window.location.href = window.location.href;
        }

        const productButtons = document.querySelectorAll('[js-add-on-card-button]');
        for(const productButton of productButtons) {
            productButton.addEventListener('click', (ev) => {
                ev.preventDefault();
                handleAddOnCardButtonClick(productButton.getAttribute('data-product-id'));
            })
        }
    </script>
</body>
</html>