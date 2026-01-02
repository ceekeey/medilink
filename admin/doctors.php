<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctors | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Topbar -->
    <?php include './../components/admin/topnav.php' ?>

    <!-- Sidebar -->
    <?php include './../components/admin/sidenav.php' ?>

    <!-- MAIN -->
    <main class="ml-64 pt-20 px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Doctors</h1>
                <p class="text-sm text-gray-500">Manage doctors in the system</p>
            </div>

            <button onclick="openAddModal()"
                class="bg-indigo-700 hover:bg-indigo-800 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                + Add Doctor
            </button>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="text-left px-6 py-3">Name</th>
                        <th class="text-left px-6 py-3">Specialization</th>
                        <th class="text-left px-6 py-3">Email</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="text-right px-6 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- SAMPLE ROW -->
                    <tr class="border-t">
                        <td class="px-6 py-3 font-medium">Dr. John Doe</td>
                        <td class="px-6 py-3">Cardiology</td>
                        <td class="px-6 py-3">john@hospital.com</td>
                        <td class="px-6 py-3">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <button onclick="openEditModal()" class="text-indigo-600 hover:underline">Edit</button>
                            <button onclick="openDeleteModal()" class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </main>

    <!-- ADD / EDIT MODAL -->
    <div id="doctorModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">

        <div class="bg-white rounded-xl w-full max-w-md p-6">
            <h2 id="modalTitle" class="text-lg font-semibold text-gray-800 mb-4">
                Add Doctor
            </h2>

            <form class="space-y-4">

                <div>
                    <label class="text-sm">Full Name</label>
                    <input type="text" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-300">
                </div>

                <div>
                    <label class="text-sm">Email</label>
                    <input type="email" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-300">
                </div>

                <div>
                    <label class="text-sm">Specialization</label>
                    <input type="text" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-300">
                </div>

                <div>
                    <label class="text-sm">Status</label>
                    <select class="w-full border rounded-lg px-3 py-2">
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm border rounded-lg">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm bg-indigo-700 text-white rounded-lg">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div id="deleteModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center z-50">

        <div class="bg-white rounded-xl w-full max-w-sm p-6 text-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Delete Doctor</h2>
            <p class="text-sm text-gray-500 mb-6">
                Are you sure you want to delete this doctor?
            </p>

            <div class="flex justify-center gap-4">
                <button onclick="closeDeleteModal()" class="px-4 py-2 border rounded-lg text-sm">
                    Cancel
                </button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        const modal = document.getElementById("doctorModal");
        const deleteModal = document.getElementById("deleteModal");
        const modalTitle = document.getElementById("modalTitle");

        function openAddModal() {
            modalTitle.textContent = "Add Doctor";
            modal.classList.remove("hidden");
        }

        function openEditModal() {
            modalTitle.textContent = "Edit Doctor";
            modal.classList.remove("hidden");
        }

        function closeModal() {
            modal.classList.add("hidden");
        }

        function openDeleteModal() {
            deleteModal.classList.remove("hidden");
        }

        function closeDeleteModal() {
            deleteModal.classList.add("hidden");
        }
    </script>

</body>

</html>