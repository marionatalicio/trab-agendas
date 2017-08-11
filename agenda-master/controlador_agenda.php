<?php

    function transformar_JSON_Array (string $nome){

        $arquivoJSON = file_get_contents($nome, true);

        $arquivoJSON = json_decode($arquivoJSON , true) ;

        return $arquivoJSON;
    }

    function transformar_Array_JSON(array $array, string $nome){
        $dados_json = json_encode($array, JSON_PRETTY_PRINT);

        file_put_contents ($nome , $dados_json);
    }

    //CADASTRAR CONTATO
    function cadastrar( ){

        $contatos = transformar_JSON_Array("contatos.json");

        $contato =[
            "id"       => uniqid(),
            "nome"     => $_POST['nome'],
            "email"    => $_POST['email'],
            "telefone" => $_POST['telefone']
        ];

        array_push($contatos, $contato);


        transformar_Array_JSON($contatos, "contatos.json");

        header('Location: index.php');

    }// fim cadastrar

    //print_r($dados_json);
    function pegarContatos(){

        return transformar_JSON_Array('contatos.json');
    }

    function editarContato($valorBuscado){

        $contatos = transformar_JSON_Array("contatos.json");

        foreach ($contatos as $contato){
            if ($contato['id'] == $valorBuscado){
              return $contato;
            }
        }

    }

    function excluirContato($idContato){

        $contatos = transformar_JSON_Array("contatos.json");

        foreach ($contatos as $posicao => $contato){
            if ($contato['id'] == $idContato){
                unset($contatos[$posicao]);
                break;
            }
        }

        transformar_Array_JSON($contatos, "contatos.json");
        header('Location: index.php');
    }

    function editadoContato($idEditado){
        $contatos = transformar_JSON_Array("contatos.json");

        foreach ($contatos as $posicao => $contato){
            if ($contato['id'] == $idEditado){

                $contato['nome']     = $_POST['nome'];
                $contato['email']    = $_POST['email'];
                $contato['telefone'] = $_POST['telefone'];

                $contatos[$posicao] = $contato;
            }
        }
        transformar_Array_JSON($contatos, "contatos.json");

        header('Location: index.php');

    }

    function buscarContato($nome){
        
        $nome = strtolower($nome);
        
        $contatos = transformar_JSON_Array("contatos.json");
        $contatosEncontrados = [];

        foreach ($contatos as $contato){
            if (strtolower($contato['nome']) == $nome){

                $contatosEncontrados[] = $contato;
            }
        }
        
        return $contatosEncontrados;

    }

    //ROTAS DA URL
    if($_GET['acao'] == 'cadastrar'){
        cadastrar();
    } elseif($_GET['acao'] == 'excluir'){
        excluirContato($_GET['id']);
    }
    elseif ($_GET['acao'] == 'editar'){
        editarContato($_GET['id']);
    }
    elseif ($_GET['acao'] == 'editado'){
        editadoContato($_POST['id']);
    }