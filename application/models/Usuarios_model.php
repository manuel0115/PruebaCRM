<?php 
class Usuarios_model extends CI_Model {

   

    public function getUsuario($usuario)
    {       
            

            $query = $this->db->get_where('USUARIOS',['CORREO'=>$usuario->email],NULL,NULL);
            return $query->result();
    }

   

}



?>