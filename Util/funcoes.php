<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * recursively create a long directory path
 */
function createPath($path) {
    if (is_dir($path))
        return true;
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
    $return = createPath($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

function Descompactar($url_zip, $dir_install) {
    $json = array("msg" => "Nenhum registro processado!", "hasError" => false);
    $zip = new ZipArchive;
    if ($zip->open($url_zip) === TRUE) {
        $zip->extractTo($dir_install);
        $zip->close();
        $json["msg"] = 'Instalação do pacote '.$url_zip.' no diretório '.$dir_install.' foi concluída!';
        $json["hasError"] = false;
    } else {
        $json["msg"] = 'Não foi possível concluir a instalação';
        $json["hasError"] = true;
    }
    return $json;
}

/**
 * 
 * @param array(servername,username,password) $db_connection
 * @param type $databse_name
 */
function CriaBanco($db_connection, $db_name) {
    $json = array("msg" => "Nenhum registro processado!", "hasError" => false);

    if (!empty($db_name) && isset($db_connection["servername"]) && isset($db_connection["username"]) && isset($db_connection["password"])) {
        // Create connection
        try {
            $conn = new mysqli($db_connection["servername"], $db_connection["username"], $db_connection["password"]);
            // Check connection
            if ($conn->connect_error) {
                $json["msg"] = "Falha na conexão com o seridor: " . $conn->connect_error;
                $json["hasError"] = true;
            }

// Create database
            $sql = "CREATE DATABASE " .$db_name;
            if ($conn->query($sql) === TRUE) {
                $json["msg"] = "Banco de dados " . $db_name . " criado com sucesso!";
                $json["hasError"] = false;
            } else {
                $json["msg"] = "Erro 001: " . $conn->error;
                $json["hasError"] = true;
            }

            $conn->close();
        } catch (Exception $exc) {
            $json["msg"] = "Erro 002: " . $exc->getTraceAsString();
            $json["hasError"] = true;
        }
    } else {
        $json["msg"] = "Error creating database: Parâmetro db_name não foi encontrado";
        $json["hasError"] = true;
    }
    return $json;
}
