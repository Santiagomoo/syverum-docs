@extends('_layouts.master')

@section('body')
    <section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
        <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
            <div class="mt-8">
                <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

                <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

                <p class="text-lg">Framework PHP moderno y fácil de usar. Construye aplicaciones web rápidamente con herramientas que ya conoces y una estructura clara que te ayuda a organizar tu código.</p>

                <div class="flex my-10">
                    <a href="{{ $page->url('/docs/getting-started') }}" class="btn-primary mr-4">Empezar</a>
                    <a href="{{ $page->url('/docs/installation') }}" class="btn-secondary">Instalación</a>
                </div>
            </div>

            <img src="{{ $page->assetUrl('/assets/img/logo-large.svg') }}" alt="{{ $page->siteName }}" class="mx-auto mb-6 lg:mb-0 ">
        </div>

        <hr class="block my-8 border lg:hidden">

        <div class="md:flex -mx-4">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-terminal.svg') }}" class="h-12 w-12" alt="terminal icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Ruteo Simple</h3>
                <p>Define tus rutas fácilmente con <code>Route::get()</code>, <code>Route::post()</code> y más. Agrega middleware y nombres de ruta cuando los necesites.</p>
            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-window.svg') }}" class="h-12 w-12" alt="window icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Plantillas Blade</h3>
                <p>Crea vistas hermosas con la sintaxis Blade que ya conoces. Layouts, componentes y helpers incluidos para desarrollo rápido.</p>
            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-stack.svg') }}" class="h-12 w-12" alt="stack icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Controladores</h3>
                <p>Organiza tu lógica en controladores limpios. El framework se encarga de inyectar dependencias automáticamente.</p>
            </div>
        </div>

        <div class="md:flex -mx-4 mt-8">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-terminal.svg') }}" class="h-12 w-12" alt="terminal icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Base de Datos</h3>
                <p>Conecta fácilmente con MySQL usando PDO. Incluye modelos simples para trabajar con tus datos de forma intuitiva.</p>
            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-stack.svg') }}" class="h-12 w-12" alt="stack icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Middleware</h3>
                <p>Protege tus rutas con middleware. Autenticación, validación y más. Fácil de usar y personalizar.</p>
            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <img src="{{ $page->assetUrl('/assets/img/icon-window.svg') }}" class="h-12 w-12" alt="window icon">
                <h3 class="text-2xl mb-0" style="color: var(--brand-dark)">Configuración</h3>
                <p>Configura tu aplicación con archivos <code>.env</code>. Variables de entorno, base de datos y más, todo en un lugar.</p>
            </div>
        </div>
    </section>
@endsection