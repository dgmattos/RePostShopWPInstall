<?php

header('Content-Type: application/json');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("Util/funcoes.php");

//Sleep para execução dos processo
sleep(rand(3, 5));
$json = array("msg" => "Nenhum registro processado!", "hasError" => false);
if (isset($_GET['passo'])) {
    if ($_GET["passo"] == 1) {
        try {
            //Instala o banco de dados
            //Conexção com banco Usuário default do banco
            $db_connection["servername"] = "localhost";
            $db_connection["username"] = "root";
            $db_connection["password"] = "";

            //Criando banco de dados
            $json = CriaBanco($db_connection, $_POST["dbname"]);
        } catch (Exception $exc) {
            $json["msg"] = "Erro: " . $exc->getMessage();
            $json["hasError"] = true;
        }
    } else if ($_GET["passo"] == 2) {
        try {
            //Cria o diretório
            $dir = "Clientes/" . $_POST["client_name"];
            if (!is_dir($dir)) {
                createPath($dir);
                if (is_dir($dir)) {
                    $json["msg"] = "O diretório " . $_POST["client_name"] . " foi criado com sucesso!";
                    $json["hasError"] = false;
                } else {
                    $json["msg"] = "Erro:Não foi possível criar o diretório. Motivo: Desconhecido!!!";
                    $json["hasError"] = true;
                }
            } else {
                $json["msg"] = "Erro:Não foi possível criar o diretório. Motivo: O diretório " . $_POST["client_name"] . " já existe!";
                $json["hasError"] = true;
            }
        } catch (Exception $exc) {
            $json["msg"] = "Erro: " . $exc->getMessage();
            $json["hasError"] = true;
        }
    } else if ($_GET["passo"] == 3) {
        try {
            //Extrao o wpbase
            $dir = "Clientes/" . $_POST["client_name"];
            if (is_dir($dir)) {
               $json =  Descompactar("wpbase/wordpress-4.9.8-pt_BR.zip", $dir);
            } else {
                $json["msg"] = "Erro:Não foi possível extrar o contéudo. Motivo: O diretório " . $_POST["client_name"] . " não existe!";
                $json["hasError"] = true;
            }
        } catch (Exception $exc) {
            $json["msg"] = "Erro: " . $exc->getMessage();
            $json["hasError"] = true;
        }
    }
} else {
    $json["msg"] = "Não foi possível identificar a etapa!";
    $json["hasError"] = true;
}

echo json_encode($json);
