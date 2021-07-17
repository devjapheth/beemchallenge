@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
      </nav>
@endsection
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> List of Debtors</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">

          <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>Back</a>

        
            &nbsp;
            <a href="{{url('/accpdf')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;background:black;"><i class="fas fa-print"></i>&nbsp;Print</a>
        </div>
     </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 dark">
    <h6 class="m-0 font-weight-bold">List of Students</h6>
  </div>
  <div class="card-body">
    
    <form method="GET">
      <input type="submit" name="abc" value="Remind All Student to Pay" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(250, 250, 250);font-weight:bold;background:green !important"> 
    </form>
    <br>
    <div class="table-responsive">
      <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Reg No</th>
            <th>Student Name</th>
            <th>Program</th>
            <th>Phone Number</th>
            <th>Fee Type</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $debt as $row )
            <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{$row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->contact }}</td>
            <td>{{ $row->feename }}</td>
            <td>{{ $row->amount }}</td>
          </tr>

        <?php
          if(isset($_GET['abc'])){

                    $api_key='2fc9e2bbbb34c983';
                    $secret_key = 'MTIzZDQyOTA2ODRhZDAzMjk3ZWM0MzI3Zjc5MjlmZWNmNWMxYjlhOGM2OTNjNTg4ODMzOGVlNzVkZWRjMzg4Yg==';

                    $postData = array(
                          'source_addr' => 'INFO',
                          'encoding'=>0,
                          'schedule_time' => '',
                          'message' => "Hello $row->name with Reg No:$row->reg_no, Kindly you are Required by the university to pay $row->amount  for $row->feename Before the Sitting for your Exams",
                          'recipients' => [array('recipient_id' => '1','dest_addr'=>"$row->contact")]
                      );
                      
                      $Url ='https://apisms.beem.africa/v1/send';
                      
                      $ch = curl_init($Url);
                      error_reporting(E_ALL);
                      ini_set('display_errors', 1);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                      curl_setopt_array($ch, array(
                          CURLOPT_POST => TRUE,
                          CURLOPT_RETURNTRANSFER => TRUE,
                          CURLOPT_HTTPHEADER => array(
                              'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                              'Content-Type: application/json'
                          ),
                          CURLOPT_POSTFIELDS => json_encode($postData)
                      ));
                      
                      $response = curl_exec($ch);
                      
                      if($response === FALSE){
                              echo $response;
                      
                          die(curl_error($ch));
                      }
                      //var_dump($response);
                      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Massage Send Successfully
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                      
                      
                
          }

        ?>
          @endforeach

        </tbody>
      </table>
  


      @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          @endif
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




@endsection
