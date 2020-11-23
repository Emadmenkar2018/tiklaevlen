@foreach($taxons as $taxon)
@if($taxon->id != 2 && $taxon->id != 3)
@if($taxon->children->count())
@if($taxon->level == 1)
	<li class="dropdown-submenu">
	    <a href="{{ route('product.category', [$taxon->taxonomy->name, $taxon]) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">{{ $taxon->name }}</span><span class="caret"></span></a>
		<ul class="dropdown-menu">
		   @include('product.index._category_level', ['taxons' => $taxon->children])
		</ul>
	</li>
@else
	<li class="dropdown">
		<a href="{{ route('product.category', [$taxon->taxonomy->name, $taxon]) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{ $taxon->name }}</span> <span class="caret"></span></a>
		 <ul class="dropdown-menu">
			@include('product.index._category_level', ['taxons' => $taxon->children])
		 </ul>
	</li>
@endif

@else
	<li><a href="{{ route('product.category', [$taxon->taxonomy->name, $taxon]) }}">{{ $taxon->name }}</a></li>
@endif
@endif


@endforeach
