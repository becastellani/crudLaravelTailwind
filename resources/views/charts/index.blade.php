<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Gráficos') }}
        </h2>
    </x-slot>

    <div class="flex">
    <div class="flex-auto" id="chart-div"></div>
    <div class="flex-auto">aksddnasdnajsdjnadnjak</div>
    </div>
</x-app-layout>

<head>
    {!! $lava->render('PieChart', 'Products', 'chart-div') !!}
</head>
