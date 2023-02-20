<x-app-layout>
    <x-slot name="header">
        {{ __('Заказы') }}
    </x-slot>

    <x-slot name="js">
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=80cba268-81a1-44b3-a4fd-b15b982ed47d" type="text/javascript"></script>
        <x-dinamicly-reverce-geo-code :coords="$order->coords"/>

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
        <script>
            $('#phone').inputmask('+79999999999');
        </script>
    </x-slot>
        <div class="row mb-3">
            <div class="col-sm-6">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="date" class="form-label">Дата заказа</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$order->date}}" readonly>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$order->phone}}" placeholder="+79999999999" readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$order->email}}" placeholder="example@example.com" readonly>
                </div>
            </div>

            <div class="col-sm-6">
                <div>
                    <label>Адрес</label>
                    <input type="hidden" name="coords" value="{{$order->coords}}" id="coords">
                </div>
                <div id="map" style="width: 100%; height: 95%;"></div>

            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col">
                <livewire:product-get-data-form  :selected_products="$order->products" :resource="'show'"/>
            </div>
            <div class="col">

                    <label for="sum">Сумма заказа</label>
                    <input type="text" class="form-control" value="{{$order->sum}}" readonly>

            </div>

        </div>


</x-app-layout>
