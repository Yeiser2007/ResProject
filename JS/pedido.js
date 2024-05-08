document.getElementById('tipo').addEventListener('change', mostrarProductos);

function mostrarProductos() {
  const tipo = document.getElementById('tipo').value;
  const productosContainer = document.getElementById('productos');
  let productosHTML = '';

  if (tipo === 'frutas') {
    productosHTML += `
      <label>Seleccionar fruta:</label>
      <select class="form-control">
        <option>Manzana</option>
        <option>Pera</option>
        <option>Plátano</option>
      </select>
    `;
  } else if (tipo === 'verduras') {
    productosHTML += `
      <label>Seleccionar verdura:</label>
      <select class="form-control">
        <option>Zanahoria</option>
        <option>Lechuga</option>
        <option>Pepino</option>
      </select>
    `;
  }

  productosHTML += `
    <label for="cantidad">Cantidad:</label>
    <input type="number" class="form-control" id="cantidad">
    <label for="precio">Precio:</label>
    <input type="number" class="form-control" id="precio">
    <button class="btn btn-primary mt-2" onclick="agregarProducto()">Agregar a la lista</button>
  `;

  productosContainer.innerHTML = productosHTML;
}

function agregarProducto() {
  const tipo = document.getElementById('tipo').value;
  let producto;
  
  if (tipo === 'frutas') {
    producto = document.querySelector('#productos select').value;
  } else if (tipo === 'verduras') {
    producto = document.querySelector('#productos select').value;
  }

  const cantidad = document.getElementById('cantidad').value;
  const precio = document.getElementById('precio').value;

  const listaProductos = document.getElementById('listaProductos');
  const nuevoProductoHTML = `
    <tr>
      <td>${producto}</td>
      <td>${cantidad}</td>
      <td>${precio}</td>
    </tr>
  `;
  listaProductos.innerHTML += nuevoProductoHTML;
}
