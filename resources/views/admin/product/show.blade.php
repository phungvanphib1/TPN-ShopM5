@extends('admin.layout.master')
@section('content')

<style>
        img#imgprd {
          border: 3px solid rgb(150, 0, 0);
              padding: 10px;
              height: 310px;
              width: 310px;
        }
    </style>

   <body>
    <section class="section profile">
      
      <div class="row">
      <div class="col-xl-12">
      <div class="col-xl-3">
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a><br>
      <br>
      </div>
      </div>
        <div class="col-xl-4">
      <div class="card">
              <h1><img id="imgprd" src="{{ asset($products->image) }}"></h1>
              <h2 style=" text-align: center; color: blue;" >{{ $products->name }}</h2>
              {{-- <h3 style="float: right;">  {{ number_format($products->price).'VND' }}</h3> --}}
        </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Thông tin sản phẩm</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ảnh sản phẩm</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Mô tả</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                   <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Mã sản phẩm</div>
                    <div class="col-lg-9 col-md-8">{{ $products->id }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Tên sản phẩm</div>
                    <div class="col-lg-9 col-md-8">{{ $products->name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Giá</div>
                    <div class="col-lg-9 col-md-8">{{ number_format($products->price).'VND' }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Số lượng</div>
                    <div class="col-lg-9 col-md-8">{{ $products->quantity }} chiếc</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Loại sản phẩm</div>
                    <div class="col-lg-9 col-md-8">{{ $products->category->name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ngày tạo</div>
                    <div class="col-lg-9 col-md-8">{{ $products->created_at }}</div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Ảnh chi tiết</label>
                      <div class="col-md-8 col-lg-9">
                            @foreach ($products->image_products as $file_name)
                                    <img  onclick="changeImage(this)" src="{{ asset($file_name->image) }}"
                                    height="100px" width="90px">
                            @endforeach
                      </div>
                    </div>
                </div>
                 <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- Change mota Form -->
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mô tả</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="col-lg-9 col-md-8">{!! $products->description !!}</div>
                      </div>
                    </div>
                </div>
              </div><!-- End Bordered Tabs -->
                        {{-- <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
@endsection