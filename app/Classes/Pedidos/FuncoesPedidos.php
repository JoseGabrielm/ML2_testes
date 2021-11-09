<?php

namespace App\Classes\Pedidos;

use Illuminate\Support\Facades\DB;

class FuncoesPedidos
{



    public function index() {
       // $this->listar();
        //$this->load->view("pedidos/pedidos");
    }

    public function incluir() {
        //$this->Importar_pedidos_model->inserir();
        //$this->load->view("pedidos/pedidos");
        //redirect('pedidos/listar');
    }

    public function listar() {
        //$resultado = $this->Importar_pedidos_model->consultar();
        //var_dump($resultado);
        //$vetorPedidos['pedidosVetor'] = $resultado;
        //$vetorPedidos['titulo'] = "xxxxxxxxxxxx";
        //$this->load->view("pedidos/pedidos", $vetorPedidos);
    }



    public function limpar() {
        //$this->db->empty_table('tbimport'); // Produces: DELETE FROM mytable
        //redirect('pedidos/listar');
    }

    public function inserir() {
        //$pedido = $this->input->post("idped");
        //if ($pedido != null) {
        //    $this->pedido = $this->input->post("idped");
        //    $this->db->insert('tbimport', $this);
        //}
    }

    public function consultar() {
       // $this->db->from('tbimport');
       // $this->db->order_by("id", "desc");
       // $query = $this->db->get();
       // return $query->result();
        //return $this->db->get("tbimport")->result();
    }

    public function excluir($id) {
       // $this->db->where("id", $id);
        //$this->db->delete("tbimport");
    }

    function abrir() {
      //  echo '<script language="javascript" type="text/javascript">';
       // echo "  document.getElementById('link').click()";
       // echo "  }";
       // echo '</script>';
    }

}
