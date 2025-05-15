<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/function.php');
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');
?>

    <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <main>
        <div class="wrapper">
            <div class="container">
                <h2 class="discount_title text-center">Новинки</h2>
                
                <ul class="novelties-list">
                    <?php 
                    $novelties = getNovelties();
                    foreach ($novelties as $novelty): 
                        $formattedDate = date('d.m.Y', strtotime($novelty['date']));
                    ?>
                    <li class="novelty-item">
                        <span class="novelty-date"><?= $formattedDate ?></span>
                        <h2><?= htmlspecialchars($novelty['title']) ?></h2>
                        <p><?= htmlspecialchars($novelty['description']) ?></p>
                        <a href="<?= htmlspecialchars($novelty['link_url']) ?>" class="novelty-link">
                            <?= htmlspecialchars($novelty['link_text']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>