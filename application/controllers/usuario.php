<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {




	public function index($indice=null)
	{  
           //$this->verificaSessao();
            $this->db->select('*');
            $dados['usuarios'] = $this->db->get('usuarios')->result();
            $this->load->view('includes/header');
            $this->load->view('includes/menuAdm');
            if($indice==1)
                {
                $data['msg']= "Usuário cadastrado com sucesso.";
               $this->load->view('includes/msgSucesso',$data); 
            } elseif($indice==2)
                {
                $data['msg']= "Não foi cadastrar o usuário.";
                $this->load->view('includes/msgErro', $data); 
                
        }
        elseif($indice==3)
                {
                $data['msg']= "Usuário excluido com sucesso.";
               $this->load->view('includes/msgSucesso',$data); 
            } elseif($indice==4)
                {
                $data['msg']= "Não foi possível excluir o usuário.";
                $this->load->view('includes/msgErro', $data); 
                
        }
        elseif($indice==5)
                {
                $data['msg']= "Usuário atualizado com sucesso.";
               $this->load->view('includes/msgSucesso',$data); 
            } elseif($indice==6)
                {
                $data['msg']= "Não foi possível atualizar o usuário.";
                $this->load->view('includes/msgErro', $data); 
                
        }
            $this->load->view('includes/footer');
            $this->load->view('listarUsuario',$dados);
               
	}
        public function cadastro(){
             
            //$this->verificaSessao();
            $this->load->view('includes/header');
            $this->load->view('includes/menuAdm');
            $this->load->view('includes/footer');
            $this->load->view('cadastroUsuario');
        }
        public function cadastrar(){
            
            //$this->verificaSessao();
            $data['nomeUsuarios'] = $this->input->post('nomeUsuarios');
            $data['emailUsuarios'] = $this->input->post('emailUsuarios');
            $data['telefoneUsuarios'] = $this->input->post('telefoneUsuarios');
            $data['senhaUsuarios'] = $this->input->post('senhaUsuarios');
            $data['statusUsuarios'] = $this->input->post('statusUsuarios');
            $data['sexoUsuarios'] = $this->input->post('sexoUsuarios');
            $data['dataNascUsuarios'] = $this->input->post('dataNascUsuarios');
            $data['raUsuarios'] = $this->input->post('raUsuarios');
            
            if($this->db->insert('usuarios',$data)){
                
                redirect('usuario/1');
                  }else{
                      
                redirect('usuario/2'); 
            }
        }
        
        public function cadastrarDisciplinas(){
            
            $this->load->view('includes/header');
            $this->load->view('includes/menuAdm');
            $this->load->view('cadastrarDisciplinas');
            $this->load->view('includes/footer');
    
        }
        
        public function excluir($id=null){
            
            //$this->verificaSessao();
            $this->db->where('idUsuarios',$id);
            if($this->db->delete('usuarios')){
                
                redirect('usuario/3');
                  }else{
                      
                redirect('usuario/4'); 
            }
        }
        public function atualizar($id=null){
            
			//echo("recuperou o id? " . $id);
            //$this->verificaSessao();
            $this->db->where('idUsuarios',$id);
			
			  $query = $this->db->get('usuarios');
			 foreach($query->result() as $row){
				 $data['nome'] = $row->nomeUsuarios;
                                
			 }
			
            //$data['usuarios'] = $this->db->get('usuarios')->result();
            $this->load->view('includes/header');
            $this->load->view('includes/menuAdm');
            $this->load->view('editarUsuario',$data);
            $this->load->view('includes/footer');
            
        }
         public function salvarAtualizacao(){
             
             //$this->verificaSessao();
             $id = $this->input->post('idUsuarios');
           
            $data['nomeUsuarios'] = $this->input->post('nomeUsuarios');
            $data['emailUsuarios'] = $this->input->post('emailUsuarios');
            $data['telefoneUsuarios'] = $this->input->post('telefoneUsuarios');
            $data['statusUsuarios'] = $this->input->post('statusUsuarios');
            $data['perfilUsuarios'] = $this->input->post('perfilUsuarios');
            $data['sexoUsuarios'] = $this->input->post('sexoUsuarios');
            $data['dataNascUsuarios'] = $this->input->post('dataNascUsuarios');
            $data['raUsuarios'] = $this->input->post('raUsuarios');
            
            $this->db->where('idUsuarios',$id);
            
            if($this->db->update('usuarios',$data)){
                
                redirect('usuario/1');
                  }else{
                      
                redirect('usuario/2'); 
            }
        }
        public function criarAula(){
            
            $this->load->view('includes/header');
            $this->load->view('includes/menuProfessor');
            $this->load->view('criarAula');
            $this->load->view('includes/footer');
        }
        
        public function minhasAulas(){
           
            $this->load->view('includes/header');
            $this->load->view('includes/menuProfessor');
            $this->load->view('minhasAulas');
            $this->load->view('includes/footer');
            
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */