<?php
class Usuario {
    private $id;
    private $user;
    private $senha;
    private $tipo_usuario;
    
    public function setUsuarioComId($id, $user, $senha, $tipo_usuario) {
        $this->id = $id;
        $this->user = $user;
        $this->senha = $senha;
        $this->tipo_usuario = $tipo_usuario;
    }

    public function setUsuario($user, $senha) {
        $this->user = $user;
        $this->senha = $senha;
    }

    public function getId() { 
        return $this->id; 
    }

    public function setId($id) { 
        $this->id = $id; 
    }

    public function getUser() { 
        return $this->user; 
    }
    public function setUser($user) { 
        $this->user = $user; 
    }

    public function getSenha() { 
        return $this->senha; 
    }

    public function setSenha($senha) { 
        $this->senha = $senha; 
    }

    public function getTipoUsuario() { 
        return $this->tipo_usuario; 
    }

    public function setTipoUsuario($tipo_usuario) {
         $this->tipo_usuario = $tipo_usuario; 
    }
}
