<!DOCTYPE html>
<html lang="en">
<head>
<title>Clearence</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  
    .wrapper{
        width: 100%;
        margin: auto;
    }
    .reference{
      float: left;
    }
    .set{
      float: right;
    }
    .main{
      clear: both;
    }
    table, th, td {
  border: 1px solid black;
}
</style>

</head>
<body>
<div class="wrapper">
<div class="header">
        <img class="img-profile rounded-circle" src="images/header.png" width="100%" height="150px">
</div>

<!--content-->
<div class="content">
  <div class="reference">
    <h3><strong>Our Ref. No: MoCU/SO/6/8</strong></h3>
  </div>
  <div class="set">
      <h3 style="padding:10px;border:2px solid black;"><strong>{{ Auth::user()->accomodation }}</strong></h3>
  </div>
  <div class="main">
      <h2 style="text-align:center;"><strong>END OF SEMESTER CLEARANCE FORM FOR UNDERGRADUATE STUDENTS</strong></h2>
      <br>
      <p style="text-align:center;">
          <ol>
            <li>  <strong>{{ Auth::user()->name }}</strong></li>
            <li> <strong>{{ Auth::user()->reg_no }}</strong></li>
            <li> <strong>{{ Auth::user()->program }}</strong></li>
            <li>  <strong>{{ Auth::user()->academic_year }}</strong></li>    
            <li>  <strong>{{ Auth::user()->contact }}</strong></li>
          </ol>
      </p>
    <br>
    <p>I ,the undersigned Certify the Clearance status provided in the Table below: </p>
    <br>
    <table style="width:100%">
      <thead>
          <tr>
              <th>S/N</th>
              <th>DEPARTMENT</th>
              <th>OFFICER'S NAME</th>
              <th>DATE</th>
              <th>REMARKS</th>
            </tr>
      </thead>
      <tr>
          <td>1</td>
          <td>Library Readers Services and Circulation</td>
          <td>{{ Auth::user()->verifiedBy  }}</td>
          <td></td>
          <td>N/A</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sports and Recreation Properties</td>
            <td>{{ Auth::user()->verifiedBy  }}</td>
            <td></td>
            <td>N/A</td>
          </tr>
          <tr>
              <td>3</td>
              <td>Hall Properties</td>
              <td>{{ Auth::user()->verifiedBy  }}</td>
              <td></td>
              <td>N/A</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Accounts</td>
                <td>{{ Auth::user()->verifiedBy  }}</td>verifieddate 
                <td>{{ Auth::user()->verifieddate  }}</td>
                <td>N/A</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>MoCUSO</td>
                  <td>{{ Auth::user()->verifiedBy  }}</td>verifieddate 
                  <td></td>
                  <td>N/A</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>MoCUSO</td>
                    <td>{{ Auth::user()->verifiedBy  }}</td>verifieddate 
                    <td></td>
                    <td>N/A</td>
                  </tr>

    </table>
  </div>
  <div class="dude" style="margin:auto;width:150px;height:150px;">
  <img class="img-profile rounded-circle" src="images/seal.png" width="150px" height="150px">
  </div>
</div>
<footer style="margin:auto;width:40%;height:20px;">
  <p>Signed by {{ Auth::user()->name }} 2019</p>
</footer>
</div>
</body>
</html>
