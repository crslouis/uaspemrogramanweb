<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu Restoran Fast Food & furious flavors Turbo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Restoran Nusantara Fast Food & Furious Flavors Turboa</h1>
            <p class="text-xl text-gray-600">Kelola Menu Makanan Khas Nusantara</p>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Tambah/Edit Menu</h2>
            <form id="menuForm" class="space-y-4">
                <input type="hidden" id="menuId" name="menuId">
                
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="menuName">
                        Nama Menu
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="menuName" 
                           type="text" 
                           required
                           placeholder="Masukkan nama menu">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="menuPrice">
                        Harga
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="menuPrice" 
                           type="number" 
                           required
                           placeholder="Masukkan harga menu">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="menuOrigin">
                        Asal Daerah
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="menuOrigin" 
                           type="text" 
                           required
                           placeholder="Masukkan asal daerah">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="menuDescription">
                        Deskripsi
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                              id="menuDescription" 
                              rows="4" 
                              required
                              placeholder="Masukkan deskripsi menu"></textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" 
                            onclick="resetForm()" 
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-6">Daftar Menu</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Menu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asal Daerah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="menuTableBody">
                            <!-- Data akan diisi melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi data menu
        let menus = [
            { id: 1, name: 'Rendang', price: 45000, origin: 'Padang', description: 'Daging sapi yang dimasak dengan rempah-rempah khas Padang' },
            { id: 2, name: 'Soto Betawi', price: 35000, origin: 'Jakarta', description: 'Sup daging sapi dengan kuah santan khas Betawi' }
        ];

        // Fungsi untuk menampilkan data menu
        function displayMenuData() {
            const tableBody = document.getElementById('menuTableBody');
            tableBody.innerHTML = '';

            menus.forEach(menu => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${menu.name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Rp ${menu.price.toLocaleString()}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${menu.origin}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">${menu.description}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="editMenu(${menu.id})" class="text-indigo-600 hover:text-indigo-900 mr-4">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteMenu(${menu.id})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Fungsi untuk mereset form
        function resetForm() {
            document.getElementById('menuId').value = '';
            document.getElementById('menuForm').reset();
        }

        // Fungsi untuk mengedit menu
        function editMenu(id) {
            const menu = menus.find(m => m.id === id);
            if (menu) {
                document.getElementById('menuId').value = menu.id;
                document.getElementById('menuName').value = menu.name;
                document.getElementById('menuPrice').value = menu.price;
                document.getElementById('menuOrigin').value = menu.origin;
                document.getElementById('menuDescription').value = menu.description;
            }
        }

        // Fungsi untuk menghapus menu
        function deleteMenu(id) {
            if (confirm('Apakah Anda yakin ingin menghapus menu ini?')) {
                menus = menus.filter(menu => menu.id !== id);
                displayMenuData();
            }
        }

        // Event listener untuk form submission
        document.getElementById('menuForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                id: document.getElementById('menuId').value,
                name: document.getElementById('menuName').value,
                price: parseInt(document.getElementById('menuPrice').value),
                origin: document.getElementById('menuOrigin').value,
                description: document.getElementById('menuDescription').value
            };

            if (formData.id) {
                // Update existing menu
                const index = menus.findIndex(m => m.id === parseInt(formData.id));
                if (index !== -1) {
                    menus[index] = { ...menus[index], ...formData };
                }
            } else {
                // Add new menu
                const newId = menus.length > 0 ? Math.max(...menus.map(m => m.id)) + 1 : 1;
                menus.push({ ...formData, id: newId });
            }

            displayMenuData();
            resetForm();
        });

        // Tampilkan data awal
        displayMenuData();
    </script>
</body>
</html>