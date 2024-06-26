<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex justify-center" style="margin-bottom: 50px; margin-top:20px; margin-left:100px">
        <div class="text-center" style="width: 20rem;">
            <div style="width:50%; padding:1rem;border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
              <h2 class="card-title"> Total Users</h2>
              <p class="card-text">{{$totalUsers[0]['total_number']}}</p>
            </div>
          </div>
        <div class="text-center" style="width: 20rem;">
            <div style="width:50%; padding:1rem;border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
              <h2 class="card-title">Total Bins</h2>
              <p class="card-text">{{$totalBins[0]['total_bins']}}</p>
            </div>
          </div>
        <div class="text-center" style="width: 20rem;">
            <div style="width:50%; padding:1rem;border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
              <h2 class="card-title">Average Weight</h2>
              <p class="card-text">{{$averageWeight[0]['average_weight']}}</p>   
            </div>
          </div>
        <div class="text-center" style="width: 20rem;">
            <div style="width:50%; padding:1rem;border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
              <h2 class="card-title">Total Groups</h2>
              <p class="card-text">{{$totalGroups[0]['totalGroups']}}</p>   
            </div>
          </div>
    </div>
<div class="flex justify-center">
    <x-secondary-button>Daily</x-secondary-button>
    <x-secondary-button>Monthly</x-secondary-button>
    <x-secondary-button>Yearly</x-secondary-button>
</div>
<div style="display:grid; grid-template-columns:1fr 0.75fr 1fr 1fr;">
    <div style=" padding:1rem;border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
        <canvas id="barChart"></canvas>
    </div>
    <div style=" border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg ">
        <canvas id="pieChart"></canvas>
    </div> 
     <div style=" border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg">
        <canvas id="barChart2"></canvas>
    </div>
    <div style=" border: 1px solid #E5E7EB; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="bg-white rounded-lg">
        <canvas id="myChart"></canvas>
    </div>
</div> 
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Total Weight Per Day',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>  
        <script>
            var ctx = document.getElementById('pieChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($data2['labels']),
                    datasets: [{
                        label:'Total Weight For Each Type',
                        data: @json($data2['datasets']),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 0.7)',
                        ],
                        borderWidth: 1
                    }]
                },
            });
        </script>
            <script>
                var ctx = document.getElementById('barChart2').getContext('2d');
                var myChart3 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($data3['labels']),
                        datasets: [{
                            label: 'Number Of Visits',
                            data: @json($data3['datasets']),
                            borderColor: '#333',
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
            <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data4['labels']),
                datasets: [{
                    label: 'Points per Month',
                    data: ['350' , '550' , '600'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill:false
                }]
            },
        });
 </script>
</x-app-layout>
