<?php 
class Clientes_model extends CI_Model {

    

    public function getClientes()
    {     

            $this->db->select("C.ID_CLIENTE AS ID,CONCAT(C.NOMBRE,' ',C.APELLIDO) AS NOMBRE,TC.NOMBRE AS TIPO_USUARIO,C.CORREO AS CORREO,E.DESCRIPCION AS ESTADO,C.NOMBRE_EMPRESA AS EMPRESA,C.TELEFONO AS TELEFONO,C.DIRECCIONES AS DIRECCION");
            $this->db->from('CLIENTE AS C');
            $this->db->join('TIPO_CLIENTE AS TC','TC.ID=C.TIPO');
            $this->db->join('ESTADO AS E','E.ID_ESTADO = C.ESTADO');
            $this->db->where('C.ESTADO !=',3 );

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
                'ESTADO'=>$cliente->estado,
                'NOMBRE_EMPRESA' =>$cliente->empresa,
                'TELEFONO' =>$cliente->telefonos,
                'DIRECCIONES' =>$cliente->direcciones
        );

        return $this->db->insert('CLIENTE', $data);
        
    }

    public function actualizarCliente($cliente){
        
   


        $data = array(
            'NOMBRE' => $cliente->nombre,
            'APELLIDO'  => $cliente->apellido,
            'TIPO' =>$cliente->tipo,
            'CORREO'  => $cliente->correo,
            'MODIFICADO_POR' =>1,
            'MODIFICADO_EN' => date('Y-m-d H:i:s'),
            'ESTADO'=>$cliente->estado,
            'NOMBRE_EMPRESA' =>$cliente->empresa,
            'TELEFONO' =>$cliente->telefonos,
            'DIRECCIONES' =>$cliente->direcciones
        );

        $this->db->set($data);
        $this->db->where('ID_CLIENTE', $cliente->idCliente);
        
        return $this->db->update('CLIENTE');
        

    }

    public function eliminarCliente($idcliente){



        $data = array(
            'MODIFICADO_POR' =>1,
            'MODIFICADO_EN' => date('Y-m-d H:i:s'),
            'ESTADO'=>'3',
        );

        $this->db->set($data);
        $this->db->where('ID_CLIENTE', $idcliente);
        
        return $this->db->update('CLIENTE');
        

    }

    


}
