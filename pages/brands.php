<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>

    <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <div class="content">
        <div class="heading"><h5>Наши партнеры</h5></div>

        <div class="partners">
            <?php 
            $brands = getBrands();
            foreach ($brands as $brand): 
            ?>
                <div class="partner">
                    <img src="<?= htmlspecialchars($brand['logo']) ?>" alt="<?= htmlspecialchars($brand['name']) ?>">
                    <p class="brand_p1"><?= htmlspecialchars($brand['name']) ?></p>
                    <p class="brand_p2"><?= htmlspecialchars($brand['country']) ?></p>
                    <a class="more" href="#"><?= htmlspecialchars($brand['more']) ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>