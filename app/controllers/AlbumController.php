<?php 

namespace App\Controllers;

use Src\Classes\RoutesViews;

class AlbumController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/album/AlbumFotos');    
    }
}