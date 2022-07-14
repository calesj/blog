<?php

class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {
        $result = $this->mysql->query('Select id,titulo,conteudo from artigos');

        $posts = $result->fetch_all(MYSQLI_ASSOC);
        return $posts;
    }

    public function exibirUm(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("select id,titulo,conteudo from artigos where id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function adicionar(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare("insert into artigos (titulo,conteudo) values (?,?);");
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function editar($id, $titulo, $conteudo): void
    {
        $editar = $this->mysql->prepare("update artigos set titulo = ?, conteudo = ? where id = ?");
        $editar->bind_param('sss', $titulo, $conteudo, $id);
        $editar->execute();
    }

    public function deletar($id)
    {
        $deletar = $this->mysql->prepare("delete from artigos where id = ?");
        $deletar->bind_param('s', $id);
        $deletar->execute();
    }
}


?>