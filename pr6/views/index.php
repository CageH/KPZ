    <?php
            error_reporting(0);
            include('controllers/files.php');
            $f = new Files;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pr4.css">
    <title>Практична 6 !</title>
</head>
<body>




    <div class="cont">
        <div class="counter">

        <?php   $f->counter();  ?> 

        </div>
        <div class="file">
            Загрузка файла <br>
        <form enctype="multipart/form-data" action="/index.php/files/upload_files" method="POST">
            <input type="file" name="myfile" /> <br>
            <input type="submit" value="Send" />
        </form>
        </div>
        

        <div class="file">
            Поиск файла <br>
        <form enctype="multipart/form-data" action="/index.php/files/search" method="POST">
            <input type="text" name="searchname" /> <br>
            <input type="submit" value="Find" />
        </form>
        </div>

        <?php
            if($f->m){
                echo $f->m;
            } 
        ?>
        <hr>
        <?php 
            if(count($f->files)>1){ 
        ?> 
            <form method="POST" action="/index.php/files/delete">
                <table> 
                    <tr>
                        <th>Имя</th>
                        <th>Удалить</th>
                    </tr>
                    <?php  
                        foreach($f->files as $s){
                            if($s != '.' and $s != '..'){ ?>
                                <tr>
                                    <td><?php echo $s ?></td>
                                    <td><button type="submit" name="delete" value="<? echo $s ?>">Удалить</button></td>
                                </tr>
                        <?php }  ?>
                      <?php  } ?>
                </table>
            </form>
        <?php } ?>
    </div>
</body>
</html>