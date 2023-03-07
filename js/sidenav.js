var menu_btn = document.querySelector('#menu-btn');
var sidebar = document.querySelector('#sidenav');
var container = document.querySelector('.my-container');
menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("active-container");
})

function toggleSidebar() {
    const sidebar2 = document.querySelector('#sidenav');
    const container2 = document.querySelector('.my-container');
    sidebar2.classList.remove("active-nav");
    container2.classList.remove("active-container");
    if (window.innerWidth <= 500) {
      sidebar2.classList.add("active-nav");
      container2.classList.add("active-container");
    } else {
      sidebar2.classList.remove("active-nav");
      container2.classList.remove("active-container");
    }
  }


window.addEventListener("load", toggleSidebar);

    
