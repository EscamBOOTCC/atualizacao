<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\GrandesAreasService;
use App\Helpers\Validador;

class GrandesAreasController extends Controller
{
  private GrandesAreasService $service;

  public function __construct()
  {
    $this->service = new GrandesAreasService();
  }

  public function gerenciarEstrutura(): void
  {
    $this->autenticacaoRequired();
    $this->adminRequired();

    $grandesAreas = $this->service->listarTodos();

    $idEdicao = isset($_GET['id']) ? (int) $_GET['id'] : null;
    $nomeEdicao = '';

    if ($idEdicao) {

      $grandeArea = $this->service->buscarPorId($idEdicao);

      if ($grandeArea) {
        $nomeEdicao = $grandeArea['Nome'];
      } else {
        $idEdicao = null;
      }
    }

    $this->view('GrandesAreas/gerenciarEstrutura', [
      'grandesAreas' => $grandesAreas,
      'idEdicao' => $idEdicao,
      'nomeEdicao' => $nomeEdicao
    ]);
  }

  public function salvar(): void
  {
    $this->autenticacaoRequired();
    $this->adminRequired();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $this->redirect(URL_BASE . '/grandes-areas');
      return;
    }

    $nome = trim($_POST['nome'] ?? '');

    $validador = new Validador();

    $validador
      ->obrigatorio('nome', $nome)
      ->maxLength('nome', $nome, 255);

    if ($validador->temErros()) {

      $grandesAreas = $this->service->listarTodos();

      $this->view('GrandesAreas/gerenciarEstrutura', [
        'grandesAreas' => $grandesAreas,
        'erros' => $validador->getErros(),
        'nome' => $nome,
        'idEdicao' => null,
        'nomeEdicao' => ''
      ]);

      return;
    }

    try {

      $this->service->salvar($nome);

      $this->redirect(URL_BASE . '/grandes-areas');
    } catch (\Exception $e) {

      $grandesAreas = $this->service->listarTodos();

      $this->view('GrandesAreas/gerenciarEstrutura', [
        'grandesAreas' => $grandesAreas,
        'erros' => [
          'geral' => $e->getMessage()
        ],
        'nome' => $nome,
        'idEdicao' => null,
        'nomeEdicao' => ''
      ]);
    }
  }

  public function atualizar(): void
  {
    $this->autenticacaoRequired();
    $this->adminRequired();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $this->redirect(URL_BASE . '/grandes-areas');
      return;
    }

    $idGrandeArea = (int) ($_POST['idGrandeArea'] ?? 0);
    $nome = trim($_POST['nome'] ?? '');

    $validador = new Validador();

    $validador
      ->obrigatorio('nome', $nome)
      ->maxLength('nome', $nome, 255);

    if ($idGrandeArea <= 0) {

      $validador->obrigatorio(
        'idGrandeArea',
        ''
      );
    }

    if ($validador->temErros()) {

      $grandesAreas = $this->service->listarTodos();

      $this->view('GrandesAreas/gerenciarEstrutura', [
        'grandesAreas' => $grandesAreas,
        'erros' => $validador->getErros(),
        'nome' => '',
        'idEdicao' => $idGrandeArea,
        'nomeEdicao' => $nome
      ]);

      return;
    }

    try {

      $this->service->atualizar(
        $idGrandeArea,
        $nome
      );

      $this->redirect(URL_BASE . '/grandes-areas');
    } catch (\Exception $e) {

      $grandesAreas = $this->service->listarTodos();

      $this->view('GrandesAreas/gerenciarEstrutura', [
        'grandesAreas' => $grandesAreas,
        'erros' => [
          'geral' => $e->getMessage()
        ],
        'nome' => '',
        'idEdicao' => $idGrandeArea,
        'nomeEdicao' => $nome
      ]);
    }
  }

  public function excluir(): void
  {
    $this->autenticacaoRequired();
    $this->adminRequired();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $this->redirect(URL_BASE . '/grandes-areas');
      return;
    }

    $idGrandeArea = (int) ($_POST['idGrandeArea'] ?? 0);

    if ($idGrandeArea <= 0) {
      $this->redirect(URL_BASE . '/grandes-areas');
      return;
    }

    try {

      $this->service->excluir($idGrandeArea);

      $this->redirect(URL_BASE . '/grandes-areas');
    } catch (\Exception $e) {

      $grandesAreas = $this->service->listarTodos();

      $this->view('GrandesAreas/gerenciarEstrutura', [
        'grandesAreas' => $grandesAreas,
        'erros' => [
          'geral' => $e->getMessage()
        ],
        'nome' => '',
        'idEdicao' => null,
        'nomeEdicao' => ''
      ]);
    }
  }
}
