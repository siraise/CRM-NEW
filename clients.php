<?php session_start();


if(isset($_GET['do']) && $_GET['do']==='logout'){
    require_once 'api/auth/LogoutUser.php';
    require_once 'api/DB.php';
    LogoutUser('login.php', $db, $_SESSION['token']);
    exit;
}
require_once 'api/auth/AuthCheck.php';
AuthCheck('', 'login.php');
require_once 'api/helpers/inputDefaultValue.php';
require_once 'api/helpers/selectDefaultValue.php';
require_once 'api/clients/ClientsSearch.php';


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
            <p class="header_admin">
                <?php
                require 'api/DB.php';
                require_once 'api/clients/AdminName.php';
                echo AdminName($_SESSION['token'], $db);  
            ?></p>
            <ul class="header_link">
                <li><a href="clients.php">Клиенты</a></li>
                <li><a href="products.php">Товары</a></li>
                <li><a href="orders.php">Заказы</a></li>
            </ul>
            <a class="header_login" href="?do=logout">Выйти <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" method="GET" class="main__form">
                    <label for="search">Поиск по имени</label>
                    <input <?php inputDefaultValue('search', ''); ?> type="text" id="search" name="search" placeholder="Введите имя" >
                    <label for="search">Сортировка</label>
                    <select  name="search_name" id="search_name">
                        <?php $selectNameOptions = [[
                            'key' => 'name',
                            'value' => 'По имени'
                        ],[
                            'key' => 'email',
                            'value' => 'По почте'
                        ]];
                        selectDefaultValue('search_name', $selectNameOptions, 'name');
                        ?>
                    </select>

                    <label for="search">Сортировка</label>
                    <select  name="sort" id="sort">
                        <?php $selectSortOptions = [[
                            'key' => '',
                            'value' => 'По умолчанию'
                        ],[
                            'key' => 'ASC',
                            'value' => 'По возрастанию'
                        ],[
                            'key' => 'DESC',
                            'value' => 'По убыванию'
                        ]];
                        selectDefaultValue('sort', $selectSortOptions, '');
                        ?>
                    </select>
                    <button type="submit">Поиск</button>
                    <a class="search" href="?" >Сбросить</a>

                </form>
            </div>
        </section>
        <section class="clients">
            <h2 class="clients_title">Список клиентов</h2>
            <button onclick="MicroModal.show('add-modal')" class="clients_add"><i class="fa fa-plus-square fa-2x"
                    aria-hidden="true"></i></button>
                    <?php
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $maxClients = 5;

                    $countClients = $db->query("
                    SELECT COUNT(*) as count FROM clients")
                    ->fetchAll()[0]['count'];

                    $maxPage = ceil($countClients / $maxClients);
                    $minPage = 1;
                    $searchParams = '';
                    if (isset($_GET['search_name'])) {
                        $searchParams .= '&search_name=' . urlencode($_GET['search_name']);
                    }
                    if (isset($_GET['search'])) {
                        $searchParams .= '&search=' . urlencode($_GET['search']);
                    }
                    if (isset($_GET['sort'])) {
                        $searchParams .= '&sort=' . urlencode($_GET['sort']);
                    }

                    // Ensure currentPage is within valid range
                    if ($currentPage < $minPage) $currentPage = $minPage;
                    if ($currentPage > $maxPage) $currentPage = $maxPage;

                      // Normalize currentPage
                      if ($currentPage < $minPage || !is_numeric($currentPage)) {
                        $currentPage = $minPage;
                        // Redirect to normalized URL
                        header("Location: ?page=$currentPage");
                        // Redirect to normalized URL with preserved parameters
                        header("Location: ?page=$currentPage" . $searchParams);
                        exit;
                    }
                    if ($currentPage > $maxPage) {
                        $currentPage = $maxPage;
                        // Redirect to normalized URL
                        header("Location: ?page=$currentPage");
                        // Redirect to normalized URL with preserved parameters
                        header("Location: ?page=$currentPage" . $searchParams);
                        exit;
                    }
                    // echo "<p>$currentPage / $maxPage</p>";
                    
                    // Отоюазить кнопки пагинации
                    for($i=1; $i <= $maxPage; $i++){
                        $activeStyle = ($i == $currentPage) ? 'background-color: #4CAF50; color: white;' : 'background-color: #f1f1f1; color: #333;';
                        echo"<a style='padding: 5px 10px; margin: 0 2px; border: 1px solid #ccc; border-radius: 3px; text-decoration: none; $activeStyle' href='?page=$i$searchParams'>$i</a>";
                    }
                   // Show prev button only if not on first page
                   if ($currentPage > $minPage) {
                    $Prev = $currentPage - 1;
                    echo "<a href='?page=$Prev'><i class='fa fa-arrow-left' aria-hidden='true'></i></a>";
                    echo "<a href='?page=$Prev" . $searchParams . "'></a>";
                }

                // Show next button only if not on last page
                if ($currentPage < $maxPage) {
                    $Next = $currentPage + 1;
                    echo "<a href='?page=$Next" . $searchParams . "'><i class='fa fa-arrow-right' aria-hidden='true'></i></a>";
                }
                ?>
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
                        <?php
                        require 'api/DB.php';
                        require_once 'api/clients/OutputClients.php';
                        require_once 'api/clients/ClientsSearch.php';
                        // $clients = $db->query(
                        //     "SELECT * FROM clients
                        // ")->fetchAll();
                        $clients = ClientsSearch($_GET,$db);
                        OutputClients($clients);
                        ?>
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
                    <form action="api/clients/AddClients.php" method="POST" id="registration-form">
                        <label for="full-name">ФИО:</label>
                        <input type="text" id="full-name" name="full-name" >

                        <label for="email">Почта:</label>
                        <input type="email" id="email" name="email" >

                        <label for="phone">Телефон:</label>
                        <input type="tel" id="phone" name="phone" >

                        <label for="birth-date">День рождения:</label>
                        <input type="date" id="birth-date" name="birth-date" >

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
    
    <div class="modal micromodal-slide <?php
    //проверить $_SESSION['clients-errors']
    //на существование и пустоту
    //существует и не пустой  echo 'open'
    if (isset($_SESSION['clients-errors']) && !empty($_SESSION['clients-errors'])) {
        echo 'open';
    }
    ?>" id="error-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Ошибка
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <?php
                    if (isset($_SESSION['clients-errors']) && !empty($_SESSION['clients-errors'])) {
                        echo $_SESSION['clients-errors'];
                        $_SESSION['clients-errors']="";
                    }
                    ?>
                </main>
            </div>
        </div>
    </div>
    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script defer src="scripts/initClientsModal.js"></script>
</body>

</html>