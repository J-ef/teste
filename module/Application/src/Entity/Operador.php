<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operador
 *
 * @ORM\Table(name="operador", uniqueConstraints={@ORM\UniqueConstraint(name="USUARIO_UNIQUE", columns={"USUARIO"})})
 * @ORM\Entity
 */
class Operador
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDOPERADOR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoperador;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="SOBRENOME", type="string", length=45, nullable=false)
     */
    private $sobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="USUARIO", type="string", length=100, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="SENHA", type="string", length=300, nullable=false)
     */
    private $senha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DTCADASTRO", type="datetime", nullable=false)
     */
    private $dtcadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="PERMISSAO", type="string", length=45, nullable=false)
     */
    private $permissao;

    /**
     * @return int
     */
    public function getIdoperador()
    {
        return $this->idoperador;
    }

    /**
     * @param int $idoperador
     * @return Operador
     */
    public function setIdoperador($idoperador)
    {
        $this->idoperador = $idoperador;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Operador
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param string $sobrenome
     * @return Operador
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     * @return Operador
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Operador
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    /**
     * @param \DateTime $dtcadastro
     * @return Operador
     */
    public function setDtcadastro($dtcadastro)
    {
        $this->dtcadastro = $dtcadastro;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * @param string $permissao
     * @return Operador
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
        return $this;
    }


}
