// Preview Gambar 
      function previewGambar() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.form-label-gambar');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 1
      function previewGambar1() {
        const gambar = document.querySelector('#gambar1');
        const gambarLabel = document.querySelector('.form-label-gambar1');
        const imgPreview = document.querySelector('.img-preview1');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 2
      function previewGambar2() {
        const gambar = document.querySelector('#gambar2');
        const gambarLabel = document.querySelector('.form-label-gambar2');
        const imgPreview = document.querySelector('.img-preview2');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 3
      function previewGambar3() {
        const gambar = document.querySelector('#gambar3');
        const gambarLabel = document.querySelector('.form-label-gambar3');
        const imgPreview = document.querySelector('.img-preview3');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 4
      function previewGambar4() {
        const gambar = document.querySelector('#gambar4');
        const gambarLabel = document.querySelector('.form-label-gambar4');
        const imgPreview = document.querySelector('.img-preview4');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 5
      function previewGambar5() {
        const gambar = document.querySelector('#gambar5');
        const gambarLabel = document.querySelector('.form-label-gambar5');
        const imgPreview = document.querySelector('.img-preview5');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 6
      function previewGambar6() {
        const gambar = document.querySelector('#gambar6');
        const gambarLabel = document.querySelector('.form-label-gambar6');
        const imgPreview = document.querySelector('.img-preview6');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 7
      function previewGambar7() {
        const gambar = document.querySelector('#gambar7');
        const gambarLabel = document.querySelector('.form-label-gambar7');
        const imgPreview = document.querySelector('.img-preview7');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
// Preview Gambar 8
      function previewGambar8() {
        const gambar = document.querySelector('#gambar8');
        const gambarLabel = document.querySelector('.form-label-gambar8');
        const imgPreview = document.querySelector('.img-preview8');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }












// Preview Gambar
      function previewGambarNota() {
        const gambar = document.querySelector('#gambarNota');
        const gambarLabel = document.querySelector('.form-label-gambarNota');
        const imgPreview = document.querySelector('.img-previewNota');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }


// // Navbar Active
//         $(function() {
//         var path = window.location.href; // Mengambil data URL pada Address bar
//         $('nav a').each(function() {
//             // Jika URL pada menu ini sama persis dengan path...
//             if (this.href === path) {
//                 // Tambahkan kelas "active" pada menu ini
//                 $(this).addClass('active');
//             }
//         });
//     });

// Jam
    window.setTimeout("waktu()", 1000);
  
    function waktu() {
      var waktu = new Date();
      setTimeout("waktu()", 1000);
      document.getElementById("jam").innerHTML = waktu.getHours();
      document.getElementById("menit").innerHTML = waktu.getMinutes();
      document.getElementById("detik").innerHTML = waktu.getSeconds();
    }