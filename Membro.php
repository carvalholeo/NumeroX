<?php
class Membro {
    //Atributos
    private $nome;
    private $idade;
    private $batizado;
    private $usuario;
    private $membro;
    private $integracao;
    private $status;
    private $disciplina;
    private $ministerio;
    
    //Métodos
    public function batizar() {
        if ($this->getBatizado()) {
            echo "<p>" . $this->getNome() . " já é batizado.</p>";
        } else {
            $this->setBatizado(true);
            echo "<p>" . $this->getNome() . " agora está com status de batizado no sistema. O próximo passo é alterar o status de integração.</p>";
        }
    }
    public function integrar() {
        if (!$this->getBatizado()) {
            echo "<p>" . $this->getNome() . " ainda não é batizado. Favor alterar antes de integrar à Igreja.</p>";
        } else {
            $this->setIntegracao(date("Y-m-d"));
            $this->setStatus(true);
            $this->setMembro(true);
            echo "<p>" . $this->getNome() . " agora está devidamente integrado e ativo no sistema da igreja. Para todos os efeitos, o membro está integrado desde " . $this->getIntegracao() . ".</p>";
        }
    }
    public function porDisciplina() {
        if ($this->getStatus() 
                && !$this->getDisciplina()
                && $this->getBatizado()) {
            $this->setDisciplina(true);
            echo "<p>Sentimos muito que você tenha de chegar a esta decisão. A partir deste momento, " . $this->getNome() . " está com status de disciplina ativa no sistema, e não conseguirá fazer nenhuma alteração até que VOCÊ reverta este status. </p>";
        } else {
            echo "<p>Não foi possível colocar " . $this->getNome() . " em disciplina. As causas possíveis são:<br \>";
            echo "1 - Já está em disciplina<br \>";
            echo "2 - Não está ativo no sistema<br \>";
            echo "3 - Não é batizado. <br \>";
            echo "Por favor, verifique estes itens e tente novamente. </p>";
        }
    }
    public function tirarDisciplina() {
        if ($this->getStatus()
                && $this->getDisciplina()
                && $this->getBatizado()) {
            $this->setDisciplina(false);
            echo "<p>Ficamos felizes em reativar uma pessoa no sistema. A partir deste momento, " . $this->getNome() . " está com status de disciplina desativado e, portanto, liberado para suas atividades. </p>";
        } else {
           echo "<p>Não foi possível tirar " . $this->getNome() . " do regime de disciplina. As causas possíveis são:<br \>";
           echo "1 - Não está em disciplina<br \>";
           echo "2 - Não está ativo no sistema<br \>";
           echo "3 - Não é batizado. <br \>";
           echo "Por favor, verifique estes itens e tente novamente. </p>"; 
        }
    }
    public function ativar() {
        if (!$this->getStatus()) {
            $this->setStatus(true);
            echo "<p>O status no sistema de " . $this->getNome() . " agora está como ativo.</p>";
        } else {
            echo "<p>Esta pessoa já está com status ativo.</p>";
        }
    }
    public function desativar() {
        if ($this->getStatus()) {
            $this->setStatus(false);
            echo "<p>O status no sistema de " . $this->getNome() . " agora está como desativado.</p>";
        } else {
            echo "<p>Esta pessoa já está com status desativado.</p>";
        }
    }
    public function alterarMinisterio($ministerio) {
        if ($this->getStatus()
                && $this->getBatizado()
                && !$this->getDisciplina()) {
            $this->setMinisterio($ministerio);
            echo "<p>" . $this->getNome() . " agora está cadastrado no ministério " . $this->getMinisterio() . ".</p>";
        } else {
            echo "<p>Não foi possível alterar o ministério para " . $this->getNome() . ". As causas possíveis são:<br \>";
            echo "1 - Está em disciplina<br \>";
            echo "2 - Não está ativo no sistema<br \>";
            echo "3 - Não é batizado. <br \>";
            echo "Por favor, verifique estes itens e tente novamente. </p>";
        }
    }
    
    //Métodos especiais
    function __construct() {
        $this->setStatus(false);
        $this->setBatizado(false);
        $this->setMembro(false);
        $this->setDisciplina(false);
    }
    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function getBatizado() {
        return $this->batizado;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getMembro() {
        return $this->membro;
    }

    function getIntegracao() {
        return $this->integracao;
    }

    function getStatus() {
        return $this->status;
    }

    function getDisciplina() {
        return $this->disciplina;
    }

    function getMinisterio() {
        return $this->ministerio;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    private function setBatizado($batizado) {
        $this->batizado = $batizado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    private function setMembro($membro) {
        $this->membro = $membro;
    }

    private function setIntegracao($integracao) {
        $this->integracao = $integracao;
    }

    private function setStatus($status) {
        $this->status = $status;
    }

    private function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    private function setMinisterio($ministerio) {
        $this->ministerio = $ministerio;
    }
}
