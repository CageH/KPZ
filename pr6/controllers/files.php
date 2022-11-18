<?php
class files{
    public $files;
    public $m;


    function __construct(){
        $this->files = scandir("files/");

        if($_GET['m']) $this->m = $_GET['m'];
    }
    function redirect($url, $m=null){
        if($url&&$m){
            header('Location: '.$url.'?m='.$m);
        }else if($url&&!$m){
            header('Location: '.$url);   
        } 
    }
    function counter(){

        $filename = "count.txt";
        if (file_exists($filename)){
            $h = fopen($filename, "r+");
            $Content = fread($h, filesize($filename));
            fclose($h);
            $text = $Content + 1;
        }else{
            $text = 1;
        }
        $h = fopen($filename, "w");
        if(fwrite($h, $text)){
            echo "ВЫ $text-й посетитель сайта";
        }else{
            echo "Ошибка в функции counter";
        }
        fclose($h);
    }

    function upload_files(){
        if($_FILES['myfile']){
            $uploaddir = 'files/';
            $destination = $uploaddir.$_FILES['myfile']['name'];
            if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)){
                $this->redirect('/');
            }else{
                return "Ошибка в функции upload_files";
            }
        }
    }
    function search(){
        if($_POST['searchname']){
            $folder = "files/";
            $searchname = $_POST['searchname'];
            $file = $searchname;
            $file = $folder.$file;
            if(file_exists($file)){
                $this->redirect('/',"Файл сущевствует");
            }else{
                $this->redirect('/',"Файл не сущевствует");
            }
        }
    }

    function delete(){
        if($_POST['delete']){
            unlink("files/".$_POST['delete']);
            $this->redirect('/');
        }
    }
} 
?>