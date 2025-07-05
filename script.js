const menuBtn = document.getElementById("h-menu");
const mobileMenu = document.getElementById("mobileContainer");

menuBtn.addEventListener("click", (e) => {
  e.stopPropagation(); 
  mobileMenu.classList.toggle("hidden");
});

// Tutup menu jika klik di luar
document.addEventListener("click", (e) => {
  const isClickInsideMenu = mobileMenu.contains(e.target);
  const isClickOnMenuBtn = menuBtn.contains(e.target);

  if (!isClickInsideMenu && !isClickOnMenuBtn) {
    mobileMenu.classList.add("hidden");
  }
});


// class active navbar
  document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('nav a');
    const currentPath = window.location.pathname;

    links.forEach(link => {
      const linkPath = new URL(link.href).pathname;

      // Cek jika currentPath adalah root ("/") atau "/index.html"
      const isHomePage = currentPath === '/' || currentPath.endsWith('index.html');

      if (
        (isHomePage && link.id === 'link-beranda') ||
        (!isHomePage && currentPath.endsWith(linkPath))
      ) {
        link.classList.add('border-b-2', 'border-blue-500', 'text-blue-500', 'font-bold');
      } else {
        link.classList.remove('border-b-2', 'border-blue-500', 'text-blue-500', 'font-bold');
      }
    });
  });

  // button login
  function showLogin() {
    document.getElementById('loginForm').classList.remove('hidden');
  }
  function hideLogin() {
    document.getElementById('loginForm').classList.add('hidden');
  }

  // button Regist
  function showRegist() {
    document.getElementById('registForm').classList.remove('hidden');
  }
  function hideRegist() {
    document.getElementById('registForm').classList.add('hidden');
  }
