<?php

//echo getcwd().'..\dao\tarefa_dao.php';
require 'tarefa_dao.php';

//var_dump($_SERVER['REQUEST_METHOD']);
//echo $_POST['method'];
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['method'])){

    $method = $_GET['method'];
    if(method_exists('TarefaController', $method)){
        $tarefaController = new TarefaController();
        $tarefaController->$method($_GET);
    }else{

    echo 'Método não existe';
}
}else if($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_GET['method'])){

    //$method = $_POST['method'];
    $method = $_GET['method'];
    if(method_exists('TarefaController', $method)){
        $tarefaController = new TarefaController();
        $tarefaController->$method($_POST);

       
    }else{

    echo 'Método não existe';
}
}
class TarefaController{
    public function index(){
        header('Location: index.php');
    }
    public function novaTarefa(){
        header('location: nova_tarefa.php');
    }
    public function listarTarefa(){
        header('location: listar_tarefa.php');

    }
    public function salvar(){
      try{
        //recupera os dados da requisição
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');
        //var_dump($titulo, $descricao);
        // cria o objeto
        $t = new Tarefa();
        $t->setDescricao($titulo);
        $t->setDescricao($descricao);
        //cria o dao 
        $tarefaDAO = new TarefaDAO();
        //salva
        $tarefaDAO->salvar($t);
        //devolve pra view
        header('location: nova_tarefa.php');
      }catch(Exception $exception){
        echo $exception->getMessage();  
    }



}

    public function getTodas(){
        $tarefaDAO = new TarefaDAO();
        return $tarefaDAO->getTodas();
}
}


?>