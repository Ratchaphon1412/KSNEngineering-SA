
<div class="card card-side  shadow-xl">
    <figure><img src="{{$company->logo}}" alt="Movie" class="h-48 w-48 object-cover"/></figure>
    <div class="card-body">
      <h2 class="card-title text-gray-900">{{$company->name}}</h2>
      <p class="text-gray-900 line-clamp-3 text-ellipsis overflow-hidden">{{$company->address}}</p>
      <div class="card-actions justify-end">
        <button class="btn btn-gray-900">View</button>
      </div>
    </div>
</div>