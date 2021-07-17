<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
width: 100%;


}


/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
}
table, th, td {
  border: 1px solid black;
}

/* Style the footer */



</style>

</head>
<body>

<header>
           <img class="img-profile rounded-circle" src="images/header.png" width="100%" height="150px">
    
</header>

<section>

  
  <article>
    <h3 style="text-align:center;">List of Library Debtors</h3>
    @if(count($debt)>0)
        @foreach ( $debt as $row )
        <table style="width:100%">
            <tr>
                    <th>Reg</th>
                    <th>Student Name</th>
                    <th>Program</th>
                    <th>Admission</th>
                    <th>Debt</th>
                    <th>Amount</th>
            </tr>
            <tr>
                    <td>{{ $row->reg_no }}</td>
                    <td>{{$row->name }}</td>
                    <td>{{ $row->program }}</td>
                    <td>{{ $row->academic_year }}</td>
                    <td>{{ $row->feename }}</td>
                    <td>{{ $row->amount }}</td>
            </tr>
          </table>
          @endforeach
          @else
          <div class="alert alert-primary" role="alert">
              Nothing Here!
          </div>
             @endif
  </article>
</section>

<footer style="text-align:center;bottom:100%;">
  <p>Printed by {{ Auth::user()->name }} 2019</p>
</footer>

</body>
</html>
