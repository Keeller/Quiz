Классы для доступа к базе описаны в папке DB и соответствующем пространстве имен.
Основной интерес составляют классы ConectionFactory и MySQLConnection
В папке net представлен код для небольшого Routera организующего роутинг для веб сервиса (сделано под
Appache 2.4)
В решениях задач помогает соорентироваться индексная страничка перенаправляющая в нужные скрипты/странциы
Собрано на PHP 7.2 + APACHE 2.4 + MySQL 5.5
Установка
1. Сделать git clone 
2. Выполнит composer install
3. В скрипте NET/index.php исправить путь до autoload.php (В openserver глючат относительные пути поэтому
править надо руками).
4. Развернуть дамп sobes.sql
5. Зайти на сайт
6. enjoy