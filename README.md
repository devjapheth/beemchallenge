# beemchallenge

**CHALLENGE DETAILS**


Theme: Solving problems for SMESSmall and medium sized enterprises and organizations make up most of the businesses and Beem users across Africa. For example, these organizations can be retail shops, service businesses, agencies, schools, religious institutions. 

The challenge for these organizations is that their customers are increasingly moving online, mobile or digital. Some of them may already have a website or an ecommerce shop or presence on social media (Facebook, Instagram, WhatsApp).

These organizations need help to improve their productivity as well as how to communicate and engage better with their customers or sell their products or services more easily on these digital platforms. Your challenge is to develop something that will help these organizations and SMEs. 

**This can either be a standalone app or tool or it can be an integration or plugin for an existing commonly used open source platform.**


**HOW MY PROJECT FIT**


As we know that Technology comes to make communication easy and effective more that it was before.. In Education there are things that needs to be done especially in schools, collages and universities that might help Parents, and Students to get information on time. 

For Example most of Parents now are Busy with their Jobs which leads to forget to follow up their childrens school performances and it is very bad. But what if Parents get SMS direct from the Schools which shows the performance of their childrens in school..Yes they will be attention everyday and it will help more on parents to know ways to help their children perform well in school etc

**My Project -  uses SMS API from Beem, and the API is configured to send Bulk SMS on All Students reminding them to pay their bills before sitting in the Examination**


**API USED**


SMS API --- https://beem.africa/sms-api/



**HOW MY SYSTEM WORKS**

This is a digital clearance system it was a final project for my final year for my IT Degree in 2019, This System Interects between Registar Office, Account Department, Library and Students, where by the main objective was to change from manual clearance system to digital to help student save more time, but also to make sure that accounts dpt , registar office and library to never loose their records.

For the Part that I integrate SMS API is when an Accountants needs to remind All student that did not pay a certain fee to pay before sitting for their exams, and it is very effective rather than putting names on notice boards, and we know that not everyone prefer to visit and read announcements on the boards.

So the Accountant will send a Bulk SMS to all Student and the SMS will be like " Hello John Doe Kindly you are Required to pay Tshs 300,000/= for Tution Fee before Sitting for your Exams. Note that Student who did not pay on time will be disqulified. Thank you"

- This will help a lot of student and parents to get the right information at the right time



Project Link in Google Drive (https://drive.google.com/file/d/1VSbb5yrr37fWi55lVqZNWEYkWu-JNu1m/view?usp=sharing)
Database Name:Clearence

**This is my login details (Accounts)**

email: accounts@beem.com
password: mocu1234

for Demonstration how it works check this video ----- https://www.youtube.com/watch?v=tMO82GkNNic




**Deployment Steps  **
- I created a Controllers that Pass Data from the Database Table to the View/ Blade Template which will display all students with debtors record.
- On the View i use the Value from the database, blade engine make it easier for me to get them as varible that will hold values for me to pass them on the SMS header.
- For each method in Blade view allow the API to send SMS for all students..

Here is the code 


<div class="card shadow mb-4">
  <div class="card-header py-3 dark">
    <h6 class="m-0 font-weight-bold">List of Students</h6></div>
  
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
