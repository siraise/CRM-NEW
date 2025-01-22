<?php 

session_start();
require_once 'api/auth/AuthCheck.php';
AuthCheck('', 'login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Клиенты</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/clients.css">
    <link rel="stylesheet" href="styles/modules/micromodal.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <p class="header_admin">Фамилия Имя Отчество</p>
            <ul class="header_link">
                <li><a href="">Клиенты</a></li>
                <li><a href="">Товары</a></li>
                <li><a href="">Заказы</a></li>
            </ul>
            <a class="header_login" href="login.html">Выйти <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" class="main__form">
                    <label for="search">Поиск по имени</label>
                    <input type="text" id="search" name="search" placeholder="Введите имя" required>
                    <label for="search">Сортировка по имени</label>
                    <select name="sort" id="sort">
                        <option value="0">По возрастанию</option>
                        <option value="1">По убыванию</option>
                    </select>
                </form>
            </div>
        </section>
        <section class="clients">
            <h2 class="clients_title">Список клиентов</h2>
            <button onclick="MicroModal.show('add-modal')" class="clients_add"><i class="fa fa-plus-square fa-2x"
                    aria-hidden="true"></i></button>
            <div class="container">
                <table>
                    <thead>
                        <th>ИД</th>
                        <th>ФИО</th>
                        <th>Почта</th>
                        <th>Телефон</th>
                        <th>День рождения</th>
                        <th>Дата создания</th>
                        <th>История заказов</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td><i class="fa fa-book" aria-hidden="true"></i></td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>Рубан Александр Дмитриевич </td>
                            <td>alex@mail.ru</td>
                            <td>89920093303</td>
                            <td>9.03.2004</td>
                            <td>15.08.2024</td>
                            <td onclick="MicroModal.show('history-modal')"><i class="fa fa-book" aria-hidden="true"></i>
                            </td>
                            <td onclick="MicroModal.show('edit-modal')"><i class="fa fa-pencil" aria-hidden="true"></i>
                            </td>
                            <td onclick="MicroModal.show('delete-modal')"><i class="fa fa-trash" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Добавить клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <label for="full-name">ФИО:</label>
                        <input type="text" id="full-name" name="full-name" required>

                        <label for="email">Почта:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone">Телефон:</label>
                        <input type="tel" id="phone" name="phone" required>

                        <label for="birth-date">День рождения:</label>
                        <input type="date" id="birth-date" name="birth-date" required>

                        <button class="create" type="submit">Создать</button>
                        <button onclick="MicroModal.close('add-modal')" class="cancel" type="button">Отмена</button>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="delete-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Вы уверены, что хотите удалить клиента?
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <button class="cancel" type="submit">Удалить</button>
                        <button onclick="MicroModal.close('delete-modal')" class="create" type="button">Отмена</button>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="edit-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Редактировать клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <label for="full-name">ФИО:</label>
                        <input type="text" id="full-name" name="full-name" required>

                        <label for="email">Почта:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone">Телефон:</label>
                        <input type="tel" id="phone" name="phone" required>

                        <button class="create" type="submit">Редактировать</button>
                        <button onclick="MicroModal.close('edit-modal')" class="cancel" type="button">Отмена</button>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="history-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        История заказов
                    </h2>
                    <small> Фамилия Имя Отчество</small>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <div class="order">
                            <div class="order_info">
                                <h3 class="order_number">Заказ №1</h3>
                                <time class="order_date">Дата оформления : 2025-01-13 09:25:30</time>
                                <p class="order_total">Общая сумма: 300.00</p>
                            </div>
                            <table class="order_items">
                                <tr>
                                    <th>ИД</th>
                                    <th>Название товара</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Футболка</td>
                                    <td>10</td>
                                    <td>10000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Футболка</td>
                                    <td>5</td>
                                    <td>5000</td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script defer src="scripts/initClientsModal.js"></script>
</body>

</html>