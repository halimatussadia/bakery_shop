<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard</title>

   <!-- Bootstrap core CSS -->

    <link href="{{url('/css/app.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
    <link href="{{url('/css/dashboard.css')}}" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">  -->
    <link href="{{url('/css/jquery.dataTables.css')}}" rel="stylesheet">
  
  </head>

  <body>

   @include('backend.partials.navbar')

    <div class="container-fluid">
      
      <div class="row">

        @include('backend.partials.sidebar')
        

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @yield('content')
        </main>

      </div>

   </div>   

    <!-- Bootsrap core JavaScript
    ================================================== -->
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
     <script src="{{ asset('/js/popper.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> -->
    <!-- Icons -->
    <script src="{{ asset('/js/feather.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.21.0/feather.min.js"></script> -->
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
     <script src="{{ asset('/js/Chart.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> -->
    <!--
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    -->
@yield('script')

  </body>
</html>