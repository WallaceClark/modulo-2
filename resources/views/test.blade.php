<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <ol>
    @php
      $user = Auth::user();
      $client = App\Models\Client::where('user_id',$user->id)->first();
      $signature = $client->signatures->first();
      $plan = $signature->plan;
      $status = $signature->status;
    @endphp
    <li>Nome: {{ $user->name }}</li>
    <li>Documento: {{ $client->document }}</li>
    <li>Plano: {{ $plan->name.' - '.$plan->short_description }}</li>
    <li>Status da assinatura: {{ $status->name }}</li>
    <hr>
    <li>Nome: {{ auth()->user()->name }}</li>
    <li>Documento: {{ auth()->user()->client->document }}</li>
    <li>Plano: {{ auth()->user()->client->signatures->first()->plan->name.' - '.auth()->user()->client->signatures->first()->plan->short_description }}</li>
    <li>Status da assinatura: {{ auth()->user()->client->signatures->first()->status->name }}</li>
  </ol>
</body>
</html>
