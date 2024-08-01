<?php 
$estado="";
$estatebtn="";
$colorbtn="";
$estatebloquear="";


$sql="SELECT * FROM usuario WHERE categoria='Leiturista'";
$res=$conn->query($sql);
print"<div class='d-flex justify-content-center align-items-center vh-100'>";
print"<table class='table table-houver table-striped table-bordered>'>";
    print"<tr>";
        print"<th>Nome</th>";
        print"<th>Sexo</th>";
        print"<th>Província</th>";
        print"<th>Bairro</th>";
        print"<th>Quarteirão</th>";
        print"<th>Número de casa</th>";
        print"<th>Email</th>";
        print"<th>Estado</th>";
        print"<th>Acção</th>";
        print"<th>Acção</th>";
    print"</tr>";
    while($row=$res->fetch_object()){
           $row->estate? $estado= "Bloqueado" : $estado="Normal";
           $row->estate? $estatebtn="Desbloquear":$estatebtn="Bloquear";
           $row->estate? $colorbtn='btn btn-success':$colorbtn='btn btn-danger';
           $row->estate? $estatebloquear='Tem a certeza que deseja desbloquear?':$estatebloquear='Tem a certeza que deseja bloquear?';
            print"<tr>";
                    print"<td>$row->nome</td>";
                    print"<td>$row->sexo</td>";
                    print"<td>$row->provincia</td>";
                    print"<td>$row->bairro</td>";
                    print"<td>$row->quarteirao</td>";
                    print"<td>$row->nrcasa</td>";
                    print"<td>$row->email</td>";
                    print"<td>$estado</td>";
                    print"<td><button onclick=\" if(confirm('{$estatebloquear}')){location.href='?page=operaleiturista&acao=bloquear&id=".$row->id."';} else{false;}\"  class='{$colorbtn}' >$estatebtn</button></td>";
                    print"<td><button onclick=\"location.href='?page=editarleiturista&id=".$row->id."';\" class='btn btn-primary'>Editar</button></td>";
            
            print"</tr>";
    }
print"</table>";
print"</div>";


