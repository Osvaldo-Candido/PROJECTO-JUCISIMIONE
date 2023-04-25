<?php 

namespace App\Controllers;

use App\Models\ModelAlbum;
use Src\Classes\RoutesViews;

class AlbumController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/album/AlbumFotos');    
    }

    public function buscarImagens()
    {
        $class = new ModelAlbum();

        $albumFotos = $class->buscarFotos();
        $imagens = '';
        if(isset($albumFotos)){
                foreach($albumFotos as $foto)
                {
                    $imagens .= '<div class="imagem-box">
                    <img src="'.DIRIMG.'usuarios/'.$foto->foto.'" alt="">
                    <h6>Nome da imagem</h6>
                    <div class="accoes">
                        <a href="#" data-role="eliminar" data-id="'.$foto->idFoto.'"><img src="'.DIRIMG.'delete.svg" alt=""></a>
                        <a href="#"><img src="'.DIRIMG.'info.svg" alt=""></a>
                    </div>    
                    </div>';
            }
        }
        echo $imagens;
    }

    public function adicionarImagem()
    {
        $class = new ModelAlbum();

        $image_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $image_explode = explode('.',$image_name);
        $image_ext = end($image_explode);

            $extension = ['jpg','png','jpeg','JPG','PNG','JPEG'];
            if(in_array($image_ext, $extension) === true)
            {
                $time = time();

                $new_image_name = $time."".$image_name;

               if(move_uploaded_file($tmp_name, DIRREQ.'public/img/usuarios/'.$new_image_name)){
    

                    $class->adFotos($new_image_name);
                    
                    if($class->getResultado())
                    {
                        echo "Inserido com sucesso";
                    }else{
                        echo "Não inserido com sucesso";
                    }
               }else{
                   
               }
            }else{
                echo "Apenas são permitidos ficheiros do tipo PNG, JPG e JPEG";
            } 
    }

    public function eliminarImagem()
    {
            $id = $_POST['id'];
            $class = new ModelAlbum();
            $class->eliminarFotos($id);

            if($class->getResultado())
            {
                echo "Eliminado com sucesso";
            }else{
                echo "Foto não eliminada";
            }
    
        }

    public function detalhesImagem()
    {

    }
}