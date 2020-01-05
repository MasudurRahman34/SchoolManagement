<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
    <style>
        .content-wrapper{
            background: #FFF;
        }
        .invoice-header{
            background: #f7f7f7;
            padding: 10px 20px 10px 20px;
            border-bottom: 1px solid gray;
        }
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
            }
    </style>

</head>
<body>
       <div class="content-wrapper">
        <div class="row">
                <div class="col-md-12">
                    <!-- {{-- @foreach ($students as $student) --}} -->
                    <div class="float-left">
                    <h5 class="text-left">Date: 1-05-2020</h5>
                    </div>
                    <div class="float-right">
                      <a class="" href="{{route('admissison.index')}}">New Admission</a>
                    </div>
                    <div class="text-center m-5">
                        <h1 class="text-warning">{{$students->schoolBranch->nameOfTheInstitution}}</h1>
                    </div>
                </div>
            </div>
           <div class="invoice-header">
                <div class="float-left site-left">Form
                    <p>{{Auth::guard('web')->user()->name}}</p>
                    <p>{{Auth::guard('web')->user()->designation}}</p>
                    <p>Address: {{Auth::guard('web')->user()->address}}</p>
                    <p>Email: {{Auth::guard('web')->user()->email}}</p>
                </div>
                <div class="float-right site-right">To
                    <p>{{$students->firstName }} {{$students->lastName}}</p>
                    <p>{{$students->Section->classes->className}},{{$students->group}}</p>
                    <p>Section: {{$students->Section->sectionName}}</p>
                    <p>{{$students->Section->sessionYear->sessionYear}},{{$students->blood}}</p>
                    <p>{{$students->birthDate}},{{$students->type}}</p>
                    <p>{{$students->mobile}}</p>
                    <p>{{$students->email}}</p>
                </div>
           </div>
        <div class=clearfix></div>
        </div>
    <br>
    <table id="customers">
  <tr>
    <th>Fee Name</th>
    <th>Paid Month</th>
    <th>Amount</th>
    <th>Due</th>
    <th>Total Amount</th>
  </tr>
  @foreach($students->feeCollection as $feeCollection)
    <tr>
        <td>{{$feeCollection->Fee->name}}</td>
        <td>{{$feeCollection->paidMonth}}</td>
        <td>{{$feeCollection->amount}}</td>
        <td>{{$feeCollection->due}}</td>
        <td>{{$feeCollection->totalAmount}}</td>
    </tr>
  @endforeach
  
</table>
    <!-- {{-- @endforeach --}} -->
    <h6 class="text-center m-5 text-success">Thanks You For Your Admission !! <br></h6>
    <a class="float-right" href="http://www.sms.quadinfoltd.com/">http://www.sms.quadinfoltd.com/</a>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
