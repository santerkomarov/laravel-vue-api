<template>
    <div class="container my-3" style="max-width:900px;">
        <h1 class="text-center mb-3">Задание</h1>
        <h2 class="text-center mb-3 bg-secondary text-white rounded">Backend</h2>
        <p><span class="mark">&#9757;</span> Необходимо реализовать REST API интерфейс для работы с сущностью «оборудование».</p>
        <div class="mb-5">
            <details>
                <summary><span class="summary">Показать таблицу роутов</span></summary>
                <table id="route-table">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Роут
                        </th>
                        <th>
                            Действие
                        </th>
                        <th>
                            Обязательно
                        </th>
                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            GET:/api/equipment
                        </td>
                        <td>
                            Вывод пагинированного списка оборудования с возможностью поиска путем указания query параметров советующим ключам ответа.
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            GET:/api/equipment/{id}
                        </td>
                        <td>
                            Запрос данных по id
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            POST:/api/equipment
                        </td>
                        <td>
                            Создание новой(ых) записи(ей)
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            PUT:/api/equipment/{id}
                        </td>
                        <td>
                            Редактирование записи
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            DELETE:/api/equipment/{id}
                        </td>
                        <td>
                            Удаление записи (мягкое удаление)
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            GET:/api/equipment-type
                        </td>
                        <td>
                            Вывод пагинированного списка типов оборудования с возможностью поиска путем указания query параметров советующим ключам ответа.
                        </td>
                        <td class="route-table-last-column">
                            &#10003;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7
                        </td>
                        <td>
                            POST:/api/user/login
                        </td>
                        <td>
                            Авторизация пользователя (выпуск токена) 
                        </td>
                        <td>

                        </td>
                    </tr>                
                </table>
            </details>
            
        </div>

        <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация
                </summary>
                <div  class="p-2 border rounded">
                    

                    

<div class="p-2 mb-2" style="overflow-x:scroll;"> 
                    <pre v-highlightjs><code class="php">
php artisan route:list
                    </code></pre>                       
<div style="width:1100px;background-color: #282C34;">
    <DIV  style="font-family: 'JetBrains Mono'; font-size: 9px; text-align: start; text-indent: 0px; margin: 0;">

        <span style="color: #A6B2C0; background-color: #282C34; ">+--------+----------+----------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; "></span>&nbsp;&nbsp;<span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; ">&nbsp;Method &nbsp;&nbsp;</span><span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; ">&nbsp;URI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; ">&nbsp;Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; ">&nbsp;Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #A6B2C0; background-color: #282C34; ">|</span><span style="color: #63B978; background-color: #282C34; ">&nbsp;Middleware &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #A6B2C0; background-color: #282C34; ">| </span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">+--------+----------+----------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| api/equipment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@store &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\Authenticate:sanctum &nbsp;&nbsp;&nbsp;|</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/equipment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@index &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/equipment-type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\TypeEquipmentController@index &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/equipment-type/{search}| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\TypeEquipmentController@search &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| DELETE &nbsp;&nbsp;| api/equipment/{id} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\Authenticate:sanctum &nbsp;&nbsp;&nbsp;|</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| PUT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api/equipment/{id} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\Authenticate:sanctum &nbsp;&nbsp;&nbsp;|</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/equipment/{id} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@show &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| api/login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\ApiAuthController@login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| api/logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\ApiAuthController@logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/manager &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\TypeEquipmentController@manager &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| api/register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\ApiAuthController@register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | api/search/{search} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Api\EquipmentController@search &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| api &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\LoginController@login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\RedirectIfAuthenticated |</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\LoginController@showLoginForm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\RedirectIfAuthenticated |</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\LoginController@logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| password/confirm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\ConfirmPasswordController@confirm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\Authenticate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | password/confirm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm &nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\Authenticate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| password/email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| password.email &nbsp;&nbsp;| App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail &nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | password/reset &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| password/reset &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| password.update &nbsp;| App\Http\Controllers\Auth\ResetPasswordController@reset &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | password/reset/{token} &nbsp;&nbsp;&nbsp;&nbsp;| password.reset &nbsp;&nbsp;| App\Http\Controllers\Auth\ResetPasswordController@showResetForm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\RegisterController@showRegistrationForm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\RedirectIfAuthenticated |</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| POST &nbsp;&nbsp;&nbsp;&nbsp;| register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\Auth\RegisterController@register &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Middleware\RedirectIfAuthenticated |</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | sanctum/csrf-cookie &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Laravel\Sanctum\Http\Controllers\CsrfCookieController@show &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">| &nbsp;| GET|HEAD | {any} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| App\Http\Controllers\HomeController@index &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| web &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <span style="color: #A6B2C0; background-color: #282C34; ">+--------+----------+----------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>

    </DIV>
</div>
</div>
                </div>
            </details>
        </div> 

        <div>
            <p>
                <span class="mark">&#9757;</span> Для хранения информации об оборудовании используется 2 таблицы в базе данных (использовать MySQL и работу с миграциями):
            </p>
            
            <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация 
                </summary>
                <div  class="p-2 border rounded ">
                    <div class="d-flex flex-column justify-content-center">
                        <p class="text-center h5 mt-2">Схема организации таблиц в БД</p>
            
                        <img    :src="imgPath + 'db.png'"
                                alt="database_scheme"
                                class="mx-auto">
                    </div>
                    

<div class="p-2 mb-2"> 

<pre v-highlightjs><code class="php">

php artisan make:migration create_type_equipment_table

...
    public function up()
    {
        Schema::create('type_equipment', function (Blueprint $table) {
            $table->id('id');
            $table->string('equipment')->unique();
            $table->string('mask');
            $table->timestamps();
        });
    }
...

php artisan migrate / php artisan migrate:rollback --step=1 / php artisan migrate

php artisan make:migration create_equipment_table

...
    Schema::create('equipment', function (Blueprint $table) {
        $table->id('id');
        $table->string('type_equipment');
        $table->string('serial_number')->unique('serial_number','type_equipment');
        $table->text('comment');
        $table->timestamps();
        $table->foreign('type_equipment')
                ->references('equipment')
                ->on('type_equipments')
                ->onDelete('cascade');
    });
...

php artisan migrate / php artisan migrate:rollback --step=1 / php artisan migrate

</code></pre>
</div>
                </div>
            </details>
        </div>

            <ul>
                <li>
                    «Тип оборудования» поля: | <b>код(id)</b> | <b>наименование типа</b> | <b>маска серийного номера</b> |<b>примечание</b> |
                </li>
                <li>
                    «Оборудование» поля: | <b>код(id)</b> | <b>код типа оборудования</b> | <b>серийный номер (уникальное поле в связке с типом оборудования)</b> |
                </li>
            </ul>

                    <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация 
                </summary>
                <div  class="p-2 border rounded">
                    <p class="h5">App\Models...</p>

<div class="p-2 mb-2"> 

<pre v-highlightjs><code class="php">

class TypeEquipment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'equipment',
        'mask',
    ];
    /**
     * Get the equipments for equipment type.
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}

class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type_equipment',
        'serial_number',
        'comment',
    ];

    /**
     * Get the equipments that owns the equipment_type.
     */
    public function typeEquipment()
    {
        return $this->belongsTo(TypeEquipment::class);
    }
}

</code></pre>
</div>
                </div>
            </details>
        </div>

            <p><span class="mark">&#9757;</span> При создании новых записей в поле «серийный номер» интерфейс принимает массив номеров каждый из которых валидируется на соответствие маске и отсутствие в таблице «оборудование» в качестве уникального ключа. Создание может быть как по одному объекту, так и коллекция (на входе json-массив).
            </p>
        

            <p><span class="mark">&#9757;</span> Если «серийный номер» не проходит валидацию, по нему формируется соответствующие сообщение, которое возвращает интерфейс, после обработки всего массива номеров.
            </p>
            <div class="mb-5">
                <details>
                    <summary><span class="summary">Показать таблицу</span></summary>
                    <table>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Тип оборудования
                            </th>
                            <th>
                                Маска SN
                            </th>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                TP-Link TL-WR74
                            </td>
                            <td>
                                XXAAAAAXAA
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                D-Link DIR-300 
                            </td>
                            <td>
                                NXXAAXZXaa
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                ... 
                            </td>
                            <td>
                                ...
                            </td>
                        </tr>
                        <tr>
                            <td>
                                100500 
                            </td>
                            <td>
                                D-Link DIR-300 E 
                            </td>
                            <td>
                                NAAAAXZXXX
                            </td>
                        </tr>
                    </table>
                    <p>Где:</p>
                    <ul>
                        <li>N – цифра от 0 до 9</li>
                        <li>A – прописная буква латинского алфавита</li>
                        <li>a – строчная буква латинского алфавита</li>
                        <li>X – прописная буква латинского алфавита либо цифра от 0 до 9</li>
                        <li>Z –символ из списка: “-“, “_”, “@”</li>
                    </ul>
                    </details>
            </div>

        <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация 
                </summary>
                <div  class="p-2 border rounded">
                    <p class="h5">Проверка на соответствие серийного номера с макой типа оборудования вынесена из контроллера в директорию App\Services.</p>

<div class="p-2 mb-2"> 
<pre v-highlightjs><code class="php">
namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\TypeEquipment;
use Illuminate\Database\QueryException;

class CheckService 
{
    /**
     * Check serial number for correct mask of its equipment type.
     * Comparing request's type equipment and serial number with already existing in DB.
     * First validation is comparing mask.
     * Second one is comparing mask length of input serial number length.  
     * When two checks done then return "true".
     * @param \Illuminate\Http\Request
     * @return boolean
     */
    public function check( Request $request) 
    {
      // values from request
      $inputSerialNumber = $request->serial_number;
      $inputEquipment = $request->type_equipment;

      $N = '[0-9]'; // numbers
      $A = '[A-Z]'; // capital letters
      $a = '[a-z]'; // lowercase letters
      $X = '[a-z|0-9]'; // lowercase letters or numbers
      $Z = '[-|_|@]'; // symbols "-" or "_" or "@"
   
      $checkLength = false; 
      $resultCheckMask = false;
      $error = false;
      $regex_mask = ""; // regex mask of equipment type
      
      // get "mask" of its equipment type from table "type_equipment"
      try {
         $mask = TypeEquipment::where('equipment',$inputEquipment)->first('mask');
      } catch ( QueryException $e ){
         $error = true;
      }

      if ( $mask ) {
         // split, NAZa -> [0]=>N,[1]=>A,[2]=>Z,[3]=>a
         $mask_splitted = str_split($mask->mask);

         // building REGEX string
         foreach ( $mask_splitted as $value ) {
            switch ($value) {
               case "N":
                  $char = $N; //[0-9]
                  break;
               case "A":
                  $char = $A; //[A-Z]
                  break;
               case "a":
                  $char = $a;
                  break;
               case "X":
                  $char = $X;
                  break;
               case "Z":
                  $char = $Z;
                  break;    
               default:
                  $char = '';
                  break;
            }
            // by default $char is empty
            // concatenate to the end, [0-9]<-[a-z]...
            $regex_mask .= $char; 
         }
         
         // pattern is completely formed
         $pattern = '/'. $regex_mask .'/';
         
         preg_match($pattern, $inputSerialNumber, $checkRegex);
         
         // comparing mask.lenght and input's serial number length for equality
         strlen($inputSerialNumber) == count($mask_splitted) ? $checkLength = true : $checkLength = false;

         // final checking, REGEX and LENGTH
         if ( $checkRegex && $checkLength ) {
            $resultCheckMask = true;
         } else if (!$checkRegex || !$checkLength) {
            return "Serial number mask is wrong";
         }

      } else {
         // $error = true;
         return "Equipment type is not exist in DB";
      }

      // get "serial number" from table "equipment"
      try {
         $isSerialNumberInDb = Equipment::where('type_equipment', '=', $inputEquipment )
                                       ->where('serial_number', '=', $inputSerialNumber)
                                       ->first();
      } catch ( QueryException $e ) {
         $error = true;
      }
      if ( $isSerialNumberInDb ) {
         return "Serial number is already exist";
      }

      // final all checking
      if ( $resultCheckMask && !$isSerialNumberInDb && !$error ) {
         return true;
      }
      return false;
   }
}

</code></pre>
</div>
                </div>
            </details>
        </div>


            <div>
                <p><span class="mark">&#9757;</span> Обязательные требования:</p>
                <ul>
                    <li>использование фреймворка Laravel v.8+</li>
                    <li>использование Form Request Validation для всех методов создания и обновления

                        <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация
                </summary>
                <div  class="p-2 border rounded">
                    <p class="h5">App\Http\Requests\EquipmentStoreRequest</p>

<div class="p-2 mb-2">                        
<pre v-highlightjs><code class="php">
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    { 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_equipment' => 'required|max:255',
            'serial_number' => 'required|max:255',
            'comment' => 'max:255',
        ];
    }
}
</code></pre>
</div>
                </div>
            </details>
        </div> 

                    </li>
                    <li>все ответы API должны использовать API Resources & Resource Collections

                                <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация
                </summary>
                <div  class="p-2 border rounded">
                    <p class="h5">App\Http\Resources...</p>

<div class="p-2 mb-2">                        
<pre v-highlightjs><code class="php">
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    /**
     * The "equipment" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'equipment';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'equipment'=>$this->equipment,
            'mask'=>$this->mask,
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * The "equipment" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'equipment';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type_equipment'=>$this->type_equipment,
            'serial_number'=>$this->serial_number,
            'comment'=>$this->comment
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
</code></pre>
</div>
                </div>
            </details>
        </div> 

                    </li>
                </ul>
            </div>
            <div class="mb-5">
                <p><span class="mark">&#9757;</span> Дополнительные требования:</p>
                <ul>
                    <li>все запросы API должны быть авторизованы (проверка Bearer Authentication, рекомендуемый пакет Laravel Sanctum)</li>
                    <li>наличие PHPDoc для всех методов</li>
                    <li>вся бизнес-логика манипуляции с данными должна быть инкапсулирована в моделях и сервисном слое приложения (контроллеры должны быть плоскими)

                                <div class="rounded mb-3" >
            <details>
                <summary class="mb-3 p-2 h5 rounded bg-warning" style="width:150px;">
                    Реализация 
                </summary>
                <div  class="p-2 border rounded">
                    <p class="h5">App\Http\Controllers\Api\EquipmentController</p>

<div class="p-2 mb-2"> 
<pre v-highlightjs><code class="php">
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Equipment;
use App\Models\TypeEquipment;

use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;
use App\Http\Requests\EquipmentStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\SearchRequestService;
use App\Services\CheckService;

use Validator;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        // sanitize requests values
        $sanitizedEquipment = htmlspecialchars(strip_tags($request->type_equipment));
        $sanitizedSerialNumber = htmlspecialchars(strip_tags($request->serial_number));

        // request with two parameters, searching in two columns
        if ( $sanitizedEquipment && $sanitizedSerialNumber) { 
            $Equipment = Equipment::where("type_equipment", "LIKE","%". $sanitizedEquipment . "%")
                                ->orWhere("serial_number", "LIKE", "%". $sanitizedSerialNumber . "%")
                                ->paginate(6);
            return new EquipmentCollection($Equipment);

        // searching with single parameter
        } else if ( $sanitizedEquipment ) { 
            $Equipment = Equipment::where("type_equipment", "LIKE","%". $sanitizedEquipment . "%")
                                ->paginate(6);
            return new EquipmentCollection($Equipment);

        // searching only one item till find the first
        } else if ( $sanitizedSerialNumber ) { 
            $Equipment = Equipment::where("serial_number", "LIKE", "%". $sanitizedSerialNumber . "%")
                                ->first();
            return $Equipment;

        // handle ordinary request, return all items
        } else if ( !$sanitizedEquipment && !$sanitizedSerialNumber ) {
            return new EquipmentCollection(Equipment::paginate(6));
        }
        //* collection() return this format: {"data": {..json}}, "data" can be changed
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param app\Http\Requests\EquipmentStoreRequest
     * @param App\Services\CheckService $checking
     * @return App\Http\Resources\EquipmentResource
     * 
     * !!! While test don't forget set: Headers->Accept:application/json
     */
    public function store( EquipmentStoreRequest $request, CheckService $checking )
    {
        // send data through Check Service before creating
        // validate serial number for identity of the mask
        $result = $checking->check($request);

        // the serial number does't match the given mask, so the result false
        if ( $result == false) {
            // error info
            return response()->json(['message'=>$result,"status"=>"failed"]);
        }
        $newEquipment = Equipment::create($request->validated());

        return new EquipmentResource($newEquipment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\EquipmentResource
     */
    public function show($id)
    {

        if ( Equipment::find($id)) {
            return new EquipmentResource( Equipment::find($id) );
        }
        return response()->json(['message'=>'Nothing found'], 200);
    }

    /**
     * Update the specified resource in storage.
     * Update only one column "comment"
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  App\Services\CheckService $checking
     * @return \Illuminate\Http\Response
     */

    public function update( EquipmentStoreRequest $request, $id, CheckService $checking)
    {
        $comment = $request->comment;
        $equipment = Equipment::find($id);
        if ( $equipment ) {
            $equipment->update( ['comment'=> $comment] );
            return $equipment;
        } else {
            return response()->json(['status'=>'failed','message'=>'Equipment #' .$id.' not found'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete( Equipment $request, $id)
    {
        $equipment = Equipment::find($id);
        $equipment->delete();
        return response()->json(['status'=>'success','message'=>'Equipment #' .$equipment->id . ' was deleted'], 200);
    }

    /**
     * Search request parameter in all columns of "equipment" table.
     * 
     * @param  string  $word
     * @param App\Services\SearchRequestService
     * @return App\Http\Resources\EquipmentCollection
     */

    public function search( $word, SearchRequestService $searchService)
    {
        // sanitize request
        $word = $searchService->sanitize($word);
        if ( !$word ) {
            return response()->json(['message' => "Empty data"], 200);
        }

        $Equipment = Equipment::where("type_equipment", "LIKE","%". $word . "%")
                            ->orWhere("serial_number", "LIKE", "%". $word . "%")
                            ->orWhere("comment", "LIKE", "%". $word . "%")
                            ->paginate(6);
        return new EquipmentCollection($Equipment);

        return response()->json(['message' => 'Nothing found'], 200);
        //* collection() return this format: {"data": {..json}, "data" can be changed
    }
}

</code></pre>
</div>
                </div>
            </details>
        </div>

                    </li>
                </ul>
            </div>

            <h2 class="text-center mb-3 bg-secondary text-white rounded">Frontend</h2>
            <p><span class="mark">&#9757;</span> Для отображения сделать минимальное SPA-приложение с использованием Vue.js/Nuxt JS, работающее с разработанным API.</p>
            <div>
                <p><span class="mark">&#9757;</span> Форма добавления записей, содержащая:</p>
                <ol>
                    <li>Список «Тип оборудования» (id типа) select</li>
                    <li>Поле «Серийные номера» input-text/textarea</li>
                    <li>Поле «Примечание» textarea</li>
                    <li>Кнопка «Добавить»</li>
                </ol>
            </div>
            <div>
                <p><span class="mark">&#9757;</span> Форма(ы) поиска, редактирования и удаления записей:</p>
                <ol>
                    <li>Поисковая строка input-text, для поиска по серийному номеру/примечанию</li>
                    <li>Поле «Тип оборудования» (показать наименование) — input-text/select</li>
                    <li>Поле «Серийный номер» — input-text</li>
                    <li>Поле «Примечание» — input-text/textarea</li>
                    <li> Кнопки редактировать/сохранить/удалить в зависимости от выдранного режима (просмотр/редактирование</li>
                </ol>
            </div>
            <p>
                <span class="mark">&#9757;</span> В качестве ui kit можно использовать любой готовый фреймворк/библиотеку. Редактирование может быть реализовано как в целом всех полей, так и отдельными полями.<br>
                Для всех форм обязательно наличие минимальной валидации данных на стороне клиента.
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Task',
        data() {
            return {
                imgPath: 'images/',
            }
        },
        mounted() {
        },
        methods: {
        }
    }
</script>

<style style="css" scoped>
table {
    border: 1px solid #dee2e6;
}
table th {
    background-color: #dee2e6;
    border: 1px solid #c5ccd3;
    padding: 6px;
}
table tr, td {
    border: 1px solid #c5ccd3;
    padding: 6px;
}
.route-table-last-column {
    color: green;
    font-size: 24px;
    text-align: center;
}
.mark {
    font-size:22px;
    font-weight:900;
}
.summary{
    font-size: 16px;
    font-weight: 900;
    color: #b38f00;
}
</style>

