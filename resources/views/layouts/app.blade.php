<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ITM Aguilares — {{ config('app.name', 'Sistema Académico') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fade-in { animation: fadeIn .25s ease; }
        @keyframes fadeIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-track { background: #1e293b; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    </style>
</head>
<body class="font-sans" style="background:#0f172a; margin:0;">
    {{ $slot }}
</body>
</html>
<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 10px;
        border-radius: 8px;
        font-size: 13px;
        text-decoration: none;
        transition: all .15s;
        cursor: pointer;
        color: #6b7280;
        font-weight: 400;
    }
    .sidebar-link:hover {
        background: #f3f4f6;
        color: #111827;
    }
    .sidebar-link.active {
        background: #111827 !important;
        color: #ffffff !important;
        font-weight: 600;
    }
</style>
