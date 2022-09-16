<div class="container-fluid text-center py-4">
    <a href="{{ url('presentation/index') }}">
        <img src="{{ asset('home/images/sri-golju-furniture-industries-logo.png') }}"
            alt="Sri Golju Furniture Industries" class="img-fluid">
    </a>
    <div class="mt-3" style="display:grid; grid-template-columns: 1fr 70px">
        <div class="d-flex">
            <form action="{{ url('presentation/search') }}" method="get" class="w-100"
                style="max-width: 600px;">
                <div class="input-group">
                    @php 
                        $bSlug = Request()->brands;
                    @endphp
                    <select name="brands" onchange="$(this).closest('form').submit();" style="width:80px">
                        <option value="">All</option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->slug }}"  @if($bSlug==$brand->slug) selected @endif  >{{ucfirst(strtolower($brand->title))}}</option>
                    @endforeach
                    </select>
                    <input type="search" class="form-control" name="query" placeholder="Search"
                        style="background:#f1f1f1;border: 1px solid;border-radius:4px 0px 0px 4px;" value="{{ request()->query('query') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
            @if (request()->query('query'))
                <a href="{{ url('presentation/index') }}" class="btn btn-outline-danger ml-3">
                    Clear All
                </a>
            @endif
        </div>
        <a class="btn btn-primary" href="{{ url('presentation') }}">
            View
        </a>
    </div>
</div>
