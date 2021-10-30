<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <title>Document</title>
</head>
<style>
    #part{
    font-family: Georgia, 'Times New Roman', Times, serif;
    border-collapse: collapse;
    width: 100%;
}
td,th{
    border: 1px solid #ddd;
    padding: 10px;
}
tr:nth-child(even){
    background-color: green;

}
th{
    padding: 12px 0;
    text-align : left;
    background-color: black;
    color: cornsilk;
}
.body{
    background-color: red;
}
h3{
    text-align : center;
}
</style>
<body>
    <h3 class = "text-center">Liste des missions</h3>
    <table id="part">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom(s)</th>
                <th>Destination</th>
                <th>Mode trans</th>
                <th>Date dép</th>
                <th>Date retour</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
            <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{$mission->nom}}</td>
                <td>{{$mission->prenom}}</td>
                <td>{{$mission->destination}}</td>
                <td>{{$mission->mode_transport}}</td>
                <td>{{$mission->date_depart}}</td>
                <td>{{$mission->date_retour}}</td>
                <td>{{$mission->statut}}</td>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>