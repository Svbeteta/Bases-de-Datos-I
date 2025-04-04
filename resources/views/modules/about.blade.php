<!-- resources/views/modules/about.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Acerca De') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Nuestra Empresa') }}</h3>
                    <p>{{ __('Somos una tienda especializada en instrumentos musicales y todo lo relacionado con la música. Ofrecemos productos de alta calidad para músicos aficionados y profesionales.') }}</p>

                    <hr class="my-6 border-gray-600">

                    <h3 class="text-lg font-semibold mb-4">{{ __('Visión') }}</h3>
                    <p>{{ __('Ser la tienda líder en la venta de instrumentos musicales y accesorios, brindando a nuestros clientes productos de calidad, asesoramiento especializado y una experiencia de compra inigualable.') }}</p>

                    <hr class="my-6 border-gray-600">

                    <h3 class="text-lg font-semibold mb-4">{{ __('Misión') }}</h3>
                    <p>{{ __('Ofrecer a músicos de todos los niveles las mejores herramientas para desarrollar su talento, promoviendo la pasión por la música a través de una atención personalizada y una amplia gama de productos de alta calidad.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
