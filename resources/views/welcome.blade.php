@extends('layouts.app')

@section('content')
<!-- slide -->
<div id="carouselExampleIndicators" class="slide-pricing-header carousel slide px-3 py-3 pt-md-5 pb-md-4 mx-auto" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://i2.wp.com/www.codingapeschool.com/blog/wp-content/uploads/2016/08/Web_%E8%AA%B2%E7%A8%8B%E5%A4%A7%E7%B6%B1-12.jpg?fit=1366%2C380&ssl=1" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i0.wp.com/www.codingapeschool.com/blog/wp-content/uploads/Banner-mini-coder.jpg?fit=1024%2C285&ssl=1" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i1.wp.com/www.codingapeschool.com/blog/wp-content/uploads/Banner-%E5%88%9D%E9%9A%8E2.jpg?fit=1024%2C285&ssl=1" alt="Third slide">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--  -->

<!--  -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h4 class="display-5">"如果體制內的教育不能給我們的孩子未來所需要的能力，那我們就應該動手去做，給我們孩子真正的競爭力。"</h4>
      <p><small>-- Coding Ape程式設計學校 創辦人 Kennan</small></p>
</div>
<!--  -->
<div class="container">
  <hr class="style style-class" />
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>

      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>

      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>
    </div>
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>

      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>

      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h5 class="my-0 font-weight-normal">程式啟蒙課程<small class="text-muted">(大班-小二)</small></h5>
        </div>
        <div class="card-body">
          <form class="" action="{{action('HomeController@index')}}" method="GET">
            <div class="input-group">
              <select class="custom-select" name="class">
                <option selected>選擇課程</option>
                <option value="1">創意程式入門</option>
                <option value="2">創意程式挑戰</option>
                <option value="3">創意程式開發</option>
                <option value="3">創意程式應用</option>
              </select>
            </div>

            <ul class="list-unstyled mt-3 mb-4">
              <li><h3>教學特色</h3></li>
              <li><small class="text-muted">專為大班～小二的小朋友設計的程式課程。</small></li>
              <li><small class="text-muted">主要運用ScratchJr和Bloxels兩樣教具來學習程式設計，</small></li>
              <li><small class="text-muted">創造出屬於自己的故事和遊戲。</small></li>
            </ul>
            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">上課詳細資訊</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
