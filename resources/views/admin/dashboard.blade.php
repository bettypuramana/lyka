@extends('layouts.admin.admin_layout')
@section('title')
    Dashboard - Lyka
@endsection
@section('content')
<style>
    #barChart {
  width: 100% !important;
  height: 250px !important;
}

</style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-sm-flex align-items-baseline report-summary-header">
                                    <h5 class="font-weight-semibold">This month enquiry</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row report-inner-cards-wrapper">
                            <div class=" col-md -6 col-xl report-inner-card">
                                <div class="inner-card-text">
                                    <span class="report-title">Package</span>
                                    <h4>{{$packageenquirymonth}}</h4>
                                    {{-- <span class="report-count"> 2 Reports</span> --}}
                                </div>
                                <div class="inner-card-icon bg-success">
                                    <i class="icon-rocket"></i>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl report-inner-card">
                                <div class="inner-card-text">
                                    <span class="report-title">Visa</span>
                                    <h4>{{$visaenquirymonth}}</h4>
                                    {{-- <span class="report-count"> 3 Reports</span> --}}
                                </div>
                                <div class="inner-card-icon bg-danger">
                                    <i class="icon-briefcase"></i>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl report-inner-card">
                                <div class="inner-card-text">
                                    <span class="report-title">Contact</span>
                                    <h4>{{$contactenquirymonth}}</h4>
                                    {{-- <span class="report-count"> 5 Reports</span> --}}
                                </div>
                                <div class="inner-card-icon bg-warning">
                                    <i class="icon-globe-alt"></i>
                                </div>
                            </div>
                              <div class="col-md-6 col-xl report-inner-card">
                                <div class="inner-card-text">
                                    <span class="report-title">Whatsapp Click</span>
                                    <h4>{{$total_clicks}}</h4>
                                    {{-- <span class="report-count"> 5 Reports</span> --}}
                                </div>
                                <div class="inner-card-icon bg-success">
                                    <i class="icon-mouse"></i>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="d-sm-flex align-items-baseline report-summary-header">
                                    <h5 class="font-weight-semibold">Whats App Clicks</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="barChart" style="height:200px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Enquiries</h4>
                        <div class="aligner-wrapper py-3">
                            <div class="doughnut-chart-height">
                                <canvas id="enquiriesChart" height="150"></canvas>
                            </div>
                            <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                                <h2 class="text-center mb-0 font-weight-bold">{{$totalenquiry}}</h2>
                                <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Enquiries</small>
                            </div>
                        </div>
                        <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                            <div class="d-flex">
                                <span class="square-indicator bg-danger ms-2"></span>
                                <p class="mb-0 ms-2">Package</p>
                            </div>
                            <div class="d-flex">
                                <span class="square-indicator bg-success ms-2"></span>
                                <p class="mb-0 ms-2">Visa</p>
                            </div>
                            <div class="d-flex">
                                <span class="square-indicator bg-warning ms-2"></span>
                                <p class="mb-0 ms-2">Contact</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick Action Toolbar Starts-->

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">Package Enquiry</h4>
                            <a href="{{route('admin.package_enquiries')}}" class="text-dark ms-auto mb-3 mb-sm-0"> View all</a>
                        </div>
                        <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Travel Date</th>
                                        <th>Destination</th>
                                        <th>Passengers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       @if (!empty($enquiries))
                                            @foreach ($enquiries as $index => $row)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td>{{$row->phone}}</td>
                                                    <td>{{$row->travel_date}}</td>
                                                    <td>{{$row->country_name}}</td>
                                                    <td>{{$row->passengers}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
<script>
    if ($("#enquiriesChart").length) {
      const doughnutChartCanvas = document.getElementById('enquiriesChart');
      new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: {
          labels: [
            'Package',
            'Visa',
            'Contact'
          ],
          datasets: [{
              data: [{{$packageenquirycount }},
                    {{ $visaenquirycount }},
                    {{ $contactenquirycount }}],
              backgroundColor: [
                '#ff4d6b',
                '#38ce3c',
                '#ffca00'


              ],
              borderColor: ['#ff4d6b','#38ce3c','#ffca00']
          }]
        },
        options: {
          cutout: 75,
          animationEasing: "easeOutBounce",
          animateRotate: true,
          animateScale: false,
          responsive: true,
          maintainAspectRatio: true,
          showScale: false,
          legend: false,
          plugins: {
            legend: {
                display: false,
            }
          }
        },
      })
    }
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("barChart").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: @json($labels),
            datasets: [{
                label: "Clicks",
                data: @json($data),
                backgroundColor: "rgba(54, 162, 235, 0.7)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1,
                barThickness: 30,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            }
        }
    });
});
</script>
@endsection
