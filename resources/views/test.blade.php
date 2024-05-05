<x-app-layout>
  <x-slot name="header">
    <h3>HEADER</h3>
  </x-slot>
  <ol>
    @php
      $user = auth()->user();
      $client = $user->client;
      $signature = $client->signatures->first();
      $plan = $signature->plan;
      $status = $signature->status;
    @endphp
    <li>Nome: {{ $user->name }}</li>
    <li>Documento: {{ $client->document }}</li>
    <li>Plano: {{ $plan->name.' - '.$plan->short_description }}</li>
    <li>Status da assinatura: {{ $status->name }}</li>    
  </ol>
</x-app-layout>