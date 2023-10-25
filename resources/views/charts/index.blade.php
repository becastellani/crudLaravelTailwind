<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
    <div class="flex-auto mt-10 ml-10" id="chart-div"></div>
    <div class="flex-auto">
        <div class="max-w-md rounded overflow-hidden shadow-lg mt-40">
            <div class="px-6 py-4">
                <h1 class="font-bold text-2xl">Total Gasto: R$ {{ number_format($totalGasto, 2, ',', '.') }}</h1>
                <h1 class="font-bold text-2xl">Possível faturamento: R$ {{ number_format($possivelFaturamento, 2, ',', '.') }}</h1>
                

                <div class="px-6 pt-4 pb-2 flex justify-center">
                    <span class="text-xl font-bold
                        @if($possivelLucro > 100)
                            text-green-500
                        @elseif($possivelLucro >= 0)
                            text-yellow-500
                        @else
                            text-red-500
                        @endif">
                        R$ {{ number_format(abs($possivelLucro), 2, ',', '.') }} {{ $possivelLucro >= 0 ? 'possível de lucro' : 'de prejuízo' }}
                    </span>
                </div>
                
            
            
            </div>
          
    </div>
</x-app-layout>

<head>
    {!! $lava->render('PieChart', 'Products', 'chart-div') !!}
</head>
