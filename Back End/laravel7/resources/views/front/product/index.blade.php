@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/products_list.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
  a {
    color: gray;
    text-decoration: none;
  }
</style>
@endsection

@section('main')
<hr>
<section>
  <h2 class="text-center p-3">最新商品</h2>
</section>
<section class="container">
  <a href="/product" class="btn btn-success">全部</a>
  @foreach ($productTypes as $type)
  {{-- 用問號帶typeId這個鍵值，再用a標籤送去後端controller --}}
  <a href="/product?typeId={{$type->id}}" class="btn btn-success">{{$type->name}}</a>
  @endforeach

  <div class="row row-cols-lg-4 py-3">
    @foreach ($products as $product)
    <div class="col-12 col-lg-3 card-group mb-3">
      <div class="card d-flex flex-column justify-content-between">
        <a href="/product/content/{{$product->id}}">
          <img src="{{asset($product->img)}}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p>${{$product->price}}</p>
          </div>
        </a>
        <button type="submit" class="btn btn-primary add-btn" data-id={{$product->id}}>加入購物車</button>
      </div>
    </div>
    @endforeach
  </div>

  {{-- <ul style="list-style-type:none">
    @foreach ($products as $product)
    <li>
      <a href="/product/content/{{$product->id}}">
        <div class="details">
          <h2 class="h6">{{$product->name}}</h2>
          <p class="price">${{$product->price}}</p>
          <div class="product">
            <img src="{{asset($product->img)}}">
          </div>
        </div>
      </a>
    </li>
    @endforeach
  </ul> --}}
</section>

@endsection

@section('js')

<script>
  var addBtns = document.querySelectorAll('.add-btn');
  addBtns.forEach(addBtn => {
    addBtn.addEventListener('click', function () {
      // 產品按鈕被click時，取得產品的id
      var productId =  this.getAttribute('data-id');
      
      // 在js建立一個form表單將資料送出去
      var formData = new FormData();
      // js form表單要送的內容，在laravel 送資料一定要有token
      formData.append('_token', '{{ csrf_token() }}'); 
      // 第一個fetchProductId是表單的name(表單名稱)，第二個productId是value(表單的值)
      formData.append('fetchProductId', productId); 

      // 使用fetch的方式送表單，fetch後面接要送的網址
      fetch('/shopping_cart/add', {
        // 使用post的方式傳送資料
        'method':'POST',
        // 送上面整張的表單
        'body': formData,
        // 傳完之後，後端會回傳fetch請求自帶的一大包資料
      }).then(function (response) {
        // 將資料過濾為文字形式
        return response.text();
        // 過濾後的資料，會塞入data這個變數中
      }).then(function (data) {
        // 利用回傳的文字資料做判斷
        if (data == 'success') {
          // sweet alert的訊息顯示
          Swal.fire({            
            icon: 'success',
            title: '成功加入購物車',
            showConfirmButton: false,
            timer: 1000,
          })
        }
      })
    });
  });

</script>
@endsection