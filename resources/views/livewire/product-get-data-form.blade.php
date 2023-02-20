<div>
    @if(count($addedProducts))
        <div class="mb-3">
            <label for="" class="form-label">Выбранные продукты</label>

            @foreach($addedProducts as $product)
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="products_for_create[{{$product['id']}}][title]" value="{{$product['title']}}" readonly>
                            <input type="hidden" class="form-control" name="products_for_create[{{$product['id']}}][price]" value="{{$product['price']}}" readonly>
                            </div>
                        <div class="col-6">
                            <input type="number"  class="form-control" name="products_for_create[{{$product['id']}}][count]" value="{{@$product['count']}}"  placeholder="count" @if($resource == 'show') readonly @else required @endif >
                        </div>
                    </div>
                </div>

                @endforeach
        </div>

    @endif

        @if($resource !== 'show')
    <div class="card">
        <div class="card-header">
            Товары
        </div>
        <div class="card-body">
            <div class="card-title">
                <input type="search" class="form-control" wire:model="search" placeholder="Search...">

            </div>
            <div class="row">
                @foreach($products as $product)
                    @php($selected = @$addedProducts[$product->id]['id'] == $product->id)
                    <div class="col-lg-2 col-md-4 col-sm-6 border @if($selected) bg-primary   @endif">
                        <button class="btn @if($selected) text-white @endif" wire:click.prevent="addProduct('{{$product->id}}')" class="h-100  py-3">{{$product->title}} - {{$product->price}}</button>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            {{$products->links()}}
        </div>
    </div>


        @endif
</div>
