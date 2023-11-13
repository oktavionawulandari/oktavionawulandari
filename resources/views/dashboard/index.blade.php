@extends('layout.panel')

@section('content')
<body>
            <div class="content-wrapper">
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Skill</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    </div>
                </div>
            

    <!-- Main content
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Education</span>
                <span class="info-box-number">{{ $educations }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tree"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Hobby</span>
                <span class="info-box-number">{{ $hobbies }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Skill</span>
                <span class="info-box-number">{{ $skills }}</span>
              </div>
            </div>
          </div>
        </div> -->

        <!-- EDUCATION -->
        <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Education
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> 

              </div>
              <div class="card-body text-center">
              <table class="table" id="education" style="height: 250px; width: 100%;">
              </div>
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>				
                  </tr>
                </thead>
                <tbody class="text-center">
                      @php $no=1; @endphp
                     @forelse ($educations as $education)
                        <tr>
                          <td>{{$no++}}</td>
                          <td style="width: 120px">@if ($education->image)
                          <img src="{{ asset('/' .$education->image) }}" alt="{{ $education->image }}"class="img-fluid mt-3">
                          @endif</td>
                          <td>{{ $education->judul }}</td>
                          <td>{{ $education->deskripsi }}</td>
                        </tr>
                        @empty
                        @endforelse
                  </tbody>
              </table>
                </div>
              </div>
                <!-- /.row -->


        <!-- HOBBY -->
        <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Hobby
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> 

              </div>
              <div class="card-body text-center">
              <table class="table" id="education" style="height: 250px; width: 100%;">
              </div>
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>				
                  </tr>
                </thead>
                <tbody class="text-center">
                      @php $no=1; @endphp
                     @forelse ($hobbies as $hobby)
                        <tr>
                          <td>{{$no++}}</td>
                          <td style="width: 120px">@if ($hobby->image)
                          <img src="{{ asset('/' .$hobby->image) }}" alt="{{ $hobby->image }}"class="img-fluid mt-3">
                          @endif</td>
                          <td>{{ $hobby->judul }}</td>
                          <td>{{ $hobby->deskripsi }}</td>
                        </tr>
                        @empty
                        @endforelse
                  </tbody>
              </table>
                </div>
              </div>

        <!-- SKILL -->
        <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Skill
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> 

              </div>
              <div class="card-body text-center">
              <table class="table" id="education" style="height: 250px; width: 100%;">
              </div>
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>				
                  </tr>
                </thead>
                <tbody class="text-center">
                      @php $no=1; @endphp
                     @forelse ($skills as $skill)
                        <tr>
                          <td>{{$no++}}</td>
                          <td style="width: 120px">@if ($skill->image)
                          <img src="{{ asset('/' .$skill->image) }}" alt="{{ $skill->image }}"class="img-fluid mt-3">
                          @endif</td>
                          <td>{{ $skill->judul }}</td>
                          <td>{{ $skill->deskripsi }}</td>
                        </tr>
                        @empty
                        @endforelse
                  </tbody>
              </table>
                </div>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection