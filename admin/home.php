<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Hospital Consult</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { brandNavy: '#1C3E6B', brandCyan: '#06C2C9' } } }
        }
    </script>
</head>

<body class="bg-gray-50 overflow-x-hidden">

    <?php include '../components/admin/topnav.php' ?>
    <?php include '../components/admin/sidenav.php' ?>

    <main class="lg:ml-64 pt-24 px-4 sm:px-8 transition-all">
        <div class="max-w-7xl mx-auto">

            <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-brandNavy tracking-tight">System Overview</h1>
                    <p class="text-sm text-gray-500 mt-1">Real-time performance metrics.</p>
                </div>
                <button
                    class="bg-brandCyan hover:bg-brandCyan/90 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-brandCyan/20 flex items-center gap-2 w-fit">
                    <i data-lucide="plus" class="w-4 h-4"></i> Generate Report
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Patients</p>
                            <h2 class="text-2xl font-black text-brandNavy mt-1">1,248</h2>
                        </div>
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg"><i data-lucide="users" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-[10px] font-bold text-green-500 flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> +12% this month
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Active Doctors</p>
                            <h2 class="text-2xl font-black text-brandNavy mt-1">84</h2>
                        </div>
                        <div class="p-2 bg-cyan-50 text-brandCyan rounded-lg"><i data-lucide="stethoscope"
                                class="w-5 h-5"></i></div>
                    </div>
                    <div class="mt-4 text-[10px] font-bold text-brandCyan flex items-center gap-1">
                        <i data-lucide="activity" class="w-3 h-3"></i> 96.2% On-duty
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Appointments</p>
                            <h2 class="text-2xl font-black text-brandNavy mt-1">312</h2>
                        </div>
                        <div class="p-2 bg-purple-50 text-purple-600 rounded-lg"><i data-lucide="calendar"
                                class="w-5 h-5"></i></div>
                    </div>
                    <div class="mt-4 text-[10px] font-bold text-yellow-500 flex items-center gap-1">
                        <i data-lucide="clock" class="w-3 h-3"></i> 14 Pending today
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Revenue</p>
                            <h2 class="text-2xl font-black text-brandNavy mt-1">$24.5k</h2>
                        </div>
                        <div class="p-2 bg-green-50 text-green-600 rounded-lg"><i data-lucide="dollar-sign"
                                class="w-5 h-5"></i></div>
                    </div>
                    <div class="mt-4 text-[10px] font-bold text-green-500 flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> +8% growth
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 pb-10">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 xl:col-span-2">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-brandNavy">Appointment Volume</h3>
                        <div class="flex gap-2">
                            <span class="flex items-center gap-1 text-[10px] font-bold text-gray-400"><span
                                    class="w-2 h-2 rounded-full bg-brandCyan"></span> THIS WEEK</span>
                        </div>
                    </div>
                    <div class="h-[250px] w-full">
                        <canvas id="appointmentsChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
                    <h3 class="font-bold text-brandNavy mb-6">Live System Status</h3>
                    <div class="space-y-4 flex-grow">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                                <span class="text-sm font-medium text-gray-600">Pending Approvals</span>
                            </div>
                            <span class="text-sm font-bold text-brandNavy">07</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                <span class="text-sm font-medium text-gray-600">Active Sessions</span>
                            </div>
                            <span class="text-sm font-bold text-brandNavy">142</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl border border-red-100">
                            <div class="flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                <span class="text-sm font-medium text-red-700">Blocked IPs</span>
                            </div>
                            <span class="text-sm font-bold text-red-700">03</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <h4 class="text-[10px] font-bold text-gray-400 uppercase mb-4">Quick Shortcuts</h4>
                        <div class="grid grid-cols-2 gap-2">
                            <button
                                class="p-2 bg-gray-50 rounded-lg text-xs font-bold text-brandNavy hover:bg-brandCyan hover:text-white transition-colors">Backup</button>
                            <button
                                class="p-2 bg-gray-50 rounded-lg text-xs font-bold text-brandNavy hover:bg-brandCyan hover:text-white transition-colors">Logs</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="font-bold text-brandNavy">Recent Consultations</h3>
                    <button class="text-xs font-bold text-brandCyan hover:underline">View All</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 text-gray-400 uppercase text-[10px] font-bold">
                            <tr>
                                <th class="px-6 py-4">Patient</th>
                                <th class="px-6 py-4">Doctor</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <tr>
                                <td class="px-6 py-4 font-bold text-brandNavy">James Wilson</td>
                                <td class="px-6 py-4 text-gray-600">Dr. Sarah Connor</td>
                                <td class="px-6 py-4 text-gray-500">Oct 24, 2023</td>
                                <td class="px-6 py-4"><span
                                        class="px-2 py-1 bg-green-100 text-green-600 text-[10px] font-bold rounded-md">COMPLETED</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold text-brandNavy">Maria Garcia</td>
                                <td class="px-6 py-4 text-gray-600">Dr. Greg House</td>
                                <td class="px-6 py-4 text-gray-500">Oct 24, 2023</td>
                                <td class="px-6 py-4"><span
                                        class="px-2 py-1 bg-blue-100 text-blue-600 text-[10px] font-bold rounded-md">ONGOING</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();

        // Chart Init
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(6, 194, 201, 0.4)');
        gradient.addColorStop(1, 'rgba(6, 194, 201, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Appointments',
                    data: [40, 55, 48, 70, 62, 90, 75],
                    borderColor: '#06C2C9',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: '#f8fafc' }, border: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</body>

</html>