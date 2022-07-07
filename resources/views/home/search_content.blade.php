<section id="subintro">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="search">
                    <form action="{{route('gethouse')}}" method="post" class="input-append">
                        @csrf
                        @livewire('search')
                        <button class="btn btn-dark" type="submit">Ara</button>
                    </form>
                    @section('footerjs')
                        @livewireScripts
                    @endsection
                </div>
            </div>
        </div>
    </div>
</section>

