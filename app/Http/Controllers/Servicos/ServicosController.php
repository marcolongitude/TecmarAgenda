<?php

namespace App\Http\Controllers\Servicos;

use App\Models\Servicos\Servico;
use App\Models\Telefones\Departamento;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServicosController extends Controller
{

    public function graficoServMes()
    {

        $janeiro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-01-01', '2018-01-31'))             
            ->count();
        $fevereiro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-02-01', '2018-02-28'))             
            ->count();
        $marco = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-03-01', '2018-03-31'))             
            ->count();
        $abril = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-04-01', '2018-04-30'))             
            ->count();
        $maio = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-05-01', '2018-05-31'))             
            ->count();
        $junho = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-06-01', '2018-06-30'))             
            ->count();
        $julho = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-07-01', '2018-07-31'))             
            ->count();
        $agosto = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-08-01', '2018-08-31'))             
            ->count();
        $setembro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-09-01', '2018-09-30'))             
            ->count();
        $outubro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-10-01', '2018-10-31'))             
            ->count();
        $novembro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-11-01', '2018-11-30'))             
            ->count();
        $dezembro = DB::table('servicos')           
            ->whereBetween('servicos.dataServico', array('2018-12-01', '2018-12-31'))             
            ->count();

        return view('Graficos.graficoNumServMes', [
                                                    'janeiro'=>$janeiro, 
                                                    'fevereiro'=>$fevereiro,
                                                    'marco'=>$marco,
                                                    'abril'=>$abril,
                                                    'maio'=>$maio,
                                                    'junho'=>$junho,
                                                    'julho'=>$julho,
                                                    'agosto'=>$agosto,
                                                    'setembro'=>$setembro,
                                                    'outubro'=>$outubro,
                                                    'novembro'=>$novembro,
                                                    'dezembro'=>$dezembro

                                                  ]);
    }
        
    public function relatorioData(Request $request)
    {
        $departamento_id = $request->input('departamento_id');
        $dataInicial = $request->input('dataServicoInicial');
        $dataFinal = $request->input('dataServicoFinal');
        //$input = $request->all();
        //dd($departamento_id);

        if ($departamento_id == 0) {
            $servicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')    
            ->whereBetween('servicos.dataServico', array($dataInicial, $dataFinal))  
            ->orderBy('servicos.dataServico', 'desc')     
            ->get();


            $totalServicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')    
            ->whereBetween('servicos.dataServico', array($dataInicial, $dataFinal))  
            ->orderBy('servicos.dataServico', 'desc')     
            ->count();
            //dd($totalServicos);

            $total = array("total" => $totalServicos);
            //dd($total);
            $pdf = PDF::loadView('Servicos.relatorios.servicosPorData', compact('servicos', 'total', 'dataInicial', 'dataFinal'));          
            return $pdf->stream('listaServicosDataDepartamentos.pdf');        

        }else{
            $servicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')
            ->where('departamentos.id', '=', $departamento_id)
            ->whereBetween('servicos.dataServico', array($dataInicial, $dataFinal))            
            ->get();
            //dd($servicos);

            $totalServicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')    
            ->where('departamentos.id', '=', $departamento_id)
            ->whereBetween('servicos.dataServico', array($dataInicial, $dataFinal))                  
            ->count();
            //dd($totalServicos);

            $total = array("total" => $totalServicos);
            //dd($total);

            $pdf = PDF::loadView('Servicos.relatorios.servicosPorData', compact('servicos', 'total', 'dataInicial', 'dataFinal'));          
            return $pdf->stream('listaServicosDataDepartamentos.pdf');        
        }

        
    }

    public function pesquisaData()
    {
        $departamentos = Departamento::with('servicos')->get();
        return view('Servicos.pesquisaServicosData', compact('departamentos'));
    }

    public function imprimirOS($id)
    {
        
        $servico = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')
            ->where('servicos.id', '=', $id)
            ->get();
        //dd($servico);
        $pdf = PDF::loadView('Servicos.relatorios.servicosPdf', compact('servico'));          
        return $pdf->stream('listaServicosDepartamentos.pdf');         

    }

    // Método que lista departamentos para através dele visualizar os serviços contidos
    public function index()
    {
        $departamentos = Departamento::with('servicos')->get();
        // Verifica se o usuário logado poderá visualizar essa página
        if (!Auth::check() || Auth::user()->tipo == 'comum') {
            return redirect('/auth/unathorized');
        }
        return view('Servicos.index', compact('departamentos', 'servicos'));
    }

    public function todosServicos()
    {
        $servicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')
            ->orderBy('servicos.created_at', 'desc')
            ->get();

        return view('Servicos.listaServicos', compact('servicos'));

    }

    public function servicosAgendados()
    {
        $servicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')
            ->where('servicos.tipoServico', '=', 1)
            ->orderBy('servicos.created_at', 'desc')
            ->get();

        return view('Servicos.servicosAgendados', compact('servicos'));
    }

    public function showServicoDetail($id)
    {
        $servicos = Servico::select('descricao', 'created_at')->where('id', '=', $id)->get();
        return response()->json($servicos);
    }

    //Método que cria um serviço
    public function store(Request $request)
    {
        // Verifica se o usuário logado pode acessar essa página
        if (!Auth::check() || Auth::user()->tipo == 'comum') {
            return redirect('/auth/unathorized');
        }

        $input = $request->all();
        
        Servico::create($input);

        return redirect('servico/index');
    }

    // Método que mostra os serviços cadastrados
    public function showServicosDepartamentos($id)
    {
        $departamento = Departamento::select('NomeDeparmento')->where('id', '=', $id)->get();
        //dd($departamento);

        $servicos = Servico::select('*')->where('departamento_id', '=', $id)->get();

        return view('Servicos.listaServicosDepartamentos', compact('servicos', 'departamento'));
    }

    // Método que busca um serviço e atualiza o campo tipoServico para 0, que é relacionado ao serviço realiado.
    public function showServicosFinal($id)
    {
        Servico::find($id)->update(['tipoServico' => 0]);

        $servicos = DB::table('servicos')
            ->join('departamentos', 'departamentos.id', '=', 'servicos.departamento_id')
            ->select('servicos.*', 'departamentos.NomeDeparmento')
            ->where('servicos.tipoServico', '=', 1)
            ->orderBy('servicos.created_at', 'desc')
            ->get();

        return view('Servicos.servicosAgendados', compact('servicos'));
    }

    // Método que exclui um serviço desejado
    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->tipo == 'comum') {
            return redirect('/auth/unathorized');
        }

        Servico::find($id)->delete();
        return redirect('servico/index');
    }
}
