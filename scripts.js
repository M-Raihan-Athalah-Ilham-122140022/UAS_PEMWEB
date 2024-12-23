document.addEventListener("DOMContentLoaded", () => {
    // Form Mahasiswa
    const mahasiswaForm = document.getElementById("mahasiswaForm");
    if (mahasiswaForm) {
        // Validasi form Mahasiswa sebelum disubmit
        mahasiswaForm.addEventListener("submit", (e) => {
            const itemName = document.getElementById("itemName").value.trim();
            const itemPekerjaan = document.getElementById("itemPekerjaan").value.trim();
            const itemNim = document.getElementById("itemNim").value.trim();
            const itemUsia = document.getElementById("itemUsia").value.trim();

            // Validasi untuk nama mahasiswa, pekerjaan, NIM, usia
            if (!itemName) {
                e.preventDefault(); // Mencegah form dikirim
                alert("Nama Mahasiswa wajib diisi!");
                return;
            }

            if (!itemPekerjaan) {
                e.preventDefault(); // Mencegah form dikirim
                alert("Pekerjaan wajib diisi!");
                return;
            }

            if (!itemNim || isNaN(itemNim) || itemNim <= 0) {
                e.preventDefault(); // Mencegah form dikirim
                alert("NIM harus berupa angka positif!");
                return;
            }

            if (!itemUsia || isNaN(itemUsia) || itemUsia <= 0) {
                e.preventDefault(); // Mencegah form dikirim
                alert("Usia harus berupa angka positif!");
                return;
            }

            // Cek apakah nama mahasiswa hanya mengandung huruf, angka, dan spasi
            if (!/^[a-zA-Z0-9\s]+$/.test(itemName)) {
                e.preventDefault();
                alert("Nama Mahasiswa hanya boleh mengandung huruf, angka, dan spasi.");
                return;
            }

            // Cek apakah pekerjaan hanya mengandung huruf dan spasi
            if (!/^[a-zA-Z\s]+$/.test(itemPekerjaan)) {
                e.preventDefault();
                alert("Pekerjaan hanya boleh mengandung huruf dan spasi.");
                return;
            }
        });
    }

    // Form Dosen
    const lecturerForm = document.getElementById("lecturerForm");
    if (lecturerForm) {
        // Validasi form Dosen sebelum disubmit
        lecturerForm.addEventListener("submit", (e) => {
            const lecturerName = document.getElementById("lecturerName").value.trim();
            const lecturerPosition = document.getElementById("lecturerPosition").value.trim();

            // Validasi untuk nama dosen dan jabatan
            if (!lecturerName) {
                e.preventDefault(); // Mencegah form dikirim
                alert("Nama Dosen wajib diisi!");
                return;
            }

            if (!lecturerPosition) {
                e.preventDefault(); // Mencegah form dikirim
                alert("Jabatan wajib diisi!");
                return;
            }

            // Cek apakah nama dosen hanya mengandung huruf dan spasi
            if (!/^[a-zA-Z\s]+$/.test(lecturerName)) {
                e.preventDefault();
                alert("Nama hanya boleh mengandung huruf dan spasi.");
                return;
            }

            // Cek apakah jabatan hanya mengandung huruf dan spasi
            if (!/^[a-zA-Z\s]+$/.test(lecturerPosition)) {
                e.preventDefault();
                alert("Jabatan hanya boleh mengandung huruf dan spasi.");
                return;
            }
        });
    }
});

// Fungsi untuk menetapkan cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000); // Set masa berlaku cookie
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Fungsi untuk mendapatkan nilai cookie
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fungsi untuk menghapus cookie
function eraseCookie(name) {
    document.cookie = name + "=; Max-Age=-99999999; path=/";
}
