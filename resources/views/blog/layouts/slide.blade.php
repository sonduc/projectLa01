<div style="width: 100%;height: 250px">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php $i=0; ?>
      @foreach ($slide as $value)
      <li data-target="#myCarousel" data-slide-to="{{$i}}" 
      @if ($i == 0)
      class="active"
      @endif   
      ></li>      
      <?php $i++ ?>
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php $i=0; ?>
      @foreach ($slide as $value)
      <div 
      @if ($i==0)
      class="item active"
      @else
      class="item" 
      @endif     
      >
      <?php $i++ ?>
      <img style="width: 100%;height: 390px" src="{{ asset('') }}upload/slide/{{$value->avatar}}" >
      {{-- <img style="width: 100%;height: 390px" src="https://c.pxhere.com/photos/d3/c8/thunder_moody_metropolitan_grey_gray-78072.jpg!d"> --}}
    </div>
    @endforeach

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>