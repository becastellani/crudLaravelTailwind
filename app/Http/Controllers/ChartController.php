<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;


class ChartController extends Controller
{
    public function graficoPizza()
        {
            $totalGasto = Product::selectRaw('SUM(custo * quantidade) as total_gasto')->value('total_gasto');

            $possivelFaturamento = Product::selectRaw('SUM(preco * quantidade) as possivel_faturamento')->value('possivel_faturamento');

            $possivelLucro = $possivelFaturamento - $totalGasto;
            

            $lava = new Lavacharts();
        //Query para buscar categorias
            $data = Product::join('categorias', 'products.category_id', '=', 'categorias.id')
                ->select('categorias.nome as category_name', DB::raw('count(*) as quantity'))
                ->groupBy('category_name')
                ->get();

            $dataTable = $lava->DataTable();
            $dataTable->addStringColumn('Category');
            $dataTable->addNumberColumn('Quantidade');

            //Aqui to inserindo os dados
            foreach ($data as $item) {
                $dataTable->addRow([$item->category_name, $item->quantity]);
            }
            $chart = $lava->PieChart('Products', $dataTable, [
                'title' => 'Produtos por categoria',
                'height' => 400,
                'width' => 600,
            ]);
            return view('charts.index', compact('lava','totalGasto','possivelFaturamento','possivelLucro'));
        }





}
