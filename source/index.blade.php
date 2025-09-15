@extends('_layouts.master')

@section('body')
    <section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
        <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
            <div class="mt-8">
                <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

                <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

                <p class="text-lg">Documentación oficial de SyverumX. Un framework PHP liviano y modular para construir apps
                    web con ruteo expresivo, controladores simples y vistas Blade‑like.</p>

                <div class="flex my-10">
                    <a href="/docs/getting-started" class="font-normal text-white hover:bg-red-950 rounded-sm mr-4 py-2 px-6"
                        style="background: var(--brand); color:rgb(253, 232, 232)">Empezar</a>
                    <a href="/docs/installation"
                        class="bg-gray-300 hover:bg-gray-500 font-normal rounded-sm py-2 px-6" style="color: rgb(43, 43, 43)!important;">Instalación</a>
                </div>
            </div>

            <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }}" class="mx-auto mb-6 lg:mb-0 ">
        </div>

        <hr class="block my-8 border lg:hidden">

        <div class="md:flex -mx-4">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Vistas Blade</h3>
                <p>Usa plantillas tipo Blade con Jenssegers\Blade y helpers sencillos para renderizar vistas.</p>
            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Ruteo expresivo</h3>
                <p>Define rutas con <code>Route::get()</code> y nombres de ruta. Encadena <code>name()</code> y
                    <code>middleware()</code> para cubrir casos comunes.</p>
            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">CSS utilitario</h3>
                <p>Integra Tailwind con el CLI oficial. Compila con <code>npx @tailwindcss/cli</code> en modo watch o build.
                </p>
            </div>
        </div>
    </section>
@endsection
