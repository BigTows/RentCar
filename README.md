## Курсовой проект на тему:
###  Создание и введение базы данных проката автомобилей


> Версия 0.5 Бета

## Возможности
- Админ панель
..* Редактирование таблиц (Добавлять/Удалять/Изменять)
..* Просмотр статистики
- Аутентификаци
- Разграничение прав
- Просматривать точки на геокарте
- Заказывать машины
- Просмотр своего профиля и заказов
## Интсрументы
- [Bootstrap 3](getbootstrap.com/)
- [Smarty](http://www.smarty.net/)
- [MariaDB](https://mariadb.org/)
- [Apache 2](https://httpd.apache.org/)
- [Yandex Map](https://tech.yandex.ru/maps/)
- [AIR DATEPICKER](http://t1m0n.name/air-datepicker/docs/index-ru.html)
- [Chart.js](http://www.chartjs.org/)

## Установка 
> Нужно создать файл с именем *project.config.php* в папку *application/configs/* и записать в него следующее:
```php
<?php
/**
 * @author BigTows
 * @version 1.0
 */

/**
 * @var string switch debug mode. (true == on, false == off);
 */
const DEBUG_MODE = true;
$DBName = "DataBase Name"; //Data Base name
$DBUser = "User"; // Name user in Data Base
$DBPassword = "Password"; // User password
$DBHost = "localhost"; // Host Data Base
$DBDriver = "mysql"; //Driver

/**
 * Then there is the function
 */
$DBDns = $DBDriver.":host=".$DBHost.";dbname=".$DBName;

```
## ToDo лист
- Оптимизация кода
