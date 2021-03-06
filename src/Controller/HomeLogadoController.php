<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Swift_Mailer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeLogadoController extends Controller {

    /**
     * @Route("/", name="")
     */
    public function index() {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction(\Swift_Mailer $mailer) {
        $idUsuario = $this->get('session')->get('idUsuario');
        $tipoUsuario = $this->get('session')->get('tipoUsuario');
        if ($idUsuario != null) {
            $usuario = UsuarioController::buscarUsuarioPorId($idUsuario, $this->getDoctrine());
            $this->get('session')->set('nomeUsuario', $usuario->getNome());
            if ($usuario->getFoto() != null) {
                $this->get('session')->set('foto', $usuario->getFoto());
            }
            if ($usuario != false) {
                if ($tipoUsuario == "P") {
                    $profissional = ProfissionalController::buscarProfissionalPorIdUsuario($idUsuario, $this->getDoctrine());
                    $solicitacoesProf = ServicoController::buscarServicoEmEsperaProfissional($profissional->getIdprofissionais(), $this->getDoctrine());
                    $this->get('session')->set('mostrarCasa', $profissional->getMostrarcasa());
                    $this->get('session')->set('mostrarAtual', $profissional->getMostraratual());
                    $this->get('session')->set('statusDisponivel', $profissional->getStatusdisponivel());

                    $servicos = ServicoController::buscarSolicitacoesConcluidasProfAvaliadas($profissional->getIdprofissionais(), $this->getDoctrine());
                    if ($servicos != false) {
                        $totalServicos = count($servicos);
                        $estrelas = $profissional->getSomaavaliacoes() / $totalServicos;
                    } else {
                        $estrelas = 0;
                    }

                    $this->get('session')->set('estrelas', $estrelas);

                    return $this->render('solicitacoesEmEsperaProfissional.html.twig', array("solicitacoesProf" => $solicitacoesProf));
                } else {
                    if ($tipoUsuario == "C") {

                        //verificar se o cliente ja tem uma solicitacao em andamento
                        $idUsuario = $this->get('session')->get('idUsuario');

                        $jatem = UsuarioController::jaTemsolicitacaoCliente($this->getDoctrine(), $idUsuario);
                        if ($jatem) {
                            $this->get('session')->set('jatem', true);

                            return $this->redirectToRoute("solicitacoes");
                        } else {
                            $this->get('session')->set('jatem', false);
                            return $this->redirectToRoute("solicitarProfissional");
                        }
                    } else {
                        //se nao for cliente nem profissional
                    }
                }
            } else {
                return $this->redirectToRoute("logout");
            }
        } else {
            return $this->redirectToRoute("login");
        }
    }

}
