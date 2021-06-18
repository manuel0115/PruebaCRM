<?php 
class Estado_model extends CI_Model {

    

    public function getEstados()
    {       
            

            $this->db->select("E.ID_ESTADO AS ID,E.DESCRIPCION AS NOMBRE");
            $this->db->from('ESTADO AS E');
            $this->db->where('E.ESTADO =','1');
            $this->db->where('E.ID_ESTADO !=','3');
            $query=$this->db->get();
            

            return $query->result();




    }

   
}



?>