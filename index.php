<?php 

include_once __DIR__ . "/app/model/data_class.php";

include_once __DIR__ . "/app/model/data_DAO.php";

include_once __DIR__ . "/app/controller/homeControle.php";

include_once __DIR__ . "/app/controller/adminControl.php";

include_once __DIR__ . "/app/controller/logController.php";

include_once __DIR__ . "/app/controller/authorConrol.php";

include_once __DIR__ . "/app/controller/wikiController.php";

include_once __DIR__ . "/app/model/logClass.php";

include_once __DIR__ . "/app/model/logDAO.php";

include_once __DIR__ . "/app/model/wikiClass.php";

include_once __DIR__ . "/app/model/wikiDAO.php";

include_once __DIR__ . "/app/model/tagClass.php";

include_once __DIR__ . "/app/model/tagDAO.php";

include_once __DIR__ . "/app/model/categoryClass.php";

include_once __DIR__ . "/app/model/categoryDAO.php";

include_once __DIR__ . "/app/controller/categoryControll.php";

include_once __DIR__ . "/app/model/tagDAO.php";


session_start();
if(isset($_GET['action'])){

    $action = $_GET['action'];

    switch ($action){
        case 'home':
            $controller = new home;
            $controller->index();
            break;
        case 'admin':
            $controller = new adminControl();
            $controller->index();
            break;
        case 'author':
            $controller = new authorControl();
            $controller->index();
            break; 
        case 'login':
            $controller = new logController();
            $controller->displayForm();
            break;
        case 'signup':
            $controller = new logController();
            $controller->displaysignUP();
            break;
        case 'getlog':
            $controller = new logController();
            $controller->login();
            break;
        case 'register':
            $controller = new logController();
            $controller->register();
            break;
        case 'admin_wiki_table':
            $controller = new wikiController();
            $controller->adminIndex();
            break;
        case 'author_wiki_table':
            $controller = new wikiController();
            $controller->authorIndex();
            break;
        case 'addWiki':
            $controller = new wikiController();
            $controller->create();
        break;
        case 'storeWiki':
            $controller = new wikiController();
            $controller->store();
        break;
    }
}else{
    $controller = new home;
    $controller->index();
}


?>