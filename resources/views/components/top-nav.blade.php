<div class="top-navbar">
  <div class="flex justify-end">
    <button class="toggle-sidebar in-top-nav pl-4"><x-heroicons::outline.bars-4 class="w-6 h-6" /></button>
    <div class="relative inline-block">
      <button type="button" class="text-left group hover:bg-sky-900 py-2 px-5 rounded" id="setting-button" aria-expanded="true" aria-haspopup="true">
        <div class="text-gray-400 group-hover:text-neutral-50">Selamat datang,</div>
        <div class="text-gray-700 group-hover:text-neutral-50 font-bold block">{{Auth::user()->name}}</div>
      </button>
      <div class="setting-item hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="setting-button" tabindex="-1">
        <div class="py-1" role="none">
          <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
          <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Profil saya</a>
          <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Pengaturan & privasi</a>
          <form method="POST" action="{{Route('logout')}}" role="none">
            @csrf
            <button type="submit" class="block hover:bg-gray-100 w-full px-4 py-2 text-left text-red-600 font-medium" role="menuitem" tabindex="-1" id="menu-item-3">Keluar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const sidebar = document.querySelector(".sidebar");
  const trigger = document.querySelectorAll(".toggle-sidebar");
  const sidebarTopNav = document.querySelector(".toggle-sidebar.in-top-nav");
  const topNav = document.querySelector(".top-navbar>div");
  topNav.classList.add("justify-end");
  topNav.classList.remove("justify-between");
  sidebarTopNav.style.display = "none";
  const windowWidth = window.innerWidth;
  if (windowWidth <= 840) {
    sidebar.style.position = "fixed";
    sidebar.style.height = "100vh";
    sidebar.style.width = 0;
    sidebar.classList.remove("w-96")
    sidebarTopNav.style.display = "block";
    topNav.classList.remove("justify-end");
    topNav.classList.add("justify-between");
  }
  for (let t of trigger) {
    t.addEventListener("click", e => {
      if (sidebar.classList.contains("w-96")) {
        sidebar.classList.remove("w-96");
        sidebar.classList.add("w-0");
        sidebar.style.width = "0";
        sidebarTopNav.style.display = "block";
        topNav.classList.remove("justify-end");
        topNav.classList.add("justify-between");
      } else {
        sidebar.classList.add("w-96");
        sidebar.classList.remove("w-0");
        sidebarTopNav.style.display = "none";
        sidebar.style.width = "300px";
        topNav.classList.add("justify-end");
        topNav.classList.remove("justify-between");
      }
    })
  }
</script>