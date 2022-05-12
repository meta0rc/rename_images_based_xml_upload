<?php 

$dir = scandir('thumbs/');
$path = __DIR__ . '/thumbs' . '/';

if(!empty($_FILES['file']['tmp_name'])){

    $arquivo = new DomDocument();

		$arquivo->load($_FILES['file']['tmp_name']); 
		//var_dump($arquivo);

        $linhas = $arquivo->getElementsByTagName("Row");
       // var_dump($linhas);

        for($i=0; $i < count($dir); $i++){
            
            $file = $path . $dir[$i];
            if(!is_file($file)){
                continue;
            }  

            $nova = $path . $linhas[$i]->getElementsByTagName("Data")->item(0)->nodeValue;

            rename($file, $nova);
           
        }

 }

?>