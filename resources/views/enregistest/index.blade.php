@extends('layouts.app')

@section('content')
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 120px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        h1{
            margin-top: 50px;
            font-size: 30px;
        }
    </style>

    <table>
        <thead>
            <h1>Liste entregistements des Tests
            </h1>
            <tr>
                <th>ID</th>
                <th>ID du développeur</th>
                <th>Email du développeur</th>
                <th>ID du test</th>
                <th>Mot clé du test</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($enregistests as $enregistest)
            <tr>
                <td>{{ $enregistest->id }}</td>
                <td>{{ $enregistest->developer_id }}</td>
                <td>{{ $enregistest->developerEmail }}</td> 
                <td>{{ $enregistest->test_id }}</td>
                <td>{{ $enregistest->developerPassword }}</td>
               
               
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
