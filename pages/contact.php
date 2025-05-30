<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>

    <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <div class="content">
        <h1 class="heading">Как нас найти</h1>

        <div class="conteiner">
            <div class="con contacts">
                <h2 class="heading2">Контактная информация</h2>
                <hr class="hrr">

                <?php
                $contacts = getContacts();
                $contact = $contacts['0']
                ?>

                <div class="info">
                    <div class="fan"><i class="fa-solid fa-location-dot fa-2xl" style="color: #d4af37;"></i></div>

                    <div class="pas">
                        <p class="bold">Адрес:</p>
                        <p class="nobold"> <? echo htmlspecialchars($contact['address']) ?></p></div>
                </div>

                <div class="info">
                    <div class="fan"><i class="fa-solid fa-phone fa-2xl" style="color: #d4af37;"></i></div>

                    <div class="pas">
                        <p class="bold">Телефон:</p>
                        <p class="nobold"> <? echo htmlspecialchars($contact['phone']) ?></p>
                    </div>
                </div>

                <div class="info">
                    <div class="fan"><i class="fa-solid fa-envelope fa-2xl" style="color: #d4af37;"></i></div>

                    <div class="pas">
                        <p class="bold">Email:</p>
                        <p class="nobold"> <? echo htmlspecialchars($contact['email']) ?></p>
                    </div>
                </div>

                <div class="info">
                    <div class="fan"><i class="fa-solid fa-clock fa-2xl" style="color: #d4af37;"></i></div>

                    <div class="pas">
                        <p class="bold">Часы работы:</p>
                        <p class="nobold"> <? echo htmlspecialchars($contact['working_hours_weekdays']) ?> <br>
                                            <? echo htmlspecialchars($contact['working_hours_weekends']) ?></p>
                    </div>
                </div>

            </div>

            <div class="con form">
                <h2 class="heading2">Форма обратной связи</h2>
                <hr class="hrr">

                <div class="popups">
                    <form id="contact-form" >
                        <input id='contact-name' name="name" class="but" type="text" placeholder="Ваше имя">
                        <input id='contact-email' name="email" class="but" type="text" placeholder="Ваш email">
                        <input id='contact-comment' name="comment" class="but_soo" type="text" placeholder="Ваше сообщение">
                        <input class="button_but" type="submit" value="Отправить">
                    </form>
                </div>
            </div>

        </div>

        <div class="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2183.154259610465!2d53.21824147684684!3d56.82614267350035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43e1395391917cc1%3A0xb141c06f33a67bc1!2z0J_Rg9GI0LrQuNC90YHQutCw0Y8g0YPQuy4sIDEyLCDQmNC20LXQstGB0LosINGA0LXRgdC_0YPQsdC70LjQutCwINCj0LTQvNGD0YDRgtC40Y8sIDQyNjAwMw!5e0!3m2!1sru!2sru!4v1746746214896!5m2!1sru!2sru" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>


    </div>

<script src="/assets/js/modules/contact.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>