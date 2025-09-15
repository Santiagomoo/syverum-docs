<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

    <meta property="og:site_name" content="{{ $page->siteName }}" />
    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}" />
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:image" content="{{ $page->baseUrl }}/assets/img/logo.png" />
    <meta property="og:type" content="website" />

    <meta name="twitter:image:alt" content="{{ $page->siteName }}">
    <meta name="twitter:card" content="summary_large_image">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <meta name="generator" content="tighten_jigsaw_doc">
    @endif

    <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">

    @stack('meta')

    @if ($page->production)
        <!-- Insert analytics code here -->
    @endif

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" rel="stylesheet" />

    @viteRefresh()
    <?php $viteCss = vite('source/_assets/css/main.css'); ?>
    <?php $viteJs = vite('source/_assets/js/main.js'); ?>
    <link rel="stylesheet" href="{{ $page->assetUrl($viteCss) }}">
    <script defer type="module" src="{{ $page->assetUrl($viteJs) }}"></script>

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
    @endif
    <style>
        :root {
            --brand: {{ $page->theme['brand'] ?? '#dc2626' }};
            --brand-dark: {{ $page->theme['brandDark'] ?? '#991b1b' }};
            --sidebar-bg: {{ $page->theme['sidebarBg'] ?? '#f3f4f6' }};
        }

        a {
            color: var(--brand);
        }

        a:hover {
            color: var(--brand-dark);
        }

        .nav-menu {
            background-color: var(--sidebar-bg);
        }

        .nav-menu__item {
            color: rgb(59, 27, 27);
            transition: .4s ease-int-out;
        }

        .nav-menu__item:hover {
            color: var(--brand) !important;
        }

        blockquote {
            border-color: var(--brand);
            color: var(--brand-dark);
        }

        ::selection {
            background: var(--brand);
            color: #fff;
        }

        .brand-toggle {
            background-color: var(--brand);
            border-color: var(--brand);
        }

        .callout {
            border-left: 4px solid var(--brand);
            background: #fff;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
        }

        .callout.warning {
            border-left-color: #f59e0b;
            background: #fff7ed;
        }

        .callout.note {
            border-left-color: var(--brand);
            background: #fff;
        }

        .callout .title {
            font-weight: 700;
            margin-bottom: .25rem;
        }
    </style>
</head>

<body class="flex flex-col justify-between min-h-screen text-gray-800 leading-normal font-sans">
    <header class="flex items-center shadow-sm bg-white border-b h-24 mb-8 py-4" role="banner">
        <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
            <div class="flex items-center">
                <a href="{{ $page->baseUrl }}/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                <img class="h-8 md:h-10 mr-3" src="{{ $page->baseUrl }}/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />
                    <h1 class="text-lg md:text-2xl text-red-900 font-semibold hover:text-red-600 my-0 pr-4">
                        {{ $page->siteName }}</h1>
                </a>
            </div>

            <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                @if ($page->docsearchApiKey && $page->docsearchIndexName)
                    @include('_nav.search-input')
                @endif
            </div>
        </div>

        @yield('nav-toggle')
    </header>

    <main role="main" class="w-full flex-auto">
        @yield('body')
    </main>

    <footer class="bg-white text-center text-sm mt-12 py-4 border-t-1 border-gray-300" role="contentinfo">
        <ul class="flex flex-col md:flex-row justify-center">
            <li class="md:mr-2">
                &copy; <a href="https://github.com/Santiagomoo/syverum-framework" title="SyverumX en GitHub">Syverum</a>
                {{ date('Y') }}.
            </li>

            <li>
                Construido con <a href="https://jigsaw.tighten.com/docs/installation/" title="Framework Syverum">Tighten</a>
                y <a href="https://tailwindcss.com" title="Tailwind CSS, un framework CSS utility-first">Tailwind
                    CSS</a>.
            </li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/prismjs/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>

    @stack('scripts')
</body>

</html>
