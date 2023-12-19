@extends('layouts.admin')

@section('content')

 <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Barang</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journals"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $stokBarang }} PCS</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $totalBarang }}</span> <span class="text-muted small pt-2 ps-1">Jenis Barang</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Aset</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalAset }}</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $totalBarang }}</span> <span class="text-muted small pt-2 ps-1">Jenis Barang</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Kondisi <span>| Barang</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-ui-checks"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalKondisiBaru }} Baik</h6>
                      <span class="text-danger small pt-1 fw-bold">{{ $totalKondisiBaik }}</span> <span class="text-muted small pt-2 ps-1">Merupakan Barang Baru</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Rekapan <span>| Transaksi  </span></h5>
  
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">Waktu Transaksi</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Brand</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($transaksi as $data )
                       <tr>
                        <th scope="row">{{ $data->updated_at }}  </th>
                        <td>{{ $data->barang->nama_barang }}</td>
                        <td>{{ $data->barang->brand }}</a></td>
                        <td>{{ $data->jumlah }} PCS</td>
                        <td>
                          <span class="badge 
                          {{ str_contains(get_class($data), 'AddIn') ? 'bg-warning text-dark' : (str_contains(get_class($data), 'AddOut') ? 'bg-danger text-white' : 'bg-secondary') }}">
                          {{ str_contains(get_class($data), 'AddIn') ? 'Masuk' : (str_contains(get_class($data), 'AddOut') ? 'Keluar' : $data->barang->kondisi) }}
                      </span>
                      </td>
                      
                    </tr>
                       @endforeach
                      </tbody>
                    </table>
  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Grafik<span> | Transaksi</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: {{ $countIn }},
                          name: 'Transaksi Masuk',
                          itemStyle: {
                            color: '#ffc107'
                          }
                        },
                        {
                          value: {{ $countOut }},
                          name: 'Transaksi Keluar',
                          itemStyle: {
                            color: '#dc3545'
                          }
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->
        </div><!-- End Right side columns -->

      </div>
    </section>


@endsection
