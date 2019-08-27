<?php

namespace App\Http\Controllers\Telefones;

use App\Models\Telefones\Departamento;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Controllers\Controller;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function relatorioTodosTelefones(){
        $departamentos = Departamento::select('*')->orderBy('NomeDeparmento')->get();
        $total = Departamento::select('*')->count();
        //dd($departamentos);
        $pdf = PDF::loadView('Telefones.Departamento.Relatorios.RelatoriosTelefones', compact('departamentos', 'total'));          
            return $pdf->stream('listaTodosTelefones.pdf');     
    }

    public function index()
    {
        //$departamentos = Departamento::select('*')->paginate(10);
        $departamentos = Departamento::select('*')->get();
        //return response()->json($departamentos);
        //return view('Departamento.index');
        //$data = Data::all ();
        return view('Telefones.Departamento.index', compact('departamentos'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Departamento::create($input);

        return redirect('departamento/index');
    }

    public function show($id)
    {
        $departamento = Departamento::select('NomeDeparmento', 'Secretaria', 'Telefone', 'Externo')->where('id', '=', $id)->get();
        //return response()->json($departamento);
        //return json_encode($departamento);
        return response()->json($departamento);
    }

    public function edit($id)
    {
        $departamento = Departamento::select('id', 'NomeDeparmento', 'Secretaria', 'Telefone', 'Externo')->where('id', '=', $id)->get();
        return response()->json($departamento);
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::find($id)->update($request->all());
        return redirect('departamento/index');
    }

    public function destroy($id)
    {
        Departamento::find($id)->delete();

        return redirect('departamento/index');
    }

    public function unathorized(){
        return view('auth.unathorized');
    }
}
