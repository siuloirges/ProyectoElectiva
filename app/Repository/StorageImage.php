<?php 
class StorageImage {
    

 public static function saveImage(){
    $nombre=$_FILES['file_rule']['name'];
        if( $nombre != null){
    
            $type = str_replace(['application/','image/'],'.',$_FILES['file_rule']['type']);
            $directorio ="../storage/";
            $aleatorio = getdate()[0];
            $ruta = $aleatorio.$type;
            
            
     
                
            $guardado=$_FILES['file_rule']['tmp_name'];
                
                
                
            if(!file_exists($directorio )){
                mkdir($directorio ,0777,true);
                if(file_exists($directorio )){
                
                    if(move_uploaded_file($guardado, './'.$nombre)){
                        echo "Archivo guardado con exito";
                    }else{
                        echo "Archivo no se pudo guardar";
                    }
                }
            }else{
                    if(move_uploaded_file($guardado, $directorio.$aleatorio.$type)){
                    echo "Archivo guardado con exito";
                
                }elseif(move_uploaded_file($guardado, $directorio.$aleatorio.$type)){
                    echo "Archivo guardado con exito";
                }else{
                    echo "Archivo no se pudo guardar";
                }
                
                
                
            }

        return  $directorio.$ruta;
    }
}
}
?>