<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Status - SDN Pengasinan VII</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 min-h-screen flex items-center justify-center font-sans antialiased text-slate-200 p-4">

    <main class="w-full max-w-2xl bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-8 md:p-12 shadow-2xl shadow-blue-950/40 relative overflow-hidden group">
        
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-blue-600/10 rounded-full blur-3xl group-hover:bg-blue-600/20 transition-all duration-700"></div>
        <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-indigo-600/10 rounded-full blur-3xl group-hover:bg-indigo-600/20 transition-all duration-700"></div>

        <div class="relative z-10 flex flex-col items-center text-center space-y-8">
            
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-semibold tracking-wider text-blue-400 uppercase">
                <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                Bot Monitoring System
            </div>

            <h1 class="text-xl md:text-2xl font-medium leading-relaxed tracking-wide max-w-xl text-slate-300">
                Halo, ini adalah halaman yang dibuat khusus untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400 font-bold">BOT</span> untuk mengetes status server <span class="text-white font-semibold border-b-2 border-blue-500/30 pb-0.5">SDN Pengasinan VII</span> apakah sedang Online atau Offline
            </h1>

            <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-800 to-transparent my-2"></div>

            <div class="flex flex-col sm:flex-row items-center gap-6 sm:gap-12 text-sm text-slate-400 bg-slate-950/40 px-6 py-4 rounded-2xl border border-slate-800/50 w-full justify-center">
                
                <div class="flex items-center gap-2">
                    <span class="font-mono text-slate-500">HTTP:</span>
                    <span class="font-mono text-emerald-400 font-semibold bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/20">200 OK</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="font-medium tracking-wide text-slate-300">SERVER STATUS: <strong class="text-emerald-400 font-semibold">ONLINE</strong></span>
                </div>

                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="timestamp">Memuat...</span>
                </div>
            </div>

        </div>
    </main>

    <script>
        function updateTime() {
            const now = new Date();
            document.getElementById('timestamp').innerText = now.toISOString().split('T')[0] + ' ' + now.toTimeString().split(' ')[0];
        }
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>