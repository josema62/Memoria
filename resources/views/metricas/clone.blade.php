@extends('adminlte::page')

@section('title', 'Métricas')

@section('content_header')

<div class="container-fluid">
    <h1>
      Métricas del Proyecto Los Patriarcas
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Métricas</li>
    </ol>
  </div>
  
@stop

@section('content')

<?php
            

$api = new \SolucionTotal\APIGit\API("josema62","eico6262");

$repos = $api->getRepos();
$usuario = $api->getCurrentUser();

echo '<b>Repos del usuario '.$usuario->login.'</b></br>';
foreach($repos as $repo){
    echo $repo->name.'</br>';
}
echo '<hr>';
$issues = $api->getIssues('lgsilvestre', 'PataconAPP_G3_patriarcas', 1);
echo '<b>Issues del repositorio PataconAPP_G3_patriarcas</b></br>';
foreach($issues as $issue){
    echo '['.$issue->number.'] '.$issue->title.' &lt;'.$issue->user->login.'&gt;</br>';
}
echo '<hr>';
echo '<b>Comentarios del Issue 25 en repositorio PataconAPP_G3_patriarcas</b></br>';
$comentarios = $api->getIssueComments('lgsilvestre', 'PataconAPP_G3_patriarcas', 25);

foreach($comentarios as $comentario){
    echo '<b>Autor:</b> '.$comentario->user->login.'</br>';
    echo '<b>Cuerpo:</b> </br>'.$comentario->body.'</br>';
}

set_time_limit(10000);
echo '<hr>';
echo '<b>Branches del repositorio PataconAPP_G3_patriarcas</b></br>';
$pagina = 1; $numero = 1; 
    do { 
    $branches = $api->getBranches('lgsilvestre', 'PataconAPP_G3_patriarcas', $pagina); 
    foreach($branches as $branch){ 
        echo '<hr>';
        echo '<b>Commits repositorio PataconAPP_G3_patriarcas</b></br>';
        $commits = $api->getCommits('lgsilvestre', 'PataconAPP_G3_patriarcas',$branch->commit->sha );
        echo 'La cantidad de comits es'.count($commits);



        }
        echo '<b>Nº '.$numero.'</b></br>'; 
        echo '<b>Nombre:</b> '.$branch->name.'</br>'; 
        echo '<b>SHA:</b> '.$branch->commit->sha.'</br>'; $numero++; } $pagina++; 
        while (!empty($branches));

echo '<hr>';
echo '<b>Commits repositorio PataconAPP_G3_patriarcas</b></br>';
$commits = $api->getCommits('lgsilvestre', 'PataconAPP_G3_patriarcas');

foreach($commits as $commit){
    echo '<b>SHA:</b> '.$commit->sha.'</br>';
    echo '<b>Autor:</b> '.$commit->commit->author->name.'</br>';
}
echo '<hr>';
echo '<b>Commit 1 repositorio PataconAPP_G3_patriarcas</b></br>';

$commit1 = $api->getCommit('lgsilvestre', 'PataconAPP_G3_patriarcas', $commit->sha);
echo '<b>SHA:</b> '.$commit1->sha.'</br>';
echo '<b>Autor:</b> '.$commit->commit->author->name.'</br>';
echo '<b>Estadisticas</b></br>';
echo '<b>Total:</b> '.$commit1->stats->total.'</br>';
echo '<b>Agregan:</b> '.$commit1->stats->additions.'</br>';
echo '<b>Eliminan:</b> '.$commit1->stats->deletions.'</br>';

echo '<hr>';
echo '<b>Registro de eventos PataconAPP_G3_patriarcas</b></br>';



$eventos = $api->getEventsLog('lgsilvestre', 'PataconAPP_G3_patriarcas');
foreach($eventos as $evento){
    if($evento->type == 'IssuesEvent'){
        echo '<b>Evento del tipo IssuesEvent</b></br>';
        echo '<b>Accion:</b> '.$evento->payload->action.'</br>';
        echo '<b>Numero:</b> '.$evento->payload->issue->number.'</br>';
        echo '<b>Titulo:</b> '.$evento->payload->issue->title.'</br>';
    }else if($evento->type == 'IssueCommentEvent'){
        echo '<b>Evento del tipo IssueCommentEvent</b></br>';
        echo '<b>Accion:</b> '.$evento->payload->action.'</br>';
        echo '<b>Numero:</b> '.$evento->payload->issue->number.'</br>';
        echo '<b>Titulo:</b> '.$evento->payload->issue->title.'</br>';
        echo '<b>Comentario:</b> '.$evento->payload->comment->body.'</br>';
    }
}

?>

@stop