@component('mail::message')
### New product {{$product->name}}

# Category Name: {{$category->name}}
# Sub Category Name: {{$subcategory->name}}
<img src="{{asset('uploads/product/'.$product->image)}}" alt="">

@component('mail::button', ['url' => route('products.index',$product->id),'color' => 'error'])
Buy Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
