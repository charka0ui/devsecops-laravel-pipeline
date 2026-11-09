<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechShop — démo vulnérable</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 860px; margin: 2rem auto; padding: 0 1rem; color: #1b1b1b; }
        .warn { background: #fff4e5; border: 1px solid #f0b46a; padding: .6rem 1rem; border-radius: 6px; font-size: .9rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { text-align: left; padding: .45rem; border-bottom: 1px solid #ddd; }
        input[type=text] { padding: .4rem; width: 60%; }
        button { padding: .4rem .8rem; }
    </style>
    {{-- VULN-05 : configuration contenant des secrets, chargée par le navigateur --}}
    <script src="/js/app-config.js"></script>
</head>
<body>
    <h1><a href="/" style="color:inherit;text-decoration:none">TechShop</a></h1>
    <p class="warn">⚠️ Application <strong>volontairement vulnérable</strong> créée pour démontrer un pipeline DevSecOps. Ne pas déployer.</p>
    <form action="/search" method="get">
        <input type="text" name="q" placeholder="Rechercher un produit…" value="{{ request('q') }}">
        <button type="submit">Rechercher</button>
    </form>
    @yield('content')
    <p style="margin-top:2rem"><a href="/download?file=catalogue.txt">Télécharger le catalogue</a></p>
</body>
</html>
