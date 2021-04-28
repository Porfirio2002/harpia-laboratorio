<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipantesRequest;
use App\Models\ParticipantesTreinamento;


class ParticipantesTreinamentoController extends Controller
{  

        public function index(Request $request) {
            $pesquisa = $request->pesquisa;

            if($pesquisa != '') {
            $participantes_treinamento = ParticipantesTreinamento::where('titulo', 'like', "%".$pesquisa."%")->paginate(1000);

            } else {
            $participantes_treinamento = ParticipantesTreinamento::paginate(10);
            }
            return view('participantes_treinamento.index', compact('participantes_treinamento', 'pesquisa'));
        } 
        public function novo() {

            $numero = ParticipantesTreinamento::select('numero')
            ->groupBy('numero')
            ->get();
            $setor = ParticipantesTreinamento::select('setor')
            ->groupBy('setor')
            ->get();
            $nome = ParticipantesTreinamento::select('nome')
            ->groupBy('nome')
            ->get();
            $assinatura = ParticipantesTreinamento::select('assinatura')
            ->groupBy('assinatura')
            ->get();
        return view('participantes_treinamento.form', compact('numero', 'setor', 'nome', 'assinatura'));
        }
        public function editar($id) {


            $participantes_treinamento = ParticipantesTreinamento::find($id);
            $numero = ParticipantesTreinamento::select('numero')
                                    ->groupBy('numero')
                                    ->get();
            $setor = ParticipantesTreinamento::select('setor')
                                    ->groupBy('setor')
                                    ->get();
            $nome = ParticipantesTreinamento::select('nome')
                                    ->groupBy('nome')
                                    ->get();
             $assinatura = ParticipantesTreinamento::select('assinatura')
                                     ->groupBy('assinatura')
                                     ->get();
            return view('participantes_treinamento.form', compact('numero', 'setor', 'nome', 'assinatura'));
        }
        public function salvar(Request $request) {

           // $ehvalido = $request->validated();

            if($request->id != '') {
                $participantes_treinamento = ParticipantesTreinamento::find($request->id);
                $participantes_treinamento->update($request->all());
            } else {
                $participantes_treinamento = ParticipantesTreinamento::create($request->all());
            }
            return redirect('/participantes_treinamento/editar/'. $participantes_treinamento->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $participantes_treinamento = ParticipantesTreinamento::find($id);
            if(!empty($participantes_treinamento)){
                $participantes_treinamento->delete();
                return redirect('participantes_treinamento')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('participantes_treinamento')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $participantes_treinamento = ParticipantesTreinamento::paginate();

        return response()->json($participantes_treinamento, 200);
    }
        
}
