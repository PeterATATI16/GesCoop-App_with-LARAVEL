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
    <h3 class = "text-center">Liste des partenaires dont la ville est {{$search2}}</h3>
    <table id="part">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Pays</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partenaires as $partenaire)
            <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{$partenaire->nom}}</td>
                <td>{{$partenaire->pays}}</td>
                <td>{{$partenaire->adresse}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>