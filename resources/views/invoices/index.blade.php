 {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xs text-gray-800 leading-tight ">
            {{ __('translation.navigation.invoices') }}
        </h2>
    </x-slot>
    <div class="py-12 ">

        <div class="max-w-12x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    @can('create', App\Models\Invoices::class)
                        <x-button primary label="{{ __('invoices.actions.create') }}" href="{{ route('invoices.create') }}" class="justify-self-end"/>
                    @endcan
                </div>
                <livewire:invoices.invoices-table-view />
            </div>
        </div>
    </div>
</x-app-layout> --}}

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Firma</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">nazwa firmy</p>
                        <p class="text-white">lokalizacja firmy</p>
                        <p class="text-white">numer telefonu firmy: 927-237-523</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Numer Faktury: 001</h2>
                    <p class="sub-heading">Data zamówienia: 20-10-2022 </p>
                    <p class="sub-heading">Adres Email: customer@gmail.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Imię i Nazwisko: Jan Kowalski </p>
                    <p class="sub-heading">Adres: j.kowalski@gmail.com</p>
                    <p class="sub-heading">Numer telefonu: 534-562-151 </p>
                    <p class="sub-heading">Miasto: Kalisz </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Pozycje Faktury</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Produkty</th>
                        <th class="w-20">Cena</th>
                        <th class="w-20">Ilość</th>
                        <th class="w-20">Wartość brutto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nazwa produktu</td>
                        <td>10</td>
                        <td>1</td>
                        <td>10 PLN</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Stawka VAT</td>
                        <td> 23%</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Razem</td>
                        <td> 10 PLN</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Sposób płatności: przelew w terminie</h3>
            <h3 class="heading">Termin płatności: 15-10-2022</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Firma. All rights reserved. 
                <a href="https://www.Firma.com/" class="float-right">www.Firma.com</a>
            </p>
        </div>      
    </div>      

</body>
</html>
