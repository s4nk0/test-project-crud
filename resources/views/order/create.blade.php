<x-app-layout>
    <x-slot name="header">
        {{ __('Заказы') }}
    </x-slot>

    <x-slot name="js">
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=80cba268-81a1-44b3-a4fd-b15b982ed47d" type="text/javascript"></script>
        <script src="{{asset('js/event_reverse_geocode.js')}}" type="text/javascript">

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
        <script>
            $('#phone').inputmask('+79999999999');
        </script>
    </x-slot>
    <form action="{{route('order.store')}}" method="post">
        @csrf
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
                     <input type="date" class="form-control" id="date" name="date" required>
                 </div>

                 <div class="mb-3">
                     <label for="phone" class="form-label">Телефон</label>
                     <input type="text" class="form-control" id="phone" name="phone" placeholder="+79999999999">
                 </div>

                 <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                 </div>
             </div>

             <div class="col-sm-6">
                 <div>
                     <label>Адрес</label>
                     <input type="hidden" name="coords" id="coords">
                 </div>
                 <div id="map" style="     width: 100%; height: 95%;"></div>

             </div>
         </div>
        <div class="row">
            <div class="col">
                <livewire:product-get-data-form/>
            </div>

        </div>
        <div class="my-3">
            <button class="btn btn-lg btn-primary" type="submit">Создать</button>
        </div>
    </form>

</x-app-layout>
