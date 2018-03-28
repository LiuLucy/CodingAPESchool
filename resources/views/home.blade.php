@extends('layouts.app')

@section('content')
<div id="wrapper">

  <div class="sidebar-wrapper">
    <div class="sidenav">
      <form class="" action="index.html" method="post">
        <p class="location">地點</p>
        <div class="input-group">
          <select class="custom-select" name="location">
              <option selected value="0">台北</option>
              <option value="1">台中</option>
              <option value="2">新竹</option>
              <option value="3">高雄</option>
          </select>
        </div>
        <p class="day" >日期</p>
        <div class="input-group">
          <select class="custom-select" name="day">
              <option selected value="0">7/1 ~ 7/6</option>
              <option value="1">7/7 ~ 7/14</option>
              <option value="2">7/14 ~ 7/20</option>
          </select>
        </div>
          <button type="submit" class="btn btn-lg btn-block btn-outline-primary btn-buy">購買</button>
      </form>
    </div>
  </div>

  <div class="page-content-wrapper">
    <div class="container-fluid">
      <div class="top-image">
        <img class="d-block w-100" src="https://i2.wp.com/www.codingapeschool.com/blog/wp-content/uploads/2016/09/Web_%E8%AA%B2%E7%A8%8B_SCRATCHjr-05.jpg?fit=1366%2C380&ssl=1" alt="">
      </div>
      <hr class="style style-detail" />
      <div class="card-deck mb-2 text-center">

        <div class="card border-info mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>
          <div class="card-body text-info">
            <h5 class="card-title">Info card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card border-info mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>
          <div class="card-body text-info">
            <h5 class="card-title">Info card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card border-info mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>
          <div class="card-body text-info">
            <h5 class="card-title">Info card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>


      </div>
    </div>
  </div>

</div>
@endsection
