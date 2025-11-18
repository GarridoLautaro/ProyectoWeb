const input = document.getElementById("inputBuscar");
const sugerencias = document.getElementById("sugerencias");
const btnBuscar = document.getElementById("btnBuscar");

// Función que muestra sugerencias
function buscarProductos() {
  const texto = input.value.trim();
  if (texto.length === 0) {
    sugerencias.innerHTML = "";
    sugerencias.style.display = "none";
    return;
  }

  fetch(`../BD/buscar.php?q=${encodeURIComponent(texto)}`)
    .then((res) => res.json())
    .then((data) => {
      sugerencias.innerHTML = "";
      if (data.length === 0) {
        sugerencias.style.display = "none";
        return;
      }

      sugerencias.style.display = "block";

      data.forEach((item) => {
        const div = document.createElement("div");
        div.classList.add("item-sugerencia");
        div.textContent = item.nombre;
        div.onclick = () => {
          window.location.href = `../Pages/productos.php?buscar=${encodeURIComponent(
            item.nombre
          )}`;
        };
        sugerencias.appendChild(div);
      });
    })
    .catch((err) => {
      console.error("Error:", err);
      sugerencias.style.display = "none";
    });
}

// Input: mostrar sugerencias al escribir
input.addEventListener("input", buscarProductos);

// Botón: redirige al hacer click
btnBuscar.addEventListener("click", () => {
  const texto = input.value.trim();
  if (texto.length > 0) {
    window.location.href = `../Pages/productos.php?buscar=${encodeURIComponent(texto)}`;
  }
});

// Enter: redirige al presionar Enter
input.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    e.preventDefault();
    const texto = input.value.trim();
    if (texto.length > 0) {
      window.location.href = `../Pages/productos.php?buscar=${encodeURIComponent(
        texto
      )}`;
    }
  }
});

// Ocultar sugerencias al hacer click fuera
document.addEventListener("click", (e) => {
  if (!input.contains(e.target) && !sugerencias.contains(e.target)) {
    sugerencias.innerHTML = "";
    sugerencias.style.display = "none";
  }
});
