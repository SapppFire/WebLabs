<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_header.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
    <div class="common-container">
        <a href="https://www.forumhouse.ru/forums" target="_blank"><img class="logo-forum" src="source/download.png" alt=""></a>
        <div class="header-sections">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <a href="https://www.forumhouse.ru/forums" target="_blank"><img class="one-section">Форум</a>
                    </div>
                    <div class="col">
                        <a href="https://www.forumhouse.ru/journal" target="_blank"><img class="one-section">Журнал</a>
                    </div>
                    <div class="col">
                        <a href="https://www.forumhouse.ru/stories" target="_blank"><img class="one-section">Истории</a>
                    </div>
                    <div class="col">
                        <a href="https://www.forumhouse.ru/exchange/start" target="_blank"><img class="one-section">Биржа</a>
                    </div>
                    <div class="col">
                        <a href="https://www.forumhouse.ru/academy" target="_blank"><img class="one-section">Академия</a>
                    </div>
                    <div class="col">
                        <a href="https://shop.forumhouse.ru/?utm_source=forumhouse&utm_medium=link&utm_campaign=store&utm_term=shop&utm_content=journal" target="_blank"><img class="one-section">Магазин</a>
                        <span class="new-label">NEW</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="common-emb-menu">
            <div class="row">
                <div class="col">
                    <div class="hamburger">
                        &#9776;
                    </div>
                    <div class="nav-buttons">
                        <div class="search-icon">
                            <a href="https://www.forumhouse.ru/find">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </a>
                        </div>
                        <div class="vert"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="auth-block">
                            <?php
                        if (!empty($_SESSION['email1'])) {
                    ?>

                        <div style="color: white; font-family: Arial">Вы вошли как: &ensp;<?= htmlspecialchars($_SESSION['email1']) ?>.</div>
                        <div><a href="logout.php" style="color: white; font-family: Arial">Выйти</a></div>


                    <?php
                        } else {
                    ?>

                        <div style="color: white">Вы неавторизированы</div>
                        <div style="color: white"><a href="authorization.php" style="background-color: white; color: #015240;;">Ввести логин и пароль</a> или <a href="registration.php" style="background-color: white; color: #015240;">Зарегистрироваться</a></div>
                    <?php
                        }
                    ?>
                    </div>
                    </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <div class="mobile-menu-container">
                <div class="row">
                    <div class="col left-column">
                        <a href="https://www.forumhouse.ru/forums" target="_blank"><img class="one-section">Форум</a>
                        <a href="https://www.forumhouse.ru/journal" target="_blank"><img class="one-section">Журнал</a>
                        <a href="https://www.forumhouse.ru/stories" target="_blank"><img class="one-section">Истории</a>
                        <a href="https://www.forumhouse.ru/exchange/start" target="_blank"><img class="one-section">Биржа</a>
                        <a href="https://www.forumhouse.ru/academy" target="_blank"><img class="one-section">Академия</a>
                    </div>
                    <div class="col right-column">
                        <a href="https://www.forumhouse.ru/journal" target="_blank"><img class="one-section">НОВОЕ</a>
                        <a href="https://www.forumhouse.ru/journal/themes" target="_blank"><img class="one-section">ТЕМЫ НЕДЕЛИ</a>
                        <a href="https://www.forumhouse.ru/journal/articles" target="_blank"><img class="one-section">СТАТЬИ</a>
                        <a href="https://www.forumhouse.ru/journal/videos" target="_blank"><img class="one-section">ВИДЕО</a>
                        <a href="authorization.php" target="_blank"><img class="one-section">СЕКРЕТНАЯ СТРАНИЦА</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="second-container-header">
    <div class="container text-center">
        <div class="common-second-section-menu">
            <div class="row">
                <div class="col">
                    <a href="https://www.forumhouse.ru/journal" target="_blank"><img class="one-section">НОВОЕ</a>
                </div>
                <div class="col">
                    <div class="vert-second"></div>
                </div>
                <div class="col">
                    <a href="https://www.forumhouse.ru/journal/themes" target="_blank"><img class="one-section">ТЕМЫ НЕДЕЛИ</a>
                </div>
                <div class="col">
                    <div class="vert-second"></div>
                </div>
                <div class="col">
                    <a href="https://www.forumhouse.ru/journal/articles" target="_blank"><img class="one-section">СТАТЬИ</a>
                </div>
                <div class="col">
                    <div class="vert-second"></div>
                </div>
                <div class="col">
                    <a href="https://www.forumhouse.ru/journal/videos" target="_blank"><img class="one-section">ВИДЕО</a>
                </div>
                <div class="col">
                    <div class="vert-second"></div>
                </div>
                <div class="col">
                    <a href="https://www.forumhouse.ru/journal/explainers" target="_blank"><img class="one-section">КАРТОЧКИ</a>
                </div>
                <div class="col">
                    <div class="vert-second"></div>
                </div>
                <div class="col">
                    <a href="authorization.php" target="_blank"><img class="one-section">СЕКРЕТНАЯ СТРАНИЦА</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menu = document.querySelector('.mobile-menu');
    const secondContainer = document.querySelector('.second-container-header');
    const navButtons = document.querySelector('.nav-buttons');
    const hamburger = document.querySelector('.hamburger');

    let isMenuOpen = false;
    console.log('Гамбургер нажат:', isMenuOpen); // Проверка состояния

    // Функция для переключения меню
    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        console.log(isMenuOpen);
        if (isMenuOpen) {
            menu.classList.add('active');
            secondContainer.classList.remove('hidden');
            navButtons.classList.add('visible');
            hamburger.style.right = '150px';
        } else {
            menu.classList.remove('active');
            secondContainer.classList.add('hidden');
            navButtons.classList.remove('visible');
            hamburger.style.right = '10px';
        }
    }
    hamburger.addEventListener('click', toggleMenu);
});
</script>

</body>
</html>