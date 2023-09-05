function showTable(tableNumber) {
    for (let i = 1; i <= 3; i++) {
      const table = document.getElementById(`table${i}`);
      if (i === tableNumber) {
        table.style.display = 'table';
      } else {
        table.style.display = 'none';
      }
    }
  }