<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\libro;

class Libros extends Controller{

    public function index () {

        //en esta linea esta llamando al modelo
        $libro = new Libro();
        $datos['libros']= $libro->orderBy('id','ASC')->FindAll();

        $datos['cabecera']= view ('template/cabecera');
        $datos['pie']= view ('template/piepagina');

        return view ('libros/listar',$datos);

    }

    public function crear () {

        $datos['cabecera']= view ('template/cabecera');
        $datos['pie']= view ('template/piepagina');

        return view ("libros/crear",$datos);
    }

    public function guardar () {

        $libro = new Libro();
        

        if ($imagen=$this->request->getFile("imagen") ) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre);

            $datos= [
                'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre
            ];
            $libro->insert($datos);
        }

        return $this->response->redirect(site_url('/listar'));


    }

    public function borrar ($id=null) {

        $libro= new Libro();
        $datosLibros=$libro->where('id',$id)->first();

        $ruta=('../public/uploads/'.$datosLibros['imagen']);
        unlink($ruta);

        $libro->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/listar'));

    }

    public function editar ($id=null) {

        print_r($id);
        $libro= new Libro();
        $datos['libro']=$libro->where('id',$id)->first();

        $datos['cabecera']= view ('template/cabecera');
        $datos['pie']= view ('template/piepagina');

        return view ("libros/editar",$datos);

    }

    public function actualizar () {

        $libro = new Libro();
        

        // if ($imagen=$this->request->getFile("imagen") ) {
        //     $nuevoNombre = $imagen->getRandomName();
        //     $imagen->move('../public/uploads/', $nuevoNombre);

        $datos= [
            'nombre'=>$this->request->getVar('nombre')/* ,
            'imagen'=>$nuevoNombre */
        ];

        $id = $this->request->getVar('id');
        $libro->update($id,$datos);
        // }
        
        // return $this->response->redirect(site_url('/listar'));


    }

}  

