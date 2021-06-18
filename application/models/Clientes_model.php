<?php 
class Clientes_model extends CI_Model {

    

    public function getClientes()
    {     

            $this->db->select("C.ID_CLIENTE AS ID,CONCAT(C.NOMBRE,' ',C.APELLIDO) AS NOMBRE,TC.NOMBRE AS TIPO_USUARIO,C.CORREO AS CORREO,E.DESCRIPCION AS ESTADO,C.NOMBRE_EMPRESA AS EMPRESA");
            $this->db->from('CLIENTE AS C');
            $this->db->join('TIPO_CLIENTE AS TC','TC.ID=C.TIPO');
            $this->db->join('ESTADO AS E','E.ID_ESTADO = C.ESTADO');
            $query=$this->db->get();

            return $query->result();

    }

    public function getCliente($idCliente)
    {     

                $query = $this->db->get_where('CLIENTE',['ID_CLIENTE'=>$idCliente],NULL,NULL);
                return $query->result();
   
    }

    public function agregarCliente($cliente){

        $data = array(
                'NOMBRE' => $cliente->nombre,
                'APELLIDO'  => $cliente->apellido,
                'TIPO' =>$cliente->tipo,
                'CORREO'  => $cliente->correo,
                'MODIFICADO_POR' =>1,
                'MODIFICADO_EN' => date('Y-m-d H:i:s'),
                'CREADO_POR' =>1,
                'CREADO_EN' =>date('Y-m-d H:i:s'),
                'NOMBRE_EMPRESA' =>$cliente->empresa
        );

        return $this->db->insert('CLIENTE', $data);
        
    }
   

}



?>