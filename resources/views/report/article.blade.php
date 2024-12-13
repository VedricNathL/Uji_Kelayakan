<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article with Dropdown</title>
</head>
<body>

    <!-- Dropdown Provinsi -->
    <select id="province-dropdown" name="province">
        <option value="" disabled selected>Pilih Provinsi</option>
    </select>

    <!-- Tempat untuk menampilkan laporan dalam bentuk card -->
    <div id="report-cards-container"></div>

    <script>
        // Mengambil data provinsi dari API eksternal untuk dropdown
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(data => {
                const dropdown = document.getElementById('province-dropdown');
                data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.name; // Set nilai option dengan nama provinsi
                    option.textContent = province.name; // Tampilkan nama provinsi
                    dropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
            });

        // Fungsi untuk mengambil data laporan berdasarkan provinsi yang dipilih
        document.getElementById('province-dropdown').addEventListener('change', function() {
            const province = this.value;  // Ambil nilai provinsi yang dipilih
            if (province) {
                fetchReports(province);  // Panggil fungsi untuk mengambil laporan berdasarkan provinsi
            }
        });

        function fetchReports(province) {
            // Meng-encode nama provinsi untuk URL
            const encodedProvince = encodeURIComponent(province);
            
            fetch(`/api/reports/${encodedProvince}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Data tidak ditemukan');  // Menangani error jika tidak ada laporan
                    }
                    return response.json();  // Mengubah response menjadi JSON
                })
                .then(reports => {
                    const container = document.getElementById('report-cards-container');
                    container.innerHTML = '';  // Kosongkan kontainer sebelum menampilkan data baru

                    if (reports.length === 0) {
                        container.innerHTML = '<p>No reports found for this province.</p>';
                    } else {
                        reports.forEach(report => {
                            const card = document.createElement('div');
                            card.classList.add('card');

                            // Menampilkan gambar laporan
                            const image = document.createElement('img');
                            image.src = report.image || 'default-image.jpg';
                            card.appendChild(image);

                            // Menampilkan deskripsi laporan
                            const title = document.createElement('div');
                            title.classList.add('card-title');
                            title.textContent = report.description;
                            card.appendChild(title);

                            // Menampilkan pernyataan laporan
                            const description = document.createElement('div');
                            description.classList.add('card-description');
                            description.textContent = report.statement || 'No statement available.';
                            card.appendChild(description);

                            // Footer card dengan informasi tambahan
                            const footer = document.createElement('div');
                            footer.classList.add('card-footer');
                            footer.textContent = `Province: ${report.province} | Voting: ${report.voting} | Viewers: ${report.viewers}`;
                            card.appendChild(footer);

                            container.appendChild(card);  // Menambahkan card ke halaman
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching reports:', error);
                    // Menampilkan pesan error jika terjadi masalah
                    const container = document.getElementById('report-cards-container');
                    container.innerHTML = '<p>Terjadi kesalahan saat mengambil data laporan.</p>';
                });
        }
    </script>

</body>
</html>
