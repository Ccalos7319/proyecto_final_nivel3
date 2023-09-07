function showTable(tableNumber) {
    for (let i = 1; i <= 4; i++) {
      const table = document.getElementById(`table${i}`);
      if (i === tableNumber) {
        table.style.display = 'table';
      } else {
        table.style.display = 'none';
      }
    }
  }
  let menu = document.getElementById("menu");
  let button = document.getElementById("buton");

  button.addEventListener("click", function() {
    if (menu.style.display !== "flex") {
      menu.style.display = "flex";
    } else {
      menu.style.display = "none";
    }
    

   

  })