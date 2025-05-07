# equites
Is tutorial web-site about horse club. Three students are working on the project.

# structure
Equites/
├── index.html                      	# Главная страница
├── pages/                          	# Другие страницы сайта
│   ├── template/
│   │   ├── forms/
│   │   │   ├── cart.php            	# Корзина
│   │   │   └── userCabinet.html    	# Личный кабинет
│   │   ├── header.php              	# Шаблон хидера
│   │   └── footer.php              	# Шблон футера
│   ├── about.html                  	# О клубе
│   ├── brands.html                 	# Бренды
│   ├── catalog.html                	# Каталог услуг
│   ├── contacts.html               	# Контакты
│   ├── novelty.html                	# Новинки
│   ├── discount.html               	# Акции
│   ├── profile.html                	# Личный кабинет
│   └── reviews.html                	# Отзывы
├── assets/                         	# Все статические ресурсы
│   ├── css/
│   │   └── forms.css               	# Стили форм
│   │   └── main.css                	# Основные стили
│   │   └── Template.css            	# Общие стили на всех страницах
│   ├── js/
│   │   ├── modules/
│   │   │   ├── auth.js             	# Обработчики событий по авторизации
│   │   │   └── cart.js             	# Обработчики событий по корзине
│   │   └── template.js             	# Основные скрипты
│   ├── resources/                  	# Ресурсы
│   │   ├── img/                    	# Основные изображения
│   │   │   ├── backgrounds/        	# Фоновые изображения
│   │   │   ├── cards/              	# Изображения для карточек
│   │   │   ├── gallery/            	# Галерея клуба
│   │   │   └── horses/             	# Фото лошадей
│   │   └── avatars/                	# Аватарки пользователей
│   ├── vendor/                     	# Обработчики
│   │   ├── auth/                   	# Обработчики авторизации
│   │   ├── cart/                   	# Обработчики корзины
│   │   └── function.php            	# файл с функциями также и функцияей подключения к бд
└── README.md                       	# Описание проекта